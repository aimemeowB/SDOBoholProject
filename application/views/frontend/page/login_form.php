
<!DOCTYPE html>
<html lang="en">
<head>

  <title>SDO Bohol Action Research Repository</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link href="<?=base_url();?>assets/frontend/img/sdo_logo.png" rel="icon">

    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url();?>assets/frontend/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/frontend/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/frontend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- CSS File -->
  <link rel="stylesheet" href="<?=base_url();?>assets/frontend/css/style2.css">

</head>

<body style="background-image:url(<?=base_url();?>assets/frontend/img/sdo_office.png);">

    <div class="login" style="background: #ffffff90 !important;">
        <div class="login-header">
            <img src="<?=base_url();?>assets/frontend/img/sdo_logo.png" alt="">
            <h1>LOGIN FORM</h1>
        </div>
        <div>
          <h4>
            <label style="color: tomato;" ><center><?= $this->session->flashdata('error_msg');?></center></label>
          </h4> 
        </div>
        <form class="needs-validation" action="<?= base_url('index.php/do_login') ?>" method="post">
            <div class="form-group was-validated">
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="text" value="" name="user_deped_email" id="email" placeholder="Please enter your email" required>

            </div>
            <div class="form-group was-validated">
                <label class="form-label" for="password">Password:<a href="#" class="forgot_password" > Forgot Password?</a></label>
                <input class="form-control" type="password" id="password" name="user_password" placeholder="Please enter your password" required>

            </div>
            <button class="btn btn-success btn-sm w-100" type="submit" name="login_btn">Sign In</button>
            <div class="row">
                <a href="<?php echo base_url('index.php/registration'); ?>" id="to_sign_up">Click to Create Account.</a>
            </div>
        </form>


    </div>


    <!-- Vendor JS Files -->
  <script src="<?=base_url();?>assets/frontend/vendor/aos/aos.js"></script>
  <script src="<?=base_url();?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url();?>assets/frontend/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?=base_url();?>assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?=base_url();?>assets/frontend/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?=base_url();?>assets/frontend/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url();?>assets/frontend/js/main.js"></script>

  
</body>

</html>