<?php $penilaian2_2 = "active"; ?>
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
                <label for="inputText" class="col-sm-3 col-form-label">Nama Karyawan</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nama" placeholder="Nama Pegawai" required>
                </div>
              </div>

              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Devisi</legend>
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
                <label class="col-sm-3 col-form-label">Jabatan</label>
                <div class="col-sm-9">
                  <select class="form-select" name="jabatan" aria-label="Default select example">
                    <option selected value="Belum Memilih Jabatan">Pilih Jabatan</option>
                    <option value="Magang">Magang</option>
                    <option value="Junior Programmer">Junior Programmer</option>
                    <option value="Senior Programmer">Senior Programmer</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-3 col-form-label">Jam Kerja (Per Minggu)</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" name="jam_kerja" min="0" placeholder="Jam Kerja" required>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-9">
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

              $query = "INSERT INTO `gaji`(`id`, `nama`, `devisi`, `jabatan`, `jam_kerja`, `total_bayar`) VALUES (NULL,'$nama','$devisi','$jabatan','$jam_kerja','$totalBayar')";
              $result = mysqli_query($koneksi, $query);
              if ($result) {
            ?>
                <script>
                  Swal.fire({
                    icon: "success",
                    title: "Data Berhasil Dikirim!",
                  });
                </script>
              <?php
              } else {
              ?>
                <script>
                  Swal.fire({
                    icon: "error",
                    title: "Data Gagal Dikirim!",
                    text: "<?php echo mysqli_error($koneksi); ?>"
                  });
                </script>
              <?php
              }

              ?>
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Pembayaran</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p>Nama: <?php echo $nama; ?></p>
                <p>Total Jam [Minggu]: <?php echo $jam_kerja; ?></p>
                <p>Devisi: <?php echo $devisi; ?></p>
                <p>Jabatan: <?php echo $jabatan; ?></p>
                <p>Total Pembayaran: <?php echo "Rp. " . number_format($totalBayar, 2, ",", "."); ?></p>
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