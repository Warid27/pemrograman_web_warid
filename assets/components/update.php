<?php
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $tableName = $_GET['tableName'];
    $pageName = "tabel_$tableName";

    // Kereta
    if ($tableName == "kereta") {
        $nama = $_POST['nama'];
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];
        $kelas = $_POST['kelas'];
        $bagasi = $_POST['bagasi'];
        $tanggal = $_POST['tanggal'];
        $tiket = $_POST['tiket'];

        if ($bagasi == "Ya") {
            $hargaBagasi = 50000;
        } else {
            $hargaBagasi = 0;
        }

        if ($tujuan == "Jakarta") {
            if ($kelas == "Panoramic") {
                $harga = 2000000;
            } elseif ($kelas == "VIP") {
                $harga = 1500000;
            } elseif ($kelas == "Ekonomi") {
                $harga = 300000;
            } else {
                $harga = 0;
                $hargaBagasi = 0;
            }
        } elseif ($tujuan == "Bandung") {
            if ($kelas == "Panoramic") {
                $harga = 1200000;
            } elseif ($kelas == "VIP") {
                $harga = 900000;
            } elseif ($kelas == "Ekonomi") {
                $harga = 200000;
            } else {
                $harga = 0;
                $hargaBagasi = 0;
            }
        } elseif ($tujuan == "Surabaya") {
            if ($kelas == "Panoramic") {
                $harga = 1500000;
            } elseif ($kelas == "VIP") {
                $harga = 1000000;
            } elseif ($kelas == "Ekonomi") {
                $harga = 200000;
            } else {
                $harga = 0;
                $hargaBagasi = 0;
            }
        } else {
            $harga = 0;
            $hargaBagasi = 0;
        }

        $totalBayar = (($harga * $tiket) + $hargaBagasi);

        $query = "UPDATE `kereta` SET `nama`='$nama', `asal`='$asal', `tujuan`='$tujuan', `kelas`='$kelas', `bagasi`='$bagasi', `tanggal`='$tanggal', `jml_tiket`='$tiket', `total_bayar`='$totalBayar' WHERE `id`='$id'";
        $result = mysqli_query($koneksi, $query);
    }

    // Rapor
    elseif ($tableName == "rapor") {
        $nama = $_POST['nama'];
        $nilaiUH = $_POST['uh'];
        $nilaiUA = $_POST['ua'];

        $totalNilai = (($nilaiUH * 60 / 100) + ($nilaiUA * 40 / 100));

        $query = "UPDATE `rapor` SET `nama`='$nama',`nilaiUH`='$nilaiUH',`nilaiUA`='$nilaiUA',`nilai_total`='$totalNilai' WHERE `id`='$id'";
        $result = mysqli_query($koneksi, $query);
    }

    // Kwalifikasi
    elseif ($tableName == "kwalifikasi") {
    }

    // Seragam
    elseif ($tableName == "seragam") {
    }

    // Gaji
    elseif ($tableName == "gaji") {
    }

    // Salah
    else {
    }

    if ($result) {
        header("Location:?page=$pageName&alert=Updated");
    } else {
        echo "Gagal Le: " . mysqli_error($koneksi);
        echo $query;
    }
}
