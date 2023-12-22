
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

  <div class="reg_form" style="background: #ffffff90 !important;" >
    <div class="reg_form-header">
      <img src="<?=base_url();?>assets/frontend/img/sdo_logo.png" alt="">
        <h1>REGISTRATION FORM</h1>
    </div>
      <?php echo $error_msg = null; ?> 
      <?php echo form_open('Users_Controller/insert_user_info', array('enctype' => 'multipart/form-data')); ?>
        <div class="row">
          <label class="form-label" for="name">Name:</label>
          <div class="col-md-4">
            <div class="form-group was-validated">
                <input class="form-control" type="text" value="" name="user_lastname" id="lastname" placeholder="Last Name" required>
                <!-- <label class="form-label" for="lname">Last Name</label> -->
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group was-validated">
                <input class="form-control" type="text" value="" name="user_firstname" id="firstname" placeholder="First Name" required>
                <!-- <label class="form-label" for="fname">First Name</label> -->
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group was-validated">
                <input class="form-control" type="text" value="" name="user_middlename" id="middlename" placeholder="Middle Name" required>
                <!-- <label class="form-label" for="fname">Middle Name</label> -->
            </div>
          </div>
        </div>

        <div class="row">
          <label class="form-label" for="address">Address:</label>
          <div class="col-md-4">
            <div class="form-group was-validated">
              <label class="form-label" for="municipality">Municipality:</label>
              <select class="form-control" type="text" value="" name="user_municipality" id="municipality" placeholder="Municipality" required>
                <option disabled selected>Select Municipality</option>
                <?php foreach ($municipality as $row): ?>
                    <option value="<?php echo $row['municipality']; ?>"><?php echo $row['municipality']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group was-validated">
              <label class="form-label" for="barangay">Barangay:</label>
              <select class="form-control" type="text" value="" name="user_barangay" id="barangay" placeholder="Barangay" required>
              <option disabled selected>Select Barangay</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group was-validated">
              <label class="form-label" for="zipcode">ZIP Code:</label>
              <select class="form-control" type="text" value="" name="user_zipcode" id="zipcode" placeholder="Zip Code" required>
              <option disabled selected>Select ZIP Code</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group was-validated">
              <label class="form-label" for="birthday">Birthday:</label>
              <input class="form-control hasDatepicker" type="date" value="" name="user_birthday" id="birthday"  placeholder="Select birth date" data-dateformat="dd/mm/yyyy" autocomplete="off" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group was-validated">
              <label class="form-label" for="age">Age:</label>
              <input class="form-control" type="number" value="" min="11" max="65" name="user_age" id="age" placeholder="Age" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group was-validated">
                <label class="form-label" for="district">District:</label>
                <select class="form-control" type="text" value="" name="user_district" id="district"placeholder="District" required>
                  <option disabled selected>Select District</option>
                  <?php foreach ($district as $row): ?>
                      <option value="<?php echo $row['district']; ?>"><?php echo $row['district']; ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group was-validated">
                <label class="form-label" for="school">School:</label>
                <input class="form-control" type="text" value="" name="user_school" id="school" placeholder="School" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group was-validated">
                <label class="form-label" for="email">DepEd Email:</label>
                <input class="form-control" type="email" value="" name="user_deped_email" id="email" placeholder="DepEd Email" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group was-validated">
              <label class="form-label" for="username">Username:</label>
              <input class="form-control" type="text" value="" name="user_username" id="username" placeholder="Username" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group was-validated">
              <label class="form-label" for="password">Password: </label>
              <input class="form-control" type="password" id="password" name="user_password" placeholder="Password" required>
              <!--<div class="input-group-append">
                <button class="btn btn-outline-secondary custom-button" type="button" id="password-toggle" onclick="togglePassword()">Show</button>
              </div>-->
            </div>
          </div>
        </div>
        <div class="row">
          <center>
            <div class="col-md-6">
              <label class="form-label" for="profile">Profile Picture:</label>
              <img id="file1" width="150" height="80"> <br><br>
              <input class="form-control" type="file" name="user_profile" id="user_profile" accept=".jpg,.png,.jpeg,.gif" onchange="document.getElementById('file1').src = window.URL.createObjectURL(this.files[0]), validate()" required>
              <br><font color="#FF3300"><span id="file_error"></span></font>
            </div>
          </center> 
        </div>
        <center>
          <button class="btn btn-success btn-outline-dark btn-lg" style="width:20%;" type="submit" name="register_btn" id="register_btn">SUBMIT</button>
        </center>
        <center>
          <button class="btn btn-light btn-outline-secondary btn-sm" style="width:20%;" type="reset" name="reset_btn" id="reset_btn">Clear Form</button>
        </center>
      <div class="row">
          <a href="<?php echo base_url('index.php/login'); ?>" id="to_login">Already have an account?</a>
      </div>
    <?php echo form_close(); ?>

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

    <script src="<?=base_url();?>assets/frontend/vendor/bootstrap/js/code.jquery.com_jquery-3.7.0.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
    <script>
        $(document).ready(function() {
            $("#municipality").on("change", function() {
                var municipality = $(this).val();
                if (municipality !== "") {
                    $.ajax({
                        url: "<?php echo base_url('index.php/get_barangay'); ?>",
                        type: "POST",
                        data: { municipality: municipality },
                        dataType: "json",
                        success: function(data) {
                            $("#barangay").empty();
                            $("#barangay").append('<option value="">Select Barangay</option>');
                            $.each(data, function(key, value) {
                                $("#barangay").append('<option value="' + value.barangay + '">' + value.barangay + '</option>');
                            });
                        }
                    });

                    $.ajax({
                        url: "<?php echo base_url('index.php/get_zipcode'); ?>",
                        type: "POST",
                        data: { municipality: municipality },
                        dataType: "json",
                        success: function(data) {
                            $("#zipcode").empty();
                            $("#zipcode").append('<option value="">Select Zipcode</option>');
                            $.each(data, function(key, value) {
                                $("#zipcode").append('<option value="' + value.zipcode + '">' + value.zipcode + '</option>');
                            });
                        }
                    });
                } else {
                    $("#barangay").empty();
                    $("#zipcode").empty();
                    $("#barangay").append('<option value="">Select Barangay</option>');
                    $("#zipcode").append('<option value="">Select Zipcode</option>');
                }
            });

        });
    </script>


    
</body>

</html>