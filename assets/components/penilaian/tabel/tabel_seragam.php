<?php $tableView_4 = "active"; ?>
<!-- Main -->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>View Kereta</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
        <li class="breadcrumb-item">Table</li>
        <li class="breadcrumb-item active">View Kereta</li>
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
                  <th>OSIS</th>
                  <th>Pramuka</th>
                  <th>Olahraga</th>
                  <th>Identitas</th>
                  <th>Bantuan</th>
                  <th>Total Bayar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php
                $no = 1;
                $result = mysqli_query($koneksi, "SELECT * from seragam");
                while ($data = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['osis']; ?></td>
                    <td><?php echo $data['pramuka']; ?></td>
                    <td><?php echo $data['olahraga']; ?></td>
                    <td><?php echo $data['identitas']; ?></td>
                    <td><?php echo $data['bantuan']; ?></td>
                    <td style="text-align: left;"><?php echo "Rp. " . number_format($data['total_bayar'], 2, ",", "."); ?></td>
                    <td>
                      <a href="?page=tabel_seragam&tableName=seragam&alert=EditData&id=<?php echo $data['id']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                      <a href="?page=tabel_seragam&tableName=seragam&alert=ConfirmationDelete&id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="bi bi-trash-fill" style="color: white;"></i></a>
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


          $data_table = mysqli_query($koneksi, "SELECT * FROM `seragam` WHERE id='$id'");


          if (mysqli_num_rows($data_table) > 0) {
            $d_table = mysqli_fetch_assoc($data_table);

            $bantuan = $d_table['bantuan'];

            $OSIS = "OSIS";
            $Pramuka = "Pramuka";
            $Olahraga = "Olahraga";
            $Identitas = "Identitas";

            $selectOSIS = substr($d_table['osis'],-4);
            $selectPramuka = substr($d_table['pramuka'],-4);
            $selectOlahraga = substr($d_table['olahraga'],-4);
            $selectIdentitas = substr($d_table['identitas'],-4);

            // Select OSIS
            switch ($selectOSIS) {
              case ' (S)':
                $OSIS_1 = "checked";
                $OSIS_2 = "";
                $OSIS_3 = "";
                $OSIS_4 = "";
                break;

              case ' (M)':
                $OSIS_1 = "";
                $OSIS_2 = "checked";
                $OSIS_3 = "";
                $OSIS_4 = "";
                break;

              case ' (L)':
                $OSIS_1 = "";
                $OSIS_2 = "";
                $OSIS_3 = "checked";
                $OSIS_4 = "";
                break;

              case '(XL)':
                $OSIS_1 = "";
                $OSIS_2 = "";
                $OSIS_3 = "";
                $OSIS_4 = "checked";
                break;

              default:
                $OSIS_1 = "";
                $OSIS_2 = "";
                $OSIS_3 = "";
                $OSIS_4 = "";
                break;
            }
            // Select Pramuka
            switch ($selectPramuka) {
              case ' (S)':
                $Pramuka_1 = "checked";
                $Pramuka_2 = "";
                $Pramuka_3 = "";
                $Pramuka_4 = "";
                break;

              case ' (M)':
                $Pramuka_1 = "";
                $Pramuka_2 = "checked";
                $Pramuka_3 = "";
                $Pramuka_4 = "";
                break;

              case ' (L)':
                $Pramuka_1 = "";
                $Pramuka_2 = "";
                $Pramuka_3 = "checked";
                $Pramuka_4 = "";
                break;

              case '(XL)':
                $Pramuka_1 = "";
                $Pramuka_2 = "";
                $Pramuka_3 = "";
                $Pramuka_4 = "checked";
                break;

              default:
                $Pramuka_1 = "";
                $Pramuka_2 = "";
                $Pramuka_3 = "";
                $Pramuka_4 = "";
                break;
            }
            // Select Olahraga
            switch ($selectOlahraga) {
              case ' (S)':
                $Olahraga_1 = "checked";
                $Olahraga_2 = "";
                $Olahraga_3 = "";
                $Olahraga_4 = "";
                break;

              case ' (M)':
                $Olahraga_1 = "";
                $Olahraga_2 = "checked";
                $Olahraga_3 = "";
                $Olahraga_4 = "";
                break;

              case ' (L)':
                $Olahraga_1 = "";
                $Olahraga_2 = "";
                $Olahraga_3 = "checked";
                $Olahraga_4 = "";
                break;

              case '(XL)':
                $Olahraga_1 = "";
                $Olahraga_2 = "";
                $Olahraga_3 = "";
                $Olahraga_4 = "checked";
                break;

              default:
                $Olahraga_1 = "";
                $Olahraga_2 = "";
                $Olahraga_3 = "";
                $Olahraga_4 = "";
                break;
            }
            // Select Identitas
            switch ($selectIdentitas) {
              case ' (S)':
                $Identitas_1 = "checked";
                $Identitas_2 = "";
                $Identitas_3 = "";
                $Identitas_4 = "";
                break;

              case ' (M)':
                $Identitas_1 = "";
                $Identitas_2 = "checked";
                $Identitas_3 = "";
                $Identitas_4 = "";
                break;

              case ' (L)':
                $Identitas_1 = "";
                $Identitas_2 = "";
                $Identitas_3 = "checked";
                $Identitas_4 = "";
                break;

              case '(XL)':
                $Identitas_1 = "";
                $Identitas_2 = "";
                $Identitas_3 = "";
                $Identitas_4 = "checked";
                break;

              default:
                $Identitas_1 = "";
                $Identitas_2 = "";
                $Identitas_3 = "";
                $Identitas_4 = "";
                break;
            }

            // Bantuan
            switch ($bantuan) {
              case 'Belum Memilih':
                $bantuan_1 = "selected";
                $bantuan_2 = "";
                $bantuan_3 = "";
                $bantuan_4 = "";
                break;

              case 'BOS':
                $bantuan_1 = "";
                $bantuan_2 = "selected";
                $bantuan_3 = "";
                $bantuan_4 = "";
                break;

              case 'Infaq':
                $bantuan_1 = "";
                $bantuan_2 = "";
                $bantuan_3 = "selected";
                $bantuan_4 = "";
                break;

              case 'Komite':
                $bantuan_1 = "";
                $bantuan_2 = "";
                $bantuan_3 = "";
                $bantuan_4 = "selected";
                break;

              default:
                $bantuan_1 = "selected";
                $bantuan_2 = "";
                $bantuan_3 = "";
                $bantuan_4 = "";
                break;
            }

    ?>
            <div class="card" style="position:fixed; top: 50%; transform:translate(-50%, -50%); left:50%; z-index: 1000; width: 75vw">
              <div class="card-body">
                <h5 class="card-title d-flex justify-content-between"><span style="color: black;">Form Kereta</span> <a href="?page=tabel_seragam" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a></h5>

                <!-- General Form Elements -->
                <form action="?page=update&tableName=seragam&id=<?php echo $id; ?>" method="POST">
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" placeholder="Nama Siswa" required value="<?php echo $d_table['nama']; ?>">
                    </div>
                  </div>
                  <!-- OSIS -->
                  <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0"><?php echo $OSIS; ?></legend>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $OSIS; ?>" id="S" value="S" required <?php echo $OSIS_1; ?>>
                        <label class="form-check-label" for="S">S</label>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $OSIS; ?>" id="M" value="M" required> <?php echo $OSIS_2; ?>
                        <label class="form-check-label" for="M">M</label>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $OSIS; ?>" id="L" value="L" required <?php echo $OSIS_3; ?>>
                        <label class="form-check-label" for="L">L</label>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $OSIS; ?>" id="XL" value="XL" required <?php echo $OSIS_4; ?>>
                        <label class="form-check-label" for="XL">XL</label>
                      </div>
                    </div>
                  </fieldset>
                  <!-- Pramuka -->
                  <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0"><?php echo $Pramuka; ?></legend>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $Pramuka; ?>" id="S" value="S" required <?php echo $Pramuka_1; ?>>
                        <label class="form-check-label" for="S">S</label>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $Pramuka; ?>" id="M" value="M" required <?php echo $Pramuka_2; ?>>
                        <label class="form-check-label" for="M">M</label>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $Pramuka; ?>" id="L" value="L" required <?php echo $Pramuka_3; ?>>
                        <label class="form-check-label" for="L">L</label>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $Pramuka; ?>" id="XL" value="XL" required <?php echo $Pramuka_4; ?>>
                        <label class="form-check-label" for="XL">XL</label>
                      </div>
                    </div>
                  </fieldset>
                  <!-- Olahraga -->
                  <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0"><?php echo $Olahraga; ?></legend>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $Olahraga; ?>" id="S" value="S" required <?php echo $Olahraga_1; ?>>
                        <label class="form-check-label" for="S">S</label>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $Olahraga; ?>" id="M" value="M" required> <?php echo $Olahraga_2; ?>
                        <label class="form-check-label" for="M">M</label>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $Olahraga; ?>" id="L" value="L" required <?php echo $Olahraga_3; ?>>
                        <label class="form-check-label" for="L">L</label>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $Olahraga; ?>" id="XL" value="XL" required <?php echo $Olahraga_4; ?>>
                        <label class="form-check-label" for="XL">XL</label>
                      </div>
                    </div>
                  </fieldset>
                  <!-- Identitas -->
                  <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0"><?php echo $Identitas; ?></legend>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $Identitas; ?>" id="S" value="S" required <?php echo $Identitas_1; ?>>
                        <label class="form-check-label" for="S">S</label>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $Identitas; ?>" id="M" value="M" required> <?php echo $Identitas_2; ?>
                        <label class="form-check-label" for="M">M</label>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $Identitas; ?>" id="L" value="L" required <?php echo $Identitas_3; ?>>
                        <label class="form-check-label" for="L">L</label>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo $Identitas; ?>" id="XL" value="XL" required <?php echo $Identitas_4; ?>>
                        <label class="form-check-label" for="XL">XL</label>
                      </div>
                    </div>
                  </fieldset>


                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Bantuan</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="bantuan" aria-label="Default select example">
                        <option <?php echo $bantuan_1 ?> value="Tidak Ada">Tidak Ada</option>
                        <option <?php echo $bantuan_2 ?> value="BOS">BOS</option>
                        <option <?php echo $bantuan_3 ?> value="Infak">Infak</option>
                        <option <?php echo $bantuan_4 ?> value="Komite">Komite</option>
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
    }   ?>
    </div>
  </section>

</main>
<!-- Main -->