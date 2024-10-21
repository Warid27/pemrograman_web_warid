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
                  <th>Nama Penumpang</th>
                  <th>Tanggal</th>
                  <th>Asal</th>
                  <th>Tujuan</th>
                  <th>Class</th>
                  <th>Extra Bagasi</th>
                  <th>Jumlah</th>
                  <th>Total Bayar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php
                $no = 1;
                $result = mysqli_query($koneksi, "SELECT * from kereta");
                while ($data = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['tanggal']; ?></td>
                    <td><?php echo $data['asal']; ?></td>
                    <td><?php echo $data['tujuan']; ?></td>
                    <td><?php echo $data['kelas']; ?></td>
                    <td><?php echo $data['bagasi']; ?></td>
                    <td><?php echo $data['jml_tiket']; ?></td>
                    <td style="text-align: left;"><?php echo "Rp " . number_format($data['total_bayar'], 2, ",", "."); ?></td>
                    <td>
                      <a href="?page=tabel_kereta&tableName=kereta&alert=EditData&id=<?php echo $data['id']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                      <a href="?page=tabel_kereta&tableName=kereta&alert=ConfirmationDelete&id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="bi bi-trash-fill" style="color: white;"></i></a>
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

          
          $data_table = mysqli_query($koneksi, "SELECT * FROM `kereta` WHERE id='$id'");

          
          if (mysqli_num_rows($data_table) > 0) {
            $d_table = mysqli_fetch_assoc($data_table);

            $selectTujuan = $d_table['tujuan'];
            $selectKelas = $d_table['kelas'];
            $selectBagasi = $d_table['bagasi'];

            // Tujuan
            switch ($selectTujuan) {
              case 'Belum Memilih':
                $tujuan1 = "selected";
                $tujuan2 = "";
                $tujuan3 = "";
                $tujuan4 = "";
                break;

              case 'Jakarta':
                $tujuan1 = "";
                $tujuan2 = "selected";
                $tujuan3 = "";
                $tujuan4 = "";
                break;

              case 'Bandung':
                $tujuan1 = "";
                $tujuan2 = "";
                $tujuan3 = "selected";
                $tujuan4 = "";
                break;

              case 'Surabaya':
                $tujuan1 = "";
                $tujuan2 = "";
                $tujuan3 = "";
                $tujuan4 = "selected";
                break;

              default:
                $tujuan1 = "";
                $tujuan2 = "";
                $tujuan3 = "";
                $tujuan4 = "";
                break;
            }

            // Kelas
            switch ($selectKelas) {
              case 'Belum Memilih':
                $kelas1 = "checked";
                $kelas2 = "";
                $kelas3 = "";
                $kelas4 = "";
                break;

              case 'Panoramic':
                $kelas1 = "";
                $kelas2 = "checked";
                $kelas3 = "";
                $kelas4 = "";
                break;

              case 'VIP':
                $kelas1 = "";
                $kelas2 = "";
                $kelas3 = "checked";
                $kelas4 = "";
                break;

              case 'Ekonomi':
                $kelas1 = "";
                $kelas2 = "";
                $kelas3 = "";
                $kelas4 = "checked";
                break;

              default:
                $kelas1 = "";
                $kelas2 = "";
                $kelas3 = "";
                $kelas4 = "";
                break;
            }

            // Kelas
            switch ($selectBagasi) {
              case 'Ya':
                $bagasi1 = "checked";
                $bagasi2 = "";
                break;

              case 'Tidak':
                $bagasi1 = "";
                $bagasi2 = "checked";
                break;

              default:
                $bagasi1 = "";
                $bagasi2 = "";
                break;
            }
    ?>
            <div class="card" style="position:fixed; top: 50%; transform:translate(-50%, -50%); left:50%; z-index: 1000; width: 75vw">
              <div class="card-body">
                <h5 class="card-title d-flex justify-content-between"><span style="color: black;">Form Kereta</span> <a href="?page=tabel_kereta" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a></h5>

                <!-- General Form Elements -->
                <form action="?page=update&tableName=kereta&id=<?php echo $id; ?>" method="POST">
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" maxlength="50" required value="<?php echo $d_table['nama']; ?>">
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
                        <option <?php echo $tujuan1 ?> value="Belum Memilih">Pilih Tujuan</option>
                        <option <?php echo $tujuan2 ?> value="Jakarta">Jakarta</option>
                        <option <?php echo $tujuan3 ?> value="Bandung">Bandung</option>
                        <option <?php echo $tujuan4 ?> value="Surabaya">Surabaya</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="kelas" aria-label="Default select example">
                        <option <?php echo $kelas1 ?> value="Belum Memilih">Pilih Kelas</option>
                        <option <?php echo $kelas2 ?> value="Panoramic">Panoramic</option>
                        <option <?php echo $kelas3 ?> value="VIP">VIP</option>
                        <option <?php echo $kelas4 ?> value="Ekonomi">Ekonomi</option>
                      </select>
                    </div>
                  </div>

                  <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Bagasi</legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="bagasi" id="bagasi1" value="Ya" required <?php echo $bagasi1 ?>>
                        <label class="form-check-label" for="bagasi1">
                          Ya
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="bagasi" id="bagasi2" value="Tidak" required <?php echo $bagasi2 ?>>
                        <label class="form-check-label" for="bagasi2">
                          Tidak
                        </label>
                      </div>
                    </div>
                  </fieldset>

                  <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="tanggal" required value="<?php echo $d_table['tanggal']; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Jumlah Tiket</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="tiket" min="1" max="2147483647" required value="<?php echo $d_table['jml_tiket']; ?>">
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