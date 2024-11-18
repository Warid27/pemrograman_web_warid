<?php
$simAkademik_5 = "active";
$pageName = 'nilai';
?>
<!-- Main -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Nilai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
                <li class="breadcrumb-item">Sim Akademik</li>
                <li class="breadcrumb-item active">Data Nilai</li>
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
                                    <th>ID Nilai</th>
                                    <th>Nama Siswa</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Nilai</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $sqlNilai = "SELECT * FROM tb_nilai";
                                $sqlNilai = "SELECT n.id_nilai, s.nama AS nama_siswa, m.nama_mapel AS mata_pelajaran, n.nilai, u.user FROM tb_nilai n LEFT JOIN tb_siswa s ON n.nis = s.nis LEFT JOIN tb_mapel m ON n.id_mapel = m.id_mapel LEFT JOIN tb_user u ON n.id_user = u.id_user;";
                                $stmt = $pdo->query($sqlNilai);
                                $no = 1;
                                foreach ($stmt as $nilai) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo htmlspecialchars($nilai['id_nilai']); ?></td>
                                        <td><?php echo htmlspecialchars($nilai['nama_siswa']); ?></td>
                                        <td><?php echo htmlspecialchars($nilai['mata_pelajaran']); ?></td>
                                        <td><?php echo htmlspecialchars($nilai['nilai']); ?></td>
                                        <td><?php echo htmlspecialchars($nilai['user']); ?></td>
                                        <td>
                                            <a href="?page=<?php echo $pageName ?>&alert=edit_data&id=<?php echo $nilai['id_nilai']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                                            <a href="?page=<?php echo $pageName ?>&alert=info_data&id=<?php echo $nilai['id_nilai']; ?>" class="btn btn-secondary"><i class="bi bi-info-circle" style="color: white"></i></a>
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
                            <h5 class="fw-bold" style="color: black;">Form Nilai</h5> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a>
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
                                <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="nilai" name="nilai" required placeholder="Nilai...">
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
            $nilai = $_POST['nilai'];

            try {
                $query = "INSERT INTO tb_nilai(id_nilai, nama_siswa, mata_pelajaran, nilai) VALUES (NULL, :nama_siswa, :mata_pelajaran, :nilai)";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':nama_siswa', $nama_siswa);
                $stmt->bindParam(':mata_pelajaran', $mata_pelajaran);
                $stmt->bindParam(':nilai', $nilai);

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