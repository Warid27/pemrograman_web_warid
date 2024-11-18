<?php
$pageName = $_GET['page_name'];
if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];
    try {
        $query_siswa = "SELECT foto FROM tb_siswa WHERE nis = '$nis'";
        $stmt_siswa = $pdo->prepare($query_siswa);
        $stmt_siswa->execute();
        $siswa_list = $stmt_siswa->fetchALL(PDO::FETCH_ASSOC);

        foreach ($siswa_list as $siswa) {
            $foto = $siswa['foto'];
            if (file_exists($foto_dir . $foto)) {
                unlink($foto_dir . $foto);
            }
        }


        $query = "DELETE FROM tb_siswa WHERE nis = :nis";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nis', $nis);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Data successfully deleted.');
                    window.location.href = '?page=$pageName';
                </script>";
        } else {
            echo "<script>
                    alert('Failed to delete data.');
                </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    $id = $_GET['id'];
    $id_name = "id_$pageName";
    try {
        $query = "DELETE FROM tb_$pageName WHERE $id_name = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Data successfully deleted.');
                    window.location.href = '?page=$pageName';
                </script>";
        } else {
            echo "<script>
                    alert('Failed to delete data.');
                </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>