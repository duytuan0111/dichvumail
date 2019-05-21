<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PVESER CMS | LOGIN </title>


  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url(); ?>public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url(); ?>public/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?php echo base_url(); ?>public/vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url(); ?>public/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <?php 
  if (validation_errors()!='')
  {
    ?>
    <div class="alert alert-warning"><?php echo validation_errors(); ?></div>
    <?php
  }

  if ($this->session->flashdata('msg_login_warning'))
  {
    ?>
    <div class="alert alert-warning text-center">
      <?php 
      echo $this->session->flashdata('msg_login_warning');
      ?>
    </div>
  <?php } ?>

  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action=" <?php echo base_url(); ?>admin/account/login " method="post">
            <h1>ĐĂNG NHẬP</h1>
            <div>
              <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" required="" />
            </div>
            <div>
              <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required="" />
            </div>
            <div>
             <button type="submit" class="btn btn-success">Đăng nhập</button>
              <a class="reset_pass" href="#">Quên mật khẩu?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Bạn chưa có tài khoản?
                <a href="#signup" class="to_register"> Đăng ký </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-paw"></i> PVESER COMPANY </h1>
                <p>©2019 All Rights Reserved. PVESER CMS! </p>
              </div>
            </div>
          </form>
        </section>
      </div>

      <div id="register" class="animate form registration_form">
        <section class="login_content">
          <form>
            <h1>Đăng ký tài khoản</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" />
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <a class="btn btn-default submit" href="index.php">Đăng ký</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Bạn đã là thành viên ?
                <a href="#signin" class="to_register"> Đăng nhập </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-paw"></i> PVESER COMPANY </h1>
                <p>©2019 All Rights Reserved. PVESER CMS! </p>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>
</html>
