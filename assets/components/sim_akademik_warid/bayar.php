<?php
$simAkademik_5 = "active";
$pageName = 'bayar';
?>
<!-- Main -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Bayar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
                <li class="breadcrumb-item">Sim Akademik</li>
                <li class="breadcrumb-item active">Data Bayar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h5 class="card-header d-flex">
                        <span class="col-sm-6"><a href="?page=<?php echo $pageName ?>&alert=add_data" class="btn btn-success"><i class="bi bi-plus-lg"></i></a> Tambah Data</span>
                    </h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Bayar</th>
                                    <th>Nama Siswa</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Bayar</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $sqlBayar = "SELECT * FROM tb_bayar";
                                $sqlBayar = "SELECT b.id_bayar, s.nama AS nama_siswa, b.jenis, b.bulan, b.jumlah, u.user AS nama_user FROM tb_bayar b LEFT JOIN tb_siswa s ON b.nis = s.nis LEFT JOIN tb_user u ON b.id_user = u.id_user";
                                $stmt = $pdo->query($sqlBayar);
                                $no = 1;
                                foreach ($stmt as $bayar) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo htmlspecialchars($bayar['id_bayar']); ?></td>
                                        <td><?php echo htmlspecialchars($bayar['nama_siswa']); ?></td>
                                        <td><?php echo htmlspecialchars($bayar['jenis']); ?></td>
                                        <td><?php echo htmlspecialchars($bayar['bulan']); ?></td>
                                        <td><?php echo htmlspecialchars($bayar['jumlah']); ?></td>
                                        <td><?php echo htmlspecialchars($bayar['nama_user']); ?></td>
                                        <td>
                                            <a href="?page=<?php echo $pageName ?>&alert=edit_data&id=<?php echo $bayar['id_bayar']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                                            <a href="?page=<?php echo $pageName ?>&alert=info_data&id=<?php echo $bayar['id_bayar']; ?>" class="btn btn-secondary"><i class="bi bi-info-circle" style="color: white"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== ADD DATA FORM ===== -->
        <?php
        if (isset($_GET['alert'])) {
            if ($_GET['alert'] == 'add_data') {
        ?>
                <div class="card cardModals">
                    <div class="card-body cardInfo border">
                        <span class="card-title d-flex justify-content-between border-bottom">
                            <h5 class="fw-bold" style="color: black;">Form Bayar</h5> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a>
                        </span>

                        <!-- General Form Elements -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="nama_siswa" class="col-sm-2 col-form-label">Nama Siswa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required placeholder="Nama Siswa...">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="mata_pelajaran" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" required placeholder="Mata Pelajaran...">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bayar" class="col-sm-2 col-form-label">Bayar</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="bayar" name="bayar" required placeholder="Bayar...">
                                </div>
                            </div>

                            <div class="row pt-3 border-top">
                                <div class="col-sm-12 d-flex justify-content-end gap-1">
                                    <button type="submit" name="add_data" value="add_data" class="btn btn-primary">Simpan</button>
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
        if (isset($_POST['add_data'])) {
            $nama_siswa = $_POST['nama_siswa'];
            $mata_pelajaran = $_POST['mata_pelajaran'];
            $bayar = $_POST['bayar'];

            try {
                $query = "INSERT INTO tb_bayar(id_bayar, nama_siswa, mata_pelajaran, bayar) VALUES (NULL, :nama_siswa, :mata_pelajaran, :bayar)";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':nama_siswa', $nama_siswa);
                $stmt->bindParam(':mata_pelajaran', $mata_pelajaran);
                $stmt->bindParam(':bayar', $bayar);

                if ($stmt->execute()) {
        ?>
                    <script>
                        window.location.href = '<?php echo "?page=$pageName&alert=Success"; ?>';
                    </script>
        <?php
                } else {
                    $errorInfo = $stmt->errorInfo();
                    echo "Error: " . $errorInfo[2];
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        ?>
    </section>
</main>