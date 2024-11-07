<?php
if (isset($_POST['update'])) {
    $pageName = $_GET['pageName'];

    if ($pageName == 'siswa') {
        $id_siswa = $_POST['id_siswa'];
        $nama_siswa = $_POST['nama_siswa'];
        $kelas = $_POST['kelas'];

        $query = "UPDATE `siswa` SET `nama_siswa`='$nama_siswa',`kelas`='$kelas' WHERE `id_siswa`='$id_siswa'";
    } elseif ($pageName == 'nilai_siswa') {
        $id_nilai_siswa = $_POST['id_nilai_siswa'];
        $mata_pelajaran = $_POST['mata_pelajaran'];
        $nilai = $_POST['nilai'];
        $query = "UPDATE `nilai_siswa` SET `mata_pelajaran`='$mata_pelajaran', `nilai` = '$nilai' WHERE `id_nilai_siswa`='$id_nilai_siswa'";
    } elseif ($pageName == 'mapel') {
        function save_mapel_list($list_mapel) {
            $fileContent = "<?php\n\$list_mapel = " . var_export($list_mapel, true) . ";\n";
            file_put_contents('./assets/components/sim_akademik_warid/list_mapel.php', $fileContent);
        }
        $id_mapel = $_POST['id_mapel'];
        $mata_pelajaran = $_POST['mata_pelajaran'];
        foreach ($list_mapel as &$mapel) {
            if ($mapel['id_mapel'] == $id_mapel) {
                $mapel['mata_pelajaran'] = $mata_pelajaran;
                break;
            }
        }
        save_mapel_list($list_mapel);
        echo "<script>window.location.href = '?page=$pageName&alert=Success';</script>";
        $query = "";
    } elseif ($pageName == 'pembayaran_siswa') {
        $id_pembayaran_siswa = $_POST['id_pembayaran_siswa'];
        $pembayaran = $_POST['pembayaran'];
        $bulan = $_POST['bulan'];
        $jumlah_bayar = $_POST['jumlah_bayar'];
        $query = "UPDATE `pembayaran_siswa` SET `pembayaran`='$pembayaran',`bulan`='$bulan',`jumlah_bayar`='$jumlah_bayar' WHERE `id_pembayaran_siswa` = '$id_pembayaran_siswa'";
    }

    $result = mysqli_query($koneksi1, $query);

    if ($result) {
        header("Location:?page=$pageName&alert=Updated");
    } else {
        echo "Gagal Le: " . mysqli_error($koneksi);
        echo $query;
    }
}
