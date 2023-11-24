    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $title; ?></h3>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index'); ?>"> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('product_service/index/'. $product[0]->product_id); ?>">Product Service</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <?php
        if ($this->session->flashdata('alert')) {
            echo $this->session->flashdata('alert');
            unset($_SESSION['alert']);
        } ?>
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- CreateProduct Service start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <a href="<?php echo site_url('product_service/index/' . $product[0]->product_id) ?>" class="btn btn-warning btn-sm" title="kembali ke halaman sebelumnya"><i class="bi bi-arrow-left"></i> kembali</a>
                        </div>
                    </div>

                    <!-- CreateProduct Service -->
                    <div class="row p-4">
                        <div class="col-12">
                            <?php echo form_open_multipart("product_service/create") ?>
                            <form action="form">
                                <?php echo csrf(); ?>
                                <div class="form-group">
                                    <label for=""><b>Product Service Name <span style="color:red">*</span></b></label>
                                    <input type="hidden" class="form-control" name="product_id" required="required" value="<?php echo $product[0]->product_id; ?>">
                                    <input type="text" class="form-control" placeholder="Product Service" name="product_service_name" required="required">
                                </div>

                                <div class="form-group">
                                    <label><b>Product Service Description <span style="color:red">*</span></b></label>
                                    <textarea cols="80" id="dark" name="product_service_description" rows="10" style="resize:none;max-width:700px;"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for=""><b>Status <span style="color:red">*</span></b></label>
                                    <select class="choices form-select" name="product_service_status" required style="width:100%">
                                        <!-- <option value="">-Pilih Status-</option> -->
                                        <option>Aktif</option>
                                        <option>Non-Aktif</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3 text-end">
                                    <button type="submit" class="btn btn-primary btn-sm" title="Tambah data"><i class="bi bi-save2"></i> Simpan</button>
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
        <!-- CreateProduct Service end -->
    </div>