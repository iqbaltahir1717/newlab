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

                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>"> Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="<?php echo site_url('unit');?>"> Data Unit Rumah</a></li>

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

        <!-- Data Unit start -->

        <section class="section">

            <div class="row" id="table-hover-row">

                <div class="col-12">

                    <div class="card">

                        <!-- Data Unit Header -->

                        <div class="card-header">

                            <div class="row">

                                <div class="col-12 text-center">

                                    <h3>Data Unit Rumah</h3>

                                </div>

                                <hr>

                            </div>

                        </div>

                        <div class="card-content">

                            <div class="row me-4 mt-1">

                                <div class="col-md-12 col-12 text-end">

                                    <a href="<?php echo site_url('unit')?>" class="btn btn-warning btn-sm" title="Kembali ke halaman sebelumya"><i class="bi bi-arrow-left"></i> Kembali</a>

                                </div>

                            </div>

                            <div class="card-body">

                                <!-- Form Create Data Unit -->

                                <?php echo form_open_multipart("unit/create")?>

                                    <form class="form">

                                    <?php echo csrf();?>

                                        <div class="row justify-content-around">

                                            <div class="col-lg-5">

                                                <div class="row"> 

                                                    <div class="mb-3 form-group">

                                                        <label for="unit_name" class="mb-2">Nama Unit Rumah</label>

                                                        

                                                        <input type="text" class="form-control"

                                                            placeholder="Enter Unit Name" name="unit_name" required="required">

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="unit_bedroom" class="mb-2">Jumlah Kamar Tidur</label>

                                                        <input type="text" class="form-control"

                                                        name="unit_bedroom" placeholder="Enter Number of Bedroom">

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="unit_bathroom" class="mb-2">Jumlah Kamar Mandi</label>

                                                        <input type="text" class="form-control"

                                                        name="unit_bathroom" placeholder="Enter Number of Bathrrom">

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="unit_luas" class="mb-2">Luas Rumah (sqm)</label>

                                                        <input type="number" class="form-control"

                                                        name="unit_luas" placeholder="Enter Value of House Area">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-5">

                                                <div class="row">

                                                    <div class="mb-3 form-group">

                                                        <label for="unit_preview1" class="mb-2">Image 1 (maxsize 2MB)</label>

                                                        <input type="file" class="form-control" placeholder="Cover/Thumbnail Unit" name="unit_preview1" accept=".png, .jpeg, .jpg, .webp, .avif" required="required">

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="unit_name" class="mb-2">Image 2 (maxsize 2MB)</label>

                                                        <input type="file" class="form-control" placeholder="Cover/Thumbnail Unit" name="unit_preview2" accept=".png, .jpeg, .jpg, .webp, .avif" required="required">

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="unit_description" class="mb-2">Description</label>

                                                        <textarea class="form-control" id="dark" name="unit_description" placeholder="Enter Description" rows="16" required="required"></textarea>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        

                                        <div class="col-12 d-flex justify-content-end mt-2">

                                            <button type="submit" class="btn btn-primary btn-sm me-1 mb-1" title="tambah"><i class="bi bi-save2"></i> Simpan</button>

                                            <button type="reset" class="btn btn-light-secondary btn-sm me-1 mb-1" title="reset"><i class="bi bi-x-square"></i> Reset</button>    

                                        </div>

                                    </form>

                                    <?php echo form_close(); ?>

                                </div>

                            </div>

                            <div class="p-3">

                                <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>

                            </div>

                        </div>

                    </div>

                </div>

        </section>

        <!-- Data Unit end -->

    </div>