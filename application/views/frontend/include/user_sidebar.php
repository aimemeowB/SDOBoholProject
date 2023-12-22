      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php foreach ($user_data as $key => $userData): ?>
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="<?php echo base_url();?>userprofile_folder/<?= $userData->user_image_name; ?>" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $userData->user_username; ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url();?>index.php/home">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url();?>index.php/works">
                <span class="menu-title">My Research Papers</span>
                <i class="mdi mdi-file-multiple menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url();?>index.php/upload_form">
                <span class="menu-title">Upload Research Work</span>
                <i class="mdi mdi-upload menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url();?>index.php/profile">
                <span class="menu-title">My Profile</span>
                <i class="mdi mdi-account-circle menu-icon"></i>
              </a>
            </li>
           
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                
                
                <div class="mt-4">
                 
                  <ul class="gradient-bullet-list mt-4">
                   
                  </ul>
                </div>
              </span>
            </li>
          </ul>
        </nav>
        <?php endforeach; ?>