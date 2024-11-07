<?php
if (isset($_POST['update'])) {
    $pageName = $_GET['pageName'];

    // Update siswa
    if ($pageName == 'siswa') {
        $id_siswa = $_POST['id_siswa'];
        $nama_siswa = $_POST['nama_siswa'];
        $kelas = $_POST['kelas'];

        $query = "UPDATE `siswa` SET `nama_siswa`='$nama_siswa', `kelas`='$kelas' WHERE `id_siswa`='$id_siswa'";

        // Update nilai_siswa
    } elseif ($pageName == 'nilai_siswa') {
        $id_nilai_siswa = $_POST['id_nilai_siswa'];
        $mata_pelajaran = $_POST['mata_pelajaran'];
        $nilai = $_POST['nilai'];

        $query = "UPDATE `nilai_siswa` SET `mata_pelajaran`='$mata_pelajaran', `nilai`='$nilai' WHERE `id_nilai_siswa`='$id_nilai_siswa'";

        // Update mapel
    } elseif ($pageName == 'mapel') {
        function save_mapel_list($list_mapel)
        {
            $fileContent = "<?php\n\$list_mapel = " . var_export($list_mapel, true) . ";\n";
            file_put_contents('./assets/components/sim_akademik_warid/list_mapel.php', $fileContent);
        }

        $id_mapel = $_POST['id_mapel'];
        $mata_pelajaran = $_POST['mata_pelajaran'];

        // Update list_mapel.php
        foreach ($list_mapel as &$mapel) {
            if ($mapel['id_mapel'] == $id_mapel) {
                $mapel['mata_pelajaran'] = $mata_pelajaran;
                break;
            }
        }

        save_mapel_list($list_mapel);
        echo "<script>window.location.href = '?page=$pageName&alert=Success';</script>";
        $query = "";

        // Update pembayaran_siswa data
    } elseif ($pageName == 'pembayaran_siswa') {
        $id_pembayaran_siswa = $_POST['id_pembayaran_siswa'];
        $pembayaran = $_POST['pembayaran'];
        $bulan = $_POST['bulan'];
        $jumlah_bayar = $_POST['jumlah_bayar'];

        $query = "UPDATE `pembayaran_siswa` SET `pembayaran`='$pembayaran', `bulan`='$bulan', `jumlah_bayar`='$jumlah_bayar' WHERE `id_pembayaran_siswa`='$id_pembayaran_siswa'";

        // Update Sim Akademik
    } elseif ($pageName == 'data_sim_akademik') {
        $id_siswa = $_POST['id_siswa'];
        $id_nilai_siswa = $_POST['id_nilai_siswa'];
        $id_pembayaran_siswa = $_POST['id_pembayaran_siswa'];
        $mata_pelajaran = $_POST['mata_pelajaran'];
        $nilai = $_POST['nilai'];
        $pembayaran = $_POST['pembayaran'];
        $bulan = $_POST['bulan'];
        $jumlah_bayar = $_POST['jumlah_bayar'];

        if (empty($id_siswa)) {
            echo "Error: id_siswa ga ada le.";
            exit;
        }


        $query_check_pembayaran = "SELECT * FROM pembayaran_siswa WHERE id_pembayaran_siswa = '$id_pembayaran_siswa'";
        $result_check_pembayaran = mysqli_query($koneksi1, $query_check_pembayaran);

        $query_check_nilai = "SELECT * FROM nilai_siswa WHERE id_nilai_siswa = '$id_nilai_siswa'";
        $result_check_nilai = mysqli_query($koneksi1, $query_check_nilai);

        // Cek Apakah Memiliki Data
        if (mysqli_num_rows($result_check_pembayaran) > 0 && mysqli_num_rows($result_check_nilai) > 0) {
            // Kedua Table Memiliki Data
            $query = "UPDATE `nilai_siswa` SET `mata_pelajaran`='$mata_pelajaran', `nilai`='$nilai' WHERE `id_nilai_siswa`='$id_nilai_siswa'";
            $query2 = "UPDATE `pembayaran_siswa` SET `pembayaran`='$pembayaran', `bulan`='$bulan', `jumlah_bayar`='$jumlah_bayar' WHERE `id_pembayaran_siswa`='$id_pembayaran_siswa'";
        } elseif (mysqli_num_rows($result_check_pembayaran) == 0 && mysqli_num_rows($result_check_nilai) > 0) {
            // pembayaran_siswa Tidak Ada Data
            $query = "INSERT INTO `pembayaran_siswa`(`id_pembayaran_siswa`, `id_siswa`, `pembayaran`, `bulan`, `jumlah_bayar`) VALUES (NULL, '$id_siswa', '$pembayaran', '$bulan', '$jumlah_bayar')";
            $query2 = "UPDATE nilai_siswa SET mata_pelajaran = '$mata_pelajaran', nilai = '$nilai' WHERE id_nilai_siswa = '$id_nilai_siswa'";
        } elseif (mysqli_num_rows($result_check_pembayaran) > 0 && mysqli_num_rows($result_check_nilai) == 0) {
            // nilai_siswa Tidak Ada Data
            $query = "UPDATE pembayaran_siswa SET pembayaran = '$pembayaran', bulan = '$bulan', jumlah_bayar = '$jumlah_bayar' WHERE id_pembayaran_siswa = '$id_pembayaran_siswa'";
            $query2 = "INSERT INTO `nilai_siswa`(`id_nilai_siswa`, `id_siswa`, `mata_pelajaran`, `nilai`) VALUES (NULL, '$id_siswa', '$mata_pelajaran', '$nilai')";
        } else {
            // Kedua Table Tidak Ada Data
            $query = "INSERT INTO `pembayaran_siswa`(`id_pembayaran_siswa`, `id_siswa`, `pembayaran`, `bulan`, `jumlah_bayar`) VALUES (NULL, '$id_siswa', '$pembayaran', '$bulan', '$jumlah_bayar')";
            $query2 = "INSERT INTO `nilai_siswa`(`id_nilai_siswa`, `id_siswa`, `mata_pelajaran`, `nilai`) VALUES (NULL, '$id_siswa', '$mata_pelajaran', '$nilai')";
        }

        // Jalankan Query2
        mysqli_query($koneksi1, $query2);
    }

    // Jalankan Query
    $result = mysqli_query($koneksi1, $query);

    if ($result) {
        header("Location:?page=$pageName&alert=Updated");
    } else {
        echo "Error: " . mysqli_error($koneksi);
        echo $query;
    }
}
