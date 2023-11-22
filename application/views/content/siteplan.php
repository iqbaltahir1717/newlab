    <!-- Page content Header -->

    <div class="page-heading">

        <div class="row">

            <!-- Page Title -->

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Siteplan Content</h3>

            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">

                <!-- Breadcrumb -->

                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index'); ?>"> Dashboard</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Siteplan Content</li>

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

        <!-- Update Content start -->

        <section class="section">

            <div class="card">

                <div class="card-content">

                <?php echo form_open_multipart("siteplan/update")?>

                    <div class="row me-4 mt-4">

                        <div class="col-md-12 col-12 text-end">

                            <button type="submit" class="btn btn-info btn-sm" title="Ubah data"><i class="bi bi-pencil-square"></i> Ubah</button>

                            <a href="<?php echo site_url('siteplan')?>" class="btn btn-success btn-sm" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> refresh</a>

                        </div>

                    </div>

                    <!-- Update Content -->

                    <div class="row p-4">

                        <div class="col-12">

                                <form action="form">

                                    <?php echo csrf();?>

                                    <div class="row">

                                        <div class="col-lg-12">

                                            <div class="mb-3 form-group">

                                                <img src="<?= base_url();?>/upload/siteplan/<?= $siteplan[0]->siteplan_image1; ?>" style="height: 240px; object-fit: cover;" alt="" class="mb-3"> <br>

                                                <label for="siteplan_image1" class="mb-2">Image Siteplan 1 (maxsize 3MB)</label>

                                                <input type="file" class="form-control" placeholder="Cover/Thumbnail Unit" name="siteplan_image1" accept=".png, .jpeg, .jpg, .avif, .webp">

                                            </div>

                                            <div class="mb-3 form-group">

                                                <label for="siteplan_image1_description" class="mb-2">Descrpiton Image Siteplan 1</label>

                                                <textarea class="form-control" id="dark" name="siteplan_image1_description" placeholder="Enter Description" rows="16"><?php echo $siteplan[0]->siteplan_image1_description;?></textarea>

                                                <input type="hidden" class="form-control" name="siteplan_id" value="<?php echo $siteplan[0]->siteplan_id;?>">

                                                <input type="hidden" class="form-control" name="siteplan_image1_old" value="<?php echo $siteplan[0]->siteplan_image1;?>">

                                            </div>

                                        </div>

                                        <div class="col-lg-12">

                                            <div class="mb-3 form-group">

                                                <img src="<?= base_url();?>/upload/siteplan/<?= $siteplan[0]->siteplan_image2; ?>" style="height: 240px; object-fit: cover;"  alt="" class="mb-3"> <br>

                                                <label for="siteplan_image2" class="mb-2">Image Siteplan 2 (maxsize 3MB)</label>

                                                <input type="file" class="form-control" placeholder="Cover/Thumbnail Unit" name="siteplan_image2" accept=".png, .jpeg, .jpg, .avif, .webp">

                                            </div>

                                            <div class="mb-3 form-group">

                                                <label for="siteplan_image2_description" class="mb-2">Descrpiton Image Siteplan 2</label>

                                                <textarea class="form-control" id="default"  name="siteplan_image2_description" placeholder="Enter Description" rows="16"><?php echo $siteplan[0]->siteplan_image2_description;?></textarea>

                                                <input type="hidden" class="form-control " name="siteplan_image2_old" value="<?php echo $siteplan[0]->siteplan_image2;?>">

                                            </div>

                                        </div>

                                    </div>

                                    <hr>

                                    <div class="row">

                                        <div class="col-lg-12">

                                            <div class="mb-3 form-group">

                                                <label for="siteplan_cluster" class="mb-2">Descrpiton Cluster Amenities</label>

                                                <textarea class="form-control" id="dark3"   class="myeditablediv" name="siteplan_cluster" placeholder="Enter Description" rows="16"><?php echo $siteplan[0]->siteplan_cluster;?></textarea>

                                            </div>

                                        </div>

                                        <div class="col-lg-12">

                                            <div class="mb-3 form-group">

                                                <label for="siteplan_optical" class="mb-2">Optimal Strategic Layout</label>

                                                <textarea class="form-control" id="dark4" name="siteplan_optical" placeholder="Enter Description" rows="16"><?php echo $siteplan[0]->siteplan_optical;?></textarea>

                                            </div>

                                        </div>

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

    

        </section>

        <!-- Update Content end -->

    </div>

