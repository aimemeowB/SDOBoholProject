        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-success text-white me-2">
                  <i class="mdi mdi-cloud-check"></i>
                </span> Upload Completed
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                </ul>
              </nav>
            </div>
          <div class="row">
            <div class="col-md-12 stretch-card grid-margin">
              <div class="card bg-gradient-light card-img-holder text-black">
                <div class="card-body">
                  <h1 class="display-3">Your file was successfully uploaded!</h1>

                  <br>

                  <p>Recently Uploaded Research:</p>
                    <ul class="list-arrow">
                        <li>Research ID: <?php echo $recent_research['rpaper_id']; ?></li>
                        <li>Date Uploaded: <?php echo $recent_research['date_uploaded']; ?></li>
                        <li>Research Title: <?php echo $recent_research['title']; ?></li>
                        <li>Year: <?php echo $recent_research['year']; ?></li>
                        <li>Author: <?php echo $recent_research['author']; ?></li>
                        <li>Keywords: <?php echo $recent_research['keywords']; ?></li>
                        <li>Abstract File Name: <?php echo $recent_research['abstract_name']; ?></li>
                        <!-- Display other fields as needed -->
                    </ul>
                </div>
              </div>
            </div>
          </div>