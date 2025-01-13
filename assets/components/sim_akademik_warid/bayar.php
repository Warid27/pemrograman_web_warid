<!-- ===== INFO ===== -->
<?php
if (isset($_GET['alert']) && $_GET['alert'] == 'info_bayar' && isset($_GET['nis'])) {
    if (isset($_GET['nis'])) {
        $nis = $_GET['nis'];
    } else {
        die('NIS tidak ditemukan!');
    }

    $query_bayar = "SELECT s.nama, b.bulan, SUM(CASE WHEN b.jenis = 'SPP' THEN b.jumlah ELSE 0 END) AS SPP, SUM(CASE WHEN b.jenis = 'Tabungan' THEN b.jumlah ELSE 0 END) AS tabungan, SUM(CASE WHEN b.jenis = 'Extra' THEN b.jumlah ELSE 0 END) AS extra, SUM(b.jumlah) AS total FROM tb_siswa s LEFT JOIN tb_bayar b ON s.nis = b.nis WHERE s.nis = :nis AND b.bulan IS NOT NULL GROUP BY s.nama, b.bulan ORDER BY b.bulan";

    $stmt_bayar = $pdo->prepare($query_bayar);
    $stmt_bayar->execute(['nis' => $nis]);

    $pembayaran = [];
    $nama_siswa = 'User'; // Variabel untuk menyimpan nama siswa

    while ($d_bayar = $stmt_bayar->fetch(PDO::FETCH_ASSOC)) {
        $pembayaran[$d_bayar['bulan']] = $d_bayar;
        $nama_siswa = $d_bayar['nama']; // Ambil nama siswa
    }
?>
    <div class="card cardModals table_bayar">
        <div class="card-body cardInfo border">
            <span class="card-title d-flex justify-content-between border-bottom">
                <h5 class="fw-bold" style="color: black;">Data Pembayaran - <?php echo htmlspecialchars($nama_siswa); ?></h5>
                <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;">
                    <i class="bi bi-x-circle"></i>
                </a>
            </span>
            <table class="border-bottom w-100 mt-2 table_info table-striped table-hover table-bordered table">
                <thead>
                    <th>Bulan</th>
                    <th>SPP</th>
                    <th>Tabungan</th>
                    <th>Extra</th>
                    <th>Total</th>
                </thead>
                <tbody>
                    <?php
                    $bulan_array = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',];
                    foreach ($bulan_array as $index => $bulan) {
                        $data = isset($pembayaran[$index + 1]) ? $pembayaran[$index + 1] : null;
                    ?>
                        <tr>
                            <td><?php echo $bulan; ?></td>
                            <td><?php echo $data ? "Rp " . number_format($data['SPP'], 0, ',', '.') : '-'; ?></td>
                            <td><?php echo $data ? "Rp " . number_format($data['tabungan'], 0, ',', '.') : '-'; ?></td>
                            <td><?php echo $data ? "Rp " . number_format($data['extra'], 0, ',', '.') : '-'; ?></td>
                            <td><?php echo $data ? "Rp " . number_format($data['total'], 0, ',', '.') : '-'; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <a class="btn btn-secondary float-end mt-3 ms-2" href="?page=<?php echo $pageName ?>">Tutup</a>
            <?php if (isset($_SESSION['user'])) {
                if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "petugas" || $_SESSION['role'] == "wakasek" || $_SESSION['role'] == "walikelas") {
            ?>
                    <a class="btn btn-primary float-end mt-3" href="?page=<?php echo $pageName; ?>&alert=add_bayar&nis=<?php echo $nis; ?>">Input Pembayaran</a>
            <?php }
            } ?>
        </div>
    </div>
<?php
}
?>


<!-- ===== ADD DATA FORM ===== -->
<?php
if (isset($_GET['alert']) && $_GET['alert'] == 'add_bayar' && isset($_GET['nis'])) {
    $nis = $_GET['nis'];

    // Query to fetch the data
    $query_bayar = "SELECT s.nis, s.nama, b.id_bayar, b.bulan, b.jenis, b.jumlah FROM tb_siswa s LEFT JOIN tb_bayar b ON s.nis = b.nis WHERE s.nis = :nis ORDER BY b.bulan, b.jenis";
    $stmt_bayar = $pdo->prepare($query_bayar);
    $stmt_bayar->execute([':nis' => $nis]);
    $d_bayar = $stmt_bayar->fetch(PDO::FETCH_ASSOC);

    // Check if data is fetched
    $id_bayar = $d_bayar['id_bayar'] ?? ''; // Default to an empty string if not set
?>
    <div class="card cardModals">
        <div class="card-body cardInfo border">
            <span class="card-title d-flex justify-content-between border-bottom">
                <h5 class="fw-bold" style="color: black;">Input Pembayaran - <?php echo $d_bayar['nama'] ?? 'User'; ?></h5>
                <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;">
                    <i class="bi bi-x-circle"></i>
                </a>
            </span>
            <form action="" method="POST">
                <input type="hidden" name="nis" id="nis" value="<?php echo $nis; ?>">
                <input type="hidden" name="id_user" id="id_user" value="<?php echo $id_user; ?>">
                <input type="hidden" name="id_bayar" id="id_bayar" value="<?php echo $id_bayar; ?>">

                <div class="row mb-3">
                    <label for="bulan" class="col-sm-2 col-form-label">Bulan</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="bulan" id="bulan" required>
                            <?php
                            $bulan_array = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            foreach ($bulan_array as $index => $bulan) {
                                $selected = ($d_bayar['bulan'] ?? 0) == ($index + 1) ? 'disabled' : '';
                                echo "<option value='" . ($index + 1) . "' $selected>$bulan</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="SPP" class="col-sm-3 col-form-label">SPP</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="SPP" name="SPP" placeholder="Masukkan Jumlah SPP" min="0" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Tabungan" class="col-sm-3 col-form-label">Tabungan</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="Tabungan" name="Tabungan" placeholder="Masukkan Jumlah Tabungan" min="0" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="Extra" class="col-sm-3 col-form-label">Extra</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="Extra" name="Extra" placeholder="Masukkan Jumlah Extra" min="0" required>
                    </div>
                </div>

                <div class="row pt-3 border-top">
                    <div class="col-sm-12 d-flex justify-content-end gap-1">
                        <button type="submit" name="add_bayar" value="add_bayar" class="btn btn-primary">Simpan</button>
                        <a class="btn btn-secondary" href="?page=<?php echo $pageName ?>">Tutup</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>

<!-- ===== ADD DATA PROCCESS ===== -->
<?php
if (isset($_POST['add_bayar'])) {
    if (isset($_GET['nis'])) {
        $nis = $_GET['nis'];
    } else {
        die('NIS tidak ditemukan!');
    }
    $bulan = $_POST['bulan'];
    $SPP = $_POST['SPP'];
    $Tabungan = $_POST['Tabungan'];
    $Extra = $_POST['Extra'];
    $id_user = 3; // Replace this with actual user ID if needed

    if (empty($nis) || empty($bulan) || empty($SPP) || empty($Tabungan) || empty($Extra)) {
        die('Semua kolom harus diisi');
    }

    try {
        $pdo->beginTransaction();

        // Check if payment data for this month exists
        $checkQuery = "SELECT COUNT(*) FROM tb_bayar WHERE nis = :nis AND bulan = :bulan";
        $checkStmt = $pdo->prepare($checkQuery);
        $checkStmt->execute([
            ':nis' => $nis,
            ':bulan' => $bulan,
        ]);
        $exists = $checkStmt->fetchColumn();

        if ($exists > 0) {
            // Update existing records for this month
            $query = "UPDATE tb_bayar SET jumlah = CASE WHEN jenis = 'SPP' THEN :SPP WHEN jenis = 'Tabungan' THEN :Tabungan WHEN jenis = 'Extra' THEN :Extra END, id_user = :id_user WHERE nis = :nis AND bulan = :bulan AND jenis IN ('SPP', 'Tabungan', 'Extra')";
        } else {
            // Insert new records for this month
            $query = "INSERT INTO tb_bayar (nis, bulan, jenis, jumlah, id_user) VALUES (:nis, :bulan, 'SPP', :SPP, :id_user), (:nis, :bulan, 'Tabungan', :Tabungan, :id_user), (:nis, :bulan, 'Extra', :Extra, :id_user)";
        }

        $stmt = $pdo->prepare($query);
        // Bind parameters for both insert and update queries
        $stmt->bindParam(':nis', $nis);
        $stmt->bindParam(':bulan', $bulan);
        $stmt->bindParam(':SPP', $SPP);
        $stmt->bindParam(':Tabungan', $Tabungan);
        $stmt->bindParam(':Extra', $Extra);
        $stmt->bindParam(':id_user', $id_user);

        // Execute the statement
        if ($stmt->execute()) {
            $pdo->commit();
?>
            <script>
                window.location.href = '?page=<?php echo $pageName; ?>&alert=Success&nis=<?php echo $nis; ?>';
            </script>
<?php
        } else {
            throw new Exception('Failed to execute the query.');
        }
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>