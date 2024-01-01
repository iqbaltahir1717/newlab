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
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>"> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></a></li>
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
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 col-12 text-end">
                            <a href="<?= site_url('unit/create_page'); ?>" class="btn btn-sm btn-primary" title="Tambah data"><i class="fas fa-plus"></i> Tambah</a>
                            <a href="<?php echo site_url('unit') ?>" class="btn btn-success btn-sm" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> refresh</a>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="card-content">
                    <!-- data tabel -->
                    <div class="row p-4" id="table-hover-row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Preview</th>
                                            <th>Nama Unit</th>
                                            <th>Luas Tanah</th>
                                            <th>Jumlah Kamar</th>
                                            <th>Jumlah Kamar Mandi</th>
                                            <th>Update Terakhir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($unit) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($unit as $key) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><img style="width: 80px; height: 80px; object-fit: cover;" src="<?php echo base_url();?>/upload/unit/<?php echo $key->unit_preview1 ?>" alt="preview_unit"></td>
                                                    <td><?php echo $key->unit_name; ?></td>
                                                    <td><?php echo $key->unit_luas; ?> sqm</td>
                                                    <td><?php echo $key->unit_bedroom; ?></td>
                                                    <td><?php echo $key->unit_bathroom; ?></td>
                                                    <td><?php echo $key->update_at; ?></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Aksi" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="<?php echo site_url('unit/gallery_page/' . $key->unit_id); ?>"  class="dropdown-item" ><i class="bi bi-eye"></i> &nbsp; Galeri</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo site_url('unit/update_page/' . $key->unit_id); ?>"  class="dropdown-item"><i class="bi bi-pencil-square"></i> &nbsp; Ubah</a>
                                                                </li>
                                                                <li> 
                                                                    <button type="submit" class="dropdown-item bg-danger" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormHapus<?php echo $key->unit_id;?>"><i class="bi bi-x-lg"></i> Hapus
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Modal Delete-->
                                                <div class="modal fade" id="FormHapus<?php echo $key->unit_id; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                    <div class="modal-dialog"  role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <?php echo form_open("unit/delete") ?>
                                                            <div class="modal-body">
                                                                Apakah anda yakin akan menghapus data unit : <?php echo $key->unit_name; ?> ?
                                                                <?php echo csrf(); ?>
                                                                <input type="hidden" class="form-control" name="unit_name" required="required" value="<?php echo $key->unit_name; ?>">
                                                                <input type="hidden" class="form-control" name="unit_id" required="required" value="<?php echo $key->unit_id; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger font-weight-bold">Hapus</button>
                                                                <?php echo form_close(); ?>
                                                                <button type="button" class="close btn btn-light-primary font-weight-bold" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    Batal
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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
                <div class="card-footer p-3">
                    <div class="p-3">
                        <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                    </div>
                </div>
        </section>
    </div>