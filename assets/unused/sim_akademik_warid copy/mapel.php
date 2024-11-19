<?php
$simAkademik_2 = "active";
$pageName = "mapel";


?>

<!-- Main -->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Mata Pelajaran</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
        <li class="breadcrumb-item">Table</li>
        <li class="breadcrumb-item active">Mata Pelajaran</li>
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
                  <th>ID Mapel</th>
                  <th>Mata Pelajaran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php
                $no = 1;
                foreach ($list_mapel as $mapel) {
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $mapel['id_mapel']; ?></td>
                    <td><?php echo $mapel['mata_pelajaran']; ?></td>
                    <td>
                      <a href="?page=<?php echo $pageName ?>&alert=EditData&id_mapel=<?php echo $mapel['id_mapel']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                      <a href="?page=<?php echo $pageName ?>&alert=ConfirmationDeleteSim&pageName=<?php echo $pageName ?>&id=<?php echo $mapel['id_mapel']; ?>" class="btn btn-danger"><i class="bi bi-trash-fill" style="color: white;"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== EDIT ===== -->
    <?php
    if (isset($_GET['alert']) && isset($_GET['id_mapel'])) {
      if ($_GET['alert'] == 'EditData') {
        $id_mapel = $_GET['id_mapel'];
        $mata_pelajaran = '';
        foreach ($list_mapel as $mapel) {
          if ($mapel['id_mapel'] == $id_mapel) {
            $mata_pelajaran = $mapel['mata_pelajaran'];
            break;
          }
        }
    ?>
        <div class="card" style="position:fixed; top: 50%; transform:translate(-50%, -50%); left:50%; z-index: 1000; width: 75vw">
          <div class="card-body">
            <h5 class="card-title d-flex justify-content-between"><span style="color: black;">Form Mata Pelajaran</span> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a></h5>
            <form action="?page=update_sim&pageName=<?php echo $pageName ?>" method="POST">
              <input type="hidden" name="id_mapel" value="<?php echo $id_mapel; ?>">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="mata_pelajaran" required value="<?php echo $mata_pelajaran; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-10">
                  <button type="submit" name="update" value="update" class="btn btn-primary">Update!</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    <?php
      }
    }
    ?>

    <!-- ===== ADD ===== -->
    <?php
    if (isset($_GET['alert']) && $_GET['alert'] == 'add_data') {
    ?>
      <div class="card" style="position:fixed; top: 50%; transform:translate(-50%, -50%); left:50%; z-index: 1000; width: 75vw">
        <div class="card-body">
          <h5 class="card-title d-flex justify-content-between"><span style="color: black;">Form Mata Pelajaran</span> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a></h5>
          <form action="" method="POST">
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Mata Pelajaran</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="mata_pelajaran" required placeholder="Mata Pelajaran">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-10">
                <button type="submit" name="add_data" value="add_data" class="btn btn-primary">Tambah Data!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    <?php } ?>
  </section>
  <!-- ADD DATA PROCESS -->
  <?php
  // Add new data
  if (isset($_POST['add_data'])) {
    $new_id = count($list_mapel) + 1; // Membuat ID Mapel secara otomatis
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $list_mapel[] = ["id_mapel" => $new_id, "mata_pelajaran" => $mata_pelajaran];
    save_mapel_list($list_mapel);
    echo "<script>window.location.href = '?page=$pageName&alert=Success';</script>";
  }
  ?>

</main>