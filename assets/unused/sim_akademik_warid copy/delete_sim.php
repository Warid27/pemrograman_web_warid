<?php 
    $id = $_GET['id'];
    $pageName = $_GET['pageName'];
    $query = mysqli_query($koneksi1,"DELETE FROM `$pageName` WHERE `id_$pageName`='$id'");

    
    if ($query) {
        header("Location:?page=$pageName&alert=Deleted");
    } else {
        // header("Location:?page=delete&alert=Failed");
        echo "Gagal Le: " . mysqli_error($koneksi);
        echo $query;
    }
?>