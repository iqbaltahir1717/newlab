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
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#FormAdd"><i class="fas fa-plus"></i>
                                Add
                            </button>
                            <a href="<?php echo site_url('sim_question') ?>" class="btn btn-success btn-sm" title="Refresh"><i class="bi bi-arrow-clockwise"></i> refresh</a>
                        </div>
                        <!-- Modal Add News Category -->
                        <div class="modal fade text-start" id="FormAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h4 class="modal-title" id="myModalLabel33">Form Add simulation questions</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <?php echo form_open("sim_question/create") ?>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for=""><b>Part <span style="color:red">*</span></b></label>
                                                <select required class=" form-select" name="sim_question_part" required style="width:100%">
                                                    <option value="">-Pilih Part-</option>
                                                    <option>Body</option>
                                                    <option>Skin</option>
                                                    <option>Teeth</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="gallery_name">Text<span style="color:red">*</span></label>
                                                <?php echo csrf(); ?>
                                                <input type="text" class="form-control" placeholder="simulation questions Text" name="sim_question_text" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label for="gallery_name">Image (Optional)</label>
                                                <input type="file" class="form-control" placeholder="simulation questions Text" name="sim_question_image">
                                            </div>

                                            <div class="form-group">
                                                <label for=""><b>Type <span style="color:red">*</span></b></label>
                                                <select class=" form-select" name="sim_question_type" required style="width:100%">
                                                    <option value="">-Pilih Type-</option>
                                                    <option value="info">Info</option>
                                                    <option value="text">Text</option>
                                                    <option value="textarea">Text Area</option>
                                                    <option value="number">Number</option>
                                                    <option value="file">File</option>
                                                    <option value="dropdown">Dropdown</option>
                                                    <option value="radio">Radio Button</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for=""><b>Multiple <span style="color:red">*</span></b></label>
                                                <select class=" form-select" name="sim_question_multi" required style="width:100%">
                                                    <!-- <option value="">-Pilih Multiple-</option> -->
                                                    <option value="N">N</option>
                                                    <option value="Y">Y</option>
                                                </select>
                                            </div>
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
                                            <th>Type</th>
                                            <th>Part</th>
                                            <th>Options</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($sim_question) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($sim_question as $key) {

                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $key->sim_question_text; ?></td>
                                                    <td><?php echo ucwords($key->sim_question_type); ?></td>
                                                    <td><?php echo $key->sim_question_part; ?></td>
                                                    <td>
                                                        <?php if (($key->sim_question_type == 'radio' or $key->sim_question_type == 'dropdown') and $key->sim_question_text != 'Goals yang ingin dicapai') { ?>
                                                            <a href="<?php echo site_url('sim_q_option/index/' . $key->sim_question_id) ?>" class="btn btn-primary btn-sm" title="Tambah data"><i class="fas fa-eye"></i> </a>
                                                        <?php } else {
                                                            echo '-';
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Action" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Lihat data" data-bs-target="#FormDetail<?php echo $key->sim_question_id; ?>"><i class="bi bi-eye"></i> Detail</button>
                                                                </li>
                                                                <?php if ($key->sim_question_text != 'Goals yang ingin dicapai') { ?>
                                                                    <li>
                                                                        <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormUbah<?php echo $key->sim_question_id; ?>"><i class="bi bi-pencil-square"></i> Ubah</button>
                                                                    </li>
                                                                    <li>
                                                                        <?php echo form_open_multipart("sim_question/delete") ?>
                                                                        <?php echo csrf(); ?>
                                                                        <button type="submit" class="dropdown-item" title="Delete data"><i class="bi bi-x-lg"></i> Delete</button>
                                                                        <input type="hidden" class="form-control" name="sim_question_id" required="required" value="<?php echo $key->sim_question_id; ?>">
                                                                        <?php echo form_close(); ?>
                                                                    </li>
                                                                <?php  } ?>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Detail sim_question -->
                                                <div class="modal fade text-start" id="FormDetail<?php echo $key->sim_question_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form simulation questions Details</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <form>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="form-group">
                                                                            <b>Part :</b> <br>
                                                                            <?php echo $key->sim_question_part; ?>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <b>Text :</b> <br>
                                                                            <?php echo $key->sim_question_text; ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <b>Type :</b> <br>
                                                                            <?php echo $key->sim_question_type; ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <b>Multiple :</b> <br>
                                                                            <?php echo $key->sim_question_multi; ?>
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
                                                <div class="modal fade text-start" id="FormUbah<?php echo $key->sim_question_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form Update simulation questions</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <?php echo form_open("sim_question/update"); ?>
                                                            <div class="modal-body">
                                                                <div class="row">

                                                                    <?php echo csrf(); ?>
                                                                    <div class="form-group">
                                                                        <label for=""><b>Part <span style="color:red">*</span></b></label>
                                                                        <select class="form-select" name="sim_question_part" required style="width:100%">
                                                                            <option value="">-Pilih Part-</option>
                                                                            <option <?php if ($key->sim_question_part == 'Body') echo 'selected'; ?>>Body</option>
                                                                            <option <?php if ($key->sim_question_part == 'Skin') echo 'selected'; ?>>Skin</option>
                                                                            <option> <?php if ($key->sim_question_part == 'Teeth') echo 'selected'; ?>Teeth</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="sim_question_text">Text<span style="color:red">*</span></label>
                                                                        <input type="text" class="form-control" placeholder="simulation questions Text" name="sim_question_text" required="required" value="<?php echo $key->sim_question_text; ?>">
                                                                        <input type="hidden" class="form-control" name="sim_question_id" required="required" value="<?php echo $key->sim_question_id; ?>">
                                                                        <input type="hidden" class="form-control" name="aaaaa" required="required" value="<?php echo $key->sim_question_id; ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="gallery_name">Image (Optional)</label>
                                                                        <input type="file" class="form-control" placeholder="simulation questions Text" name="sim_question_image">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for=""><b>Type <span style="color:red">*</span></b></label>
                                                                        <select class="form-select" name="sim_question_type" required style="width:100%">
                                                                            <option value="">-Pilih Type-</option>
                                                                            <option <?php if ($key->sim_question_type == 'info') echo 'selected'; ?> value="info">Info</option>
                                                                            <option <?php if ($key->sim_question_type == 'text') echo 'selected'; ?> value="text">Text</option>
                                                                            <option <?php if ($key->sim_question_type == 'textarea') echo 'selected'; ?> value="textarea">Text Area</option>
                                                                            <option <?php if ($key->sim_question_type == 'number') echo 'selected'; ?> value="number">Number</option>
                                                                            <option <?php if ($key->sim_question_type == 'file') echo 'selected'; ?> value="file">File</option>
                                                                            <option <?php if ($key->sim_question_type == 'dropdown') echo 'selected'; ?> value="dropdown">Dropdown</option>
                                                                            <option <?php if ($key->sim_question_type == 'radio') echo 'selected'; ?> value="radio">Radio Button</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for=""><b>Multiple <span style="color:red">*</span></b></label>
                                                                        <select class="form-select" name="sim_question_multi" required style="width:100%">
                                                                            <option value="">-Pilih Multiple-</option>
                                                                            <option <?php if ($key->sim_question_multi == 'Y') echo 'selected'; ?> value="Y">Y</option>
                                                                            <option <?php if ($key->sim_question_multi == 'N') echo 'selected'; ?> value="N">N</option>
                                                                        </select>
                                                                    </div>
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
                                                    <td colspan="8">Data Not Found</td>
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