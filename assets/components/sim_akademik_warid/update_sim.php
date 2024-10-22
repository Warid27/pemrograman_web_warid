<?php
if (isset($_POST['update'])) {
    $pageName = $_GET['pageName'];
    
    if ($pageName == 'siswa') {
        $id_siswa = $_POST['id_siswa'];
        $nama_siswa = $_POST['nama_siswa'];
        $kelas = $_POST['kelas'];
        
        $query = "UPDATE `siswa` SET `nama_siswa`='$nama_siswa',`kelas`='$kelas' WHERE `id_siswa`='$id_siswa'";
    }

    $result = mysqli_query($koneksi1, $query);

    if ($result) {
        header("Location:?page=$pageName&alert=Updated");
    } else {
        echo "Gagal Le: " . mysqli_error($koneksi);
        echo $query;
    }
}
