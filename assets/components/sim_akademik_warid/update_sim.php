<?php
if (isset($_POST['update'])) {
    $pageName = $_GET['pageName'];
    
    if ($pageName == 'siswa') {
        $id_siswa = $_POST['id_siswa'];
        $nama_siswa = $_POST['nama_siswa'];
        $kelas = $_POST['kelas'];
        
        $query = "UPDATE `siswa` SET `nama_siswa`='$nama_siswa',`kelas`='$kelas' WHERE `id_siswa`='$id_siswa'";
    }
    elseif ($pageName == 'nilai_siswa') {
        $id_nilai_siswa = $_POST['id_nilai_siswa'];
        $id_siswa = $_POST['id_siswa'];
        $id_mapel = $_POST['id_mapel'];
        $nilai = $_POST['nilai'];
        $query = "UPDATE `nilai_siswa` SET `id_siswa`='$id_siswa',`id_mapel`='$id_mapel', `nilai` = '$nilai' WHERE `id_nilai_siswa`='$id_nilai_siswa'";
    }
    elseif ($pageName == 'pembayaran_siswa') {
        $id_pembayaran_siswa = $_POST['id_pembayaran_siswa'];
        $id_siswa = $_POST['id_siswa'];
        $pembayaran = $_POST['pembayaran'];
        $bulan = $_POST['id_siswa'];
        $jumlah_bayar = $_POST['jumlah_bayar'];
        $query = "UPDATE `pembayaran_siswa` SET `id_siswa`='$id_siswa',`pembayaran`='$pembayaran',`bulan`='$bulan',`jumlah_bayar`='$jumlah_bayar' WHERE `id_pembayaran_siswa` = '$id_pembayaran_siswa'";
    }

    $result = mysqli_query($koneksi1, $query);

    if ($result) {
        header("Location:?page=$pageName&alert=Updated");
    } else {
        echo "Gagal Le: " . mysqli_error($koneksi);
        echo $query;
    }
}
