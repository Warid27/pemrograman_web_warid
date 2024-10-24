<?php
$simAkademik_1 = "active";
$pageName = 'siswa';
?>
<!-- Main -->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Siswa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
        <li class="breadcrumb-item">Table</li>
        <li class="breadcrumb-item active">Data Siswa</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <h5 class="card-header">
            <a href="?page=<?php echo $pageName ?>&alert=add_data" class="btn btn-success">+</a> Tambah Data
          </h5>
          <div class="table-responsive text-nowrap">
            <table class="table" style="text-align:center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID Siswa</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php
                $no = 1;
                $result = mysqli_query($koneksi1, "SELECT * from siswa");
                while ($data = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['id_siswa']; ?></td>
                    <td><?php echo $data['nama_siswa']; ?></td>
                    <td><?php echo $data['kelas']; ?></td>
                    <td>
                      <a href="?page=<?php echo $pageName ?>&alert=EditData&id=<?php echo $data['id_siswa']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                      <a href="?page=<?php echo $pageName ?>&alert=ConfirmationDeleteSim&pageName=<?php echo $pageName; ?>&id=<?php echo $data['id_siswa']; ?>" class="btn btn-danger"><i class="bi bi-trash-fill" style="color: white;"></i></a>
                    </td>
                  </tr><?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== EDIT ===== -->
    <?php
    if (isset($_GET['alert'])) {
      if ($_GET['alert'] == 'EditData') {
        if (isset($_GET['id_siswa'])) {
          $id_siswa = $_GET['id_siswa'];

          $data_table = mysqli_query($koneksi1, "SELECT * FROM `siswa` WHERE id_siswa='$id_siswa'");

          if (mysqli_num_rows($data_table) > 0) {
            $d_table = mysqli_fetch_assoc($data_table);

    ?>
            <div class="card" style="position:fixed; top: 50%; transform:translate(-50%, -50%); left:50%; z-index: 1000; width: 75vw">
              <div class="card-body">
                <h5 class="card-title d-flex justify-content-between"><span style="color: black;">Form Siswa</span> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a></h5>

                <!-- General Form Elements -->
                <form action="?page=update_sim&pageName=siswa" method="POST">
                  <input type="hidden" name="id_siswa" value="<?php echo $d_table['id_siswa']; ?>">
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_siswa" required value="<?php echo $d_table['nama_siswa']; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="kelas" required value="<?php echo $d_table['kelas']; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-10">
                      <button type="submit" name="update" value="update" class="btn btn-primary">Update!</button>
                    </div>
                  </div>

                </form><!-- End General Form Elements -->
              </div>
            </div>
    <?php
          }
        }
      }
    }
    ?>

    <!-- ===== ADD ===== -->
    <?php
    if (isset($_GET['alert'])) {
      if ($_GET['alert'] == 'add_data') {

    ?>
        <div class="card" style="position:fixed; top: 50%; transform:translate(-50%, -50%); left:50%; z-index: 1000; width: 75vw">
          <div class="card-body">
            <h5 class="card-title d-flex justify-content-between"><span style="color: black;">Form Siswa</span> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a></h5>

            <!-- General Form Elements -->
            <form action="" method="POST">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Siswa</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_siswa" required placeholder="Nama Siswa">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="kelas" required placeholder="Kelas">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-10">
                  <button type="submit" name="add_data" value="add_data" class="btn btn-primary">Tambah Data!</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->
          </div>
        </div>
    <?php
      }
    }
    ?>
    </div>
  </section>

  <?php
  if (isset($_POST['add_data'])) {
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];

    $query = "INSERT INTO `siswa`(`id_siswa`, `nama_siswa`, `kelas`) VALUES (NULL,'$nama_siswa','$kelas')";
    $result = mysqli_query($koneksi1, $query);

    if ($result) {
  ?>
      <script>
        window.location.href = '<?php echo "?page=$pageName&alert=Success"; ?>';
      </script>
  <?php
    } else {
      echo "Gagal Le: " . mysqli_error($koneksi);
      echo $query;
    }
  }

  ?>

</main>
<!-- Main -->