<!-- Sidebar -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link <?php echo $dashboard_sidebar; ?>" href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <!-- Penilaian 1 -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#penilaian-1" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Penilaian 1</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="penilaian-1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="?page=kereta" class="<?php echo $penilaian1_1 ?>">
            <i class="bi bi-circle"></i><span>Form Kereta</span>
          </a>
        </li>
        <li>
          <a href="?page=rapor" class="<?php echo $penilaian1_2 ?>">
            <i class="bi bi-circle"></i><span>Form Rapor</span>
          </a>
        </li>
        <li>
          <a href="?page=kwalifikasi" class="<?php echo $penilaian1_3 ?>">
            <i class="bi bi-circle"></i><span>Form Kwalifikasi</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Penilaian 2 -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#penilaian-2" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Penilaian 2</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="penilaian-2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="?page=seragam" class="<?php echo $penilaian2_1 ?>">
            <i class="bi bi-circle"></i><span>Form Seragam</span>
          </a>
        </li>
        <li>
          <a href="?page=gaji" class="<?php echo $penilaian2_2 ?>">
            <i class="bi bi-circle"></i><span>Gaji Karyawan</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Table View -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#table-view" data-bs-toggle="collapse" href="#">
        <i class="bi bi-grid-3x3"></i><span>Table</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="table-view" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="?page=tabel_kereta" class="<?php echo $tableView_1 ?>">
            <i class="bi bi-circle"></i><span>View Kereta</span>
          </a>
        </li>
        <li>
          <a href="?page=tabel_rapor" class="<?php echo $tableView_2 ?>">
            <i class="bi bi-circle"></i><span>View Rapor</span>
          </a>
        </li>
        <li>
          <a href="?page=tabel_kwalifikasi" class="<?php echo $tableView_3 ?>">
            <i class="bi bi-circle"></i><span>View Kwalifikasi</span>
          </a>
        </li>
        <li>
          <a href="?page=tabel_seragam" class="<?php echo $tableView_4 ?>">
            <i class="bi bi-circle"></i><span>View Seragam</span>
          </a>
        </li>
        <li>
          <a href="?page=tabel_gaji" class="<?php echo $tableView_5 ?>">
            <i class="bi bi-circle"></i><span>View Gaji</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Sim Akademik -->
    <?php
    // Fetching 'bidang' for 'wakasek' from tb_wakasek table
    if (isset($_SESSION['user']) && $_SESSION['role'] == 'wakasek') {
      $query_wks = "SELECT bidang FROM tb_wakasek WHERE id_user = :id_user";
      $stmt_wks = $pdo->prepare($query_wks);
      $stmt_wks->bindParam(':id_user', $_SESSION['id'], PDO::PARAM_INT);
      $stmt_wks->execute();
      
      // Check if data exists
      $d_wks = $stmt_wks->fetch(PDO::FETCH_ASSOC);
      $bidang_wakasek = $d_wks ? $d_wks['bidang'] : "Bidang Tidak Terdeteksi!";  // Only assign bidang if data is returned
    }
    ?>

    <?php if (isset($_SESSION['user']) && in_array($_SESSION['role'], ['admin', 'petugas', 'wakasek', 'walikelas', 'siswa'])) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#sim_akademik" data-bs-toggle="collapse" href="#">
          <i class="bi bi-mortarboard"></i><span>Sim Akademik</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="sim_akademik" class="nav-content collapse" data-bs-parent="#sidebar-nav">

          <!-- Data User: Only for Admin -->
          <?php if ($_SESSION['role'] == 'admin') { ?>
            <li><a href="?page=user" class="<?php echo $simAkademik_1 ?>"><i class="bi bi-circle"></i><span>Data User</span></a></li>
          <?php } ?>

          <!-- Data Siswa: For Admin, Walikelas, Wakasek with bidang 2, and Siswa -->
          <?php if (in_array($_SESSION['role'], ['admin', 'walikelas', 'wakasek', 'siswa'])) {
            if ($_SESSION['role'] == 'wakasek' && $bidang_wakasek != 2) {
              // Wakasek should have bidang 2 to see this link
              $show_siswa = false;
            } else {
              $show_siswa = true;
            }
            if (isset($show_siswa) && $show_siswa) { ?>
              <li><a href="?page=siswa" class="<?php echo $simAkademik_2 ?>"><i class="bi bi-circle"></i><span>Data Siswa</span></a></li>
          <?php }
          } ?>

          <!-- Data Mata Pelajaran: For Admin and Wakasek with bidang 1 -->
          <?php if ($_SESSION['role'] == 'admin' || ($_SESSION['role'] == 'wakasek' && $bidang_wakasek == 1)) { ?>
            <li><a href="?page=mapel" class="<?php echo $simAkademik_3 ?>"><i class="bi bi-circle"></i><span>Data Mata Pelajaran</span></a></li>
          <?php } ?>

          <!-- Data Kelas: Only for Admin -->
          <?php if ($_SESSION['role'] == 'admin') { ?>
            <li><a href="?page=kelas" class="<?php echo $simAkademik_4 ?>"><i class="bi bi-circle"></i><span>Data Kelas</span></a></li>
          <?php } ?>

          <!-- Transaksi: For Admin, Petugas, Walikelas, Wakasek with bidang 3 or 4, and Siswa -->
          <?php if (in_array($_SESSION['role'], ['admin', 'petugas', 'walikelas', 'wakasek', 'siswa'])) {
            if ($_SESSION['role'] == 'wakasek' && !in_array($bidang_wakasek, [3, 4])) {
              // Wakasek should have bidang 3 or 4 to see this link
              $show_transaksi = false;
            } else {
              $show_transaksi = true;
            }
            if (isset($show_transaksi) && $show_transaksi) { ?>
              <li><a href="?page=transaksi" class="<?php echo $simAkademik_5 ?>"><i class="bi bi-circle"></i><span>Transaksi</span></a></li>
          <?php }
          } ?>

        </ul>
      </li>
    <?php } ?>




</aside>
<!-- Sidebar -->