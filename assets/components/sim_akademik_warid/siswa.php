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
<?php
if (isset($_POST['kelas_siswa'])) {
  $kelas_siswa = $_POST['kelas_siswa'];
  if ($kelas_siswa == "Semua Kelas") {
    $kelas_query = "";
  } else {
    $kelas_query = "WHERE k.nama_kelas ='$kelas_siswa'";
  }
} else {
  $kelas_siswa = "Semua Kelas";
  $kelas_query = "";
}
?>
<!-- Main -->
<main id="main" class="main">

  <div class="pagetitle d-flex align-items-center">
    <span class="col-sm-6">
      <h1>Data Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
          <li class="breadcrumb-item">Sim Akademik</li>
          <li class="breadcrumb-item active">Data Siswa</li>
        </ol>
      </nav>
    </span>
    <span class="col-sm-6 fs-5"><?php echo $kelas_siswa; ?></span>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <?php if (isset($_SESSION['user'])) {
            if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "petugas" || $_SESSION['role'] == "wakasek" || $_SESSION['role'] == "walikelas") {
          ?>
              <h5 class="card-header d-flex align-items-center">
                <span class="col-sm-9"><a href="?page=<?php echo $pageName ?>&alert=add_data" class="btn btn-success">+</a> Tambah Data</span>
                <form class="col-sm-3" action="?page=<?php echo $pageName ?>" method="post">
                  <select class="form-select" name="kelas_siswa" id="kelas_siswa" onchange="this.form.submit()">
                    <option value="" disabled selected>Pilih Kelas</option>
                    <?php foreach ($kelas_list as $kelas) { ?>
                      <option value="<?php echo $kelas['nama_kelas']; ?>"><?php echo $kelas['nama_kelas']; ?></option>
                    <?php } ?>
                  </select>
                </form>
              </h5>
          <?php }
          } ?>
          <div class="table-responsive text-nowrap">
            <table id="dataTableSiswa" class="table table-hover">
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

                if ($_SESSION['role'] == 'siswa') {
                  $sqlSiswa = "SELECT s.nis, s.nama, k.nama_kelas FROM tb_siswa s LEFT JOIN tb_kelas k ON s.id_kelas = k.id_kelas WHERE s.nis = :nis";
                  $stmt = $pdo->prepare($sqlSiswa);
                  $stmt->bindParam(':nis', $_SESSION['id'], PDO::PARAM_STR);
                  $stmt->execute();
                } else {
                  $sqlSiswa = "SELECT s.nis, s.nama, k.nama_kelas FROM tb_siswa s LEFT JOIN tb_kelas k ON s.id_kelas = k.id_kelas $kelas_query";
                  $stmt = $pdo->query($sqlSiswa);
                }

                $no = 1;
                foreach ($stmt as $siswa) {
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($siswa['nis']); ?></td>
                    <td><?php echo htmlspecialchars($siswa['nama']); ?></td>
                    <td><?php echo htmlspecialchars($siswa['nama_kelas']); ?></td>
                    <td>
                      <?php if (isset($_SESSION['user'])) {
                        if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "petugas" || $_SESSION['role'] == "wakasek" || $_SESSION['role'] == "walikelas") {
                      ?>
                          <a href="?page=<?php echo $pageName ?>&alert=edit_data&nis=<?php echo $siswa['nis']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                      <?php }
                      } ?>
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
          <?php if (isset($_SESSION['user'])) {
            if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "petugas" || $_SESSION['role'] == "wakasek" || $_SESSION['role'] == "walikelas") {
          ?>
              <a class="btn btn-danger float-end mt-3" href="?page=<?php echo $pageName; ?>&alert=confirm_delete_sim&nis=<?php echo $d_siswa['nis']; ?>">Hapus</a>
          <?php }
          } ?>
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

        $foto_name = time() . '-' . uniqid() . '-' . $foto['tmp_name'];
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

<script>
  $(document).ready(function() {
    var table = $('#dataTableSiswa').DataTable({
      dom: '<"d-flex justify-content-between align-items-center px-3 py-3"Brf>t<"d-flex justify-content-between align-items-center px-3 py-3"lip>',
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search for records...",
        lengthMenu: "Show _MENU_ entries",
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        paginate: {
          previous: "Previous",
          next: "Next",
        },
      },
      buttons: [{
          extend: 'excelHtml5',
          text: 'Export to Excel',
          title: function() {
            var currentPage = table.page.info().page + 1;
            return 'Data Excel - Page ' + currentPage;
          },
          exportOptions: {
            modifier: {
              page: 'current',
            },
          },
        },
        {
          extend: 'pdfHtml5',
          text: 'Export to PDF',
          title: function() {
            var currentPage = table.page.info().page + 1;
            return 'Data PDF - Page ' + currentPage;
          },
          exportOptions: {
            modifier: {
              page: 'current',
            },
          },
        },
        {
          extend: 'print',
          text: 'Print',
          title: function() {
            var currentPage = table.page.info().page + 1;
            return 'Print - Data for Page ' + currentPage;
          },
          exportOptions: {
            modifier: {
              page: 'current',
            },
          },
        },
      ],
      paging: true,
      lengthMenu: [
        [10, 25, 50, 100],
        [10, 25, 50, 100],
      ],
      pageLength: 10,
      createdRow: function(row, data, dataIndex) {
        // Center-align text in each cell
        $(row).find('td').css('text-align', 'center');
      },
      columnDefs: [{
        targets: '_all', // Target all columns
        className: 'text-center', // Add center alignment to header
      }, ],
    });

    // Add custom paging filter dropdown
    $('#pagingFilter').on('change', function() {
      var pageLength = $(this).val();
      table.page.len(pageLength).draw();
    });
  });
</script>