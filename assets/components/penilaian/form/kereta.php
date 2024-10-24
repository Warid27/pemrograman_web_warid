<?php $penilaian1_1 = "active"; ?>
<!-- Main -->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Form Kereta</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
        <li class="breadcrumb-item">Penilaian 1</li>
        <li class="breadcrumb-item active">Form Kereta</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Kereta</h5>

            <!-- General Form Elements -->
            <form action="" method="post">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" maxlength="50" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Asal</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="asal" value="Jogja" readonly>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tujuan</label>
                <div class="col-sm-10">
                  <select class="form-select" name="tujuan" aria-label="Default select example">
                    <option selected value="Belum Memilih">Pilih Tujuan</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Surabaya">Surabaya</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                  <select class="form-select" name="kelas" aria-label="Default select example">
                    <option selected value="Belum Memilih">Pilih Kelas</option>
                    <option value="Panoramic">Panoramic</option>
                    <option value="VIP">VIP</option>
                    <option value="Ekonomi">Ekonomi</option>
                  </select>
                </div>
              </div>

              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Bagasi</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="bagasi" id="bagasi1" value="Ya" required>
                    <label class="form-check-label" for="bagasi1">
                      Ya
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="bagasi" id="bagasi2" value="Tidak" required>
                    <label class="form-check-label" for="bagasi2">
                      Tidak
                    </label>
                  </div>
                </div>
              </fieldset>

              <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Jumlah Tiket</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="tiket" min="1" max="2147483647" required>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-10">
                  <button type="submit" name="kirim" value="Check Out" class="btn btn-primary">Check Out</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

            <?php
            if (isset($_POST['kirim'])) {
              $nama = $_POST['nama'];
              $asal = $_POST['asal'];
              $tujuan = $_POST['tujuan'];
              $kelas = $_POST['kelas'];
              $bagasi = $_POST['bagasi'];
              $tanggal = $_POST['tanggal'];
              $tiket = $_POST['tiket'];

              if ($bagasi == "Ya") {
                $hargaBagasi = 50000;
              } else {
                $hargaBagasi = 0;
              }

              if ($tujuan == "Jakarta") {
                if ($kelas == "Panoramic") {
                  $harga = 2000000;
                } elseif ($kelas == "VIP") {
                  $harga = 1500000;
                } elseif ($kelas == "Ekonomi") {
                  $harga = 300000;
                } else {
                  $harga = 0;
                  $hargaBagasi = 0;
                }
              } elseif ($tujuan == "Bandung") {
                if ($kelas == "Panoramic") {
                  $harga = 1200000;
                } elseif ($kelas == "VIP") {
                  $harga = 900000;
                } elseif ($kelas == "Ekonomi") {
                  $harga = 200000;
                } else {
                  $harga = 0;
                  $hargaBagasi = 0;
                }
              } elseif ($tujuan == "Surabaya") {
                if ($kelas == "Panoramic") {
                  $harga = 1500000;
                } elseif ($kelas == "VIP") {
                  $harga = 1000000;
                } elseif ($kelas == "Ekonomi") {
                  $harga = 200000;
                } else {
                  $harga = 0;
                  $hargaBagasi = 0;
                }
              } else {
                $harga = 0;
                $hargaBagasi = 0;
              }
              $totalBayar = (($harga * $tiket) + $hargaBagasi);

              $query = "INSERT INTO `kereta`(`id`, `nama`, `asal`, `tujuan`, `kelas`, `bagasi`, `tanggal`, `jml_tiket`, `total_bayar`) VALUES (NULL, '$nama', '$asal','$tujuan','$kelas', '$bagasi', '$tanggal', '$tiket', '$totalBayar')";
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
                <strong>Pembayaran <i class="ri-notification-2-fill"></i></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p>Nama: <?php echo $nama; ?></p>
                <p>Asal: <?php echo $asal; ?></p>
                <p>Tujuan: <?php echo $tujuan; ?></p>
                <p>Kelas: <?php echo $kelas; ?></p>
                <p>Tanggal: <?php echo $tanggal; ?></p>
                <p>Bagasi: <?php echo $bagasi; ?></p>
                <p>Jumlah Tiket: <?php echo $tiket; ?> buah</p>
                <p>Total Bayar: Rp.<?php echo $totalBayar; ?></p>
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