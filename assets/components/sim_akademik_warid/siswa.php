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
  <?php
  if (isset($_POST['kelas_siswa'])) {
    $kelas_siswa = $_POST['kelas_siswa'];
    if ($kelas_siswa == "Semua Kelas") {
      $kelas_query = "";
    } else {
      $kelas_query = "WHERE kelas ='$kelas_siswa'";
    }
  } else {
    $kelas_siswa = "Semua Kelas";
    $kelas_query = "";
  }
  ?>
  </div>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <h5 class="card-header d-flex">
            <span class="col-sm-6"><a href="?page=<?php echo $pageName ?>&alert=add_data" class="btn btn-success">+</a> Tambah Data</span>
            <span class="col-sm-3"><?php echo $kelas_siswa; ?></span>
            <form class="col-sm-3" action="?page=<?php echo $pageName ?>" method="post">
              <select class="form-select" name="kelas_siswa" id="kelas_siswa" onchange="this.form.submit()">
                <option value="Belum Memilih">Pilih Kelas</option>
                <option value="Semua Kelas">Semua Kelas</option>
                <optgroup label="Jurusan PPLG">
                  <option value="X PPLG 1">X PPLG 1</option>
                  <option value="X PPLG 2">X PPLG 2</option>
                  <option value="X PPLG 3">X PPLG 3</option>
                  <option value="XI PPLG 1">XI PPLG 1</option>
                  <option value="XI PPLG 2">XI PPLG 2</option>
                  <option value="XI PPLG 3">XI PPLG 3</option>
                  <option value="XII PPLG 1">XII PPLG 1</option>
                  <option value="XII PPLG 2">XII PPLG 2</option>
                  <option value="XII PPLG 3">XII PPLG 3</option>
                </optgroup>
                <optgroup label="Jurusan MPLB">
                  <option value="X MPLB 1">X MPLB 1</option>
                  <option value="X MPLB 2">X MPLB 2</option>
                  <option value="X MPLB 3">X MPLB 3</option>
                  <option value="XI MPLB 1">XI MPLB 1</option>
                  <option value="XI MPLB 2">XI MPLB 2</option>
                  <option value="XI MPLB 3">XI MPLB 3</option>
                  <option value="XII MPLB 1">XII MPLB 1</option>
                  <option value="XII MPLB 2">XII MPLB 2</option>
                  <option value="XII MPLB 3">XII MPLB 3</option>
                </optgroup>
                <optgroup label="Jurusan AKL">
                  <option value="X AKL 1">X AKL 1</option>
                  <option value="X AKL 2">X AKL 2</option>
                  <option value="X AKL 3">X AKL 3</option>
                  <option value="XI AKL 1">XI AKL 1</option>
                  <option value="XI AKL 2">XI AKL 2</option>
                  <option value="XI AKL 3">XI AKL 3</option>
                  <option value="XII AKL 1">XII AKL 1</option>
                  <option value="XII AKL 2">XII AKL 2</option>
                  <option value="XII AKL 3">XII AKL 3</option>
                </optgroup>
                <optgroup label="Jurusan PM">
                  <option value="X PM 1">X PM 1</option>
                  <option value="X PM 2">X PM 2</option>
                  <option value="XI PM 1">XI PM 1</option>
                  <option value="XI PM 2">XI PM 2</option>
                  <option value="XII PM 1">XII PM 1</option>
                  <option value="XII PM 2">XII PM 2</option>
                </optgroup>
              </select>
            </form>
          </h5>
          <div class="table-responsive text-nowrap">
            <table class="table" style="text-align:center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php
                $no = 1;
                $result = mysqli_query($koneksi1, "SELECT * from siswa $kelas_query");
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
        if (isset($_GET['id'])) {
          $id_siswa = $_GET['id'];

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
                      <select class="form-select" name="kelas" id="kelas">
                        <option value="Belum Memilih" <?php echo ($d_table['kelas'] == 'Belum Memilih') ? 'selected="selected"' : ''; ?>>Pilih Kelas</option>
                        <option value="X PPLG 1" <?php echo ($d_table['kelas'] == 'X PPLG 1') ? 'selected="selected"' : ''; ?>>X PPLG 1</option>
                        <option value="X PPLG 2" <?php echo ($d_table['kelas'] == 'X PPLG 2') ? 'selected="selected"' : ''; ?>>X PPLG 2</option>
                        <option value="X PPLG 3" <?php echo ($d_table['kelas'] == 'X PPLG 3') ? 'selected="selected"' : ''; ?>>X PPLG 3</option>
                        <option value="X MPLB 1" <?php echo ($d_table['kelas'] == 'X MPLB 1') ? 'selected="selected"' : ''; ?>>X MPLB 1</option>
                        <option value="X MPLB 2" <?php echo ($d_table['kelas'] == 'X MPLB 2') ? 'selected="selected"' : ''; ?>>X MPLB 2</option>
                        <option value="X MPLB 3" <?php echo ($d_table['kelas'] == 'X MPLB 3') ? 'selected="selected"' : ''; ?>>X MPLB 3</option>
                        <option value="X AKL 1" <?php echo ($d_table['kelas'] == 'X AKL 1') ? 'selected="selected"' : ''; ?>>X AKL 1</option>
                        <option value="X AKL 2" <?php echo ($d_table['kelas'] == 'X AKL 2') ? 'selected="selected"' : ''; ?>>X AKL 2</option>
                        <option value="X AKL 3" <?php echo ($d_table['kelas'] == 'X AKL 3') ? 'selected="selected"' : ''; ?>>X AKL 3</option>
                        <option value="X PM 1" <?php echo ($d_table['kelas'] == 'X PM 1') ? 'selected="selected"' : ''; ?>>X PM 1</option>
                        <option value="X PM 2" <?php echo ($d_table['kelas'] == 'X PM 2') ? 'selected="selected"' : ''; ?>>X PM 2</option>
                        <option value="XI PPLG 1" <?php echo ($d_table['kelas'] == 'XI PPLG 1') ? 'selected="selected"' : ''; ?>>XI PPLG 1</option>
                        <option value="XI PPLG 2" <?php echo ($d_table['kelas'] == 'XI PPLG 2') ? 'selected="selected"' : ''; ?>>XI PPLG 2</option>
                        <option value="XI PPLG 3" <?php echo ($d_table['kelas'] == 'XI PPLG 3') ? 'selected="selected"' : ''; ?>>XI PPLG 3</option>
                        <option value="XI MPLB 1" <?php echo ($d_table['kelas'] == 'XI MPLB 1') ? 'selected="selected"' : ''; ?>>XI MPLB 1</option>
                        <option value="XI MPLB 2" <?php echo ($d_table['kelas'] == 'XI MPLB 2') ? 'selected="selected"' : ''; ?>>XI MPLB 2</option>
                        <option value="XI MPLB 3" <?php echo ($d_table['kelas'] == 'XI MPLB 3') ? 'selected="selected"' : ''; ?>>XI MPLB 3</option>
                        <option value="XI AKL 1" <?php echo ($d_table['kelas'] == 'XI AKL 1') ? 'selected="selected"' : ''; ?>>XI AKL 1</option>
                        <option value="XI AKL 2" <?php echo ($d_table['kelas'] == 'XI AKL 2') ? 'selected="selected"' : ''; ?>>XI AKL 2</option>
                        <option value="XI AKL 3" <?php echo ($d_table['kelas'] == 'XI AKL 3') ? 'selected="selected"' : ''; ?>>XI AKL 3</option>
                        <option value="XI PM 1" <?php echo ($d_table['kelas'] == 'XI PM 1') ? 'selected="selected"' : ''; ?>>XI PM 1</option>
                        <option value="XI PM 2" <?php echo ($d_table['kelas'] == 'XI PM 2') ? 'selected="selected"' : ''; ?>>XI PM 2</option>
                        <option value="XII PPLG 1" <?php echo ($d_table['kelas'] == 'XII PPLG 1') ? 'selected="selected"' : ''; ?>>XII PPLG 1</option>
                        <option value="XII PPLG 2" <?php echo ($d_table['kelas'] == 'XII PPLG 2') ? 'selected="selected"' : ''; ?>>XII PPLG 2</option>
                        <option value="XII PPLG 3" <?php echo ($d_table['kelas'] == 'XII PPLG 3') ? 'selected="selected"' : ''; ?>>XII PPLG 3</option>
                        <option value="XII MPLB 1" <?php echo ($d_table['kelas'] == 'XII MPLB 1') ? 'selected="selected"' : ''; ?>>XII MPLB 1</option>
                        <option value="XII MPLB 2" <?php echo ($d_table['kelas'] == 'XII MPLB 2') ? 'selected="selected"' : ''; ?>>XII MPLB 2</option>
                        <option value="XII MPLB 3" <?php echo ($d_table['kelas'] == 'XII MPLB 3') ? 'selected="selected"' : ''; ?>>XII MPLB 3</option>
                        <option value="XII AKL 1" <?php echo ($d_table['kelas'] == 'XII AKL 1') ? 'selected="selected"' : ''; ?>>XII AKL 1</option>
                        <option value="XII AKL 2" <?php echo ($d_table['kelas'] == 'XII AKL 2') ? 'selected="selected"' : ''; ?>>XII AKL 2</option>
                        <option value="XII AKL 3" <?php echo ($d_table['kelas'] == 'XII AKL 3') ? 'selected="selected"' : ''; ?>>XII AKL 3</option>
                        <option value="XII PM 1" <?php echo ($d_table['kelas'] == 'XII PM 1') ? 'selected="selected"' : ''; ?>>XII PM 1</option>
                        <option value="XII PM 2" <?php echo ($d_table['kelas'] == 'XII PM 2') ? 'selected="selected"' : ''; ?>>XII PM 2</option>
                      </select>
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
                  <select class="form-select" name="kelas" id="kelas">
                    <option selected value="Belum Memilih">Pilih Kelas</option>
                    <optgroup label="Jurusan PPLG">
                      <option value="X PPLG 1">X PPLG 1</option>
                      <option value="X PPLG 2">X PPLG 2</option>
                      <option value="X PPLG 3">X PPLG 3</option>
                      <option value="XI PPLG 1">XI PPLG 1</option>
                      <option value="XI PPLG 2">XI PPLG 2</option>
                      <option value="XI PPLG 3">XI PPLG 3</option>
                      <option value="XII PPLG 1">XII PPLG 1</option>
                      <option value="XII PPLG 2">XII PPLG 2</option>
                      <option value="XII PPLG 3">XII PPLG 3</option>
                    </optgroup>
                    <optgroup label="Jurusan MPLB">
                      <option value="X MPLB 1">X MPLB 1</option>
                      <option value="X MPLB 2">X MPLB 2</option>
                      <option value="X MPLB 3">X MPLB 3</option>
                      <option value="XI MPLB 1">XI MPLB 1</option>
                      <option value="XI MPLB 2">XI MPLB 2</option>
                      <option value="XI MPLB 3">XI MPLB 3</option>
                      <option value="XII MPLB 1">XII MPLB 1</option>
                      <option value="XII MPLB 2">XII MPLB 2</option>
                      <option value="XII MPLB 3">XII MPLB 3</option>
                    </optgroup>
                    <optgroup label="Jurusan AKL">
                      <option value="X AKL 1">X AKL 1</option>
                      <option value="X AKL 2">X AKL 2</option>
                      <option value="X AKL 3">X AKL 3</option>
                      <option value="XI AKL 1">XI AKL 1</option>
                      <option value="XI AKL 2">XI AKL 2</option>
                      <option value="XI AKL 3">XI AKL 3</option>
                      <option value="XII AKL 1">XII AKL 1</option>
                      <option value="XII AKL 2">XII AKL 2</option>
                      <option value="XII AKL 3">XII AKL 3</option>
                    </optgroup>
                    <optgroup label="Jurusan PM">
                      <option value="X PM 1">X PM 1</option>
                      <option value="X PM 2">X PM 2</option>
                      <option value="XI PM 1">XI PM 1</option>
                      <option value="XI PM 2">XI PM 2</option>
                      <option value="XII PM 1">XII PM 1</option>
                      <option value="XII PM 2">XII PM 2</option>
                    </optgroup>
                  </select>
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