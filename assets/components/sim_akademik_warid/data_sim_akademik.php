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
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" id="myTable">
                                <?php
                                $no = 1;
                                $result = mysqli_query($koneksi1, "SELECT siswa.id_siswa AS siswa_id, siswa.nama_siswa, mapel.*, nilai_siswa.*, pembayaran_siswa.* FROM siswa LEFT JOIN nilai_siswa ON siswa.id_siswa = nilai_siswa.id_siswa LEFT JOIN pembayaran_siswa ON siswa.id_siswa = pembayaran_siswa.id_siswa LEFT JOIN mapel ON nilai_siswa.id_mapel = mapel.id_mapel $kelas_query");
                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['siswa_id']; ?></td>
                                        <td><?php echo $data['nama_siswa']; ?></td>
                                        <td><?php echo $data['mata_pelajaran']; ?></td>
                                        <td><?php echo $data['nilai']; ?></td>
                                        <td><?php echo $data['pembayaran']; ?></td>
                                        <td><?php echo $data['bulan']; ?></td>
                                        <td><?php echo $data['jumlah_bayar']; ?></td>
                                    </tr><?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</main><!-- End #main -->