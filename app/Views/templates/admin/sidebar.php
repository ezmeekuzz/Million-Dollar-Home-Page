
            <header class="app-header top-bar">
                <!-- begin navbar -->
                <nav class="navbar navbar-expand-md">      
                    <!-- begin navbar-header -->
                    <div class="navbar-header d-flex align-items-center">
                        <a href="javascript:void:(0)" class="mobile-toggle">
                            <i class="ti ti-align-right"></i>
                        </a>
                        <a class="navbar-brand" href="<?=base_url();?>admin/" style="color: #000;">
                            PhotoWithGarbGreh
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-align-left"></i>
                    </button>
                    <!-- end navbar-header -->
                    <!-- begin navigation -->
                    <!-- end navigation -->
                </nav>
                <!-- end navbar -->
            </header>
            <!-- end app-header -->
            <!-- begin app-container -->
            <div class="app-container">
                <!-- begin app-nabar -->
                <aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                            <li class="nav-static-title">Personal</li>
                            <li <?php if($activelink == 'home') { echo 'class="active"'; } ?>>
                                <a href="<?=base_url()?>admin/home" aria-expanded="false">
                                    <i class="nav-icon ti ti-book"></i>
                                    <span class="nav-title">Home</span>
                                </a>
                            </li>
                            <li class="nav-static-title">Users</li>
                            <li <?php if($activelink == 'adduser' || $activelink == 'usermasterlist' || $activelink == 'registeredcandidatelist') { echo 'class="active"'; } ?>>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <i class="nav-icon ti ti-user"></i>
                                    <span class="nav-title">Users</span>
                                </a>
                                <ul aria-expanded="false" class="custom-style">
                                    <li <?php if($activelink == 'adduser' || $activelink == 'usermasterlist') { echo 'class="active"'; } ?>>
                                        <a class="has-arrow" href="javascript: void(0);">Administrator</a>
                                        <ul aria-expanded="false" class="custom-style">
                                            <li <?php if($activelink == 'adduser') { echo 'class="active"'; } ?>> <a href='<?=base_url();?>admin/add-user'>Add User</a> </li>
                                            <li <?php if($activelink == 'usermasterlist') { echo 'class="active"'; } ?>> <a href='<?=base_url();?>admin/user-masterlist'>User Masterlist</a> </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-static-title">Logout</li>
                            <li>
                                <a href="<?=base_url()?>admin/logout" aria-expanded="false">
                                    <i class="nav-icon ti ti-power-off"></i>
                                    <span class="nav-title">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>
                <!-- end app-navbar -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>