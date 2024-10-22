<!-- Sidebar -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <!-- Penilaian 1 -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#penilaian-1" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Penilaian 1</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="penilaian-1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="?page=kereta">
            <i class="bi bi-circle"></i><span>Form Kereta</span>
          </a>
        </li>
        <li>
          <a href="?page=rapor">
            <i class="bi bi-circle"></i><span>Form Rapor</span>
          </a>
        </li>
        <li>
          <a href="?page=kwalifikasi">
            <i class="bi bi-circle"></i><span>Form Kwalifikasi</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Penilaian 2 -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#penilaian-2" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Penilaian 2</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="penilaian-2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="?page=seragam">
            <i class="bi bi-circle"></i><span>Form Seragam</span>
          </a>
        </li>
        <li>
          <a href="?page=gaji">
            <i class="bi bi-circle"></i><span>Gaji Karyawan</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Table View -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#table-view" data-bs-toggle="collapse" href="#">
        <i class="bi bi-grid-3x3"></i><span>Table</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="table-view" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="?page=tabel_kereta" class="">
            <i class="bi bi-circle"></i><span>View Kereta</span>
          </a>
        </li>
        <li>
          <a href="?page=tabel_rapor" class="">
            <i class="bi bi-circle"></i><span>View Rapor</span>
          </a>
        </li>
        <li>
          <a href="?page=tabel_kwalifikasi" class="">
            <i class="bi bi-circle"></i><span>View Kwalifikasi</span>
          </a>
        </li>
        <li>
          <a href="?page=tabel_seragam" class="">
            <i class="bi bi-circle"></i><span>View Seragam</span>
          </a>
        </li>
        <li>
          <a href="?page=tabel_gaji" class="active">
            <i class="bi bi-circle"></i><span>View Gaji</span>
          </a>
        </li>
      </ul>
    </li>
</ul>


</aside>
<!-- Sidebar -->

<!-- Main -->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>View Gaji</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
        <li class="breadcrumb-item">Table</li>
        <li class="breadcrumb-item active">View Gaji</li>
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
                  <th>Nama Pegawai</th>
                  <th>Devisi</th>
                  <th>Jabatan</th>
                  <th>Jam Kerja (Minggu)</th>
                  <th>Total Bayar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php
                $no = 1;
                $result = mysqli_query($koneksi, "SELECT * from gaji");
                while ($data = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['devisi']; ?></td>
                    <td><?php echo $data['jabatan']; ?></td>
                    <td><?php echo $data['jam_kerja']; ?></td>
                    <td style="text-align: left;"><?php echo "Rp " . number_format($data['total_bayar'], 2, ",", "."); ?></td>
                    <td>
                      <a href="?page=tabel_gaji&tableName=gaji&alert=EditData&id=<?php echo $data['id']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                      <a href="?page=tabel_gaji&tableName=gaji&alert=ConfirmationDelete&id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="bi bi-trash-fill" style="color: white;"></i></a>
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

          
          $data_table = mysqli_query($koneksi, "SELECT * FROM `gaji` WHERE id='$id'");

          
          if (mysqli_num_rows($data_table) > 0) {
            $d_table = mysqli_fetch_assoc($data_table);

            $selectJabatan = $d_table['jabatan'];
            $selectDevisi = $d_table['devisi'];

            // Devisi
            switch ($selectJabatan) {
              case 'Belum Memilih Jabatan':
                $jabatan_1 = "selected";
                $jabatan_2 = "";
                $jabatan_3 = "";
                $jabatan_4 = "";
                break;

              case 'Magang':
                $jabatan_1 = "";
                $jabatan_2 = "selected";
                $jabatan_3 = "";
                $jabatan_4 = "";
                break;

              case 'Junior Programmer':
                $jabatan_1 = "";
                $jabatan_2 = "";
                $jabatan_3 = "selected";
                $jabatan_4 = "";
                break;

              case 'Senior Programmer':
                $jabatan_1 = "";
                $jabatan_2 = "";
                $jabatan_3 = "";
                $jabatan_4 = "selected";
                break;

              default:
                $jabatan_1 = "selected";
                $jabatan_2 = "";
                $jabatan_3 = "";
                $jabatan_4 = "";
                break;
            }

            // Kelas
            switch ($selectDevisi) {
              case 'Web':
                $devisi_1 = "checked";
                $devisi_2 = "";
                break;

              case 'Desktop':
                $devisi_1 = "";
                $devisi_2 = "checked";
                break;

              default:
                $devisi_1 = "checked";
                $devisi_2 = "";
                break;
            }
    ?>
            <div class="card" style="position:fixed; top: 50%; transform:translate(-50%, -50%); left:50%; z-index: 1000; width: 75vw">
              <div class="card-body">
                <h5 class="card-title d-flex justify-content-between"><span style="color: black;">Form Kereta</span> <a href="?page=tabel_gaji" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a></h5>

                <!-- General Form Elements -->
                <form action="?page=update&tableName=gaji&id=<?php echo $id; ?>" method="POST">
                <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Nama Karyawan</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nama" placeholder="Nama Pegawai" required value="<?php echo $d_table['nama']; ?>">
                </div>
              </div>

              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Devisi</legend>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="devisi" id="devisi1" value="Web" required <?php echo $devisi_1; ?>>
                    <label class="form-check-label" for="devisi1">
                      Web
                    </label>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="devisi" id="devisi2" value="Desktop" required <?php echo $devisi_2; ?>>
                    <label class="form-check-label" for="devisi2">
                      Desktop
                    </label>
                  </div>
                </div>
              </fieldset>

              <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Jabatan</label>
                <div class="col-sm-9">
                  <select class="form-select" name="jabatan" aria-label="Default select example">
                    <option <?php echo $jabatan_1 ?> value="Belum Memilih Jabatan">Pilih Jabatan</option>
                    <option <?php echo $jabatan_2 ?> value="Magang">Magang</option>
                    <option <?php echo $jabatan_3 ?> value="Junior Programmer">Junior Programmer</option>
                    <option <?php echo $jabatan_4 ?> value="Senior Programmer">Senior Programmer</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-3 col-form-label">Jam Kerja (Per Minggu)</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" name="jam_kerja" min="0" placeholder="Jam Kerja" required value="<?php echo $d_table['jam_kerja']; ?>">
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