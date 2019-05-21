<?php 
$login = $this->session->get_userdata();
$this->session->set_userdata('_current_link', current_url());
if (!isset($login['user_login']) || !isset($login['user_login_url']) || $login['user_login_url']!=base_url())
{
   redirect('admin/account');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>PVESER CMS | TRANG QUẢN TRỊ PVESER </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>public/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>public/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url(); ?>public/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url(); ?>public/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>public/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>public/build/css/custom.min.css" rel="stylesheet">
    <!-- dataTable -->
    <link href=" <?php echo base_url();?>public/Datatable/css/jquery.dataTables.min.css" rel="styleshee" >
    <link href=" <?php echo base_url();?>public/Datatable/css/dataTables.bootstrap.min.css" rel="stylesheet" >
    <link href=" <?php echo base_url(); ?>public/css/checkbox/checkbox.css " rel="stylesheet" >
    <link href=" <?php echo base_url(); ?>public/vendors/bootstrap-toggle-master/css/bootstrap-toggle.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href=" <?php echo base_url(); ?>admin/account/home  " class="site_title"><i class="fa fa-paw"></i> <span>PVESER CMS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src=" <?php echo base_url(); ?>public/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('user_info')['fullname'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Tổng quan</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i>Bảng điều khiển<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href=" <?php echo base_url(); ?>admin/account/home ">Trang chủ</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Quản lý thành viên <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href=" <?php echo base_url(); ?>admin/users/ "> <i class="fa fa-user"></i> Danh sách user admin </a></li>
                      <li><a href=" <?php echo base_url(); ?>admin/customers/ "> <i class="fa fa-user"></i> Danh sách khách hàng </a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-gift"></i> Quản lý gói dịch vụ<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href=" <?php echo base_url(); ?>admin/packages/ "> <i class="fa fa-gift"></i> Danh sách gói dịch vụ</a></li>
                      <li><a href=" <?php echo base_url(); ?>admin/customers_pack/ "> <i class="fa fa-gift"></i> Quản lý giao dịch gói dịch vụ</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-credit-card"></i>Phương thức thanh toán<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href=" <?php echo base_url(); ?>admin/payments/ "> <i class="fa fa-credit-card"></i> Danh sách phương thức</a></li>
                       <li><a href=" <?php echo base_url(); ?>admin/customers_pay/ "> <i class="fa fa-money"></i> Quản lý tài chính người dùng</a></li>
                    
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Bài viết <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.php">General Form</a></li>
                      <li><a href="form_buttons.php">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="media_gallery.php">Media Gallery</a></li>
                      <li><a href="icons.php">Icons</a></li>
                      <li><a href="glyphicons.php">Glyphicons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Bảng <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables_dynamic.php">Table Dynamic</a></li>
                    </ul>
                  </li>

                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Trang bổ sung <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="profile.php">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Trang thêm <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.php">403 Error</a></li>
                      <li><a href="page_404.php">404 Error</a></li>
                      <li><a href="page_500.php">500 Error</a></li>
                      <li><a href="login.php">Login Page</a></li>
                      <li><a href="pricing_tables.php">Pricing Tables</a></li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Đăng xuất" href=" <?php echo base_url(); ?>admin/account/logout ">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>public/images/img.jpg" alt=""><?php echo $this->session->userdata('user_info')['fullname'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Trang cá nhân</a></li>
                    <li><a href="<?php echo base_url() ?>admin/account/logout"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->