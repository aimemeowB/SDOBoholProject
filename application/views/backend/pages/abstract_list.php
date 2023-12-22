<div class="pcoded-content">
  <div class="pcoded-inner-content">
    <div class="main-body">
      <div class="page-wrapper">
        <div class="page-body">
          <div class="row">
            <div class="container">
              <div class="col-md-12 mx-auto">
                <div class="card">
                  <div class="card-header bg-light text-white">
                    <h3 class="card-title text-center">Abstract List</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th><strong><center>Research Paper ID</center></strong></th>
                            <th><strong><center>Research Title</center></strong></th>
                            <th><strong><center>Abstract Name</center></strong></th>
                            <th><strong><center>Status</center></strong></th>
                            <th><strong><center>Action</center></strong></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <?php foreach ($abstract as $row ): ?>
                            <td><?php echo $row->rpaper_id; ?></td>
                            <td><?php echo $row->title; ?></td>
                            <td><?php echo $row->abstract_name; ?></td>
                            <td><?php echo $row->status; ?></td>
                            <td>
                              <?php
                                $rpaper_id = $row->rpaper_id;
                                $abstract_name = $this->Admin_users_model->get_abstract_name($rpaper_id);
                                $link = base_url('abstract_folder/' . $abstract_name);
                              ?>
                              <div class="d-flex justify-content-center">
                                <a class="btn btn-info btn-sm" href="<?php echo $link; ?>" target="_blank" rel="noopener noreferrer">View</a>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>