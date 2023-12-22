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
                    <h3 class="card-title text-center">All Research Papers</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th><strong><center>Research Paper ID</center></strong></th>
                            <th><strong><center>Date Uploaded</center></strong></th>
                            <th><strong><center>Research Title</center></strong></th>
                            <th><strong><center>Year</center></strong></th>
                            <th><strong><center>Author/s</center></strong></th>
                            <th><strong><center>Keywords</center></strong></th>
                            <th><strong><center>Status</center></strong></th>
                            <th><strong><center>User ID</center></strong></th>
                            <th><strong><center>Username</center></strong></th>
                            <th><strong><center>Action</center></strong></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <?php foreach ($all_research as $row ): ?>
                            <td><?php echo $row->rpaper_id; ?></td>
                            <td><?php echo $row->date_uploaded; ?></td>
                            <td><?php echo $row->title; ?></td>
                            <td><?php echo $row->year; ?></td>
                            <td><?php echo $row->author; ?></td>
                            <td><?php echo $row->keywords; ?></td>
                            <td><?php echo $row->status; ?></td>
                            <td><?php echo $row->user_id; ?></td>
                            <td><?php echo $row->user_username; ?></td>
                            <td>
                              <div class="d-flex justify-content-center">
                                <a class="btn btn-info btn-sm" href="<?= site_url('admin_Controller/view_2/' . $row->rpaper_id) ?>">View</a>
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
