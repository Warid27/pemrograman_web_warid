<?php $penilaian1_3 = "active"; ?>
<!-- Main -->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Form Kwalifikasi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
        <li class="breadcrumb-item">Penilaian 1</li>
        <li class="breadcrumb-item active">Form Kwalifikasi</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Kwalifikasi</h5>

            <!-- General Form Elements -->
            <form action="" method="post">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">IQ Anda</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="IQ" min="0" required>
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
              $iq = $_POST['IQ'];

              if ($iq > 144) {
                $kwalifikasi = "Very Gifted / Highly Advanced";
              } elseif ($iq >= 130) {
                $kwalifikasi = "Gifted / Very Advanced";
              } elseif ($iq >= 120) {
                $kwalifikasi = "Superior";
              } elseif ($iq >= 110) {
                $kwalifikasi = "High Average";
              } elseif ($iq >= 90) {
                $kwalifikasi = "Average";
              } elseif ($iq >= 80) {
                $kwalifikasi = "Low Average";
              } elseif ($iq >= 70) {
                $kwalifikasi = "Borderline Impaired / Delayed";
              } elseif ($iq >= 55) {
                $kwalifikasi = "Midly Impaired / Delayed";
              } elseif ($iq >= 40) {
                $kwalifikasi = "Moderately Impaired / Delayed";
              } else {
                $kwalifikasi = "Duh le....";
              }

              $query = "INSERT INTO `kwalifikasi`(`id`, `nama`, `iq`, `kwalifikasi`) VALUES (NULL,'$nama','$iq','$kwalifikasi')";
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
                <strong>Kwalifikasi IQ</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p>Nama: <?php echo $nama; ?></p>
                <p>IQ Anda: <?php echo $iq; ?></p>
                <p>Kwalifikasi: <?php echo $kwalifikasi; ?></p>
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