<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
  <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
  <meta name="author" content="Themesbox">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title><?= isset($title)? $title.' - ' : 'Title -' ?> <?= $this->general_settings['application_name']; ?></title>
  <!-- Fevicon -->
  <link rel="shortcut icon" href="<?= base_url()?>assets/images/favicon.ico">
  <!-- Start css -->
  <link href="<?= base_url()?>assets/plugins/switchery/switchery.min.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/plugins/pnotify/css/pnotify.custom.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
  <!-- DataTables css -->
    <link href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url()?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 <!-- 
  <link href="< ?= base_url()?>assets/plugins/slick/slick.css" rel="stylesheet">
  <link href="< ?= base_url()?>assets/plugins/slick/slick-theme.css" rel="stylesheet"> -->
  <link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url()?>assets/css/icons.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url()?>assets/css/flag-icon.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet" type="text/css">
  <!-- End css -->
  <script src="<?= base_url()?>assets/js/jquery.min.js"></script>

  <script>

    var base_url = "<?php echo base_url();?>";     

    </script>

</head>

<body class="vertical-layout <?=  (isset($bg_cover)) ? 'bg-cover' : '' ?>">

<!-- Start Infobar Setting Sidebar -->
    <!-- Start Containerbar -->
    <div id="containerbar">
        <!-- Start Leftbar -->
        <?php if(!isset($navbar)): ?>
        <div class="leftbar">
            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Logobar -->
                <div class="logobar">
                    <a href="index.html" class="logo logo-large"><img src="<?= base_url($this->general_settings['favicon']); ?>" class="img-fluid" alt="logo"></a>
                    <a href="index.html" class="logo logo-small"><img src="<?= base_url($this->general_settings['favicon']); ?>" class="img-fluid" alt="logo"></a>
                </div>
                <!-- End Logobar -->
                <!-- Start Navigationbar -->
                <div class="navigationbar">
                    <ul class="vertical-menu">
                        <?php 
                          $menu = get_sidebar_menu(); 

                          foreach ($menu as $nav):

                            $sub_menu = get_sidebar_sub_menu($nav['module_id']);

                            $has_submenu = (count($sub_menu) > 0) ? true : false;
                        ?>

                        <?php if($this->rbac->check_module_permission($nav['controller_name'])): ?> 
                        <li id="<?= ($nav['controller_name']) ?>" class="nav-item <?= ($has_submenu) ? 'has-treeview' : '' ?>">
                            <a href="<?= base_url('admin/'.$nav['controller_name']) ?>">
                                <i class="fa <?= $nav['fa_icon'] ?>"></i>
                              <!-- <img src="< ?= base_url()?>assets/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"> -->
                              <span><?= ucfirst(str_replace( '_',' ',$nav['module_name'] )) ?></span>
                              <i class="feather <?= ($has_submenu) ? 'icon-chevron-right' : '' ?> pull-right"></i>
                            </a>
                            <?php 
                                if($has_submenu): 
                            ?>
                            <ul class="vertical-submenu">
                                <?php foreach($sub_menu as $sub_nav): ?>
                                <li><a href="<?= base_url('admin/'.$nav['controller_name'].'/'.$sub_nav['link']); ?>"><?= ucfirst(str_replace( '_',' ',$sub_nav['name'] )) ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                            <?php endif; ?>

                        <?php endforeach; ?>                                       
                    </ul>
                </div>
                <!-- End Navigationbar -->
            </div>
            <!-- End Sidebar -->
        </div>
        
        <!-- End Leftbar -->
        <!-- Start Rightbar -->
        <div class="rightbar">
            <!-- Start Topbar Mobile -->
            <div class="topbar-mobile">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="mobile-logobar">
                            <a href="index.html" class="mobile-logo"><img src="<?= base_url($this->general_settings['favicon']); ?>" class="img-fluid" alt="logo"></a>
                        </div>
                        <div class="mobile-togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="topbar-toggle-icon">
                                        <a class="topbar-toggle-hamburger" href="javascript:void();">
                                            <img src="<?= base_url()?>assets/images/svg-icon/horizontal.svg" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                            <img src="<?= base_url()?>assets/images/svg-icon/verticle.svg" class="img-fluid menu-hamburger-vertical" alt="verticle">
                                         </a>
                                     </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                            <img src="<?= base_url()?>assets/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                            <img src="<?= base_url()?>assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                         </a>
                                     </div>
                                </li>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Topbar -->
            <div class="topbar">
                <!-- Start row -->
                <div class="row align-items-center">
                    <!-- Start col -->
                    <div class="col-md-12 align-self-center">
                        <div class="togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                           <img src="<?= base_url()?>assets/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                           <img src="<?= base_url()?>assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                         </a>
                                     </div>
                                </li>
                            </ul>
                        </div>
                        <div class="infobar">
                            <ul class="list-inline mb-0">
                                <!-- <li class="list-inline-item">
                                    <div class="languagebar">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="languagelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag flag-icon-us flag-icon-squared"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagelink">
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-us flag-icon-squared"></i>English</a>
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-de flag-icon-squared"></i>German</a>
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-bl flag-icon-squared"></i>France</a>
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-ru flag-icon-squared"></i>Russian</a>                                                
                                            </div>
                                        </div>
                                    </div>                                   
                                </li> -->
                                <li class="list-inline-item">
                                    <div class="profilebar">
                                        <div class="dropdown">
                                          <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url()?>assets/images/users/profile.svg" class="img-fluid" alt="profile"><span class="feather icon-chevron-down live-icon"></span></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                                <div class="dropdown-item">
                                                    <div class="profilename">
                                                      <h5><?php echo ucwords($this->session->userdata('username')); ?></h5>
                                                    </div>
                                                </div>
                                                <div class="userbox">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="media dropdown-item">
                                                            <a href="<?= base_url('admin/profile'); ?>" class="profile-icon"><img src="<?= base_url()?>assets/images/svg-icon/user.svg" class="img-fluid" alt="user">My Profile</a>
                                                        </li>
                                                        <li class="media dropdown-item">
                                                            <a href="<?= base_url('admin/profile/change_pwd'); ?>" class="profile-icon"><img src="<?= base_url()?>assets/images/svg-icon/user.svg" class="img-fluid" alt="user">Change Password</a>
                                                        </li>
                                                        <li class="media dropdown-item">
                                                            <a href="<?= base_url('admin/auth/logout') ?>" class="profile-icon"><img src="<?= base_url()?>assets/images/svg-icon/logout.svg" class="img-fluid" alt="logout">Logout</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                   
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End col -->
                </div> 
                <!-- End row -->
            </div>
            <!-- End Topbar -->
            
           
            <?php endif; ?>