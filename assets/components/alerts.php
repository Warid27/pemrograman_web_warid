<!-- Success -->
<?php 
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == 'Success') {
?>
        <script>
            Swal.fire({
                icon: "success",
                title: "Data Berhasil Dikirim!",
            });
        </script>
<?php  
    }
}
?>

<!-- Failed -->
<?php 
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == 'Failed') {
?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Data Gagal Dikirim!",
                text: "<?php echo mysqli_error($koneksi); ?>"
            });
        </script>
<?php  
    }
}
?>

<!-- Confirmation -->
<?php 
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == 'ConfirmationDelete') {
        $tableName = $_GET['tableName'];
?>
        <script>
            Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data akan terhapus permanen!",
            icon: 'warning',
            showConfirmButton: false,
            footer:`
            <a class="btn btn-danger m-1" href="?page=delete&tableName=<?php echo $tableName; ?>&id=<?php echo $_GET['id']; ?>">Hapus!</a>
            <a class="btn btn-primary m-1" href="?page=tabel_<?php echo $tableName; ?>">Tidak</a>
            `,
    });
        </script>
<?php  
    }
}
?>

<!-- Deleted -->
<?php 
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == 'Deleted') {
?>
        <script>
            Swal.fire({
                icon: "info",
                title: "Data Berhasil Dihapus!",
            });
        </script>
<?php  
    }
}
?>

<!-- Deleted -->
<?php 
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == 'Updated') {
?>
        <script>
            Swal.fire({
                icon: "info",
                title: "Data Berhasil Diupdate!",
            });
        </script>
<?php  
    }
}
?>