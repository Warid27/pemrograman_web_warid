<?php
$simAkademik_1 = "active";
$pageName = 'user';
?>
<?php
$query_kelas = "SELECT * FROM tb_kelas";
$stmt_kelas = $pdo->prepare($query_kelas);
$stmt_kelas->execute();
$kelas_list = $stmt_kelas->fetchALL(PDO::FETCH_ASSOC);
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
                                    <th>Aksi</th>
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

                            <div class="row mb-3 kelas-row" style="display: none;">
                                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="id_kelas" id="id_kelas">
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        <?php foreach ($kelas_list as $kelas) { ?>
                                            <option value="<?php echo $kelas['id_kelas']; ?>"><?php echo $kelas['nama_kelas']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3 wks-row" style="display: none;">
                                <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="bidang" id="bidang">
                                        <option value="" disabled selected>Pilih Bidang</option>
                                        <option value="1">Kurikulum</option>
                                        <option value="2">Kesiswaan</option>
                                        <option value="3">Sarpras</option>
                                        <option value="4">Humas</option>
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
            $password_real = $_POST['pass'];

            try {
                $query = "INSERT INTO tb_user(id_user, user, pass, lvl) VALUES (NULL,:user,:pass,:lvl)";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':user', $user);
                $stmt->bindParam(':pass', $pass);
                $stmt->bindParam(':lvl', $lvl);


                if ($stmt->execute()) {
                    // Ambil ID terakhir yang dimasukkan
                    $lastInsertedId = $pdo->lastInsertId();

                    // Switch untuk db details
                    switch ($lvl) {
                        case 'admin':
                            $details = "INSERT INTO tb_admin(id_user) VALUES ($lastInsertedId)";
                            $query_details = $pdo->prepare($details);
                            break;
                        case 'petugas':
                            $details = "INSERT INTO tb_petugas(id_user) VALUES ($lastInsertedId)";
                            $query_details = $pdo->prepare($details);
                            break;
                        case 'walikelas':
                            $id_kelas = $_POST['id_kelas'];
                            $details = "INSERT INTO tb_walikelas(id_user, id_kelas) VALUES ($lastInsertedId, $id_kelas)";
                            $query_details = $pdo->prepare($details);
                            break;
                        case 'wakasek':
                            $bidang = $_POST['bidang'];
                            $details = "INSERT INTO tb_wakasek(id_user, bidang) VALUES ($lastInsertedId, $bidang)";
                            $query_details = $pdo->prepare($details);
                            break;

                        default:
                            echo "ERROR LEVEL!!!";
                            break;
                    }

                    // Proses memasukkan data ke dalam userList.php
                    $filePath = __DIR__ . "/../../auth/userList.php"; // Path relatif
                    if (file_exists($filePath)) {
                        include $filePath;

                        if (isset($userList) && is_array($userList)) {
                            // Tambahkan data baru
                            $newUser = array(
                                'user_id' => $lastInsertedId,
                                'username' => $user,
                                'password' => $password_real,
                                'level' => $lvl,
                            );
                            $userList[] = $newUser;

                            // Tulis ulang file
                            $content = "<?php\n\$userList = " . var_export($userList, true) . ";\n";
                            if (file_put_contents($filePath, $content) === false) {
                                die("Gagal menulis ke file: $filePath");
                            }
                        } else {
                            die("Variabel \$userList tidak ditemukan atau bukan array.");
                        }
                    } else {
                        die("File tidak ditemukan: $filePath");
                    }

                    if ($query_details->execute()) {
        ?>
                        <script>
                            window.location.href = '<?php echo "?page=$pageName&alert=Success"; ?>';
                        </script>
        <?php
                    } else {
                        // Ambil informasi error
                        $errorInfo = $query_details->errorInfo();
                        echo "Error Details: " . $errorInfo[2]; // Elemen ke-2 berisi pesan error
                    }
                } else {
                    // Ambil informasi error
                    $errorInfo = $stmt->errorInfo();
                    echo "Error Execute: " . $errorInfo[2]; // Elemen ke-2 berisi pesan error
                }
            } catch (PDOException $e) {
                echo "Error All: " . $e->getMessage();
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
                                <th>ID User</th>
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
                            <?php
                            if ($d_user['lvl'] == "walikelas" || $d_user['lvl'] == "wakasek") {
                                $infoData = '-'; // Default value
                                $infoName = '-'; // Default value

                                if ($d_user['lvl'] == 'walikelas') {
                                    $query = "SELECT k.nama_kelas FROM tb_walikelas w JOIN tb_kelas k ON w.id_kelas = k.id_kelas WHERE w.id_user = :id_user";
                                    $stmt = $pdo->prepare($query);
                                    $stmt->bindParam(':id_user', $d_user['id_user'], PDO::PARAM_INT);
                                    $stmt->execute();
                                    $d_wali_kelas = $stmt->fetch(PDO::FETCH_ASSOC);

                                    $infoName = "Wali Kelas";
                                    $infoData = $d_wali_kelas['nama_kelas'] ?? '-';
                                } elseif ($d_user['lvl'] == 'wakasek') {
                                    $query_wks = "SELECT bidang FROM tb_wakasek WHERE id_user = :id_user";
                                    $stmt_wks = $pdo->prepare($query_wks);
                                    $stmt_wks->bindParam(':id_user', $d_user['id_user'], PDO::PARAM_INT);
                                    $stmt_wks->execute();
                                    $d_wks = $stmt_wks->fetch(PDO::FETCH_ASSOC);

                                    $infoData = $d_wks['bidang'] ?? '-';
                                    $infoName = "Bidang";
                                }
                            ?>
                                <tr>
                                    <th><?php echo $infoName ?></th>
                                    <th>:</th>
                                    <td><?php echo $infoData; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <a class="btn btn-secondary float-end mt-3 ms-2" href="?page=<?php echo $pageName ?>">Tutup</a>
                        <a class="btn btn-danger float-end mt-3" href="?page=<?php echo $pageName; ?>&alert=confirm_delete_sim&id=<?php echo $d_user['id_user']; ?>">Hapus</a>
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
                                <label for="id_user" class="col-sm-2 col-form-label">ID User</label>
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
                                    <input type="password" class="form-control" id="pass" name="pass" required placeholder="Password..." value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <input type="hidden" name="lvlBefore" value="<?php echo $d_user['lvl'] ?>">
                                <label for="lvl" class="col-sm-2 col-form-label">Level</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="lvl" id="lvl" required>
                                        <option value="" disabled>Pilih Level</option>
                                        <option value="admin" <?php echo ($d_user['lvl'] == 'admin') ? 'selected="selected"' : ''; ?>>Admin</option>
                                        <option value="petugas" <?php echo ($d_user['lvl'] == 'petugas') ? 'selected="selected"' : ''; ?>>Petugas</option>
                                        <option value="wakasek" <?php echo ($d_user['lvl'] == 'wakasek') ? 'selected="selected"' : ''; ?>>Wakasek</option>
                                        <option value="walikelas" <?php echo ($d_user['lvl'] == 'walikelas') ? 'selected="selected"' : ''; ?>>Walikelas</option>
                                    </select>
                                </div>
                            </div>

                            <?php
                            // == WALIKELAS ==
                            if ($d_user['lvl'] == 'walikelas') {
                                $query_wali = "SELECT * FROM tb_walikelas WHERE id_user = :id_user";
                                $stmt_wali = $pdo->prepare($query_wali);
                                $stmt_wali->bindParam(':id_user', $d_user['id_user'], PDO::PARAM_INT);
                                $stmt_wali->execute();
                                $d_wali = $stmt_wali->fetch(PDO::FETCH_ASSOC);
                            ?>
                                <div class="row mb-3 kelas-row" style="display: flex;">
                                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="id_kelas" id="id_kelas" required>
                                            <option value="" disabled>Pilih Kelas</option>
                                            <?php foreach ($kelas_list as $kelas) { ?>
                                                <option value="<?php echo $kelas['id_kelas']; ?>" <?php echo ($kelas['id_kelas'] == $d_wali['id_kelas']) ? 'selected="selected"' : ''; ?>><?php echo $kelas['nama_kelas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3 wks-row" style="display: none;">
                                    <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="bidang" id="bidang">
                                            <option value="" disabled selected>Pilih Bidang</option>
                                            <option value="1">Kurikulum</option>
                                            <option value="2">Kesiswaan</option>
                                            <option value="3">Sarpras</option>
                                            <option value="4">Humas</option>
                                        </select>
                                    </div>
                                </div>
                            <?php
                                // == WAKASEK ==
                            } else if ($d_user['lvl'] == 'wakasek') {
                                $query_wks = "SELECT * FROM tb_wakasek WHERE id_user = :id_user";
                                $stmt_wks = $pdo->prepare($query_wks);
                                $stmt_wks->bindParam(':id_user', $d_user['id_user'], PDO::PARAM_INT);
                                $stmt_wks->execute();
                                $d_wks = $stmt_wks->fetch(PDO::FETCH_ASSOC);
                            ?>
                                <div class="row mb-3 wks-row" style="display: flex;">
                                    <label for="wks" class="col-sm-2 col-form-label">Bidang</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="wks" id="wks">
                                            <option value="" disabled selected>Pilih Bidang</option>
                                            <option value="1" <?php echo ($d_wks['bidang'] == '1') ? 'selected="selected"' : ''; ?>>Kurikulum</option>
                                            <option value="2" <?php echo ($d_wks['bidang'] == '2') ? 'selected="selected"' : ''; ?>>Kesiswaan</option>
                                            <option value="3" <?php echo ($d_wks['bidang'] == '3') ? 'selected="selected"' : ''; ?>>Sarpras</option>
                                            <option value="4" <?php echo ($d_wks['bidang'] == '4') ? 'selected="selected"' : ''; ?>>Humas</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 kelas-row" style="display: none;">
                                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="id_kelas" id="id_kelas">
                                            <option value="" disabled selected>Pilih Kelas</option>
                                            <?php foreach ($kelas_list as $kelas) { ?>
                                                <option value="<?php echo $kelas['id_kelas']; ?>"><?php echo $kelas['nama_kelas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

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
            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $password_real = $_POST['pass']; // Simpan untuk file userList.php
            $lvl = $_POST['lvl'];
            $lvlBefore = $_POST['lvlBefore'];

            if ($lvlBefore != $lvl) {
                $updateQuery = "DELETE FROM tb_$lvlBefore WHERE id_user = $id_user";
                $delToUpdate = $pdo->prepare($updateQuery);
                if ($delToUpdate->execute()) {
                    // Switch untuk db details
                    switch ($lvl) {
                        case 'admin':
                            $details = "INSERT INTO tb_admin(id_user) VALUES ($id_user)";
                            $query_details = $pdo->prepare($details);
                            break;
                        case 'petugas':
                            $details = "INSERT INTO tb_petugas(id_user) VALUES ($id_user)";
                            $query_details = $pdo->prepare($details);
                            break;
                        case 'walikelas':
                            $id_kelas = $_POST['id_kelas'];
                            $details = "INSERT INTO tb_walikelas(id_user, id_kelas) VALUES ($id_user, $id_kelas)";
                            $query_details = $pdo->prepare($details);
                            break;
                        case 'wakasek':
                            $bidang = $_POST['bidang'];
                            $details = "INSERT INTO tb_wakasek(id_user, bidang) VALUES ($id_user, $bidang)";
                            $query_details = $pdo->prepare($details);
                            break;

                        default:
                            echo "ERROR LEVEL!!!";
                            break;
                    }
                }
            } else {
                // Switch untuk db details
                switch ($lvl) {
                    case 'admin':
                        $details = "UPDATE tb_admin SET id_user = $id_user WHERE id_user = $id_user";
                        break;
                    case 'petugas':
                        $details = "UPDATE tb_petugas SET id_user = $id_user WHERE id_user = $id_user";
                        break;
                    case 'walikelas':
                        $id_kelas = $_POST['id_kelas'];
                        $details = "UPDATE tb_walikelas SET id_user = $id_user, id_kelas = $id_kelas WHERE id_user = $id_user";
                        break;
                    case 'wakasek':
                        $bidang = $_POST['bidang'];
                        $details = "UPDATE tb_wakasek SET id_user = $id_user, bidang = $bidang WHERE id_user = $id_user";
                        break;

                    default:
                        echo "ERROR LEVEL!!!";
                        break;
                }
            }
            $query_details = $pdo->prepare($details);

            try {
                // Query untuk memperbarui data di database
                $query = "UPDATE tb_user SET user = :user, pass = :pass, lvl = :lvl WHERE id_user = :id_user";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':id_user', $id_user);
                $stmt->bindParam(':user', $user);
                $stmt->bindParam(':pass', $pass);
                $stmt->bindParam(':lvl', $lvl);

                if ($stmt->execute() && $query_details->execute()) {

                    // Setelah sukses, perbarui data di file userList.php
                    $filePath = __DIR__ . "/../../auth/userList.php"; // Sesuaikan path relatif
                    if (file_exists($filePath)) {
                        include $filePath; // Ambil data dari file

                        if (isset($userList) && is_array($userList)) {
                            // Cari dan perbarui data dengan ID yang sesuai
                            foreach ($userList as &$u) {
                                if ($u['user_id'] == $id_user) {
                                    $u['username'] = $user;
                                    $u['password'] = $password_real;
                                    $u['level'] = $lvl;
                                    break;
                                }
                            }

                            // Tulis ulang file userList.php
                            $content = "<?php\n\$userList = " . var_export($userList, true) . ";\n";
                            if (file_put_contents($filePath, $content) === false) {
                                die("Gagal menulis ke file: $filePath");
                            }
                        } else {
                            die("Variabel \$userList tidak ditemukan atau bukan array.");
                        }
                    } else {
                        die("File tidak ditemukan: $filePath");
                    }

                    // Redirect jika sukses
        ?>
                    <script>
                        window.location.href = '<?php echo "?page=$pageName&alert=Success"; ?>';
                    </script>
        <?php
                } else {
                    // Tangani kegagalan eksekusi
                    $errorInfo = $stmt->errorInfo();
                    echo "Error: " . $errorInfo[2];
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        ?>


</main>
<!-- Main -->
<script>
    document.getElementById('lvl').addEventListener('change', function() {
        const level = this.value;
        const kelasRow = document.querySelector('.kelas-row'); // Element for "walikelas"
        const wakasekRow = document.querySelector('.wks-row'); // Element for "wakasek"

        kelasRow.style.display = (level === 'walikelas') ? 'flex' : 'none';
        wakasekRow.style.display = (level === 'wakasek') ? 'flex' : 'none';
    });
</script>