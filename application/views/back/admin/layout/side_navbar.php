<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/dist/img/nophoto.png') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i><span> Siswa</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?= site_url('admin')?>">
                <i class="fa fa-circle-o text-aqua"></i>
                <span>Pendaftaran Siswa</span>
              </a>
            </li>
            <li>
              <a href="<?= site_url('master_siswa')?>">
                <i class="fa fa-circle-o text-red"></i>
                <span>Master Siswa</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-mortar-board"></i><span> Guru</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?= site_url('tambah_guru')?>">
                <i class="fa fa-circle-o text-warning"></i>
                <span>Tambah Guru</span>
              </a>
            </li>
            <li>
              <a href="<?= site_url('master_guru')?>">
                <i class="fa fa-circle-o text-red"></i>
                <span>Master Guru</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?= site_url('mapel')?>">
            <i class="fa fa-book"></i><span> Mata Pelajaran</span>
          </a>
        </li>

        <!-- <li>
          <a href="<?= site_url('absensi')?>">
            <i class="fa fa-repeat"></i><span> Absensi</span>
          </a>
        </li> -->
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i><span> Kelas</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?= site_url('kelas')?>">
                <i class="fa fa-circle-o text-warning"></i>
                <span>Input Kelas</span>
              </a>
            </li>
            <li>
              <a href="<?= site_url('master_kelas')?>">
                <i class="fa fa-circle-o text-info"></i>
                <span>Master Kelas</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?= site_url('laporan_nilai')?>">
            <i class="fa fa-file-text"></i>
            <span>Laporan</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
