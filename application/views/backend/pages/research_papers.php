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
                                        <i class="ti-files bg-c-blue"></i>
                                    </div>
                                    <div class="col-lg-8">
                                        <h2>Research Papers</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Danger-color Breadcrumb card end -->
                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-6">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-papers bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">All Research Papers</span>

                                      <?php
                                      $connection = mysqli_connect("localhost","root","","sdo");

                                      $query = "SELECT * FROM tblresearchpapers";
                                     $query_run = mysqli_query($connection, $query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>
                                    
            
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                              <a href="<?=base_url();?>index.php/all_research_papers" type="button" class="btn btn-gradient-info btn-rounded btn-fw">Browse</a>
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
                                    <i class="icofont icofont-paper bg-c-green card1-icon"></i>
                                    <span class="text-c-green f-w-600">Completed Research Papers</span>
                                      <?php
                                      $connection = mysqli_connect("localhost","root","","sdo");

                                     $query = "SELECT * FROM tblresearchpapers WHERE status = 'Completed'";
                                     $query_run = mysqli_query($connection, $query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                     <a href="<?=base_url();?>index.php/completed_research_papers" type="button"  class="btn btn-gradient-success btn-rounded btn-fw">Browse</a>
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
                                    <i class="icofont icofont-cloud-upload bg-info card1-icon"></i>
                                    <span class="text-info f-w-600">Uploaded Full Documents</span>
                                  <?php
                                      $connection = mysqli_connect("localhost","root","","sdo");

                                     $query = "SELECT full_document_name FROM tblresearchpapers WHERE full_document_name IS NOT NULL";
                                     $query_run = mysqli_query($connection, $query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                             <a href="<?=base_url();?>index.php/all_fulldocument" type="button"  class="btn btn-gradient-info btn-rounded btn-fw">Browse</a>
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
                                    <i class="icofont icofont-cloud-upload bg-info card1-icon"></i>
                                    <span class="text-info f-w-600">Uploaded Abstract</span>
                                  <?php
                                      $connection = mysqli_connect("localhost","root","","sdo");

                                     $query = "SELECT abstract_name FROM tblresearchpapers";
                                     $query_run = mysqli_query($connection, $query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                             <a href="<?=base_url();?>index.php/all_abstract" type="button"  class="btn btn-gradient-info btn-rounded btn-fw">Browse</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                    </div>
                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-4 col-xl-4">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-ui-file bg-inverse card1-icon"></i>
                                    <span class="text-c-dark f-w-600">Approved Abstract</span>
                                      <?php
                                      $connection = mysqli_connect("localhost","root","","sdo");

                                     $query = "SELECT * FROM tblresearchpapers WHERE status = 'Approved'";
                                     $query_run = mysqli_query($connection, $query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                     <a href="<?=base_url();?>index.php/approved_abstract_table" type="button"  class="btn btn-gradient-dark btn-rounded btn-fw">Browse</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-4 col-xl-4">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-file-text bg-c-yellow card1-icon"></i>
                                    <span class="text-c-yellow f-w-600">Pending Abstract</span>
                                  <?php
                                      $connection = mysqli_connect("localhost","root","","sdo");

                                     $query = "SELECT * FROM tblresearchpapers WHERE status = 'Pending'";
                                     $query_run = mysqli_query($connection, $query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                             <a href="<?=base_url();?>index.php/Abstract_table" type="button"  class="btn btn-gradient-warning btn-rounded btn-fw">Browse</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-4 col-xl-4">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-warning bg-c-pink card1-icon"></i>
                                    <span class="text-c-pink f-w-600">Rejected Abstract</span>
                                   
                                      <?php
                                      $connection = mysqli_connect("localhost","root","","sdo");

                                     $query = "SELECT * FROM tblresearchpapers WHERE status = 'Rejected'";
                                     $query_run = mysqli_query($connection, $query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                             <a href="<?=base_url();?>index.php/rejected_research_papers" type="button"  class="btn btn-gradient-danger btn-rounded btn-fw">Browse</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>