<?php
$simAkademik_2 = "active";
$pageName = 'siswa';
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
    <h1>Data Siswa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
        <li class="breadcrumb-item">Sim Akademik</li>
        <li class="breadcrumb-item active">Data Siswa</li>
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
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sqlSiswa = "SELECT s.nis, s.nama, k.nama_kelas FROM tb_siswa s LEFT JOIN tb_kelas k ON s.id_kelas = k.id_kelas";
                $stmt = $pdo->query($sqlSiswa);
                $no = 1;
                foreach ($stmt as $siswa) {
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($siswa['nis']); ?></td>
                    <td><?php echo htmlspecialchars($siswa['nama']); ?></td>
                    <td><?php echo htmlspecialchars($siswa['nama_kelas']); ?></td>
                    <td>
                      <a href="?page=<?php echo $pageName ?>&alert=edit_data&nis=<?php echo $siswa['nis']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                      <a href="?page=<?php echo $pageName ?>&alert=info_data&nis=<?php echo $siswa['nis']; ?>" class="btn btn-secondary"><i class="bi bi-info-circle" style="color: white"></i></a>

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
  </section>
    <!-- ===== ADD DATA FORM ===== -->
    <?php
    if (isset($_GET['alert'])) {
      if ($_GET['alert'] == 'add_data') {

    ?>
        <div class="card cardModals">
          <div class="card-body cardInfo border">
            <span class="card-title d-flex justify-content-between border-bottom">
              <h5 class="fw-bold" style="color: black;">Form Siswa</h5> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a>
            </span>

            <!-- General Form Elements -->
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="row mb-3">
                <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nis" name="nis" maxlength="6" required placeholder="NIS...">
                </div>
              </div>
              <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama...">
                </div>
              </div>

              <div class="row mb-3">
                <label for="id_kelas" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                  <select class="form-select" name="id_kelas" id="id_kelas" required>
                    <option value="" disabled selected>Pilih Kelas</option>
                    <?php foreach ($kelas_list as $kelas) { ?>
                      <option value="<?php echo $kelas['id_kelas']; ?>"><?php echo $kelas['nama_kelas']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <select class="form-select" name="jk" id="jk" required>
                    <option value="1">Laki-Laki</option>
                    <option value="2">Perempuan</option>
                  </select>
                </div>
              </div>

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
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
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
      $nis = $_POST['nis'];
      $nama = $_POST['nama'];
      $id_kelas = $_POST['id_kelas'];
      $jk = $_POST['jk'];
      $user = $_POST['user'];
      $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
      $foto = $_FILES['foto'];

      if ($foto['error'] == 0) {
        $allowed_ext = ['jpg', 'jpeg', 'png'];
        $file_ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $file_size = $foto["size"];

        if (!in_array(strtolower($file_ext), $allowed_ext)) {
          echo "Format file tidak valid!";
          exit;
        } else if ($file_size > 1044070) {
          echo "Ukuran file terlalu besar!";
          exit;
        }

        $foto_name = time() . '-' . uniqid() . '-' . $foto['name'];
        $target_file = $foto_dir . $foto_name;

        if (!move_uploaded_file($foto['tmp_name'], $target_file)) {
          echo "Gagal mengunggah foto";
          exit;
        }
      }

      try {
        $query = "INSERT INTO tb_siswa(nis, nama, id_kelas, jk, user, pass, foto) VALUES (:nis,:nama,:id_kelas,:jk,:user,:pass,:foto)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nis', $nis);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':id_kelas', $id_kelas);
        $stmt->bindParam(':jk', $jk);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':foto', $foto_name);

        // Cek Duplicate NIS
        $queryCheck = "SELECT COUNT(*) FROM tb_siswa WHERE nis = :nis";
        $stmtCheck = $pdo->prepare($queryCheck);
        $stmtCheck->bindParam(':nis', $nis);
        $stmtCheck->execute();
        $count = $stmtCheck->fetchColumn();

        if ($count > 0) {
          echo "Error: NIS sudah ada dalam database.";
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
    if (isset($_GET['alert']) && $_GET['alert'] == 'info_data' && isset($_GET['nis'])) {
      $nis = $_GET['nis'];

      $query_siswa = "SELECT s.nis, s.nama, s.foto, k.nama_kelas FROM tb_siswa s LEFT JOIN tb_kelas k ON s.id_kelas = k.id_kelas WHERE nis = '$nis'";
      $stmt_siswa = $pdo->prepare($query_siswa);
      $stmt_siswa->execute();
      $siswa_list = $stmt_siswa->fetchALL(PDO::FETCH_ASSOC);

      foreach ($siswa_list as $d_siswa) {
    ?>
        <div class="card cardModals ">
          <div class="card-body cardInfo border">
            <span class="card-title d-flex justify-content-between border-bottom">
              <h5 class="fw-bold" style="color: black;">Detail Siswa</h5> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a>
            </span>
            <div class="foto_siswa">
              <img src="assets/uploads/<?php echo $d_siswa['foto']; ?>" alt="Foto Siswa">
            </div>
            <table class="border-bottom w-100 mt-2 table_info">
              <tr>
                <th>NIS</th>
                <th>:</th>
                <td><?php echo $d_siswa['nis'] ?? '-'; ?></td>
              </tr>
              <tr>
                <th>Nama</th>
                <th>:</th>
                <td><?php echo $d_siswa['nama'] ?? '-'; ?></td>
              </tr>
              <tr>
                <th>Kelas</th>
                <th>:</th>
                <td><?php echo $d_siswa['nama_kelas'] ?? '-'; ?></td>
              </tr>
            </table>
            <a class="btn btn-secondary float-end mt-3 ms-2" href="?page=<?php echo $pageName ?>">Tutup</a>
            <a class="btn btn-danger float-end mt-3" href="?page=<?php echo $pageName; ?>&alert=confirm_delete_sim&nis=<?php echo $d_siswa['nis']; ?>">Hapus</a>
          </div>
        </div>
    <?php
      }
    }
    ?>

    <!-- ===== EDIT ===== -->
    <?php
    if (isset($_GET['alert']) && $_GET['alert'] == 'edit_data' && isset($_GET['nis'])) {
      $nis = $_GET['nis'];

      $query_siswa = "SELECT s.*, k.nama_kelas FROM tb_siswa s LEFT JOIN tb_kelas k ON s.id_kelas = k.id_kelas WHERE nis = '$nis'";
      $stmt_siswa = $pdo->prepare($query_siswa);
      $stmt_siswa->execute();
      $siswa_list = $stmt_siswa->fetchALL(PDO::FETCH_ASSOC);

      foreach ($siswa_list as $d_siswa) {
    ?>
        <div class="card cardModals ">
          <div class="card-body cardInfo border">
            <span class="card-title d-flex justify-content-between border-bottom">
              <h5 class="fw-bold" style="color: black;">Edit Data Siswa</h5> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a>
            </span>
            <div class="foto_siswa">
              <label for="new_foto" class="label_new_foto"><i class="bi bi-arrow-repeat"></i></label>

              <img src="assets/uploads/<?php echo $d_siswa['foto']; ?>" alt="Foto Siswa">
            </div>
            <form action="" method="POST" enctype="multipart/form-data" class="mt-2">
              <input type="file" class="new_foto" id="new_foto" name="new_foto" accept="image/*">
              <div class="row mb-3">
                <label for="nis_output" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                  <input type="hidden" id="nis" name="nis" value="<?php echo $d_siswa['nis'] ?>">
                  <input type="text" id="nis_output" class="form-control" value="<?php echo $d_siswa['nis'] ?>" disabled>
                </div>
              </div>
              <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama" name="nama" required value="<?php echo $d_siswa['nama'] ?>" placeholder="Nama...">
                </div>
              </div>

              <div class="row mb-3">
                <label for="id_kelas" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                  <select class="form-select" name="id_kelas" id="id_kelas" required value="<?php echo $d_siswa['nama_kelas'] ?>">
                    <option value="" disabled selected>Pilih Kelas</option>
                    <?php foreach ($kelas_list as $kelas) { ?>
                      <option value="<?php echo $kelas['id_kelas']; ?>" <?php echo ($kelas['id_kelas'] == $d_siswa['id_kelas']) ? 'selected="selected"' : ''; ?>>
                        <?php echo $kelas['nama_kelas']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <select class="form-select" name="jk" id="jk" required>
                    <option value="1" <?php echo ($d_siswa['jk'] == '1') ? 'selected="selected"' : ''; ?>>Laki-laki</option>
                    <option value="2" <?php echo ($d_siswa['jk'] == '2') ? 'selected="selected"' : ''; ?>>Perempuan</option>
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
      $nis = $_POST['nis'];
      $nama = $_POST['nama'];
      $id_kelas = $_POST['id_kelas'];
      $jk = $_POST['jk'];
      $foto = $_FILES['new_foto'];

      if (isset($_FILES['new_foto']) && $_FILES['new_foto']['error'] == UPLOAD_ERR_OK) {
        if ($foto['error'] == 0) {
          $allowed_ext = ['jpg', 'jpeg', 'png'];
          $file_ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
          $file_size = $foto["size"];

          if (!in_array(strtolower($file_ext), $allowed_ext)) {
            echo "Format file tidak valid!";
            exit;
          } else if ($file_size > 1044070) {
            echo "Ukuran file terlalu besar!";
            exit;
          }

          $foto_name = time() . '-' . uniqid() . '-' . $foto['name'];
          $target_file = $foto_dir . $foto_name;

          if (!move_uploaded_file($foto['tmp_name'], $target_file)) {
            echo "Gagal mengunggah foto";
            exit;
          }

          $query_siswa = "SELECT foto FROM tb_siswa WHERE nis = '$nis'";
          $stmt_siswa = $pdo->prepare($query_siswa);
          $stmt_siswa->execute();
          $siswa_list = $stmt_siswa->fetchALL(PDO::FETCH_ASSOC);

          foreach ($siswa_list as $siswa) {
            $foto = $siswa['foto'];
            if (file_exists($foto_dir . $foto)) {
              unlink($foto_dir . $foto);
            }
          }
        }
      }

      try {
        if ($foto_name) {
          $query = "UPDATE tb_siswa SET nama = :nama, id_kelas = :id_kelas, jk = :jk, foto = :foto WHERE nis = :nis";
        } else {
          $query = "UPDATE tb_siswa SET nama = :nama, id_kelas = :id_kelas, jk = :jk WHERE nis = :nis";
        }

        $stmt = $pdo->prepare($query);

        // Bind parameters
        $stmt->bindParam(':nis', $nis);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':id_kelas', $id_kelas);
        $stmt->bindParam(':jk', $jk);

        if ($foto_name) {
          $stmt->bindParam(':foto', $foto_name);
        }

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