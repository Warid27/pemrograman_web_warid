<?php $penilaian1_2 = "active"; ?>
<!-- Main -->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Form Rapor</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
        <li class="breadcrumb-item">Penilaian 1</li>
        <li class="breadcrumb-item active">Form Rapor</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Rapor</h5>

            <!-- General Form Elements -->
            <form action="" method="post">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Nilai Ulangan Harian</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="uh" min="0" max="100" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Nilai Ujian Akhir</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="ua" min="0" max="100" required>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-10">
                  <button type="submit" name="kirim" value="Hitung" class="btn btn-primary">Hitung</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

            <?php
            if (isset($_POST['kirim'])) {
              $nama = $_POST['nama'];
              $nilaiUH = $_POST['uh'];
              $nilaiUA = $_POST['ua'];

              $totalNilai = (($nilaiUH * 60 / 100) + ($nilaiUA * 40 / 100));

              $query = "INSERT INTO `rapor`(`id`, `nama`, `nilaiUH`, `nilaiUA`, `nilai_total`) VALUES (NULL, '$nama', '$nilaiUH','$nilaiUA', '$totalNilai')";
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
                <strong>Nilai Rapor</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p>Nama: <?php echo $nama; ?></p>
                <p>Nilai Ulangan Harian: <?php echo $nilaiUH; ?></p>
                <p>Nilai Ujian Akhir: <?php echo $nilaiUA; ?></p>
                <p>Total Nilai: <?php echo $totalNilai; ?></p>
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