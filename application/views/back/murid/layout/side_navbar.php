<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <?php if($profile->foto == NULL){?>
          <img src="<?= base_url('assets/dist/img/nophoto.png') ?>" class="img-circle" alt="User Image">
        <?php } else{ ?>
          <img src="<?= base_url('assets/dist/img/profile/'.$profile->foto) ?>" class="img-circle" alt="User Image">
        <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?= $profile->nama_siswa ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?= site_url('murid')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
