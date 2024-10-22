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
        $nama = $_POST['nama'];
        $iq = $_POST['IQ'];

        if ($iq > 144) {
            $kwalifikasi = "Very Gifted / Highly Advanced";
        } elseif ($iq >= 130) {
            $kwalifikasi = "Gifted / Very Advanced";
        } elseif ($iq >= 120) {
            $kwalifikasi = "Superior";
        } elseif ($iq >= 110) {
            $kwalifikasi = "High Average";
        } elseif ($iq >= 90) {
            $kwalifikasi = "Average";
        } elseif ($iq >= 80) {
            $kwalifikasi = "Low Average";
        } elseif ($iq >= 70) {
            $kwalifikasi = "Borderline Impaired / Delayed";
        } elseif ($iq >= 55) {
            $kwalifikasi = "Midly Impaired / Delayed";
        } elseif ($iq >= 40) {
            $kwalifikasi = "Moderately Impaired / Delayed";
        } else {
            $kwalifikasi = "Duh le....";
        }

        $query = "UPDATE `kwalifikasi` SET `nama`='$nama',`iq`='$iq',`kwalifikasi`='$kwalifikasi' WHERE `id`='$id'";
        $result = mysqli_query($koneksi, $query);
    }

    // Seragam
    elseif ($tableName == "seragam") {

        $OSIS = "OSIS";
        $Pramuka = "Pramuka";
        $Olahraga = "Olahraga";
        $Identitas = "Identitas";

        $nama = $_POST['nama'];
        $OSISValue = $_POST['OSIS'];
        $PramukaValue = $_POST['Pramuka'];
        $OlahragaValue = $_POST['Olahraga'];
        $IdentitasValue = $_POST['Identitas'];
        $bantuan = $_POST['bantuan'];

        $harga = [
            'S' => [
                'OSIS' => 100000,
                'Pramuka' => 100000,
                'Olahraga' => 75000,
                'Identitas' => 50000,
            ],
            'M' => [
                'OSIS' => 125000,
                'Pramuka' => 125000,
                'Olahraga' => 100000,
                'Identitas' => 75000,
            ],
            'L' => [
                'OSIS' => 150000,
                'Pramuka' => 150000,
                'Olahraga' => 125000,
                'Identitas' => 100000,
            ],
            'XL' => [
                'OSIS' => 175000,
                'Pramuka' => 175000,
                'Olahraga' => 150000,
                'Identitas' => 125000,
            ],
        ];

        $diskonBantuan = [
            'Tidak Ada' => 0,
            'BOS' => 100 / 100,
            'Infak' => 50 / 100,
            'Komite' => 25 / 100,
        ];

        $hargaOSIS = $harga[$OSISValue][$OSIS];
        $hargaPramuka = $harga[$PramukaValue][$Pramuka];
        $hargaOlahraga = $harga[$OlahragaValue][$Olahraga];
        $hargaIdentitas = $harga[$IdentitasValue][$Identitas];

        $hargaTotal = $hargaOSIS + $hargaPramuka + $hargaOlahraga + $hargaIdentitas;
        $totalBayar = $hargaTotal - ($hargaTotal * $diskonBantuan[$bantuan]);

        $seragamOSiS = "Rp. " . number_format($hargaOSIS, 2, ",", ".") . " ($OSISValue)";
        $seragamPramuka = "Rp. " . number_format($hargaPramuka, 2, ",", ".") . " ($PramukaValue)";
        $seragamOlahraga = "Rp. " . number_format($hargaOlahraga, 2, ",", ".") . " ($OlahragaValue)";
        $seragamIdentitas = "Rp. " . number_format($hargaIdentitas, 2, ",", ".") . " ($IdentitasValue)";

        $query = "UPDATE `seragam` SET `nama`='$nama',`osis`='$seragamOSiS',`pramuka`='$seragamPramuka',`olahraga`='$seragamOlahraga',`identitas`='$seragamIdentitas',`bantuan`='$bantuan',`total_bayar`='$totalBayar' WHERE `id`='$id'";
        $result = mysqli_query($koneksi, $query);
    }

    // Gaji
    elseif ($tableName == "gaji") {
        $nama = $_POST['nama'];
        $devisi = $_POST['devisi'];
        $jabatan = $_POST['jabatan'];
        $jam_kerja = $_POST['jam_kerja'];

        $gaji = [
            'Web' => [
                'Belum Memilih Jabatan' => 0,
                'Magang' => 2500000,
                'Junior Programmer' => 4500000,
                'Senior Programmer' => 7000000,
            ],
            'Desktop' => [
                'Belum Memilih Jabatan' => 0,
                'Magang' => 2300000,
                'Junior Programmer' => 4300000,
                'Senior Programmer' => 6500000,
            ],
        ];

        $gajiKaryawan = $gaji[$devisi][$jabatan];
        $totalBayar = $gajiKaryawan * $jam_kerja;

        $query = "UPDATE `gaji` SET `nama`='$nama',`devisi`='$devisi',`jabatan`='$jabatan',`jam_kerja`='$jam_kerja',`total_bayar`='$totalBayar' WHERE `id`='$id'";
        $result = mysqli_query($koneksi, $query);
    }

    // Salah
    else {
        echo "Gagal Le: " . mysqli_error($koneksi);
        echo $query;
    }

    if ($result) {
        header("Location:?page=$pageName&alert=Updated");
    } else {
        echo "Gagal Le: " . mysqli_error($koneksi);
        echo $query;
    }
}
