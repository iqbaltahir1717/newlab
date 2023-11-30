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
                        <li class="breadcrumb-item"><a href="<?php echo site_url('product'); ?>"> Product</a></li>
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
        <!-- Update product start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <?php echo form_open_multipart("product/update") ?>
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <button type="submit" class="btn btn-info btn-sm" title="Update data"><i class="bi bi-pencil-square"></i> Ubah</button>
                            <a href="<?php echo site_url('product') ?>" class="btn btn-warning btn-sm" title="kembali ke halaman sebelumnya"><i class="bi bi-arrow-left"></i> kembali</a>
                        </div>
                    </div>
                    <!-- Update product -->
                    <div class="row p-4">
                        <div class="col-12">
                            <form action="form">
                                <?php echo csrf(); ?>
                                <div class="form-group">
                                    <label for=""><b>Judul Product <span style="color:red">*</span></b></label>
                                    <input type="text" class="form-control" placeholder="Judul Product" name="product_name" value="<?php echo $product[0]->product_name; ?>" required="required">
                                    <input type="hidden" class="form-control" name="product_id" required="required" value="<?php echo $product[0]->product_id; ?>">
                                    <input type="hidden" class="form-control" name="product_cover_old" required="required" value="<?php echo $product[0]->product_cover; ?>">
                                </div>

                                <div class="form-group">
                                    <label for=""><b>Cover/Thumbnail Product</b></label>
                                    <span class="text-red">file sebelumnya: </span><a href="<?php echo base_url(); ?>upload/product/<?php echo $product[0]->product_cover; ?>" target="_blank"><?php echo $product[0]->product_cover; ?></a>
                                    <input type="file" class="form-control" placeholder="Cover/Thumbnail Product" name="product_cover" accept=".png, .jpeg, .jpg, .avif, .webp">
                                </div>

                                <div class="form-group">
                                    <label><b>Product Description <span style="color:red">*</span></b></label>
                                    <textarea cols="80" id="dark" name="product_description" rows="10" style="resize:none;max-width:700px;"><?php echo $product[0]->product_description; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for=""><b>Link Shopee <span style="color:red">*</span></b></label>
                                    <input type="text" class="form-control" placeholder="Link Shopee" name="product_shopee_link" required="required" value="<?php echo $product[0]->product_shopee_link; ?>">
                                </div>

                                <div class="form-group">
                                    <label for=""><b>Status <span style="color:red">*</span></b></label>
                                    <select class="choices form-select" name="product_status" required style="width:100%">
                                        <option value="">-Pilih Status-</option>
                                        <option <?php if ($product[0]->product_status == 'Aktif') echo 'selected'; ?>>Aktif</option>
                                        <option <?php if ($product[0]->product_status == 'Non-Aktif') echo 'selected'; ?>>Non-Aktif</option>
                                    </select>
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
        <!-- Update product end -->
    </div>