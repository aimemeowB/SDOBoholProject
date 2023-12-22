        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-success text-white me-2">
                  <i class="mdi mdi-tooltip-edit"></i>
                </span> Update Profile Information
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                </ul>
              </nav>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h1 class="display-2">Profile Information</h1>
                    <p class="card-description"> Update your profile information... </p>
      <?php echo form_open('Users_Controller/edit_profile_info', array('enctype' => 'multipart/form-data')); ?>
      <?php foreach ($user_data as $key => $userData): ?>
        <div class="row">
          <center>
            <img class="" height="200" width="200" style="border-radius: 100%;" id="file1" src="<?php echo base_url();?>userprofile_folder/<?= $userData->user_image_name; ?>">
            <br>
            <button class="mdi mdi-plus-circle" style="border-style: none; max-height: 200px; max-width: 200px; border-radius: 100%;">
              <input type="file" name="user_profile" id="user_profile" accept=".jpg,.png,.jpeg,.gif" onchange="document.getElementById('file1').src = window.URL.createObjectURL(this.files[0]), validate()" required>
            </button>
          </center>
        </div>
        <br><br>
        <div class="row">
          <label class="form-label" for="name">Name:</label>
          <div class="col-md-4">
            <div class="form-group was-validated">
                <input class="form-control" type="text" value="<?php echo $userData->user_lastname; ?>" name="user_lastname" id="lastname" placeholder="Last Name" required>
                <!-- <label class="form-label" for="lname">Last Name</label> -->
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group was-validated">
                <input class="form-control" type="text" value="<?php echo $userData->user_firstname; ?>" name="user_firstname" id="firstname" placeholder="First Name" required>
                <!-- <label class="form-label" for="fname">First Name</label> -->
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group was-validated">
                <input class="form-control" type="text" value="<?php echo $userData->user_middlename; ?>" name="user_middlename" id="middlename" placeholder="Middle Name" required>
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
              <label class="form-label" for="zipcode">Zip Code:</label>
              <select class="form-control" type="text" value="" name="user_zipcode" id="zipcode" placeholder="Zip Code" required>
              <option disabled selected>Select Zipcode</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group was-validated">
              <label class="form-label" for="birthday">Birthday:</label>
              <input class="form-control hasDatepicker" type="date" value="<?php echo $userData->user_birthday; ?>" name="user_birthday" id="birthday"  placeholder="Select birth date" data-dateformat="dd/mm/yyyy" autocomplete="off" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group was-validated">
              <label class="form-label" for="age">Age:</label>
              <input class="form-control" type="number" value="<?php echo $userData->user_age; ?>" min="11" max="65" name="user_age" id="age" placeholder="Age" required>
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
                <input class="form-control" type="text" value="<?php echo $userData->user_school; ?>" name="user_school" id="school" placeholder="School" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group was-validated">
                <label class="form-label" for="email">DepEd Email:</label>
                <input class="form-control" type="email" value="<?php echo $userData->user_deped_email; ?>" name="user_deped_email" id="email" placeholder="Please Enter your Email" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group was-validated">
              <label class="form-label" for="username">Username:</label>
              <input class="form-control" type="text" value="<?php echo $userData->user_username; ?>" name="user_username" id="username" placeholder="Username" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group was-validated">
              <label class="form-label" for="password">Password:</label>
              <input class="form-control" type="password" value="<?php echo $userData->user_password; ?>" id="password" name="user_password" placeholder="Please Enter your Password" required>
            </div>
          </div>
        </div>
        <center>
          <button class="btn btn-gradient-success btn-rounded btn-fw btn-lg" style="width:20%;" type="submit" name="update_btn" id="update_btn">SUBMIT</button>
        </center>
        <br>
        <center>
          <button class="btn btn-gradient-light btn-outline-secondary btn-rounded btn-sm" style="width:20%;" type="reset" name="reset_btn" id="reset_btn">Clear Form</button>
        </center>
        <?php endforeach; ?>
    <?php echo form_close(); ?>
          </div>
        </div>
      </div>

    <script src="<?=base_url();?>assets/frontend/vendor/bootstrap/js/code.jquery.com_jquery-3.7.0.min.js"></script>

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
