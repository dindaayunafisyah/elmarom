  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


      <div data-active-color="white" data-background-color="crystal-clear" data-image="<?php echo base_url('backend/app-assets/img/sidebar-bg/08.jpg') ?>" class="app-sidebar">
        <div class="sidebar-header">
          <div class="logo clearfix"><a href="<?php echo base_url('admin/Dashboard'); ?>" class="logo-text float-left">
              <div class="logo-img"><img src="<?php echo base_url('backend/app-assets/img/logo.png') ?>" alt="Convex Logo" /></div><span class="text align-middle">ElMarom</span>
            </a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="ft-disc toggle-icon"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-circle"></i></a></div>
        </div>
        <div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
              <li class="nav-item"><a href="<?php echo base_url('admin/Dashboard') ?>"><i class="icon-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
              <li class=" nav-item"><a href="<?php echo base_url('admin/Produk') ?>"><i class="icon-layers"></i><span data-i18n="" class="menu-title">Produk</span></a>
              <li class=" nav-item"><a href="<?php echo base_url('admin/Kategori') ?>"><i class="icon-grid"></i><span data-i18n="" class="menu-title">Kategori</span></a>
              <li class=" nav-item"><a href="<?php echo base_url('admin/Kontak') ?>"><i class="icon-envelope-letter"></i><span data-i18n="" class="menu-title">Kontak</span></a>
              <li class=" nav-item"><a href="<?php echo base_url('admin/Login/logout') ?>"><i class="icon-logout"></i><span data-i18n="" class="menu-title">Logout</span></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="sidebar-background"></div>
      </div>

      <nav class="navbar navbar-expand-lg navbar-light bg-faded">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><span class="d-lg-none navbar-right navbar-collapse-toggle"><a class="open-navbar-container"><i class="ft-more-vertical"></i></a></span>
          </div>
          <div class="navbar-container">
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
              <ul class="navbar-nav">
                <li class="dropdown nav-item mt-1"><a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-bell blue-grey darken-4"></i>
                    <span class="notification badge badge-pill badge-danger"><?php echo $total_pesan ?></span>

                    <p class="d-none">Notifications</p>
                  </a>


                </li>
                <li class="dropdown nav-item mr-0"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-user-link dropdown-toggle"><span class="avatar avatar-online"><img id="navbar-avatar" src="<?php echo base_url()  . 'backend/imgUser/' . $user['gambar']; ?>" alt="avatar" /></span>
                    <p class="d-none">User Settings</p>
                  </a>
                  <div aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-right">
                    <div class="arrow_box_right"><a href="<?php echo base_url('admin/Dashboard/profil') ?>" class="dropdown-item py-1"><i class="ft-edit mr-2"></i><span>My Profile</span></a>
                      <div class="dropdown-divider"></div><a href="<?php echo base_url('admin/Login/logout') ?>" class="dropdown-item"><i class="ft-power mr-2"></i><span>Logout</span></a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>