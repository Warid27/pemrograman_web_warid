<?php 
    $id = $_GET['id'];
    $tableName = $_GET['tableName'];
    $pageName = "tabel_$tableName";
    $query = mysqli_query($koneksi,"DELETE FROM `$tableName` WHERE `id`='$id'");

    if ($query) {
        header("Location:?page=$pageName&alert=Deleted");
    } else {
        // header("Location:?page=delete&alert=Failed");
        echo "Gagal Le: " . mysqli_error($koneksi);
        echo $query;
    }
?>