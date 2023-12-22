        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-success text-white me-2">
                  <i class="mdi mdi-upload"></i>
                </span> Upload Research Work
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                </ul>
              </nav>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h1 class="display-2">Research Paper</h1>
                    <p class="card-description"> Upload the full document of your research file here... </p>
            <article id="research">
              <form class="needs-validation" action="<?php echo base_url('index.php/submit_fulldocument'); ?>" method="post" enctype="multipart/form-data">
                <fieldset>
                  <input type="hidden" name="rpaper_id" id="rpaper_id" accept=".pdf" value="<?php echo $userResearch->rpaper_id; ?>">
                  <br>
              <div class="form-group">
               <p>
                  <label for="file">Upload Full Document:</label> <br>
                  <input type="file" name="fulldocument_file" id="fulldocument_file" accept=".pdf" required>
                  <br>
                  <br>
               </p>
              </div>
              <button type="submit" class="btn btn-gradient-success btn-rounded btn-fw" name="submit_btn" id="submit_btn" value="Upload">Submit
              </button>
              <button type="reset" class="btn btn-gradient-light btn-rounded btn-fw" name="cancel" value="">Cancel
              </button>
                  <br>
               </fieldset>
              </form>
            </article>
          </div>
        </div>
      </div>
