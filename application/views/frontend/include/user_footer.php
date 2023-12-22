
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © SDO Division of Bohol</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?=base_url();?>assets/dashboard/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?=base_url();?>assets/dashboard/vendors/chart.js/Chart.min.js"></script>
    <script src="<?=base_url();?>assets/dashboard/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=base_url();?>assets/dashboard/js/off-canvas.js"></script>
    <script src="<?=base_url();?>assets/dashboard/js/hoverable-collapse.js"></script>
    <script src="<?=base_url();?>assets/dashboard/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?=base_url();?>assets/dashboard/js/dashboard.js"></script>
    <script src="<?=base_url();?>assets/dashboard/js/todolist.js"></script>
    <!-- End custom js for this page -->
    
    <script type="text/javascript" href="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script> 
      let table = new DataTable('#user_table');
    </script>
  </body>
</html>