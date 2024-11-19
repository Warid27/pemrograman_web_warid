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
                footer: `
            <a class="btn btn-danger m-1" href="?page=delete&tableName=<?php echo $tableName; ?>&id=<?php echo $_GET['id']; ?>">Hapus!</a>
            <a class="btn btn-primary m-1" href="?page=tabel_<?php echo $tableName; ?>">Tidak</a>
            `,
            });
        </script>
<?php
    }
}
?>

<?php
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == 'confirm_delete_sim') {
        $page_name = $_GET['page'];
        if (isset($_GET['nis'])) {
            $nis = $_GET['nis'];
            $primary_params = "nis=$nis";
        } else if (isset($_GET['id'])){
            $id = $_GET['id'];
            $primary_params = "id=$id";
        }
?>
        <script>
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data akan terhapus permanen!",
                icon: 'warning',
                showConfirmButton: false,
                footer: `
            <a class="btn btn-danger m-1" href="?page=delete_sim&page_name=<?php echo $page_name; ?>&<?php echo $primary_params; ?>">Hapus!</a>
            <a class="btn btn-primary m-1" href="?page=<?php echo $page_name; ?>">Tidak</a>
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

<!-- Updated -->
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