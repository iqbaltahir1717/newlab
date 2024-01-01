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

                        <li class="breadcrumb-item"><a href="<?php echo site_url('project');?>"> Project Data</a></li>

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

                                    <h3>Project Data Form</h3>

                                </div>

                                <hr>

                            </div>

                        </div>

                        <div class="card-content">

                            <div class="row me-4 mt-1">

                                <div class="col-md-12 col-12 text-end">

                                    <a href="<?php echo site_url('project')?>" class="btn btn-warning btn-sm" title="Kembali ke halaman sebelumya"><i class="bi bi-arrow-left"></i> back</a>

                                </div>

                            </div>

                            <div class="card-body">

                                <!-- Form Create Data Unit -->

                                <?php echo form_open_multipart("project/create")?>

                                    <form class="form">

                                    <?php echo csrf();?>

                                        <div class="row justify-content-around">

                                            <div class="col-lg-5">

                                                <div class="row"> 

                                                    <div class="mb-3 form-group">

                                                        <label for="project_name" class="mb-2">Project Name</label>

                                                        

                                                        <input type="text" class="form-control"

                                                            placeholder="Enter Project Name" name="project_name" required="required">

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="project_bedroom" class="mb-2">Number of Bedroom</label>

                                                        <input type="text" class="form-control"

                                                        name="project_bedroom" placeholder="Enter Number of Bedroom">

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="project_bathroom" class="mb-2">Number of Bathrooms</label>

                                                        <input type="text" class="form-control"

                                                        name="project_bathroom" placeholder="Enter Number of Bathroom">

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="project_luas" class="mb-2">Size (sqm)</label>

                                                        <input type="number" class="form-control"

                                                        name="project_luas" placeholder="Enter Size">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-5">

                                                <div class="row">

                                                    <div class="mb-3 form-group">

                                                        <label for="unit_bedroom" class="mb-2">Project Price (Rp.)</label>

                                                        <input type="text" class="form-control"

                                                            placeholder="Enter Project Price" id="rupiah" name="project_price" required="required"/>

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="project_cover" class="mb-2">Image Preview (maxsize 2MB)</label>

                                                        <input type="file" class="form-control" placeholder="Cover/Thumbnail Unit" name="project_cover" accept=".png, .jpeg, .jpg, .webp, .avif" required="required">

                                                    </div>

                                                    <div class="mb-3 form-group">

                                                        <label for="project_description" class="mb-2">Description</label>

                                                        <textarea class="form-control" id="dark" name="project_description" placeholder="Enter Description" rows="16" required="required"></textarea>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        

                                        <div class="col-12 d-flex justify-content-end mt-2">

                                            <button type="submit" class="btn btn-primary btn-sm me-1 mb-1" title="tambah"><i class="bi bi-save2"></i> Save</button>

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



    <script>

        var rupiah = document.getElementById("rupiah");

        rupiah.addEventListener("keyup", function(e) {

       

        rupiah.value = formatRupiah(this.value, "Rp. ");

        });



        function formatRupiah(angka, prefix) {

        var number_string = angka.replace(/[^,\d]/g, "").toString(),

            split = number_string.split(","),

            sisa = split[0].length % 3,

            rupiah = split[0].substr(0, sisa),

            ribuan = split[0].substr(sisa).match(/\d{3}/gi);



        if (ribuan) {

            separator = sisa ? "." : "";

            rupiah += separator + ribuan.join(".");

        }



        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;

        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";

        }



    </script>