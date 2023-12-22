<div class="pcoded-content">
  <div class="pcoded-inner-content">
    <div class="main-body">
      <div class="page-wrapper">
        <div class="page-body">
          <div class="row">
        <!-- partial -->
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-success text-white me-2">
                  <i class="ti-bookmark-alt"></i>
                </span> View Research Paper
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                </ul>
              </nav>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <h2 class="font-weight-normal mb-3">Research Details <i class="mdi mdi-file-outline mdi-24px float-right"></i>
                  </h2>
                  <strong>ID:</strong> <br> <p style="margin-left: 200px;"><?= $userResearch->rpaper_id ?></p>
                  <strong>Date Uploaded:</strong> <br> <p style="margin-left: 200px;"><?= $userResearch->date_uploaded ?></p>
                  <strong>Research Title:</strong> <br> <p style="margin-left: 200px;"><?= $userResearch->title ?></p>
                  <strong>Year:</strong> <br> <p style="margin-left: 200px;"><?= $userResearch->year ?></p>
                  <strong>Author:</strong> <br> <p style="margin-left: 200px;"><?= $userResearch->author ?></p>
                  <strong>Keywords:</strong> <br> <p style="margin-left: 200px;"><?= $userResearch->keywords ?></p>
                  <strong>Abstract:</strong> <br> <p style="margin-left: 200px;">
                    <?php
                      $rpaper_id = $userResearch->rpaper_id;
                      $abstract_name = $this->Admin_users_model->get_abstract_name($rpaper_id);
                      $link = base_url('abstract_folder/' . $abstract_name);
                    ?>
                    <br>
                    <a class="btn btn-grd-success btn-round btn-lg" href="<?php echo $link; ?>" target="_blank" rel="noopener noreferrer">View Abstract</a> 
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>