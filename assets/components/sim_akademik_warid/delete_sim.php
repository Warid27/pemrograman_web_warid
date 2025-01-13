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
                    window.location.href = '?page=$pageName&alert=Deleted';
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
            if ($pageName == "user") {
                // Setelah berhasil, hapus data dari file userList.php
                $filePath = __DIR__ . "/../../auth/userList.php"; // Sesuaikan path relatif
                if (file_exists($filePath)) {
                    include $filePath;

                    if (isset($userList) && is_array($userList)) {
                        // Cari dan hapus data berdasarkan user_id
                        foreach ($userList as $key => $user) {
                            if ($user['user_id'] == $id) {
                                unset($userList[$key]);
                                break;
                            }
                        }

                        // Reset array index untuk menghindari celah dalam urutan
                        $userList = array_values($userList);

                        // Tulis ulang file userList.php
                        $content = "<?php\n\$userList = " . var_export($userList, true) . ";\n";
                        if (file_put_contents($filePath, $content) === false) {
                            die("Gagal menulis ke file: $filePath");
                        }
                    } else {
                        die("Variabel \$userList tidak ditemukan atau bukan array.");
                    }
                } else {
                    die("File tidak ditemukan: $filePath");
                }
            }
            echo "<script>
                    window.location.href = '?page=$pageName&alert=Deleted';
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
