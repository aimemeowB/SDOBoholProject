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
                    <p class="card-description"> Upload your research file here... </p>
            <article id="research">
              <form class="needs-validation" action="<?php echo base_url('index.php/submit'); ?>" method="post" enctype="multipart/form-data">
                <fieldset>

              <div class="form-group was-validated">
               <p>
                  <label for="title">Title:</label>
                  <input class="form-control" type="text" name="title" id="title" value="" placeholder=""required> <br>
               </p>
              </div>
              <div class="form-group was-validated">
               <p>
                 <label for="year">Year: </label>
                  <input class="form-control" type="number" name="year" id="year" value="" min="1990" max="2100" placeholder="" required> <br>
               </p>
              </div>
              <div class="form-group was-validated">
               <p>
                  <label for="author">Author/s: </label>
                  <input class="form-control" type="text" name="author" id="author" value="" placeholder="" required> <br>
               </p>
              </div>
              <!--<div class="form-group was-validated">
                <p>
                  <label for="abstract">Abstract: </label>
                  <textarea class="form-control" name="abstract" id="abstract" value="" cols="30" rows="20" placeholder="Type your abstract here" required></textarea> <br>
               </p>
              </div>-->
              <div class="form-group was-validated">
               <p>
                  <label for="keywords">Keywords:</label>
                  <input class="form-control" type="text" name="keywords" id="keywords" value="" placeholder="" required> <br>
               </p>
              </div>
              <div class="form-group">
               <p>
                  <label for="file">Upload Abstract Document:</label> <br>
                  <input type="file" name="abstract_file" id="abstract_file" accept=".pdf" required>
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
