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
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#sim_akademik" data-bs-toggle="collapse" href="#">
        <i class="bi bi-mortarboard"></i><span>Sim Akademik</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="sim_akademik" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="?page=user" class="<?php echo $simAkademik_1 ?>">
            <i class="bi bi-circle"></i><span>Data User</span>
          </a>
        </li>
        <li>
          <a href="?page=siswa" class="<?php echo $simAkademik_2 ?>">
            <i class="bi bi-circle"></i><span>Data Siswa</span>
          </a>
        </li>
        <li>
          <a href="?page=mapel" class="<?php echo $simAkademik_3 ?>">
            <i class="bi bi-circle"></i><span>Data Mata Pelajaran</span>
          </a>
        </li>
        <li>
          <a href="?page=kelas" class="<?php echo $simAkademik_4 ?>">
            <i class="bi bi-circle"></i><span>Data Kelas</span>
          </a>
        </li>
        <li>
          <a href="?page=nilai" class="<?php echo $simAkademik_5 ?>">
            <i class="bi bi-circle"></i><span>Data Nilai</span>
          </a>
        </li>
        <li>
          <a href="?page=bayar" class="<?php echo $simAkademik_6 ?>">
            <i class="bi bi-circle"></i><span>Data Bayar</span>
          </a>
        </li>
      </ul>
    </li>

  </ul>

</aside>
<!-- Sidebar -->