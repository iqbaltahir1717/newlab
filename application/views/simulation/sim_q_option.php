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
        <!-- News Category start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <a href="<?php echo site_url('sim_question') ?>" class="btn btn-warning btn-sm" title="Refresh"><i class="fa fa-arrow-left"></i> kembali</a>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#FormAdd"><i class="fas fa-plus"></i>
                                Add
                            </button>
                            <a href="<?php echo site_url('sim_q_option/index/' . $this->uri->segment(3)) ?>" class="btn btn-success btn-sm" title="Refresh"><i class="bi bi-arrow-clockwise"></i> refresh</a>
                        </div>
                        <!-- Modal Add News Category -->
                        <div class="modal fade text-start" id="FormAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h4 class="modal-title" id="myModalLabel33">Form Add simation questions</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <?php echo form_open_multipart("sim_q_option/create") ?>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="gallery_name">Text <?php if ($sim_question[0]->sim_question_type == 'radio') echo '<span style="font-size: 12px; color:red;">Pilih Salah Satu Inputan</span>'; ?> </label>
                                                <?php echo csrf(); ?>
                                                <input type="text" class="form-control" placeholder="simation questions Text" name="sim_q_option_text">
                                                <input type="hidden" class="form-control" placeholder="simation questions Text" name="sim_question_id" value="<?= $this->uri->segment(3); ?>">
                                            </div>
                                            <?php if ($sim_question[0]->sim_question_type == 'radio') { ?>
                                                <div class="form-group">
                                                    <label for="gallery_name">File <span style="font-size: 12px; color:red;">Pilih Salah Satu Inputan</span></label>
                                                    <input type="file" class="form-control" placeholder="simation questions Text" name="sim_q_option_text">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary ml-1">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Save</span>
                                        </button>
                                        <button type="reset" class="btn btn-light-secondary">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
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
                                            <th>Text</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($sim_q_option) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($sim_q_option as $key) {

                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $key->sim_q_option_text; ?></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Action" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Lihat data" data-bs-target="#FormDetail<?php echo $key->sim_q_option_id; ?>"><i class="bi bi-eye"></i> Detail</button>
                                                                </li>
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormUbah<?php echo $key->sim_q_option_id; ?>"><i class="bi bi-pencil-square"></i> Ubah</button>
                                                                </li>
                                                                <li>
                                                                    <?php echo form_open_multipart("sim_q_option/delete") ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item" title="Delete data"><i class="bi bi-x-lg"></i> Delete</button>
                                                                    <input type="hidden" class="form-control" name="sim_q_option_id" value="<?php echo $key->sim_q_option_id; ?>">
                                                                    <input type="hidden" class="form-control" placeholder="simation questions Text" name="sim_question_id" value="<?= $this->uri->segment(3); ?>">
                                                                    <?php echo form_close(); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Detail sim_q_option -->
                                                <div class="modal fade text-start" id="FormDetail<?php echo $key->sim_q_option_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form simation questions Details</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <form>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="form-group">

                                                                            <?php
                                                                            if (file_exists('./upload/option/' . $key->sim_q_option_text))
                                                                                echo '<b>File :</b> <br><a href="' . base_url('upload/option/' . $key->sim_q_option_text) . '" target="_blank" rel="noopener noreferrer">- ' . $key->sim_q_option_text . '</a>';
                                                                            else
                                                                                echo '<b>Text :</b> <br>' . $key->sim_q_option_text;
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="reset" class="btn btn-light-secondary"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block" data-bs-dismiss="modal">Tutup</span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Modal Ubah Informasi -->
                                                <div class="modal fade text-start" id="FormUbah<?php echo $key->sim_q_option_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form Update simation questions</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <?php echo form_open_multipart("sim_q_option/update"); ?>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <?php echo csrf(); ?>
                                                                    <input type="hidden" class="form-control" placeholder="simation questions Text" name="sim_question_id" value="<?= $this->uri->segment(3); ?>">
                                                                    <input type="hidden" class="form-control" placeholder="simation questions Text" name="sim_q_option_id" value="<?= $key->sim_q_option_id; ?>">
                                                                    <?php
                                                                    if (!file_exists('./upload/option/' . $key->sim_q_option_text)) { ?>
                                                                        <div class="form-group">
                                                                            <label for="gallery_name">Text <?php if ($sim_question[0]->sim_question_type == 'radio') echo '<span style="font-size: 12px; color:red;">Pilih Salah Satu Inputan</span>'; ?> </label>
                                                                            <input type="text" class="form-control" placeholder="simation questions Text" name="sim_q_option_text" value="<?= $key->sim_q_option_text; ?>">
                                                                        </div>
                                                                    <?php } else { ?>
                                                                        <div class="form-group">
                                                                            <label for="gallery_name">File <span style="font-size: 12px; color:red;">Pilih Salah Satu Inputan</span></label>
                                                                            <input type="file" class="form-control" placeholder="simation questions Text" name="sim_q_option_text">
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary ml-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Save</span>
                                                                </button>
                                                                <button type="reset" class="btn btn-light-secondary">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Reset</span>
                                                                </button>
                                                            </div>
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                </div>


                                        <?php
                                                $no++;
                                            }
                                        } else {
                                            echo '
                                                <tr class="text-center">
                                                    <td colspan="5">Data Not Found</td>
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
        <!-- News Category end -->
    </div>