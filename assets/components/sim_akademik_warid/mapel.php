<?php
$simAkademik_3 = "active";
$pageName = 'mapel';
?>
<!-- Main -->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Mata Pelajaran</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
        <li class="breadcrumb-item">Sim Akademik</li>
        <li class="breadcrumb-item active">Data Mata Pelajaran</li>
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
                  <th>ID Mapel</th>
                  <th>Nama Mata Pelajaran</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sqlmapel = "SELECT * FROM tb_mapel";
                $stmt = $pdo->query($sqlmapel);
                $no = 1;
                foreach ($stmt as $mapel) {
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($mapel['id_mapel']); ?></td>
                    <td><?php echo htmlspecialchars($mapel['nama_mapel']); ?></td>
                    <td>
                      <a href="?page=<?php echo $pageName ?>&alert=edit_data&id=<?php echo $mapel['id_mapel']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                      <a href="?page=<?php echo $pageName ?>&alert=info_data&id=<?php echo $mapel['id_mapel']; ?>" class="btn btn-secondary"><i class="bi bi-info-circle" style="color: white"></i></a>

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
              <h5 class="fw-bold" style="color: black;">Form mapel</h5> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a>
            </span>

            <!-- General Form Elements -->
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="row mb-3">
                <label for="id_mapel" class="col-sm-2 col-form-label">ID Mapel</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="id_mapel" name="id_mapel" maxlength="6" required placeholder="ID Mapel...">
                </div>
              </div>
              <div class="row mb-3">
                <label for="nama_mapel" class="col-sm-2 col-form-label">Nama Mata Pelajaran</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" required placeholder="Nama Mata Pelajaran...">
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
      $id_mapel = $_POST['id_mapel'];
      $nama_mapel = $_POST['nama_mapel'];
      $id_kelas = $_POST['id_kelas'];

      try {
        $query = "INSERT INTO tb_mapel(id_mapel, nama_mapel) VALUES (:id_mapel,:nama_mapel)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id_mapel', $id_mapel);
        $stmt->bindParam(':nama_mapel', $nama_mapel);

        // Cek Duplicate id_mapel
        $queryCheck = "SELECT COUNT(*) FROM tb_mapel WHERE id_mapel = :id_mapel";
        $stmtCheck = $pdo->prepare($queryCheck);
        $stmtCheck->bindParam(':id_mapel', $id_mapel);
        $stmtCheck->execute();
        $count = $stmtCheck->fetchColumn();

        if ($count > 0) {
          echo "Error: id_mapel sudah ada dalam database.";
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
      $id_mapel = $_GET['id'];

      $query_mapel = "SELECT * FROM tb_mapel WHERE id_mapel = '$id_mapel'";
      $stmt_mapel = $pdo->prepare($query_mapel);
      $stmt_mapel->execute();
      $mapel_list = $stmt_mapel->fetchALL(PDO::FETCH_ASSOC);

      foreach ($mapel_list as $d_mapel) {
    ?>
        <div class="card cardModals ">
          <div class="card-body cardInfo border">
            <span class="card-title d-flex justify-content-between border-bottom">
              <h5 class="fw-bold" style="color: black;">Detail mapel</h5> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a>
            </span>
            <table class="border-bottom w-100 mt-2 table_info">
              <tr>
                <th>id_mapel</th>
                <th>:</th>
                <td><?php echo $d_mapel['id_mapel'] ?? '-'; ?></td>
              </tr>
              <tr>
                <th>Nama</th>
                <th>:</th>
                <td><?php echo $d_mapel['nama_mapel'] ?? '-'; ?></td>
              </tr>
            </table>
            <a class="btn btn-secondary float-end mt-3 ms-2" href="?page=<?php echo $pageName ?>">Tutup</a>
            <a class="btn btn-danger float-end mt-3" href="?page=<?php echo $pageName; ?>&alert=confirm_delete_sim&id=<?php echo $d_mapel['id_mapel']; ?>">Hapus</a>
          </div>
        </div>
    <?php
      }
    }
    ?>

    <!-- ===== EDIT ===== -->
    <?php
    if (isset($_GET['alert']) && $_GET['alert'] == 'edit_data' && isset($_GET['id'])) {
      $id_mapel = $_GET['id'];

      $query_mapel = "SELECT * FROM tb_mapel WHERE id_mapel = '$id_mapel'";
      $stmt_mapel = $pdo->prepare($query_mapel);
      $stmt_mapel->execute();
      $mapel_list = $stmt_mapel->fetchALL(PDO::FETCH_ASSOC);

      foreach ($mapel_list as $d_mapel) {
    ?>
        <div class="card cardModals ">
          <div class="card-body cardInfo border">
            <span class="card-title d-flex justify-content-between border-bottom">
              <h5 class="fw-bold" style="color: black;">Edit Data mapel</h5> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a>
            </span>
            <form action="" method="POST" enctype="multipart/form-data" class="mt-2">
              <div class="row mb-3">
                <label for="id_mapel" class="col-sm-2 col-form-label">id_mapel</label>
                <div class="col-sm-10">
                  <input type="hidden" id="id_mapel" name="id_mapel" value="<?php echo $d_mapel['id_mapel'] ?>">
                  <input type="text" class="form-control" value="<?php echo $d_mapel['id_mapel'] ?>" disabled>
                </div>
              </div>
              <div class="row mb-3">
                <label for="nama_mapel" class="col-sm-2 col-form-label">Nama Mata Pelajaran</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" required placeholder="Nama Mata Pelajaran..." value="<?php echo $d_mapel['nama_mapel'] ?>">
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
      $id_mapel = $_POST['id_mapel'];
      $nama_mapel = $_POST['nama_mapel'];

      try {
        // Use correct placeholders
        $query = "UPDATE tb_mapel SET nama_mapel = :nama_mapel WHERE id_mapel = :id_mapel";

        $stmt = $pdo->prepare($query);

        // Bind parameters
        $stmt->bindParam(':id_mapel', $id_mapel);
        $stmt->bindParam(':nama_mapel', $nama_mapel);

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