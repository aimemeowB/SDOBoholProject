        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-success text-white me-2">
                  <i class="mdi mdi-file-multiple"></i>
                </span> My Research Papers
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                </ul>
              </nav>
            </div>
    <div class="row" style="padding: 2%">
      <div class="col-lg-12 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body" style=" overflow-y: auto;">
            <h4 class="font-weight-normal mb-3">My Research Papers <i class="mdi mdi-file-find mdi-24px float-right"></i>
            </h4>
            <table class="table table-striped table-bordered table-hover" id="user_table">
            <thead>
              <tr>
                <th><center>#</center></th>
                <th><center>Date Uploaded</center></th>
                <th><center>Research Title</center></th>
                <th><center>Year</center></th>
                <th><center>Author/s</center></th>
                <th><center>Keywords</center></th>
                <th><center>Status</center></th>
                <th><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($user_research as $key => $userResearch): ?>
                    <tr>
                      <td><?php echo $userResearch->rpaper_id; ?></td>
                      <td><?php echo $userResearch->date_uploaded; ?></td>
                      <td><?php echo $userResearch->title; ?></td>
                      <td><?php echo $userResearch->year; ?></td>
                      <td><?php echo $userResearch->author; ?></td>
                      <td><?php echo $userResearch->keywords; ?></td>
                      <td style='text-align:center'><?php echo $userResearch->status; ?></td>
                      <td>
                      <center>
                      <a class="btn btn-info btn-sm" href="<?= site_url('Users_Controller/view/' . $userResearch->rpaper_id) ?>">View</a>
                      <a class="btn btn-warning btn-sm" href="<?= site_url('Users_Controller/edit/' . $userResearch->rpaper_id) ?>">Edit</a>
                      <a class="btn btn-danger btn-sm" href="<?= site_url('Users_Controller/delete/' . $userResearch->rpaper_id) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                      <a  class="btn btn-primary btn-sm" href="<?= site_url('Users_Controller/checkedstatusprocess/' . $userResearch->rpaper_id) ?>">Proceed</a>
                      </center>
                      </td>
                    </tr>
              <?php endforeach; ?>
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>