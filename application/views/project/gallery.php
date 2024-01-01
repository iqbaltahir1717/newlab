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
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title;?> <?php echo $project[0]->project_name;?></li>
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
                            <a href="<?php echo site_url('project/add_photos/' . $this->uri->segment(3)); ?>" class="btn btn-primary btn-sm" title="Tambah data" data-bs-target="#FormTambah"><i class="fas fa-plus"></i> Add Photo</a>
                            <a href="<?php echo site_url('project/gallery_page/' . $this->uri->segment(3)); ?>" class="btn btn-success btn-sm" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> Refresh</a>
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
                                            <th width="5%">No.</th>
                                            <th >Preview</th>
                                            <th width="5%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($gallery) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($gallery as $key) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><img style="width: 80px; height: 80px; object-fit: cover;" src="<?php echo base_url();?>/upload/project_gallery/<?php echo $key->project_gallery_image ?>" alt="preview_unit"></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Aksi" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="submit" class="dropdown-item bg-danger" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormHapus<?php echo $key->project_gallery_id;?>"><i class="bi bi-x-lg"></i> Delete
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Modal Delete-->
                                                <div class="modal fade" id="FormHapus<?php echo $key->project_gallery_id ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                    <div class="modal-dialog"  role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <?php echo form_open("project/delete_gallery") ?>
                                                            <div class="modal-body">
                                                            Are you sure you want to delete photo : <?php echo $key->project_gallery_image; ?> ?
                                                                <?php echo csrf(); ?>
                                                                <input type="hidden" class="form-control" name="project_gallery_image" required="required" value="<?php echo $key->project_gallery_image; ?>">
                                                                <input type="hidden" class="form-control" name="project_gallery_id" required="required" value="<?php echo $key->project_gallery_id; ?>">
                                                                <input type="hidden" class="form-control" name="project_id" required="required" value="<?php echo $key->project_id; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger font-weight-bold">Delete</button>
                                                                <?php echo form_close(); ?>
                                                                <button type="button" class="close btn btn-light-primary font-weight-bold" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    Cancel
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