<header class="main-header">
    <!-- Logo -->
    <a href="<?= site_url('murid')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>IN</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Sistem Informasi Nilai</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php if($profile->foto == NULL){?>
              <img src="<?= base_url('assets/dist/img/nophoto.png') ?>" class="user-image" alt="User Image">
            <?php } else{ ?>
              <img src="<?= base_url('assets/dist/img/profile/'.$profile->foto) ?>" class="user-image" alt="User Image">
            <?php } ?>
              <span class="hidden-xs"><?= $profile->nama_siswa ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <?php if($profile->foto == NULL){ ?>
                <img src="<?= base_url('assets/dist/img/nophoto.png') ?>" class="img-circle" alt="User Image">
              <?php } else{?>
                <img src="<?= base_url('assets/dist/img/profile/'.$profile->foto) ?>" class="img-circle" alt="User Image">
              <?php } ?>
                <p>
                  <?= $profile->nama_siswa ?> - <?= $profile->nama_kelas ?>
                  <small>SMA Muhammadiyah Pleret</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="text-center">
                  <a href="<?= site_url('logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        
        </ul>
      </div>
    </nav>
  </header>