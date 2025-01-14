<?php
$simAkademik_4 = "active";
$pageName = 'kelas';
?>
<!-- Main -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
                <li class="breadcrumb-item">Sim Akademik</li>
                <li class="breadcrumb-item active">Data Kelas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <?php
                    if (isset($_SESSION['user']) && in_array($_SESSION['role'], ['admin', 'petugas', 'wakasek', 'walikelas'])) {
                    ?>
                        <h5 class="card-header d-flex">
                            <span class="col-sm-6"><a href="?page=<?php echo $pageName ?>&alert=add_data" class="btn btn-success"><i class="bi bi-plus-lg"></i></a> Tambah Data</span>
                        </h5>
                    <?php }
                    ?>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Kelas</th>
                                    <th>Jenjang</th>
                                    <th>Jurusan</th>
                                    <th>Nama Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlkelas = "SELECT * FROM tb_kelas";
                                $stmt = $pdo->query($sqlkelas);
                                $no = 1;
                                foreach ($stmt as $kelas) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo htmlspecialchars($kelas['id_kelas']); ?></td>
                                        <td><?php echo htmlspecialchars($kelas['jenjang']); ?></td>
                                        <td><?php echo htmlspecialchars($kelas['jurusan']); ?></td>
                                        <td><?php echo htmlspecialchars($kelas['nama_kelas']); ?></td>
                                        <td>
                                            <?php
                                            if (isset($_SESSION['user']) && in_array($_SESSION['role'], ['admin', 'petugas', 'wakasek', 'walikelas'])) {
                                            ?>
                                                <a href="?page=<?php echo $pageName ?>&alert=edit_data&id=<?php echo $kelas['id_kelas']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                                            <?php
                                            };
                                            ?>

                                            <a href="?page=<?php echo $pageName ?>&alert=info_data&id=<?php echo $kelas['id_kelas']; ?>" class="btn btn-secondary"><i class="bi bi-info-circle" style="color: white"></i></a>

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
                <div class="card cardModals ">
                    <div class="card-body cardInfo border">
                        <span class="card-title d-flex justify-content-between border-bottom">
                            <h5 class="fw-bold" style="color: black;">Form kelas</h5> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a>
                        </span>

                        <!-- General Form Elements -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="id_kelas" class="col-sm-2 col-form-label">ID Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="id_kelas" name="id_kelas" maxlength="6" required placeholder="ID Kelas...">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenjang" class="col-sm-2 col-form-label">Jenjang</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="jenjang" id="jenjang" required>
                                        <option value="" disabled selected>Pilih Jenjang</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="jurusan" id="jurusan" required>
                                        <option value="" disabled selected>Pilih Jurusan</option>
                                        <option value="PPLG">PPLG</option>
                                        <option value="AKL">AKL</option>
                                        <option value="MPLB">MPLB</option>
                                        <option value="PM">PM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="kelas" id="kelas" required>
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
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
            $id_kelas = $_POST['id_kelas'];
            $jenjang = $_POST['jenjang'];
            $jurusan = $_POST['jurusan'];
            $kelas = $_POST['kelas'];
            $nama_kelas = "$jenjang $jurusan $kelas";


            try {
                $query = "INSERT INTO tb_kelas(id_kelas, jenjang, jurusan, nama_kelas) VALUES (:id_kelas,:jenjang,:jurusan,:nama_kelas)";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':id_kelas', $id_kelas);
                $stmt->bindParam(':jenjang', $jenjang);
                $stmt->bindParam(':jurusan', $jurusan);
                $stmt->bindParam(':nama_kelas', $nama_kelas);

                // Cek Duplicate id_kelas
                $queryCheck = "SELECT COUNT(*) FROM tb_kelas WHERE id_kelas = :id_kelas";
                $stmtCheck = $pdo->prepare($queryCheck);
                $stmtCheck->bindParam(':id_kelas', $id_kelas);
                $stmtCheck->execute();
                $count = $stmtCheck->fetchColumn();

                if ($count > 0) {
                    echo "Error: id_kelas sudah ada dalam database.";
                    exit;
                }

                if ($stmt->execute()) {
        ?>
                    <script>
                        window.location.href = '<?php echo "?page=$pageName&alert=Success"; ?>';
                    </script>
        <?php
                } else {
                    // Ambil informasi error
                    $errorInfo = $stmt->errorInfo();
                    echo "Error: " . $errorInfo[2]; // Elemen ke-2 berisi pesan error
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        ?>

        <!-- ===== INFO ===== -->
        <?php
        if (isset($_GET['alert']) && $_GET['alert'] == 'info_data' && isset($_GET['id'])) {
            $id_kelas = $_GET['id'];

            $query_kelas = "SELECT * FROM tb_kelas WHERE id_kelas = '$id_kelas'";
            $stmt_kelas = $pdo->prepare($query_kelas);
            $stmt_kelas->execute();
            $kelas_list = $stmt_kelas->fetchALL(PDO::FETCH_ASSOC);

            foreach ($kelas_list as $d_kelas) {
        ?>
                <div class="card cardModals ">
                    <div class="card-body cardInfo border">
                        <span class="card-title d-flex justify-content-between border-bottom">
                            <h5 class="fw-bold" style="color: black;">Detail kelas</h5> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a>
                        </span>
                        <table class="border-bottom w-100 mt-2 table_info">
                            <tr>
                                <th>id_kelas</th>
                                <th>:</th>
                                <td><?php echo $d_kelas['id_kelas'] ?? '-'; ?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <td><?php echo $d_kelas['nama_kelas'] ?? '-'; ?></td>
                            </tr>
                        </table>
                        <a class="btn btn-secondary float-end mt-3 ms-2" href="?page=<?php echo $pageName ?>">Tutup</a>
                        <?php
                        if (isset($_SESSION['user']) && in_array($_SESSION['role'], ['admin', 'petugas', 'wakasek', 'walikelas'])) {
                        ?>
                            <a class="btn btn-danger float-end mt-3" href="?page=<?php echo $pageName; ?>&alert=confirm_delete_sim&id=<?php echo $d_kelas['id_kelas']; ?>">Hapus</a>
                        <?php
                        }
                        ?>

                    </div>
                </div>
        <?php
            }
        }
        ?>

        <!-- ===== EDIT ===== -->
        <?php
        if (isset($_GET['alert']) && $_GET['alert'] == 'edit_data' && isset($_GET['id'])) {
            $id_kelas = $_GET['id'];

            $query_kelas = "SELECT * FROM tb_kelas WHERE id_kelas = '$id_kelas'";
            $stmt_kelas = $pdo->prepare($query_kelas);
            $stmt_kelas->execute();
            $kelas_list = $stmt_kelas->fetchALL(PDO::FETCH_ASSOC);

            foreach ($kelas_list as $d_kelas) {
        ?>
                <div class="card cardModals ">
                    <div class="card-body cardInfo border">
                        <span class="card-title d-flex justify-content-between border-bottom">
                            <h5 class="fw-bold" style="color: black;">Edit Data kelas</h5> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a>
                        </span>
                        <form action="" method="POST" enctype="multipart/form-data" class="mt-2">
                            <div class="row mb-3">
                                <label for="id_kelas" class="col-sm-2 col-form-label">id_kelas</label>
                                <div class="col-sm-10">
                                    <input type="hidden" id="id_kelas" name="id_kelas" value="<?php echo $d_kelas['id_kelas'] ?>">
                                    <input type="text" class="form-control" value="<?php echo $d_kelas['id_kelas'] ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_kelas" class="col-sm-2 col-form-label">Nama Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required placeholder="Nama Kelas..." value="<?php echo $d_kelas['nama_kelas'] ?>">
                                </div>
                            </div>

                            <div class="row pt-3 border-top">
                                <div class="col-sm-12 d-flex justify-content-end gap-1">
                                    <button type="submit" name="update_data" value="update_data" class="btn btn-primary">Simpan</button>
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

        <!-- ===== UPDATE DATA PROCCESS ===== -->
        <?php
        if (isset($_POST['update_data'])) {
            $id_kelas = $_POST['id_kelas'];
            $nama_kelas = $_POST['nama_kelas'];

            try {
                // Use correct placeholders
                $query = "UPDATE tb_kelas SET nama_kelas = :nama_kelas WHERE id_kelas = :id_kelas";

                $stmt = $pdo->prepare($query);

                // Bind parameters
                $stmt->bindParam(':id_kelas', $id_kelas);
                $stmt->bindParam(':nama_kelas', $nama_kelas);

                if ($stmt->execute()) {
        ?>
                    <script>
                        window.location.href = '<?php echo "?page=$pageName&alert=Success"; ?>';
                    </script>
        <?php
                } else {
                    // Handle execution failure
                    $errorInfo = $stmt->errorInfo();
                    echo "Error: " . $errorInfo[2]; // Error message from database
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        ?>

</main>
<!-- Main -->