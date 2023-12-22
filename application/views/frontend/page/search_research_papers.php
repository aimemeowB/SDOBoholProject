
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-success text-white me-2">
                  <i class="mdi mdi-file-find"></i>
                </span> Research Papers
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                </ul>
              </nav>
            </div>
    <div class="row" style="padding: 2%">
      <div class="col-lg-12 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body" style="overflow-x:auto;">
            <h4 class="font-weight-normal mb-3">Research Papers <i class="mdi mdi-file-find mdi-24px float-right"></i>
            </h4>
            <div class="search-field d-none d-md-block">
              <form class="d-flex align-items-center h-100" action="<?= base_url('index.php/search') ?>" method="get">
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <i class="input-group-text border-0 mdi mdi-magnify"></i>
                  </div>
                  <input value="<?php echo $search_keywords; ?>" type="text" name="search" class="form-control bg-transparent border-0" placeholder="Search projects">
                  <button class="btn bg-gradient-light btn-lg" type="submit">Search</button>
                </div>
              </form>
            </div>
            <a href="<?=base_url();?>index.php/list_research_paper" class="btn bg-gradient-secondary btn-sm" type="submit">View Entire List</a>
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
              <?php foreach ($search_list as $key => $searchList): ?>
                    <tr>
                      <td><?php echo $searchList->rpaper_id; ?></td>
                      <td><?php echo $searchList->date_uploaded; ?></td>
                      <td><?php echo $searchList->title; ?></td>
                      <td><?php echo $searchList->year; ?></td>
                      <td><?php echo $searchList->author; ?></td>
                      <td><?php echo $searchList->keywords; ?></td>
                      <td style='text-align:center'><?php echo $searchList->status; ?></td>
                      <td>
                      <center>
                      <a class="btn btn-info btn-sm" href="">View</a>
                      <a class="btn btn-dark btn-sm" href="">Download</a>
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

