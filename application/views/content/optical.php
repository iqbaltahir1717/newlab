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

                            <a href="<?php echo site_url('optical'); ?>" class="btn btn-success btn-sm" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> refresh</a>

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

                                    <?php echo form_open_multipart("siteplan/add_optical")?>

                                    <form>

                                        <div class="modal-body">

                                            <div class="row">

                                                <div class="col-12">

                                                    <label for="optical_name">Nama Tempat</label>

                                                </div>

                                                <div class="col-12">

                                                    <div class="form-group">

                                                        <?php echo csrf();?>

                                                        <input type="text" class="form-control" name="optical_name" placeholder="Nama Tempat">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-12">

                                                    <label for="optical_distance">Jarak Lokasi (km)</label>

                                                </div>

                                                <div class="col-12">

                                                    <div class="form-group">

                                                        <input type="int" class="form-control" name="optical_distance" placeholder="Jarak Lokasi">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-12">

                                                    <label for="optical_distance_walk">Waktu Tempuh Berjalan (minutes)</label>

                                                </div>

                                                <div class="col-12">

                                                    <div class="form-group">

                                                        <input type="int" class="form-control" name="optical_distance_walk" placeholder="Waktu Tempuh Berjalan">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-12">

                                                    <label for="optical_distance_vehicle">Waktu Tempuh Berkendara (minutes)</label>

                                                </div>

                                                <div class="col-12">

                                                    <div class="form-group">

                                                        <input type="int" class="form-control" name="optical_distance_vehicle" placeholder="Waktu Tempuh Berkendara">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-12">

                                                    <label>File Cover <span style="color:red">*</span></label>

                                                </div>

                                                <div class="col-12">

                                                    <div class="form-group">

                                                        <input type="file" class="form-control" name="optical_cover" required="required" accept=".png, .jpeg, .jpg, .avif, .webp">

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

                                            <th>Nama Tempat</th>

                                            <th>Distance</th>

                                            <th>Waktu Tempuh Berjalan</th>

                                            <th>Waktu Tempuh Berkendara</th>

                                            <th width="5%">Aksi</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        if ($optical) {

                                            $nox = 1;

                                            $no = 1;

                                            foreach ($optical as $key) {

                                        ?>

                                                <tr>

                                                    <td><?php echo $no; ?></td>

                                                    <td><img style="width: 240px; object-fit: cover;" src="<?php echo base_url();?>/upload/optical/<?php echo $key->optical_cover ?>" alt="preview_optical"></td>

                                                    <td><?php echo $key->optical_name; ?></td>

                                                    <td><?php echo $key->optical_distance; ?> km</td>

                                                    <td><?php echo $key->optical_distance_walk; ?> menit</td>

                                                    <td><?php echo $key->optical_distance_vehicle; ?> menit</td>

                                                    <td>

                                                        <div class="btn-group dropstart mb-1">

                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Aksi" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>

                                                            <ul class="dropdown-menu">

                                                                <li>

                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormUbah<?php echo $key->optical_id;?>"><i class="bi bi-pencil-square"></i> Ubah

                                                                    </button>

                                                                </li>

                                                                <li>

                                                                    <button type="submit" class="dropdown-item bg-danger" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormHapus<?php echo $key->optical_id;?>"><i class="bi bi-x-lg"></i> Hapus

                                                                    </button>

                                                                </li>

                                                            </ul>

                                                        </div>

                                                    </td>

                                                </tr>

                                                <!-- Modal Ubah Optical -->

                                                <div class="modal fade text-start" id="FormUbah<?php echo $key->optical_id?>" tabindex="-1" role="dialog"

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

                                                            <?php echo form_open_multipart("siteplan/update_optical")?>

                                                            <form>

                                                                <div class="modal-body">

                                                                    <div class="row">

                                                                        <div class="col-12">

                                                                            <label for="optical_name">Nama Tempat</label>

                                                                        </div>

                                                                        <div class="col-12">

                                                                            <div class="form-group">

                                                                                <?php echo csrf();?>

                                                                                <input type="text" class="form-control" name="optical_name" placeholder="Nama Optical" value="<?= $key->optical_name; ?>">

                                                                                <input type="hidden" name="optical_id" value="<?= $key->optical_id; ?>">

                                                                                <input type="hidden" name="optical_cover_old" value="<?= $key->optical_cover; ?>">

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-12">

                                                                            <label for="optical_distance">Jarak Lokasi (km)</label>

                                                                        </div>

                                                                        <div class="col-12">

                                                                            <div class="form-group">

                                                                                <input type="int" class="form-control" name="optical_distance" placeholder="Jarak Lokasi" value="<?= $key->optical_distance; ?>">

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-12">

                                                                            <label for="optical_distance_walk">Waktu Tempuh Berjalan (minutes)</label>

                                                                        </div>

                                                                        <div class="col-12">

                                                                            <div class="form-group">

                                                                                <input type="int" class="form-control" name="optical_distance_walk" placeholder="Waktu Tempuh Berjalan" value="<?= $key->optical_distance_walk; ?>">

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-12">

                                                                            <label for="optical_distance_vehicle">Waktu Tempuh Berkendara (minutes)</label>

                                                                        </div>

                                                                        <div class="col-12">

                                                                            <div class="form-group">

                                                                                <input type="int" class="form-control" name="optical_distance_vehicle" placeholder="Waktu Tempuh Berkendara" value="<?= $key->optical_distance_vehicle; ?>">

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-12">

                                                                            <label>File Cover <span style="color:red">*</span></label>

                                                                        </div>

                                                                        <div class="col-12">

                                                                            <div class="form-group">

                                                                                <input type="file" class="form-control" name="optical_cover" accept=".png, .jpeg, .jpg, .avif, .webp">

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

                                                <div class="modal fade" id="FormHapus<?php echo $key->optical_id ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">

                                                    <div class="modal-dialog"  role="document">

                                                        <div class="modal-content">

                                                            <div class="modal-header">

                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>

                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                                    <i aria-hidden="true" class="ki ki-close"></i>

                                                                </button>

                                                            </div>

                                                            <?php echo form_open("siteplan/delete_optical") ?>

                                                            <div class="modal-body">

                                                                Apakah anda yakin akan menghapus data tempat : <?php echo $key->optical_name; ?> ?

                                                                <?php echo csrf(); ?>

                                                                <input type="hidden" class="form-control" name="optical_name" required="required" value="<?php echo $key->optical_name; ?>">

                                                                <input type="hidden" class="form-control" name="optical_id" required="required" value="<?php echo $key->optical_id; ?>">

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