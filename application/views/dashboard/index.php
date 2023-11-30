    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- ALert -->
        <?php
        if ($this->session->flashdata('alert')) {
            echo $this->session->flashdata('alert');
            unset($_SESSION['alert']);
        }
        ?>
    </div>

    <!-- Page Content -->
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-lg-3 col-md-3">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="fas fa-notes-medical"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-8 d-flex justify-content-end">
                                        <h3 class="font-extrabold mb-0"><?php echo $this->m_widget->read('tbl_consult_response'); ?></h3>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <h6 class="text-muted font-semibold">Total Response Consultation</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-3">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="fas fa-notes-medical"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-8 d-flex justify-content-end">
                                        <h3 class="font-extrabold mb-0"><?php echo $this->m_widget->read('tbl_sim_response'); ?></h3>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <h6 class="text-muted font-semibold">Total Response Simulation</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-3">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row  align-items-center">
                                    <div class="col-md-4 col-lg-4 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="fas fa-notes-medical"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-8 d-flex justify-content-end">
                                        <h3 class="font-extrabold mb-0"><?php echo $this->m_widget->read('tbl_product'); ?></h3>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <h6 class="text-muted font-semibold">Total Products</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-3">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row align-items-center">
                                    <div class="col-md-4 col-lg-4 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="fas fa-notes-medical"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-8 d-flex justify-content-end">
                                        <h3 class="font-extrabold mb-0"><?php echo $this->m_widget->read('tbl_user',); ?></h3>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <h6 class="text-muted font-semibold">Total User</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-12 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row  align-items-center">
                                    <div class="col-md-8 col-lg-8 d-flex justify-content-end">
                                        <h3 class="font-extrabold mb-0"><?php echo $this->m_widget->read('tbl_user', 'tbl_consult_response', 'tbl_user.user_id=tbl_consult_response.user_id', "isnull(tbl_consult_response.consult_response_id) and tbl_user.group_id=4  "); ?></h3>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <h6 class="text-muted font-semibold">Total Consultation Not Response</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row  align-items-center">
                                    <div class="col-md-8 col-lg-8 d-flex justify-content-end">
                                        <h3 class="font-extrabold mb-0"><?php echo $this->m_widget->read('tbl_user', 'tbl_sim_response', 'tbl_user.user_id=tbl_sim_response.user_id', "isnull(tbl_sim_response.sim_response_id) and tbl_user.group_id=4 "); ?></h3>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <h6 class="text-muted font-semibold">Total Simulation Not Response</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="p-3">
                <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
            </div>
        </section>
    </div>