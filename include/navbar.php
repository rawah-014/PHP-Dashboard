<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="index.html" class="b-brand">
                    <div class="b-bg">
                        <!--  <i class="feather icon-trending-up"></i> -->
                        <!--  <img src="assets/images/logo sm.jpg" style=" width : 100px; height:60px; " alt="User-Profile-Image"> -->
                    </div>
                    <span class="b-title">Smarts Sudan</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <?php $currentUrl = $_SERVER['REQUEST_URI']; ?>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Reports</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item <?php if (strpos($currentUrl, 'index.php')) echo 'active' ?>">
                        <a href="index.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Reports</span></a>
                    </li>
                    <!--  <li class="nav-item pcoded-menu-caption">
                        <label>UI Element</label>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Components</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="bc_button.html" class="">Button</a></li>
                            <li class=""><a href="bc_badges.html" class="">Badges</a></li>
                            <li class=""><a href="bc_breadcrumb-pagination.html" class="">Breadcrumb & paggination</a></li>
                            <li class=""><a href="bc_collapse.html" class="">Collapse</a></li>
                            <li class=""><a href="bc_tabs.html" class="">Tabs & pills</a></li>
                            <li class=""><a href="bc_typography.html" class="">Typography</a></li>


                            <li class=""><a href="icon-feather.html" class="">Feather<span class="pcoded-badge label label-danger">NEW</span></a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item pcoded-menu-caption">
                        <label>Tables</label>
                    </li>
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item <?php if (strpos($currentUrl, 'transactions.php')) echo 'active' ?>">
                        <a href="transactions.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Transactions Report</span></a>
                    </li>
                    <li data-username="Table bootstrap datatable footable" class="nav-item <?php if (strpos($currentUrl, 'terminal.php')) echo 'active' ?>">
                        <a href="terminal.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Trans Types Report</span></a>
                    </li>
                    <li data-username="Table bootstrap datatable footable" class="nav-item <?php if (strpos($currentUrl, 'performance-report.php')) echo 'active' ?>">
                        <a href="performance-report.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Performance Report</span></a>
                    </li>
                    <li data-username="Table bootstrap datatable footable" class="nav-item <?php if (strpos($currentUrl, 'operation-report.php')) echo 'active' ?>">
                        <a href="operation-report.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Terminal Report</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Manage</label>
                    </li>
                    <li data-username="Charts Morris" class="nav-item <?php if (strpos($currentUrl, 'users.php')) echo 'active' ?>">
                        <a href="users.php" class="nav-link "><span class="pcoded-micon">
                        <i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Manage Users</span></a>
                    </li>
                    <li data-username="Maps Google" class="nav-item <?php if (strpos($currentUrl, 'manageTerminal.php')) echo 'active' ?>">
                    <a href="manageTerminal.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i>
                </span><span class="pcoded-mtext">Manage Terminals</span></a></li>
                    <li data-username="Charts Morris" class="nav-item <?php if (strpos($currentUrl, 'area-manage.php')) echo 'active' ?>">
                        <a href="area-manage.php" class="nav-link "><span class="pcoded-micon">
                        <i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Manage Areas</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">Smart Dashboard</span>
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <!-- <img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image"> -->
                                <span><?php echo $_SESSION['username']; ?></span>
                                <form action="manage.php" method="POST">
                                    <button name="logout-btn" type="submit" class="btn-sm btn-outliner">

                                    logout
                                    <i class="feather icon-log-out"></i>
                                </a>

                                    </button>
                                </form>
                                
                            </div>
                           
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->