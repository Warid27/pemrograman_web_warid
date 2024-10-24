<?php $penilaian2_1 = "active"; ?>
<!-- Main -->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Form Seragam</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
        <li class="breadcrumb-item">Penilaian 2</li>
        <li class="breadcrumb-item active">Form Seragam</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Seragam</h5>
            <?php
            $OSIS = "OSIS";
            $Pramuka = "Pramuka";
            $Olahraga = "Olahraga";
            $Identitas = "Identitas";

            ?>
            <!-- General Form Elements -->
            <form action="" method="post">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" placeholder="Nama Siswa" required>
                </div>
              </div>

              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0"><?php echo $OSIS; ?></legend>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $OSIS; ?>" id="S" value="S" required>
                    <label class="form-check-label" for="S">S</label>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $OSIS; ?>" id="M" value="M" required>
                    <label class="form-check-label" for="M">M</label>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $OSIS; ?>" id="L" value="L" required>
                    <label class="form-check-label" for="L">L</label>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $OSIS; ?>" id="XL" value="XL" required>
                    <label class="form-check-label" for="XL">XL</label>
                  </div>
                </div>
              </fieldset>

              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0"><?php echo $Pramuka; ?></legend>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $Pramuka; ?>" id="S" value="S" required>
                    <label class="form-check-label" for="S">S</label>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $Pramuka; ?>" id="M" value="M" required>
                    <label class="form-check-label" for="M">M</label>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $Pramuka; ?>" id="L" value="L" required>
                    <label class="form-check-label" for="L">L</label>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $Pramuka; ?>" id="XL" value="XL" required>
                    <label class="form-check-label" for="XL">XL</label>
                  </div>
                </div>
              </fieldset>

              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0"><?php echo $Olahraga; ?></legend>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $Olahraga; ?>" id="S" value="S" required>
                    <label class="form-check-label" for="S">S</label>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $Olahraga; ?>" id="M" value="M" required>
                    <label class="form-check-label" for="M">M</label>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $Olahraga; ?>" id="L" value="L" required>
                    <label class="form-check-label" for="L">L</label>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $Olahraga; ?>" id="XL" value="XL" required>
                    <label class="form-check-label" for="XL">XL</label>
                  </div>
                </div>
              </fieldset>

              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0"><?php echo $Identitas; ?></legend>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $Identitas; ?>" id="S" value="S" required>
                    <label class="form-check-label" for="S">S</label>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $Identitas; ?>" id="M" value="M" required>
                    <label class="form-check-label" for="M">M</label>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $Identitas; ?>" id="L" value="L" required>
                    <label class="form-check-label" for="L">L</label>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo $Identitas; ?>" id="XL" value="XL" required>
                    <label class="form-check-label" for="XL">XL</label>
                  </div>
                </div>
              </fieldset>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Bantuan</label>
                <div class="col-sm-10">
                  <select class="form-select" name="bantuan" aria-label="Default select example">
                    <option selected value="Tidak Ada">Tidak Ada</option>
                    <option value="BOS">BOS</option>
                    <option value="Infak">Infak</option>
                    <option value="Komite">Komite</option>
                  </select>
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
              $OSISValue = $_POST['OSIS'];
              $PramukaValue = $_POST['Pramuka'];
              $OlahragaValue = $_POST['Olahraga'];
              $IdentitasValue = $_POST['Identitas'];
              $bantuan = $_POST['bantuan'];

              $harga = [
                'S' => [
                  'OSIS' => 100000,
                  'Pramuka' => 100000,
                  'Olahraga' => 75000,
                  'Identitas' => 50000,
                ],
                'M' => [
                  'OSIS' => 125000,
                  'Pramuka' => 125000,
                  'Olahraga' => 100000,
                  'Identitas' => 75000,
                ],
                'L' => [
                  'OSIS' => 150000,
                  'Pramuka' => 150000,
                  'Olahraga' => 125000,
                  'Identitas' => 100000,
                ],
                'XL' => [
                  'OSIS' => 175000,
                  'Pramuka' => 175000,
                  'Olahraga' => 150000,
                  'Identitas' => 125000,
                ],
              ];

              $diskonBantuan = [
                'Tidak Ada' => 0,
                'BOS' => 100 / 100,
                'Infak' => 50 / 100,
                'Komite' => 25 / 100,
              ];

              $hargaOSIS = $harga[$OSISValue][$OSIS];
              $hargaPramuka = $harga[$PramukaValue][$Pramuka];
              $hargaOlahraga = $harga[$OlahragaValue][$Olahraga];
              $hargaIdentitas = $harga[$IdentitasValue][$Identitas];

              $hargaTotal = $hargaOSIS + $hargaPramuka + $hargaOlahraga + $hargaIdentitas;
              $totalBayar = $hargaTotal - ($hargaTotal * $diskonBantuan[$bantuan]);

              $seragamOSiS = "Rp. " . number_format($hargaOSIS, 2, ",", ".") . " ($OSISValue)";
              $seragamPramuka = "Rp. " . number_format($hargaPramuka, 2, ",", ".") . " ($PramukaValue)";
              $seragamOlahraga = "Rp. " . number_format($hargaOlahraga, 2, ",", ".") . " ($OlahragaValue)";
              $seragamIdentitas = "Rp. " . number_format($hargaIdentitas, 2, ",", ".") . " ($IdentitasValue)";

              $query = "INSERT INTO `seragam`(`id`, `nama`, `osis`, `pramuka`, `olahraga`, `identitas`, `bantuan`, `total_bayar`) VALUES (NULL,'$nama','$seragamOSiS','$seragamPramuka','$seragamOlahraga','$seragamIdentitas','$bantuan','$totalBayar')";
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
                <p>OSIS: <?php echo $seragamOSiS; ?></p>
                <p>Pramuka: <?php echo $seragamPramuka; ?></p>
                <p>Olahraga: <?php echo $seragamOlahraga; ?></p>
                <p>Identitas: <?php echo $seragamIdentitas; ?></p>
                <p>Bantuan: <?php echo $bantuan; ?></p>
                <p>Total Bayar: <?php echo "Rp. " . number_format($totalBayar, 2, ",", "."); ?></p>
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