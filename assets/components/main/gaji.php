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
          <a href="?page=gaji" class="active">
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
          <a href="?page=tabel_gaji" class="">
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
    <h1>Gaji Karyawan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
        <li class="breadcrumb-item">Penilaian 2</li>
        <li class="breadcrumb-item active">Gaji Karyawan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gaji Karyawan</h5>

            <!-- General Form Elements -->
            <form action="" method="post">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Karyawan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" placeholder="Nama Pegawai" required>
                </div>
              </div>

              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Devisi</legend>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="devisi" id="devisi1" value="Web" required>
                    <label class="form-check-label" for="devisi1">
                      Web
                    </label>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="devisi" id="devisi2" value="Desktop" required>
                    <label class="form-check-label" for="devisi2">
                      Desktop
                    </label>
                  </div>
                </div>
              </fieldset>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                  <select class="form-select" name="jabatan" aria-label="Default select example">
                    <option selected value="Belum Memilih Jabatan">Pilih Jabatan</option>
                    <option value="Magang">Magang</option>
                    <option value="Junior Programmer">Junior Programmer</option>
                    <option value="Senior Programmer">Senior Programmer</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Jam Kerja (Per Minggu)</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="jam_kerja" min="0" placeholder="Jam Kerja" required>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-10">
                  <button type="submit" name="kirim" value="Hitung Gaji" class="btn btn-primary">Hitung Gaji</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

            <?php
            if (isset($_POST['kirim'])) {
              $nama = $_POST['nama'];
              $devisi = $_POST['devisi'];
              $jabatan = $_POST['jabatan'];
              $jam_kerja = $_POST['jam_kerja'];

              $gaji = [
                'Web' => [
                  'Belum Memilih Jabatan' => 0,
                  'Magang' => 2500000,
                  'Junior Programmer' => 4500000,
                  'Senior Programmer' => 7000000,
                ],
                'Desktop' => [
                  'Belum Memilih Jabatan' => 0,
                  'Magang' => 2300000,
                  'Junior Programmer' => 4300000,
                  'Senior Programmer' => 6500000,
                ],
              ];

              $gajiKaryawan = $gaji[$devisi][$jabatan];
              $totalBayar = $gajiKaryawan * $jam_kerja;
            ?>
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Pembayaran</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p>Nama: <?php echo $nama; ?></p>
                <p>Total Jam [Minggu]: <?php echo $jam_kerja; ?></p>
                <p>Devisi: <?php echo $devisi; ?></p>
                <p>Jabatan: <?php echo $jabatan; ?></p>
                <p>Total Pembayaran: Rp.<?php echo $totalBayar; ?></p>
              </div>
            <?php
            }
            ?>
          </div>
        </div>

      </div>

    </div>
  </section>

</main>
<!-- Main -->