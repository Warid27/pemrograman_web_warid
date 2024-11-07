<?php
$simAkademik_5 = "active";
$pageName = 'data_sim_akademik';
?>
<!-- Main -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Pembayaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
                <li class="breadcrumb-item">Table</li>
                <li class="breadcrumb-item active">Data Pembayaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <?php
    if (isset($_POST['kelas_siswa'])) {
        $kelas_siswa = $_POST['kelas_siswa'];
        if ($kelas_siswa == "Semua Kelas") {
            $kelas_query = "";
        } else {
            $kelas_query = "WHERE siswa.kelas ='$kelas_siswa'";
        }
    } else {
        $kelas_siswa = "Semua Kelas";
        $kelas_query = "";
    }
    ?>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h5 class="card-header d-flex">
                        <span class="col-sm-9"><?php echo $kelas_siswa; ?></span>
                        <form class="col-sm-3" action="?page=<?php echo $pageName ?>" method="post">
                            <select class="form-select" name="kelas_siswa" id="kelas_siswa" onchange="this.form.submit()">
                                <option value="Belum Memilih">Pilih Kelas</option>
                                <option value="Semua Kelas">Semua Kelas</option>
                                <optgroup label="Jurusan PPLG">
                                    <option value="X PPLG 1">X PPLG 1</option>
                                    <option value="X PPLG 2">X PPLG 2</option>
                                    <option value="X PPLG 3">X PPLG 3</option>
                                    <option value="XI PPLG 1">XI PPLG 1</option>
                                    <option value="XI PPLG 2">XI PPLG 2</option>
                                    <option value="XI PPLG 3">XI PPLG 3</option>
                                    <option value="XII PPLG 1">XII PPLG 1</option>
                                    <option value="XII PPLG 2">XII PPLG 2</option>
                                    <option value="XII PPLG 3">XII PPLG 3</option>
                                </optgroup>
                                <optgroup label="Jurusan MPLB">
                                    <option value="X MPLB 1">X MPLB 1</option>
                                    <option value="X MPLB 2">X MPLB 2</option>
                                    <option value="X MPLB 3">X MPLB 3</option>
                                    <option value="XI MPLB 1">XI MPLB 1</option>
                                    <option value="XI MPLB 2">XI MPLB 2</option>
                                    <option value="XI MPLB 3">XI MPLB 3</option>
                                    <option value="XII MPLB 1">XII MPLB 1</option>
                                    <option value="XII MPLB 2">XII MPLB 2</option>
                                    <option value="XII MPLB 3">XII MPLB 3</option>
                                </optgroup>
                                <optgroup label="Jurusan AKL">
                                    <option value="X AKL 1">X AKL 1</option>
                                    <option value="X AKL 2">X AKL 2</option>
                                    <option value="X AKL 3">X AKL 3</option>
                                    <option value="XI AKL 1">XI AKL 1</option>
                                    <option value="XI AKL 2">XI AKL 2</option>
                                    <option value="XI AKL 3">XI AKL 3</option>
                                    <option value="XII AKL 1">XII AKL 1</option>
                                    <option value="XII AKL 2">XII AKL 2</option>
                                    <option value="XII AKL 3">XII AKL 3</option>
                                </optgroup>
                                <optgroup label="Jurusan PM">
                                    <option value="X PM 1">X PM 1</option>
                                    <option value="X PM 2">X PM 2</option>
                                    <option value="XI PM 1">XI PM 1</option>
                                    <option value="XI PM 2">XI PM 2</option>
                                    <option value="XII PM 1">XII PM 1</option>
                                    <option value="XII PM 2">XII PM 2</option>
                                </optgroup>
                            </select>
                        </form>
                    </h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Nilai</th>
                                    <th>Pembayaran</th>
                                    <th>Bulan</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" id="myTable">
                                <?php
                                $no = 1;
                                $result = mysqli_query($koneksi1, "SELECT siswa.id_siswa AS siswa_id, siswa.nama_siswa, nilai_siswa.*, pembayaran_siswa.* FROM siswa LEFT JOIN nilai_siswa ON siswa.id_siswa = nilai_siswa.id_siswa LEFT JOIN pembayaran_siswa ON siswa.id_siswa = pembayaran_siswa.id_siswa $kelas_query ORDER BY siswa.id_siswa");
                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['siswa_id']; ?></td>
                                        <td><?php echo $data['nama_siswa']; ?></td>
                                        <td><?php echo $data['mata_pelajaran'] ?? '-'; ?></td>
                                        <td><?php echo $data['nilai'] ?? '-'; ?></td>
                                        <td><?php echo $data['pembayaran'] ?? '-'; ?></td>
                                        <td><?php echo $data['bulan'] ?? '-'; ?></td>
                                        <td><?php echo isset($data['jumlah_bayar']) ? "Rp " . number_format($data['jumlah_bayar'], 2, ",", ".") : '-'; ?></td>
                                        <td>
                                            <a href="?page=<?php echo $pageName ?>&alert=InfoData&id_siswa=<?php echo $data['siswa_id']; ?>&mata_pelajaran=<?php echo $data['mata_pelajaran'] ?>&id_nilai_siswa=<?php echo $data['id_nilai_siswa'] ?>&id_pembayaran_siswa=<?php echo $data['id_pembayaran_siswa'] ?>" class="btn btn-warning"><i class="bi bi-info-lg" style="color: white;"></i></a>
                                            <a href="?page=<?php echo $pageName ?>&alert=EditData&id_siswa=<?php echo $data['siswa_id']; ?>&mata_pelajaran=<?php echo $data['mata_pelajaran'] ?>&id_nilai_siswa=<?php echo $data['id_nilai_siswa'] ?>&id_pembayaran_siswa=<?php echo $data['id_pembayaran_siswa'] ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== INFO ===== -->
        <?php
        if (isset($_GET['alert']) && $_GET['alert'] == 'InfoData' && isset($_GET['id_siswa'])) {
            $id_siswa = !empty($_GET['id_siswa']) ? " WHERE siswa.id_siswa='" . $_GET['id_siswa'] . " '" : "";
            $id_nilai_siswa = !empty($_GET['id_nilai_siswa']) ? " AND nilai_siswa.id_nilai_siswa='" . $_GET['id_nilai_siswa'] . " '" : "";
            $id_pembayaran_siswa = !empty($_GET['id_pembayaran_siswa']) ? " AND pembayaran_siswa.id_pembayaran_siswa='" . $_GET['id_pembayaran_siswa'] . " '" : "";

            $data_table = mysqli_query($koneksi1, "SELECT siswa.id_siswa AS siswa_id, siswa.*, nilai_siswa.*, pembayaran_siswa.* FROM siswa LEFT JOIN nilai_siswa ON siswa.id_siswa = nilai_siswa.id_siswa LEFT JOIN pembayaran_siswa ON siswa.id_siswa = pembayaran_siswa.id_siswa $id_siswa $id_nilai_siswa $id_pembayaran_siswa");

            if (mysqli_num_rows($data_table) > 0) {
                $d_table = mysqli_fetch_assoc($data_table);
        ?>
                <div class="card" style="position:fixed; top: 50%; transform:translate(-50%, -50%); left:50%; z-index: 1000; width: 75vw">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between">
                            <span style="color: black;">Info Data Sim Akademik Siswa</span>
                            <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;">
                                <i class="bi bi-x-circle"></i>
                            </a>
                        </h5>
                        <table>
                            <tr>
                                <td>NIS</td>
                                <td>:</td>
                                <td><?php echo $d_table['siswa_id'] ?? '-'; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?php echo $d_table['nama_siswa'] ?? '-'; ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td><?php echo $d_table['kelas'] ?? '-'; ?></td>
                            </tr>
                            <tr>
                                <td>Mata Pelajaran</td>
                                <td>:</td>
                                <td><?php echo $d_table['mata_pelajaran'] ?? '-'; ?></td>
                            </tr>
                            <tr>
                                <td>Nilai</td>
                                <td>:</td>
                                <td><?php echo $d_table['nilai'] ?? '-'; ?></td>
                            </tr>
                            <tr>
                                <td>Pembayaran</td>
                                <td>:</td>
                                <td><?php echo $d_table['pembayaran'] ?? '-'; ?></td>
                            </tr>
                            <tr>
                                <td>Bulan</td>
                                <td>:</td>
                                <td><?php echo $d_table['bulan'] ?? '-'; ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Bayar</td>
                                <td>:</td>
                                <td><?php echo isset($d_table['jumlah_bayar']) ? "Rp " . number_format($d_table['jumlah_bayar'], 2, ",", ".") : '-'; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

        <?php
            }
        }
        ?>

        <!-- ===== EDIT ===== -->
        <?php
        if (isset($_GET['alert']) && $_GET['alert'] == 'EditData' && isset($_GET['id_siswa'])) {
            $id_siswa = !empty($_GET['id_siswa']) ? " WHERE siswa.id_siswa='" . $_GET['id_siswa'] . " '" : "";
            $id_nilai_siswa = !empty($_GET['id_nilai_siswa']) ? " AND nilai_siswa.id_nilai_siswa='" . $_GET['id_nilai_siswa'] . " '" : "";
            $id_pembayaran_siswa = !empty($_GET['id_pembayaran_siswa']) ? " AND pembayaran_siswa.id_pembayaran_siswa='" . $_GET['id_pembayaran_siswa'] . " '" : "";

            $data_table = mysqli_query($koneksi1, "SELECT siswa.id_siswa AS siswa_id, siswa.*, nilai_siswa.*, pembayaran_siswa.* FROM siswa LEFT JOIN nilai_siswa ON siswa.id_siswa = nilai_siswa.id_siswa LEFT JOIN pembayaran_siswa ON siswa.id_siswa = pembayaran_siswa.id_siswa $id_siswa $id_nilai_siswa $id_pembayaran_siswa");

            if (mysqli_num_rows($data_table) > 0) {
                $d_table = mysqli_fetch_assoc($data_table);
        ?>
                <div class="card" style="position:fixed; top: 50%; transform:translate(-50%, -50%); left:50%; z-index: 1000; width: 75vw">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between"><span style="color: black;">Edit Data Sim Akademik Siswa</span> <a href="?page=<?php echo $pageName; ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a></h5>

                        <!-- General Form Elements -->
                        <form action="?page=update_sim&pageName=<?php echo $pageName ?>" method="POST">
                            <input type="hidden" name="id_siswa" value="<?php echo $d_table['siswa_id']; ?>">
                            <input type="hidden" name="id_nilai_siswa" value="<?php echo $d_table['id_nilai_siswa']; ?>">
                            <input type="hidden" name="id_pembayaran_siswa" value="<?php echo $d_table['id_pembayaran_siswa']; ?>">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">NIS</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nis" value="<?php echo $d_table['siswa_id']; ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama Siswa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_siswa" value="<?php echo $d_table['nama_siswa']; ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_siswa" value="<?php echo $d_table['kelas']; ?>" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="mata_pelajaran" aria-label="Default select example">
                                        <option selected value="Belum Memilih">Pilih Mata Pelajaran</option>
                                        <?php
                                        foreach ($list_mapel as $mapel) {
                                        ?>
                                            <option value="<?php echo $mapel['mata_pelajaran']; ?>" <?php echo ($mapel['mata_pelajaran'] == $d_table['mata_pelajaran']) ? 'selected="selected"' : ''; ?>>
                                                <?php echo $mapel['mata_pelajaran']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nilai</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="nilai" min="0" max="100"  value="<?php echo $d_table['nilai'] ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Pembayaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pembayaran"  placeholder="Pembayaran" value="<?php echo $d_table['pembayaran'] ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Bulan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="bulan" id="bulan">
                                        <option <?php echo ('' == $d_table['bulan']) ? 'selected="selected"' : ''; ?> value="Belum Memilih">Pilih Bulan</option>
                                        <option <?php echo ('Januari' == $d_table['bulan']) ? 'selected="selected"' : ''; ?> value="Januari">Januari</option>
                                        <option <?php echo ('Februari' == $d_table['bulan']) ? 'selected="selected"' : ''; ?> value="Februari">Februari</option>
                                        <option <?php echo ('Maret' == $d_table['bulan']) ? 'selected="selected"' : ''; ?> value="Maret">Maret</option>
                                        <option <?php echo ('April' == $d_table['bulan']) ? 'selected="selected"' : ''; ?> value="April">April</option>
                                        <option <?php echo ('Mei' == $d_table['bulan']) ? 'selected="selected"' : ''; ?> value="Mei">Mei</option>
                                        <option <?php echo ('Juni' == $d_table['bulan']) ? 'selected="selected"' : ''; ?> value="Juni">Juni</option>
                                        <option <?php echo ('Juli' == $d_table['bulan']) ? 'selected="selected"' : ''; ?> value="Juli">Juli</option>
                                        <option <?php echo ('Agustus' == $d_table['bulan']) ? 'selected="selected"' : ''; ?> value="Agustus">Agustus</option>
                                        <option <?php echo ('September' == $d_table['bulan']) ? 'selected="selected"' : ''; ?> value="September">September</option>
                                        <option <?php echo ('Oktober' == $d_table['bulan']) ? 'selected="selected"' : ''; ?> value="Oktober">Oktober</option>
                                        <option <?php echo ('November' == $d_table['bulan']) ? 'selected="selected"' : ''; ?> value="November">November</option>
                                        <option <?php echo ('Desember' == $d_table['bulan']) ? 'selected="selected"' : ''; ?> value="Desember">Desember</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Jumlah Bayar</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="jumlah_bayar" min="0" max=""  value="<?php echo $d_table['jumlah_bayar'] ?>">
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
        ?>


</main><!-- End #main -->