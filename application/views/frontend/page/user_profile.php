<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-success text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> My Profile
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
        </ul>
      </nav>
    </div>
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form class="forms-sample" method="get">
            <?php foreach ($user_data as $key => $userData): ?>
              <center><img class="" height="200" width="200" style="border-radius: 100%;" id="file1" src="<?php echo base_url();?>userprofile_folder/<?= $userData->user_image_name; ?>"></center>
              <br><br><br>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <center>
                    <label for="title">Name:</label>
                    <br>
                    <div class="font-weight-bold display-4">
                      <?php echo $userData->user_firstname; ?> <?php echo $userData->user_middlename; ?> <?php echo $userData->user_lastname; ?>
                    </div>
                    <br>
                    <hr>
                  </center>
                </div>
                <div class="form-group">
                  <center>
                    <label for="year">Address: </label>
                    <br>
                    <div class="font-weight-bold display-4">
                      <?php echo $userData->user_barangay; ?>, <?php echo $userData->user_municipality; ?> <?php echo $userData->user_zipcode; ?>
                    </div>
                    <br>
                    <hr>
                  </center>
                </div>
                <div class="form-group">
                  <center>
                    <label for="author">Birthday: </label>
                    <br>
                    <div class="font-weight-bold display-4">
                      <?php echo $userData->user_birthday; ?>
                    </div>
                    <br>
                    <hr>
                  </center>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <center>
                    <label for="abstract">Age: </label>
                    <br>
                    <div class="font-weight-bold display-4">
                      <?php echo $userData->user_age; ?>
                    </div>
                    <br>
                    <hr>
                  </center>
                </div>
                <div class="form-group">
                  <center>
                    <label for="keywords">District:</label>
                    <br>
                    <div class="font-weight-bold display-4">
                      <?php echo $userData->user_district; ?>
                    </div>
                    <br>
                    <hr>
                  </center>
                </div>
                <div class="form-group">
                  <center>
                    <label for="file">School:</label>
                    <br>
                    <div class="font-weight-bold display-4">
                      <?php echo $userData->user_school; ?>
                    </div>
                    <br>
                    <hr>
                  </center>
                </div>
              </div>
            </div>
            <div class="row">
              <center>
                <div class="col-md-6">
                  <a href="<?=base_url();?>index.php/update_profile" type="submit" class="btn btn-gradient-success btn-rounded btn-fw" name="submit" value="">Update Profile</a>
                </div>
              </center>
            </div>
            <?php endforeach; ?>
          </form>
        </div>
      </div>
    </div>
  </div>
