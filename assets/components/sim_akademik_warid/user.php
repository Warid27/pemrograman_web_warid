<?php
$simAkademik_1 = "active";
$pageName = 'user';
?>
<!-- Main -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
                <li class="breadcrumb-item">Sim Akademik</li>
                <li class="breadcrumb-item active">Data User</li>
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
                                    <th>ID User</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlUser = "SELECT * FROM tb_user";
                                $stmt = $pdo->query($sqlUser);
                                $no = 1;
                                foreach ($stmt as $user) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo htmlspecialchars($user['id_user']); ?></td>
                                        <td><?php echo htmlspecialchars($user['user']); ?></td>
                                        <td><?php echo htmlspecialchars($user['pass']); ?></td>
                                        <td><?php echo htmlspecialchars($user['lvl']); ?></td>
                                        <td>
                                            <a href="?page=<?php echo $pageName ?>&alert=edit_data&id=<?php echo $user['id_user']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                                            <a href="?page=<?php echo $pageName ?>&alert=info_data&id=<?php echo $user['id_user']; ?>" class="btn btn-secondary"><i class="bi bi-info-circle" style="color: white"></i></a>

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
                            <h5 class="fw-bold" style="color: black;">Form User</h5> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a>
                        </span>

                        <!-- General Form Elements -->
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <label for="user" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="user" name="user" required placeholder="Username...">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="pass" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="pass" name="pass" required placeholder="Password...">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lvl" class="col-sm-2 col-form-label">Level</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="lvl" id="lvl" required>
                                        <option value="" disabled selected>Pilih Level</option>
                                        <option value="admin">Admin</option>
                                        <option value="petugas">Petugas</option>
                                        <option value="wakasek">Wakasek</option>
                                        <option value="walikelas">Walikelas</option>
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
            $user = $_POST['user'];
            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $lvl = $_POST['lvl'];


            try {
                $query = "INSERT INTO tb_user(id_user, user, pass, lvl) VALUES (NULL,:user,:pass,:lvl)";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':user', $user);
                $stmt->bindParam(':pass', $pass);
                $stmt->bindParam(':lvl', $lvl);


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
            $id_user = $_GET['id'];

            $query_user = "SELECT * FROM tb_user WHERE id_user = '$id_user'";
            $stmt_user = $pdo->prepare($query_user);
            $stmt_user->execute();
            $user_list = $stmt_user->fetchALL(PDO::FETCH_ASSOC);

            foreach ($user_list as $d_user) {
        ?>
                <div class="card cardModals ">
                    <div class="card-body cardInfo border">
                        <span class="card-title d-flex justify-content-between border-bottom">
                            <h5 class="fw-bold" style="color: black;">Detail User</h5> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a>
                        </span>
                        <table class="border-bottom w-100 mt-2 table_info">
                            <tr>
                                <th>id_user</th>
                                <th>:</th>
                                <td><?php echo $d_user['id_user'] ?? '-'; ?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <th>:</th>
                                <td><?php echo $d_user['user'] ?? '-'; ?></td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <th>:</th>
                                <td><?php echo $d_user['pass'] ?? '-'; ?></td>
                            </tr>
                            <tr>
                                <th>Level User</th>
                                <th>:</th>
                                <td><?php echo $d_user['lvl'] ?? '-'; ?></td>
                            </tr>
                        </table>
                        <a class="btn btn-secondary float-end mt-3 ms-2" href="?page=<?php echo $pageName ?>">Tutup</a>
                        <a class="btn btn-danger float-end mt-3" href="?page=delete_sim&page_name=<?php echo $pageName; ?>&id=<?php echo $d_user['id_user']; ?>">Hapus</a>
                    </div>
                </div>
        <?php
            }
        }
        ?>

        <!-- ===== EDIT ===== -->
        <?php
        if (isset($_GET['alert']) && $_GET['alert'] == 'edit_data' && isset($_GET['id'])) {
            $id_user = $_GET['id'];

            $query_user = "SELECT * FROM tb_user s WHERE id_user = '$id_user'";
            $stmt_user = $pdo->prepare($query_user);
            $stmt_user->execute();
            $user_list = $stmt_user->fetchALL(PDO::FETCH_ASSOC);

            foreach ($user_list as $d_user) {
        ?>
                <div class="card cardModals ">
                    <div class="card-body cardInfo border">
                        <span class="card-title d-flex justify-content-between border-bottom">
                            <h5 class="fw-bold" style="color: black;">Edit Data User</h5> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a>
                        </span>
                        <form action="" method="POST" enctype="multipart/form-data" class="mt-2">
                            <div class="row mb-3">
                                <label for="id_user" class="col-sm-2 col-form-label">id_user</label>
                                <div class="col-sm-10">
                                    <input type="hidden" id="id_user" name="id_user" value="<?php echo $d_user['id_user'] ?>">
                                    <input type="text" class="form-control" value="<?php echo $d_user['id_user'] ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="user" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="user" name="user" required placeholder="Username..." value="<?php echo $d_user['user'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="pass" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="pass" name="pass" required placeholder="Password..." value="<?php echo $d_user['pass'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lvl" class="col-sm-2 col-form-label">Level</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="lvl" id="lvl" required>
                                        <option value="" disabled selected>Pilih Level</option>
                                        <option value="admin" <?php echo ($d_user['lvl'] == 'admin') ? 'selected="selected"' : ''; ?>>Admin</option>
                                        <option value="petugas" <?php echo ($d_user['lvl'] == 'petugas') ? 'selected="selected"' : ''; ?>>Petugas</option>
                                        <option value="wakasek" <?php echo ($d_user['lvl'] == 'wakasek') ? 'selected="selected"' : ''; ?>>Wakasek</option>
                                        <option value="walikelas" <?php echo ($d_user['lvl'] == 'walikelas') ? 'selected="selected"' : ''; ?>>Walikelas</option>
                                    </select>
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
            $id_user = $_POST['id_user'];
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $lvl = $_POST['lvl'];

            try {
                // Use correct placeholders
                $query = "UPDATE tb_user SET user = :user, pass = :pass, lvl = :lvl WHERE id_user = :id_user";

                $stmt = $pdo->prepare($query);

                // Bind parameters
                $stmt->bindParam(':id_user', $id_user);
                $stmt->bindParam(':user', $user);
                $stmt->bindParam(':pass', $pass);
                $stmt->bindParam(':lvl', $lvl);

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