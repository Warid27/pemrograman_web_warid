<?php
$simAkademik_4 = "active";
$pageName = 'pembayaran_siswa';
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
            $kelas_query_join = " ";
        } else {
            $kelas_query = "WHERE kelas ='$kelas_siswa'";
            $kelas_query_join = "WHERE siswa.kelas ='$kelas_siswa'";
        }
    } else {
        $kelas_siswa = "Semua Kelas";
        $kelas_query = "";
        $kelas_query_join = " ";
    }
    ?>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h5 class="card-header d-flex"">
                        <span class=" col-sm-6"><a href="?page=<?php echo $pageName ?>&alert=add_data&kelas_siswa=<?php echo $kelas_siswa; ?>" class="btn btn-success">+</a> Tambah Data</span>
                        <span class="col-sm-3"><?php echo $kelas_siswa; ?></span>
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
                                    <th>ID Pembayaran</th>
                                    <th>Nama Siswa</th>
                                    <th>Pembayaran</th>
                                    <th>Bulan</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                $no = 1;
                                $result = mysqli_query($koneksi1, "SELECT pembayaran_siswa.*, siswa.nama_siswa FROM pembayaran_siswa INNER JOIN siswa ON pembayaran_siswa.id_siswa = siswa.id_siswa $kelas_query_join");
                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['id_pembayaran_siswa']; ?></td>
                                        <td><?php echo $data['nama_siswa']; ?></td>
                                        <td><?php echo $data['pembayaran']; ?></td>
                                        <td><?php echo $data['bulan']; ?></td>
                                        <td><?php echo $data['jumlah_bayar']; ?></td>
                                        <td>
                                            <a href="?page=<?php echo $pageName ?>&alert=EditData&id_pembayaran_siswa=<?php echo $data['id_pembayaran_siswa']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                                            <a href="?page=<?php echo $pageName ?>&alert=ConfirmationDeleteSim&pageName=<?php echo $pageName ?>&id=<?php echo $data['id_pembayaran_siswa']; ?>" class="btn btn-danger"><i class="bi bi-trash-fill" style="color: white;"></i></a>
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
                if (isset($_GET['id_pembayaran_siswa'])) {
                    $id_pembayaran_siswa = $_GET['id_pembayaran_siswa'];
                    $edit_result = mysqli_query($koneksi1, "SELECT pembayaran_siswa.id_pembayaran_siswa, pembayaran_siswa.pembayaran, pembayaran_siswa.jumlah_bayar, siswa.nama_siswa FROM pembayaran_siswa INNER JOIN siswa ON pembayaran_siswa.id_siswa = siswa.id_siswa WHERE pembayaran_siswa.id_pembayaran_siswa = '$id_pembayaran_siswa'");

                    if (mysqli_num_rows($edit_result) > 0) {
                        $d_table = mysqli_fetch_assoc($edit_result);

        ?>
                        <div class="card" style="position:fixed; top: 50%; transform:translate(-50%, -50%); left:50%; z-index: 1000; width: 75vw">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between"><span style="color: black;">Form Pembayaran Siswa</span> <a href="?page=<?php echo $pageName; ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a></h5>

                                <!-- General Form Elements -->
                                <form action="?page=update_sim&pageName=<?php echo $pageName ?>" method="POST">
                                    <input type="hidden" name="id_pembayaran_siswa" value="<?php echo $d_table['id_pembayaran_siswa']; ?>">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Nama Siswa</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_siswa" value="<?php echo $d_table['nama_siswa']; ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Pembayaran</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pembayaran" required placeholder="Pembayaran" value="<?php echo $d_table['pembayaran'] ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Bulan</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="bulan" id="bulan">
                                                <option selected value="Belum Memilih">Pilih Bulan</option>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Jumlah Bayar</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="jumlah_bayar" min="0" max="" required value="<?php echo $d_table['jumlah_bayar'] ?>">
                                        </div>
                                    </div>

                                    <div cs="row mb-3">
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
        }
        ?>

        <!-- ===== ADD ===== -->
        <?php
        if (isset($_GET['alert'])) {
            if ($_GET['alert'] == 'add_data') {
                $kelas_siswa = $_GET['kelas_siswa'];
                if ($kelas_siswa == "Semua Kelas") {
                    $kelas_query = "";
                } else {
                    $kelas_query = "WHERE kelas ='$kelas_siswa'";
                }
        ?>
                <div class="card" style="position:fixed; top: 50%; transform:translate(-50%, -50%); left:50%; z-index: 1000; width: 75vw">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between"><span style="color: black;">Form Pembayaran Siswa</span> <a href="?page=<?php echo $pageName ?>" style="color: black; text-decoration:none;"><i class="bi bi-x-circle"></i></a></h5>

                        <!-- General Form Elements -->
                        <form action="" method="POST">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kelas" value="<?php echo $kelas_siswa; ?>" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Siswa</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="id_siswa" aria-label="Default select example">
                                        <option selected value="Belum Memilih">Pilih Nama Siswa</option>
                                        <?php
                                        $data_siswa = mysqli_query($koneksi1, "SELECT id_siswa, nama_siswa FROM siswa $kelas_query");
                                        while ($d_siswa = mysqli_fetch_assoc($data_siswa)) {
                                            echo "<option value='" . $d_siswa['id_siswa'] . "'>" . $d_siswa['nama_siswa'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Pembayaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pembayaran" required placeholder="Pembayaran">
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Bulan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="bulan" id="bulan">
                                        <option selected value="Belum Memilih">Pilih Bulan</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Jumlah Bayar</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="jumlah_bayar" min="0" max="" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" name="add_data" value="add_data" class="btn btn-primary">Tambah Data!</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->
                    </div>
                </div>
        <?php
            }
        }
        ?>

    </section>

    <!-- ADD DATA PROCESS -->
    <?php
    if (isset($_POST['add_data'])) {
        $id_siswa = $_POST['id_siswa'];
        $pembayaran = $_POST['pembayaran'];
        $bulan = $_POST['bulan'];
        $jumlah_bayar = $_POST['jumlah_bayar'];

        if ($id_siswa !== "Belum Memilih") {
            $query = "INSERT INTO `pembayaran_siswa`(`id_pembayaran_siswa`, `id_siswa`, `pembayaran`, `bulan`, `jumlah_bayar`) VALUES (NULL, '$id_siswa', '$pembayaran', '$bulan', '$jumlah_bayar')";
            $result = mysqli_query($koneksi1, $query);

            if ($result) {
    ?>
                <script>
                    window.location.href = '<?php echo "?page=$pageName&alert=Success"; ?>';
                </script>
            <?php
            } else {
                echo "Gagal Le: " . mysqli_error($koneksi1);
            }
        } else {
            ?>
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Anda Belum Memilih Data!",
                    text: "Mohon Pilih Data Nama"
                });
            </script>
    <?php
        }
    }
    ?>

</main><!-- End #main -->