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

                        <li class="breadcrumb-item"><a href="<?php echo site_url('unit'); ?>">Siteplan</a></li>

                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title;?>

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

                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" title="Tambah data" data-bs-target="#FormTambah"><i class="fas fa-plus"></i> Tambah</button>

                            <a href="<?php echo site_url('cluster/'); ?>" class="btn btn-success btn-sm" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> refresh</a>

                        </div>

                        <!-- Modal Tambah Galeri -->

                        <div class="modal fade text-start" id="FormTambah" tabindex="-1" role="dialog"                 aria-labelledby="myModalLabel33" aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"

                                role="document">

                                <div class="modal-content">

                                    <div class="modal-header bg-info">

                                        <h4 class="modal-title" id="myModalLabel33">Form Tambah Data</h4>

                                        <button type="button" class="close" data-bs-dismiss="modal"

                                            aria-label="Close">

                                            <i data-feather="x"></i>

                                        </button>

                                    </div>

                                    <?php echo form_open_multipart("siteplan/add_cluster")?>

                                    <form>

                                        <div class="modal-body">

                                            <div class="row">

                                                <div class="col-3">

                                                    <label for="cluster_name">Nama Cluster</label>

                                                </div>

                                                <div class="col-9">

                                                    <div class="form-group">

                                                        <?php echo csrf();?>

                                                        <input type="text" class="form-control" name="cluster_name" placeholder="Nama Cluster">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-3">

                                                    <label>File Cover <span style="color:red">*</span></label>

                                                </div>

                                                <div class="col-9">

                                                    <div class="form-group">

                                                        <input type="file" class="form-control" name="cluster_cover" required="required" accept=".png, .jpeg, .jpg, .avif, .webp">

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="modal-footer">

                                            <button type="submit" class="btn btn-primary ml-1">

                                                <i class="bx bx-check d-block d-sm-none"></i>

                                                <span class="d-none d-sm-block">Simpan</span>

                                            </button>

                                            <button type="reset" class="btn btn-light-secondary">

                                                <i class="bx bx-x d-block d-sm-none"></i>

                                                <span class="d-none d-sm-block">Reset</span>

                                            </button>

                                        </div>

                                    </form>

                                    <?php echo form_close(); ?>

                                </div>

                            </div>

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

                                            <th width="25%">Preview</th>

                                            <th>Nama Cluster</th>

                                            <th width="5%">Aksi</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        if ($cluster) {

                                            $nox = 1;

                                            $no = 1;

                                            foreach ($cluster as $key) {

                                        ?>

                                                <tr>

                                                    <td><?php echo $no; ?></td>

                                                    <td><img style="width: 240px; object-fit: cover;" src="<?php echo base_url();?>/upload/cluster/<?php echo $key->cluster_cover ?>" alt="preview_cluster"></td>

                                                    <td><?php echo $key->cluster_name; ?></td>

                                                    <td>

                                                        <div class="btn-group dropstart mb-1">

                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Aksi" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>

                                                            <ul class="dropdown-menu">

                                                                <li>

                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormUbah<?php echo $key->cluster_id;?>"><i class="bi bi-pencil-square"></i> Ubah

                                                                    </button>

                                                                </li>

                                                                <li>

                                                                    <button type="submit" class="dropdown-item bg-danger" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormHapus<?php echo $key->cluster_id;?>"><i class="bi bi-x-lg"></i> Hapus

                                                                    </button>

                                                                </li>

                                                            </ul>

                                                        </div>

                                                    </td>

                                                </tr>

                                                <!-- Modal Ubah Cluster -->

                                                <div class="modal fade text-start" id="FormUbah<?php echo $key->cluster_id?>" tabindex="-1" role="dialog"

                                                    aria-labelledby="myModalLabel33" aria-hidden="true">

                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"

                                                        role="document">

                                                        <div class="modal-content">

                                                            <div class="modal-header bg-info">

                                                                <h4 class="modal-title" id="myModalLabel33">Form Edit</h4>

                                                                <button type="button" class="close" data-bs-dismiss="modal"

                                                                    aria-label="Close">

                                                                    <i data-feather="x"></i>

                                                                </button>

                                                            </div>

                                                            <?php echo form_open_multipart("siteplan/update_cluster")?>

                                                            <form>

                                                                <div class="modal-body">

                                                                    <div class="row">

                                                                        <div class="col-3">

                                                                            <label for="cluster_name">Nama Cluster</label>

                                                                        </div>

                                                                        <div class="col-9">

                                                                            <div class="form-group">

                                                                                <?php echo csrf();?>

                                                                                <input type="text" class="form-control" name="cluster_name" placeholder="Nama Cluster" value="<?= $key->cluster_name; ?>">

                                                                                <input type="hidden" name="cluster_id" value="<?= $key->cluster_id; ?>">

                                                                                <input type="hidden" name="cluster_cover_old" value="<?= $key->cluster_cover; ?>">

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-3">

                                                                            <label>File Cover</label>

                                                                        </div>

                                                                        <div class="col-9">

                                                                            <div class="form-group">

                                                                                <input type="file" class="form-control" name="cluster_cover" accept=".png, .jpeg, .jpg, .avif, .webp">

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                        

                                                                <div class="modal-footer">

                                                                    <button type="submit" class="btn btn-primary ml-1">

                                                                        <i class="bx bx-check d-block d-sm-none"></i>

                                                                        <span class="d-none d-sm-block">Simpan</span>

                                                                    </button>

                                                                    <button type="reset" class="btn btn-light-secondary">

                                                                        <i class="bx bx-x d-block d-sm-none"></i>

                                                                        <span class="d-none d-sm-block">Reset</span>

                                                                    </button>

                                                                </div>

                                                            </form>

                                                            <?php echo form_close(); ?>

                                                        </div>

                                                    </div>

                                                </div>

                                                <!-- Modal Delete-->

                                                <div class="modal fade" id="FormHapus<?php echo $key->cluster_id ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">

                                                    <div class="modal-dialog"  role="document">

                                                        <div class="modal-content">

                                                            <div class="modal-header">

                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>

                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                                    <i aria-hidden="true" class="ki ki-close"></i>

                                                                </button>

                                                            </div>

                                                            <?php echo form_open("siteplan/delete_cluster") ?>

                                                            <div class="modal-body">

                                                                Apakah anda yakin akan menghapus data cluster : <?php echo $key->cluster_name; ?> ?

                                                                <?php echo csrf(); ?>

                                                                <input type="hidden" class="form-control" name="cluster_name" required="required" value="<?php echo $key->cluster_name; ?>">

                                                                <input type="hidden" class="form-control" name="cluster_id" required="required" value="<?php echo $key->cluster_id; ?>">

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