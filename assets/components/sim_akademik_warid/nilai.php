<!-- ===== INFO ===== -->
<?php
if (isset($_GET['alert']) && $_GET['alert'] == 'info_nilai' && isset($_GET['nis'])) {
    if (isset($_GET['nis'])) {
        $nis = $_GET['nis'];
    } else {
        die('NIS tidak ditemukan!');
    }

    $query_nilai = "SELECT s.nis, s.nama, m.id_mapel, m.nama_mapel, COALESCE(n.nilai, '-') AS nilai FROM tb_siswa s LEFT JOIN tb_mapel m ON 1 = 1 LEFT JOIN tb_nilai n ON s.nis = n.nis AND m.id_mapel = n.id_mapel WHERE s.nis = :nis ORDER BY m.id_mapel";
    $stmt_nilai = $pdo->prepare($query_nilai);
    $stmt_nilai->execute(['nis' => $nis]);
    $d_nilai = $stmt_nilai->fetch(PDO::FETCH_ASSOC);

    if ($d_nilai) {
?>
        <div class="card cardModals ">
            <div class="card-body cardInfo border">
                <span class="card-title d-flex justify-content-between border-bottom">
                    <h5 class="fw-bold" style="color: black;">Nilai Mata Pelajaran - <?php echo htmlspecialchars($d_nilai['nama']); ?></h5>
                    <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;">
                        <i class="bi bi-x-circle"></i>
                    </a>
                </span>
                <table class="border-bottom w-100 mt-2 table_info">
                    <?php
                    do {
                    ?>
                        <tr>
                            <th><?php echo htmlspecialchars($d_nilai['nama_mapel']); ?></th>
                            <th>:</th>
                            <td><?php echo htmlspecialchars($d_nilai['nilai']); ?></td>
                        </tr>
                    <?php
                    } while ($d_nilai = $stmt_nilai->fetch(PDO::FETCH_ASSOC));
                    ?>
                </table>
                <a class="btn btn-secondary float-end mt-3 ms-2" href="?page=<?php echo $pageName ?>">Tutup</a>
                <a class="btn btn-primary float-end mt-3" href="?page=<?php echo $pageName; ?>&alert=add_nilai&nis=<?php echo $nis; ?>">Input Nilai</a>
            </div>
        </div>
<?php
    }
}
?>

<!-- ===== ADD DATA FORM ===== -->
<?php
if (isset($_GET['alert']) && $_GET['alert'] == 'add_nilai' && isset($_GET['nis'])) {
    if (isset($_GET['nis'])) {
        $nis = $_GET['nis'];
    } else {
        die('NIS tidak ditemukan!');
    }

    $query_nilai = "SELECT s.nis, s.nama, m.id_mapel, m.nama_mapel, COALESCE(n.nilai, '-') AS nilai FROM tb_siswa s LEFT JOIN tb_mapel m ON 1 = 1 LEFT JOIN tb_nilai n ON s.nis = n.nis AND m.id_mapel = n.id_mapel WHERE s.nis = :nis ORDER BY m.id_mapel";
    $stmt_nilai = $pdo->prepare($query_nilai);
    $stmt_nilai->execute(['nis' => $nis]);
    $d_nilai = $stmt_nilai->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows

    if (!empty($d_nilai)) { // Check if rows are available
?>
        <div class="card cardModals ">
            <div class="card-body cardInfo border">
                <span class="card-title d-flex justify-content-between border-bottom">
                    <h5 class="fw-bold" style="color: black;">Nilai Mata Pelajaran - <?php echo htmlspecialchars($d_nilai[0]['nama']); ?></h5>
                    <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;">
                        <i class="bi bi-x-circle"></i>
                    </a>
                </span>
                <form action="" method="POST">
                    <input type="hidden" name="nis" id="nis" value="<?php echo $nis; ?>">
                    <input type="hidden" name="id_user" id="id_user" value="<?php echo $id_user; ?>">
                    <?php foreach ($d_nilai as $data_nilai) { ?>
                        <div class="row mb-3">
                            <label for="nilai[<?php echo $data_nilai['id_mapel'] ?>]" class="col-sm-3 col-form-label">
                                <?php echo htmlspecialchars($data_nilai['nama_mapel']) ?>
                            </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="nilai[<?php echo $data_nilai['id_mapel'] ?>]" name="nilai[<?php echo $data_nilai['id_mapel'] ?>]" value="<?php echo $data_nilai['nilai'] !== '-' ? htmlspecialchars($data_nilai['nilai']) : ''; ?>" placeholder="Masukkan nilai" max="100" min="0">
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row pt-3 border-top">
                        <div class="col-sm-12 d-flex justify-content-end gap-1">
                            <button type="submit" name="add_nilai" value="add_nilai" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="?page=<?php echo $pageName ?>">Tutup</a>
                        </div>
                    </div>
                </form><!-- End General Form Elements -->
            </div>
        </div>
<?php
    }
}
?>
<!-- ===== ADD DATA PROCCESS ===== -->
<?php
if (isset($_POST['add_nilai'])) {
    $nis = $_POST['nis'];
    $nilai_data = $_POST['nilai'];
    $id_user = 3; // Replace this with actual user ID if needed

    try {
        $pdo->beginTransaction();

        foreach ($nilai_data as $id_mapel => $nilai) {
            $nilai = (int) $nilai; // Ensure nilai is an integer

            if ($nilai > 100 || $nilai < 0) {
                die('Nilai Maksimal Adalah 100! Dan Minimal Adalah 0!');
            }

            // Check if the record already exists
            $checkQuery = "SELECT COUNT(*) FROM tb_nilai WHERE nis = :nis AND id_mapel = :id_mapel";
            $checkStmt = $pdo->prepare($checkQuery);
            $checkStmt->execute([
                ':nis' => $nis,
                ':id_mapel' => $id_mapel,
            ]);
            $exists = $checkStmt->fetchColumn();

            if ($exists > 0) {
                // If record exists, update the value
                $query = "UPDATE tb_nilai SET nilai = :nilai, id_user = :id_user WHERE nis = :nis AND id_mapel = :id_mapel
                        ";
            } else {
                // If record doesn't exist, insert the new value
                $query = "INSERT INTO tb_nilai (nis, id_mapel, nilai, id_user) VALUES (:nis, :id_mapel, :nilai, :id_user)
                        ";
            }

            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':nis' => $nis,
                ':id_mapel' => $id_mapel,
                ':nilai' => $nilai,
                ':id_user' => $id_user,
            ]);
        }


        // Commit the transaction
        if ($pdo->commit()) {
?>
            <script>
                window.location.href = '<?php echo "?page=$pageName&alert=Success"; ?>';
            </script>
<?php
        } else {
            echo "Error: Could not commit the transaction.";
        }
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>