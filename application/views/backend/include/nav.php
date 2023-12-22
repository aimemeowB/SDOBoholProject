
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">

                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="ti-menu"></i>
                    </a>
                    <a class="mobile-search morphsearch-search" href="#">
                        <i class="ti-search"></i>
                    </a>
                    <a href="index.html">
                        <img class="" style="max-width: 20%; max-height: 20%;" src="<?=base_url();?>assets/frontend/img/sdo_logo.png" alt="Theme-Logo" />
                    </a>
                    <a class="mobile-options">
                        <i class="ti-more"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                        </li>

                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <a href="#!">
                                <img src="<?=base_url();?>assets/backend/images/admin.png" class="img-radius" alt="User-Profile-Image">
                                <span><?= $this->session->userdata('fullname');?></span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <li>
                                    <a href="<?= base_url();?>index.php/Admin_Controller/logout">
                                        <i class="ti-layout-sidebar-left"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                    <div class="pcoded-inner-navbar main-menu">


                        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li id="dashboardMenuItem">
                                <a href="<?= base_url();?>index.php/dashboard">
                                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li id="settingsMenuItem">
                            <a href="<?= base_url();?>index.php/users">
                        
                                <span class="pcoded-micon"><i class="ti-user"></i></span>
                                <span class="pcoded-mtext">Users</span>
                                <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li id="settingsMenuItem">
                            <a href="<?= base_url();?>index.php/research_papers">
                        
                                <span class="pcoded-micon"><i class="ti-files"></i></span>
                                <span class="pcoded-mtext">Research Papers</span>
                                <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                             <!-- End of new menu items -->
                    </div>
                </nav>
            </div>


  <script>
    // Get the current page URL
    var currentUrl = window.location.href;

    // Get all the menu item links
    var menuLinks = document.querySelectorAll('.pcoded-item a');

    // Loop through the menu links
    menuLinks.forEach(function(link) {
        // Compare the link's href with the current page URL
        if (link.href === currentUrl) {
            // Add the "active" class to the parent menu item
            link.closest('li').classList.add('active');
        }
    });
</script>
