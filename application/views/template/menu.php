<body>

    <!-- medicord App Start -->
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <?php echo $setting[0]->setting_short_appname; ?>
                        </div>

                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <!-- sidebar menu -->
                <div class="sidebar-menu">
                    <!-- superadmin menu -->
                    <?php if ($this->session->userdata('user_group') == 1 or $this->session->userdata('user_group') == 2) { ?>
                        <ul class="menu">
                            <li class="sidebar-title">LIST MENU</li>

                            <li class="sidebar-item <?= active_menu('dashboard'); ?>">
                                <a href="<?php echo site_url('dashboard') ?>" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-newspaper"></i>
                                    <span>Consultation</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item <?= active_menu('consult_response'); ?>">
                                        <a href="<?php echo site_url('consult_response') ?>">Response</a>
                                    </li>
                                    <li class="submenu-item <?= active_menu('consult_question'); ?>">
                                        <a href="<?php echo site_url('consult_question') ?>">Kuisioner Manajemen</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-newspaper"></i>
                                    <span>Simulation</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item <?= active_menu('sim_response'); ?>">
                                        <a href="<?php echo site_url('sim_response') ?>">Response</a>
                                    </li>
                                    <li class="submenu-item <?= active_menu('sim_question'); ?>">
                                        <a href="<?php echo site_url('sim_question') ?>">Kuisioner Manajemen</a>
                                    </li>
                                    <li class="submenu-item <?= active_menu('sim_goals'); ?>">
                                        <a href="<?php echo site_url('sim_goals') ?>">Goals Manajemen</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="sidebar-item <?= active_menu('product'); ?>">
                                <a href="<?php echo site_url('product') ?>" class='sidebar-link'>
                                    <i class="bi bi-house-fill"></i>
                                    <span>Product</span>
                                </a>
                            </li>
                            <li class="sidebar-title">Others</li>
                            <!-- <li
                class="sidebar-item <?= active_menu('gallery_category'); ?>">
                <a class='sidebar-link' href="<?php echo site_url('gallery_category') ?>"><i class="fas fa-clinic-medical"></i> <span>Gallery Category</span></a>
            </li> -->
                            <li class="sidebar-item <?= active_menu('user'); ?>">
                                <a href="<?php echo site_url('user') ?>" class='sidebar-link'>
                                    <i class="bi bi-person-fill"></i>
                                    <span>User</span>
                                </a>
                            </li>
                            <!--
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="fas fa-clinic-medical"></i>
                                    <span>Other Setting</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item <?= active_menu('content/page/privacy_policy'); ?>">
                                        <a href="<?php echo site_url('content/page/privacy_policy') ?>">Privacy Policy</a>
                                    </li>
                                    <li class="submenu-item <?= active_menu('content/page/term_condition'); ?>">
                                        <a href="<?php echo site_url('content/page/term_condition') ?>">Term & Condition</a>
                                    </li>
                                </ul>
                            </li> -->
                            <li class="sidebar-item <?= active_menu('setting'); ?>">
                                <a href="<?php echo site_url('setting') ?>" class='sidebar-link'>
                                    <i class="bi bi-gear-fill"></i>
                                    <span>Setting</span>
                                </a>
                            </li>
                        </ul>

                    <?php } elseif ($this->session->userdata('user_group') == 3) { ?>
                        <ul>
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-newspaper"></i>
                                    <span>News</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item <?= active_menu('news'); ?>">
                                        <a href="<?php echo site_url('news') ?>">News</a>
                                    </li>
                                    <li class="submenu-item <?= active_menu('news_category'); ?>">
                                        <a href="<?php echo site_url('news_category') ?>">Category</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Start navbar -->
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <!-- hamburger menu -->
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Right navbar -->
                            <ul class="navbar-nav ms-auto mb-lg-0">
                                <div class="theme-toggle d-flex gap-1  align-items-center me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                            <g transform="translate(-210 -1)">
                                                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                                <circle cx="220.5" cy="11.5" r="4"></circle>
                                                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <div class="form-check form-switch fs-6">
                                        <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                        <label class="form-check-label"></label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
                                    </svg>
                                </div>

                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="user-menu d-flex">
                                            <div class="user-name text-end me-3">
                                                <h6 class="mb-0 text-gray-600"><?php echo $this->session->userdata('user_name'); ?></h6>
                                                <p class="mb-0 text-sm text-gray-600">online</p>
                                            </div>
                                            <div class="user-img d-flex align-items-center">
                                                <div class="avatar avatar-md">
                                                    <?php
                                                    if ($this->session->userdata('user_photo') == "") {
                                                        echo '<img src="' . base_url() . 'upload/user/noimage.png" alt="User Image">';
                                                    } else {
                                                        echo '<img src="' . base_url() . 'upload/user/' . $this->session->userdata('user_photo') . '" alt="User Image">';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                        <li>
                                            <h6 class="dropdown-header">Halo, <?php echo $this->session->userdata('user_name'); ?></h6>
                                        </li>
                                        <li><a class="dropdown-item" href="<?php echo site_url('profile') ?>"><i class="icon-mid bi bi-person me-2"></i> My Profile</a>
                                        </li>
                                        <li><a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Sign out</a>
                                        </li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </nav>
            </header>
            <!-- main content -->
            <div id="main-content">