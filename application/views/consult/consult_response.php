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
        <!-- consult_response Start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <a href="<?php echo site_url('consult_response/create_page') ?>" class="btn btn-primary btn-sm" title="Tambah data"><i class="fas fa-plus"></i> Tambah</a>
                            <a href="<?php echo site_url('consult_response') ?>" class="btn btn-success btn-sm" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> refresh</a>
                        </div>
                    </div>

                    <!-- data tabel -->
                    <div class="row p-4">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table1">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th>Name</th>
                                            <th width="20%">Createtime</th>
                                            <th width="5%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($consult_response) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($consult_response as $key) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $key->user_fullname; ?></td>
                                                    <td><?php echo $key->createtime; ?></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Aksi" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Lihat data" data-bs-target="#FormDetail<?php echo $key->consult_response_id; ?>"><i class="bi bi-eye"></i> Detail</button>
                                                                </li>
                                                                <li>
                                                                    <?php echo form_open("consult_response/delete") ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item" title="Hapus data"><i class="bi bi-x-lg"></i> Hapus</button>
                                                                    <input type="hidden" class="form-control" name="consult_response_id" required="required" value="<?php echo $key->consult_response_id; ?>">
                                                                    <?php echo form_close(); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Detail consult_response -->
                                                <div class="modal fade text-start" id="FormDetail<?php echo $key->consult_response_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form Consultation Responses Details</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <form>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <?php
                                                                        $arr = unserialize($key->consult_response_text);
                                                                        if ($arr) {
                                                                            foreach ($arr as $value) { ?>
                                                                                <div class="form-group">
                                                                                    <b><?= $value['q'] ?> :</b> <br>
                                                                                    <?= $value['r'] ?>
                                                                                </div>
                                                                        <?php }
                                                                        } ?>
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
        <!-- consult_response end -->
    </div>