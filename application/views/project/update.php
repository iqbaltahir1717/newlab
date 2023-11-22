    <!-- Page content Header -->

    <div class="page-heading">

        <div class="row">

            <!-- Page Title -->

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3><?php echo $title;?></h3>

            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">

                <!-- Breadcrumb -->

                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>"> Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="<?php echo site_url('project'); ?>"> Projects Data</a></li>

                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title;?></li>

                    </ol>

                </nav>

            </div>

        </div>

        <!-- Alert -->

        <?php

        if ($this->session->flashdata('alert')) {

            echo $this->session->flashdata('alert');

            unset($_SESSION['alert']);

        } ?>

    </div>



    <!-- Page content -->

    <div class="page-content">

        <!-- Data Pasien start -->

        <section class="section">

            <div class="row" id="table-hover-row">

                <div class="col-12">

                    <div class="card">

                        <!-- Data Project Header -->

                        <div class="card-header">

                            <div class="row">

                                <div class="col-12 text-center">

                                    <h3>Data Project Form</h3>

                                </div>

                                <hr>

                            </div>

                        </div>



                        <div class="card-content">

                            <div class="row me-4 mt-1">

                                <div class="col-md-12 col-12 text-end">

                                    <a href="<?php echo site_url('project')?>" class="btn btn-warning btn-sm" title="Kembali ke halaman sebelumya"><i class="bi bi-arrow-left"></i> Back</a>

                                </div>

                            </div>

                            <div class="card-body">

                                <!-- Form Create Data Project -->

                                <?php echo form_open_multipart("project/update")?>

                                    <form class="form">

                                    <?php echo csrf();?>

                                    <div class="row justify-content-around">

                                            <div class="col-lg-5">

                                                <div class="row"> 

                                                    <div class="mb-3 form-group">

                                                        <label for="project_name" class="mb-2">Project Name</label>

                                                        <input type="text" class="form-control"

                                                            placeholder="Enter Project Name" name="project_name" required="required" value="<?= $project[0]->project_name; ?>">

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="project_bedroom" class="mb-2">Number of Bedroom</label>

                                                        <input type="text" class="form-control"

                                                        name="project_bedroom" placeholder="Enter Number of Bedroom" value="<?= $project[0]->project_bedroom; ?>">

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="project_bathroom" class="mb-2">Number of Bathrooms</label>

                                                        <input type="text" class="form-control"

                                                        name="project_bathroom" placeholder="Enter Number of Bathroom" value="<?= $project[0]->project_bathroom; ?>">

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="project_luas" class="mb-2">Size (sqm)</label>

                                                        <input type="number" class="form-control"

                                                        name="project_luas" placeholder="Enter Size" value="<?= $project[0]->project_luas; ?>">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-5">

                                                <div class="row">

                                                    <div class="mb-3 form-group">

                                                        <label for="project_price" class="mb-2">Project Price (Rp.)</label>

                                                        <input type="text" class="form-control"

                                                            placeholder="Enter Project Price" id="rupiah" name="project_price" required="required" value="<?= $project[0]->project_price; ?>"/>

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="project_cover" class="mb-2">Image Preview (maxsize 2MB)</label>

                                                        <input type="file" class="form-control" placeholder="Cover/Thumbnail Project" name="project_cover" accept=".png, .jpeg, .jpg, .webp, .avif">

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="project_description" class="mb-2">Description</label>

                                                        <textarea class="form-control" id="dark" name="project_description" placeholder="Enter Description" rows="16" required="required"><?= $project[0]->project_description; ?>"</textarea>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>



                                        <!-- input id -->

                                        <input type="hidden" class="form-control" name="project_id" required="required" value="<?php echo $project[0]->project_id;?>">

                                        <input type="hidden" class="form-control" name="project_cover_old" required="required" value="<?php echo $project[0]->project_cover;?>">

                                        

                                        <div class="col-12 d-flex justify-content-end mt-2">

                                            <button type="submit" class="btn btn-primary btn-sm me-1 mb-1" title="Update"><i class="bi bi-save2"></i> Update</button>

                                            <button type="reset" class="btn btn-light-secondary btn-sm me-1 mb-1" title="reset"><i class="bi bi-x-square"></i> Reset</button>    

                                        </div>

                                    </form>

                                    <?php echo form_close(); ?>

                                </div>

                            </div>

                        </div>

                        <div class="p-3">

                            <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- Data Pasien end -->

    </div>