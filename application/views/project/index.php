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
        <!-- Data Project start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 col-12 text-end">
                            <a href="<?= site_url('project/create_page'); ?>" class="btn btn-sm btn-primary" title="Tambah data"><i class="fas fa-plus"></i> Add Project</a>
                            <a href="<?php echo site_url('project') ?>" class="btn btn-success btn-sm" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> refresh</a>
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
                                            <th>Project Name</th>
                                            <th>Project Price</th>
                                            <th>Bedroom</th>
                                            <th>Bathroom</th>
                                            <th>Area</th>
                                            <th>Last Update</th>
                                            <th>Create Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($project) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($project as $key) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><img style="width: 80px; height: 80px; object-fit: cover;" src="<?php echo base_url();?>/upload/project/<?php echo $key->project_cover ?>" alt="preview_project"></td>
                                                    <td><?php echo $key->project_name; ?></td>
                                                    <td><?php echo $key->project_price ?></td>
                                                    <td><?php echo $key->project_bedroom; ?></td>
                                                    <td><?php echo $key->project_bathroom; ?></td>
                                                    <td><?php echo $key->project_luas; ?> sqm</td>
                                                    <td><?php echo $key->update_at; ?></td>
                                                    <td><?php echo $key->createtime; ?></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Aksi" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="<?php echo site_url('project/gallery_page/' . $key->project_id); ?>"  class="dropdown-item" ><i class="bi bi-eye"></i> &nbsp; Gallery</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo site_url('project/update_page/' . $key->project_id); ?>"  class="dropdown-item"><i class="bi bi-pencil-square"></i> &nbsp; Edit</a>
                                                                </li>
                                                                <li> 
                                                                    <button type="submit" class="dropdown-item bg-danger" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormHapus<?php echo $key->project_id;?>"><i class="bi bi-x-lg"></i> Delete
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Modal Delete-->
                                                <div class="modal fade" id="FormHapus<?php echo $key->project_id; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                    <div class="modal-dialog"  role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <?php echo form_open("project/delete") ?>
                                                            <div class="modal-body">
                                                            Are you sure you want to delete project : <?php echo $key->project_name; ?> ?
                                                                <?php echo csrf(); ?>
                                                                <input type="hidden" class="form-control" name="project_name" required="required" value="<?php echo $key->project_name; ?>">
                                                                <input type="hidden" class="form-control" name="project_id" required="required" value="<?php echo $key->project_id; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger font-weight-bold">Delete</button>
                                                                <?php echo form_close(); ?>
                                                                <button type="button" class="close btn btn-light-primary font-weight-bold" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    Close
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