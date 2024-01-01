    <!-- Page content Header -->

    <div class="page-heading">

        <div class="row">

            <!-- Page Title -->

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3><?php echo $title;?> <?php echo $unit[0]->unit_name;?></h3>

            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">

                <!-- Breadcrumb -->

                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>"> Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="<?php echo site_url('unit'); ?>"> Data Unit Rumah</a></li>

                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title;?> <?php echo $unit[0]->unit_name;?></li>

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

                            <a href="<?php echo site_url('unit/gallery_page/' . $this->uri->segment(3)); ?>" class="btn btn-success btn-sm" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> refresh</a>

                        </div>

                        <!-- Modal Tambah Galeri -->

                        <div class="modal fade text-start" id="FormTambah" tabindex="-1" role="dialog"                 aria-labelledby="myModalLabel33" aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"

                                role="document">

                                <div class="modal-content">

                                    <div class="modal-header bg-info">

                                        <h4 class="modal-title" id="myModalLabel33">Form Tambah Galeri</h4>

                                        <button type="button" class="close" data-bs-dismiss="modal"

                                            aria-label="Close">

                                            <i data-feather="x"></i>

                                        </button>

                                    </div>

                                    <?php echo form_open_multipart("unit/add_gallery")?>

                                    <form>

                                        <div class="modal-body">

                                            <div class="row">

                                                <div class="col-3">

                                                    <label for="gallery_name">Judul Foto</label>

                                                </div>

                                                <div class="col-9">

                                                    <div class="form-group">

                                                        <?php echo csrf();?>

                                                        <input type="text" class="form-control" name="gallery_name" placeholder="Judul Foto">

                                                        <input type="hidden" name="unit_id" value="<?php echo $this->uri->segment(3);?>">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-3">

                                                    <label for="gallery_name">Category Foto</label>

                                                </div>

                                                <div class="col-9">

                                                    <div class="form-group">

                                                        <select class="form-select" name="gallery_category_id" required style="width:100%">

                                                            <option value="">-Choose Gallery Category-</option>

                                                            <?php

                                                                foreach($gallery_category as $c){

                                                                    echo '<option value="'.$c->gallery_category_id.'">'.$c->gallery_category_name.'</option>';

                                                                }

                                                            ?>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-3">

                                                    <label for="gallery_description">Deskripsi Foto</label>

                                                </div>

                                                <div class="col-9">

                                                    <div class="form-group">

                                                        <textarea class="form-control" rows="5" name="gallery_description" placeholder="Deskripsi Foto"></textarea>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-3">

                                                    <label>File Foto <span style="color:red">*</span></label>

                                                </div>

                                                <div class="col-9">

                                                    <div class="form-group">

                                                        <input type="file" class="form-control" name="gallery_image" required="required" accept=".png, .jpeg, .jpg, .webp, .avif">

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

                                            <th>No.</th>

                                            <th>Preview</th>

                                            <th>Judul Foto</th>

                                            <th>Deskripsi Foto</th>

                                            <th>Kategori Foto</th>

                                            <th>Aksi</th>

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

                                                    <td><img style="width: 80px; height: 80px; object-fit: cover;" src="<?php echo base_url();?>/upload/unit_gallery/<?php echo $key->gallery_image ?>" alt="preview_unit"></td>

                                                    <td><?php echo $key->gallery_name; ?></td>

                                                    <td><?php echo $key->gallery_description; ?></td>

                                                    <td><?php echo $key->gallery_category_name; ?></td>

                                                    <td>

                                                        <div class="btn-group dropstart mb-1">

                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Aksi" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>

                                                            <ul class="dropdown-menu">

                                                                <li>

                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormUbah<?php echo $key->gallery_id;?>"><i class="bi bi-pencil-square"></i> Ubah

                                                                    </button>

                                                                </li>

                                                                <li>

                                                                    <button type="submit" class="dropdown-item bg-danger" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormHapus<?php echo $key->gallery_id;?>"><i class="bi bi-x-lg"></i> Hapus

                                                                    </button>

                                                                </li>

                                                            </ul>

                                                        </div>

                                                    </td>

                                                </tr>

                                                <!-- Modal Ubah Galeri -->

                                                <div class="modal fade text-start" id="FormUbah<?php echo $key->gallery_id?>" tabindex="-1" role="dialog"

                                                    aria-labelledby="myModalLabel33" aria-hidden="true">

                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"

                                                        role="document">

                                                        <div class="modal-content">

                                                            <div class="modal-header bg-info">

                                                                <h4 class="modal-title" id="myModalLabel33">Form Ubah Galeri</h4>

                                                                <button type="button" class="close" data-bs-dismiss="modal"

                                                                    aria-label="Close">

                                                                    <i data-feather="x"></i>

                                                                </button>

                                                            </div>

                                                            <?php echo form_open_multipart("unit/update_gallery")?>

                                                            <form>

                                                                <div class="modal-body">

                                                                    <div class="row">

                                                                        <div class="col-3">

                                                                            <label for="gallery_name">Judul Foto</label>

                                                                        </div>

                                                                        <div class="col-9">

                                                                            <div class="form-group">

                                                                                <?php echo csrf();?>

                                                                                <input type="text" class="form-control" name="gallery_name" placeholder="Judul Foto" value="<?= $key->gallery_name; ?>">

                                                                                <input type="hidden" name="unit_id" value="<?php echo $this->uri->segment(3);?>">

                                                                                <input type="hidden" name="gallery_id" value="<?= $key->gallery_id; ?>">

                                                                                <input type="hidden" name="unit_id" value="<?php echo $this->uri->segment(3);?>">

                                                                                <input type="hidden" name="gallery_image_old" value="<?= $key->gallery_image; ?>">

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-3">

                                                                            <label for="gallery_name">Category Foto</label>

                                                                        </div>

                                                                        <div class="col-9">

                                                                            <div class="form-group">

                                                                                <select class="form-select" name="gallery_category_id" required style="width:100%">

                                                                                    <option value="">-Choose Gallery Category-</option>

                                                                                    <?php

                                                                                        foreach($gallery_category as $g){

                                                                                            if($key->gallery_category_id == $g->gallery_category_id){

                                                                                                echo '<option value="'.$g->gallery_category_id.'" selected>'.$g->gallery_category_name.'</option>';

                                                                                            }else{  

                                                                                                echo '<option value="'.$g->gallery_category_id.'">'.$g->gallery_category_name.'</option>';

                                                                                            }

                                                                                            

                                                                                        }

                                                                                    ?>

                                                                                </select>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-3">

                                                                            <label for="gallery_description">Deskripsi Foto</label>

                                                                        </div>

                                                                        <div class="col-9">

                                                                            <div class="form-group">

                                                                                <textarea class="form-control" rows="5" name="gallery_description" placeholder="Deskripsi Foto"><?= $key->gallery_description ?></textarea>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-3">

                                                                            <label>File Foto</label>

                                                                        </div>

                                                                        <div class="col-9">

                                                                            <div class="form-group">

                                                                                <input type="file" class="form-control" name="gallery_image" accept=".png, .jpeg, .jpg, .webp, .avif">

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

                                                <div class="modal fade" id="FormHapus<?php echo $key->gallery_id ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">

                                                    <div class="modal-dialog"  role="document">

                                                        <div class="modal-content">

                                                            <div class="modal-header">

                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>

                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                                    <i aria-hidden="true" class="ki ki-close"></i>

                                                                </button>

                                                            </div>

                                                            <?php echo form_open("unit/delete_gallery") ?>

                                                            <div class="modal-body">

                                                                Apakah anda yakin akan menghapus data gallery : <?php echo $key->gallery_name; ?> ?

                                                                <?php echo csrf(); ?>

                                                                <input type="hidden" class="form-control" name="gallery_name" required="required" value="<?php echo $key->gallery_name; ?>">

                                                                <input type="hidden" class="form-control" name="gallery_id" required="required" value="<?php echo $key->gallery_id; ?>">

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