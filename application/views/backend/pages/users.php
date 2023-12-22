<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <!-- Danger-color Breadcrumb card start -->
                    <div class="card borderless-card">
                        <div class="card-block inverse-breadcrumb">
                            <div class="breadcrumb-header">
                                <div class="page-header-title">
                                    <div class="col-lg-4">
                                        <i class="ti-user bg-c-blue"></i>
                                    </div>
                                    <div class="col-lg-8">
                                        <h2>Users</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Danger-color Breadcrumb card end -->
                    <div class="row justify-content-center">
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-6">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-users-social bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">All Users</span>

                                      <?php
                                      $connection = mysqli_connect("localhost","root","","sdo");

                                      $query = "SELECT * FROM tblusers";
                                     $query_run = mysqli_query($connection, $query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>
                                    
            
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                              <a href="<?=base_url();?>index.php/all_users" type="button" class="btn btn-gradient-info btn-rounded btn-fw">Browse</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-6">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-users bg-c-green card1-icon"></i>
                                    <span class="text-c-green f-w-600">Verified Users</span>

                                      <?php
                                      $connection = mysqli_connect("localhost","root","","sdo");

                                      $query = "SELECT * FROM tblusers WHERE user_status = 'Approved'";
                                     $query_run = mysqli_query($connection, $query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>
                                    
            
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                              <a href="<?=base_url();?>index.php/admin_table" type="button" class="btn btn-gradient-success btn-rounded btn-fw">Browse</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-6">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-people bg-c-yellow card1-icon"></i>
                                    <span class="text-c-yellow f-w-600">Not Verified Users</span>
                                   
                                      <?php
                                      $connection = mysqli_connect("localhost","root","","sdo");

                                     $query = "SELECT * FROM tblusers WHERE user_status = 'Pending'";
                                     $query_run = mysqli_query($connection, $query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                             <a href="<?=base_url();?>index.php/not_veriusers" type="button"  class="btn btn-gradient-warning btn-rounded btn-fw">Browse</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-6">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-warning bg-c-pink card1-icon"></i>
                                    <span class="text-c-pink f-w-600">Denied Users</span>
                                   
                                      <?php
                                      $connection = mysqli_connect("localhost","root","","sdo");

                                     $query = "SELECT * FROM tblusers WHERE user_status = 'Denied'";
                                     $query_run = mysqli_query($connection, $query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                             <a href="<?=base_url();?>index.php/denied_users" type="button"  class="btn btn-gradient-danger btn-rounded btn-fw">Browse</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <div class="col-md-12 col-xl-6">
                          <div class="card dribble-card">
                            <div class="card-header">
                                <i class="ti-stats-up"></i>
                                <div class="d-inline-block">
                                    <h5>Statistics</h5>
                                    <span>User/s with the most number of uploaded research papers</span>
                                </div>
                            </div>
                            <div class="card-block text-center">
                                <div class="row">
                                    <div class="col-6 b-r-default">
                                        <h2>
                                            <?php echo $user_id = $this->Admin_users_model->user_with_most_uploads(); ?>
                                        </h2>
                                        <p class="text-muted">User ID</p>
                                    </div>
                                    <div class="col-6">
                                        <h2>
                                          <?php echo $user_username = $this->Admin_users_model->get_user_username($user_id); ?>
                                          </h2>
                                        <p class="text-muted">Username</p>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 col-xl-6">
                          <div class="card dribble-card">
                            <div class="card-header">
                                <i class="ti-stats-down"></i>
                                <div class="d-inline-block">
                                    <h5>Statistics</h5>
                                    <span>User/s with the least number of uploaded research papers</span>
                                </div>
                            </div>
                            <div class="card-block text-center">
                                <div class="row">
                                    <div class="col-6 b-r-default">
                                        <h2>
                                          <?php echo $user_id = $this->Admin_users_model->user_with_least_uploads(); ?>
                                        </h2>
                                        <p class="text-muted">User ID</p>
                                    </div>
                                    <div class="col-6">
                                        <h2>
                                          <?php echo $user_username = $this->Admin_users_model->get_user_username($user_id); ?>
                                        </h2>
                                        <p class="text-muted">Username</p>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>