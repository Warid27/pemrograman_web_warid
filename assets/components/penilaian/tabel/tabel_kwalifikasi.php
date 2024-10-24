<?php $tableView_3 = "active"; ?>
<!-- Main -->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>View Kwalifikasi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
        <li class="breadcrumb-item">Table</li>
        <li class="breadcrumb-item active">View Kwalifikasi</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <h5 class="card-header">Table View</h5>
          <div class="table-responsive text-nowrap">
            <table class="table" style="text-align:center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>IQ</th>
                  <th>Kwalifikasi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php
                $no = 1;
                $result = mysqli_query($koneksi, "SELECT * from kwalifikasi");
                while ($data = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['iq']; ?></td>
                    <td><?php echo $data['kwalifikasi']; ?></td>
                    <td>
                      <a href="?page=tabel_kwalifikasi&tableName=kwalifikasi&alert=EditData&id=<?php echo $data['id']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                      <a href="?page=tabel_kwalifikasi&tableName=kwalifikasi&alert=ConfirmationDelete&id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="bi bi-trash-fill" style="color: white;"></i></a>
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
          $id = $_GET['id'];


          $data_table = mysqli_query($koneksi, "SELECT * FROM `kwalifikasi` WHERE id='$id'");


          if (mysqli_num_rows($data_table) > 0) {
            $d_table = mysqli_fetch_assoc($data_table);

    ?>
            <div class="card" style="position:fixed; top: 50%; transform:translate(-50%, -50%); left:50%; z-index: 1000; width: 75vw">
              <div class="card-body">
                <h5 class="card-title d-flex justify-content-between"><span style="color: black;">Form Kwalifikasi</span> <a href="?page=tabel_kwalifikasi" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a></h5>

                <!-- General Form Elements -->
                <form action="?page=update&tableName=kwalifikasi&id=<?php echo $id; ?>" method="POST">
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" required value="<?php echo $d_table['nama'];  ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">IQ Anda</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="IQ" min="0" required value="<?php echo $d_table['iq'];  ?>">
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
    }   ?>
    </div>
  </section>

</main>
<!-- Main -->