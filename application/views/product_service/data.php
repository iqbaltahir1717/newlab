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
        <!-- product_service Start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <a href="<?php echo site_url('product') ?>" class="btn btn-warning btn-sm" title="kembali ke halaman sebelumnya"><i class="bi bi-arrow-left"></i> kembali</a>
                            <a href="<?php echo site_url('product_service/create_page/' . $product[0]->product_id) ?>" class="btn btn-primary btn-sm" title="Tambah data"><i class="fas fa-plus"></i> Tambah</a>
                            <a href="<?php echo site_url('product_service/index/' . $product[0]->product_id) ?>" class="btn btn-success btn-sm" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> refresh</a>
                        </div>
                    </div>

                    <!-- data tabel -->
                    <div class="row p-4">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Updatetime</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($product_service) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($product_service as $key) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $key->product_service_name; ?></td>
                                                    <td><?php echo substr(strip_tags($key->product_service_description), 0, 30); ?></td>
                                                    <td><?php echo $key->updatetime; ?></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Aksi" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="<?php echo site_url('product_service/detail_page/' . $product[0]->product_id . '/' . $key->product_service_id); ?>" class="dropdown-item" title="Lihat data"><i class="bi bi-eye"></i> Detail</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo site_url('product_service/update_page/' . $product[0]->product_id . '/' . $key->product_service_id); ?>" class="dropdown-item" title="Ubah data"><i class="bi bi-pencil-square"></i> Ubah</a>
                                                                </li>
                                                                <li>
                                                                    <?php echo form_open("product_service/delete") ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item" title="Hapus data"><i class="bi bi-x-lg"></i> Hapus</button>
                                                                    <input type="hidden" class="form-control" name="product_service_id" required="required" value="<?php echo $key->product_service_id; ?>">
                                                                    <input type="hidden" class="form-control" name="product_id" required="required" value="<?php echo $key->product_id; ?>">
                                                                    <?php echo form_close(); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php
                                                $no++;
                                            }
                                        } else {
                                            echo '
                                                <tr class="text-center">
                                                    <td colspan="7">Tidak ada data ditemukan</td>
                                                </tr>
                                                ';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-3">
                    <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                </div>
            </div>

        </section>
        <!-- product_service end -->
    </div>