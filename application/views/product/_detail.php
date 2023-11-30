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
        <!-- detail product start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <a href="<?php echo site_url('product') ?>" class="btn btn-warning btn-sm" title="kembali ke halaman sebelumnya"><i class="bi bi-arrow-left"></i> kembali</a>
                        </div>
                    </div>

                    <!-- detail product -->
                    <div class="row p-4">
                        <div class="col-12">
                            <b>Product Name :</b><br> <?php echo $product[0]->product_name; ?><br><br>
                            <b>Product Description:</b><br> <?php echo $product[0]->product_description; ?>
                            <b>Link Shopee:</b><br> <?php if ($product[0]->product_shopee_link) {
                                                        echo '<a target="_blank" href="' . $product[0]->product_shopee_link . '" title="Tambah data">link</a>';
                                                    } else echo '<i>~No Data~</i>'; ?><br>
                            <b>Product Cover:</b><br> <a href="<?php echo base_url(); ?>upload/product/<?php echo $product[0]->product_cover; ?>" target="_blank"><?php echo $product[0]->product_cover; ?></a>
                        </div>
                    </div>
                </div>

                <div class="p-3">
                    <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                </div>
            </div>

        </section>
        <!-- detail product end -->
    </div>