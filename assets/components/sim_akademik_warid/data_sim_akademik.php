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

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Siswa</th>
                                    <th>Nama Siswa</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Nilai</th>
                                    <th>Pembayaran</th>
                                    <th>Bulan</th>
                                    <th>Jumlah Bayar</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                $no = 1;
                                $result = mysqli_query($koneksi1, "SELECT siswa.id_siswa AS siswa_id, siswa.nama_siswa, mapel.*, nilai_siswa.*, pembayaran_siswa.* FROM siswa LEFT JOIN nilai_siswa ON siswa.id_siswa = nilai_siswa.id_siswa LEFT JOIN pembayaran_siswa ON siswa.id_siswa = pembayaran_siswa.id_siswa LEFT JOIN mapel ON nilai_siswa.id_mapel = mapel.id_mapel");
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