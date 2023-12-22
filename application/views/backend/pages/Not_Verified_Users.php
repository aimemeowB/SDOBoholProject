<div class="pcoded-content">
  <div class="pcoded-inner-content">
    <div class="main-body">
      <div class="page-wrapper">
        <div class="page-body">
          <div class="row">
            <div class="container">
              <div class="col-md-12 mx-auto">
                <div class="card">
                  <div class="card-header bg-danger text-white">
                    <h3 class="card-title text-center">Not Verified Users</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th><strong><center>ID</center></strong></th>
                            <th><strong><center>Profile Image</center></strong></th>
                            <th><strong><center>Firstname</center></strong></th>
                            <th><strong><center>Middlename</center></strong></th>
                            <th><strong><center>Lastname</center></strong></th>
                            <th><strong><center>Address</center></strong></th>
                            <th><strong><center>Email</center></strong></th>
                            <th><strong><center>Status</center></strong></th>
                            <th><strong><center>Action</center></strong></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <?php foreach ($not_veriusers as $row ): ?>
                            <td><?php echo $row->user_id; ?></td>
                            <td><img src="<?php echo base_url();?>userprofile_folder/<?= $row->user_image_name; ?>" alt="image"></td>
                            <td><?php echo $row->user_firstname; ?></td>
                            <td><?php echo $row->user_middlename; ?></td>
                            <td><?php echo $row->user_lastname; ?></td>
                            <td><?php echo $row->user_barangay.", ".$row->user_municipality.", ".$row->user_zipcode; ?></td>
                            <td><?php echo $row->user_deped_email; ?></td>
                            <td><?php echo $row->user_status; ?></td>
                            <td>
                              <div class="d-flex justify-content-center">
                                <a href="<?php echo base_url('index.php/Admin_Controller/approveUser/' . $row->user_id); ?>"  class="btn btn-primary btn-sm mr-2">Approve</a>
                                <a href="<?php echo base_url('index.php/Admin_Controller/denyUser/' . $row->user_id); ?>" class="btn btn-info btn-sm">Deny</a>
                              </div>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="fixed-button">
              <a href="https://codedthemes.com/item/guru-able-admin-template/" target="_blank" class="btn btn-md btn-primary">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>