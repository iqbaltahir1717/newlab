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
                        <li class="breadcrumb-item"><a href="<?php echo site_url('consult_response'); ?>"> consult_response</a></li>
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
        <!-- Create consult_response start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <a href="<?php echo site_url('consult_response') ?>" class="btn btn-warning btn-sm" title="kembali ke halaman sebelumnya"><i class="bi bi-arrow-left"></i> kembali</a>
                        </div>
                    </div>

                    <!-- Create consult_response -->
                    <div class="row p-4">
                        <div class="col-12">
                            <?php echo form_open_multipart("consult_response/create") ?>
                            <form action="form">
                                <?php echo csrf(); ?>
                                <?php foreach ($consult_question as $key) {
                                    if ($key->consult_question_type != 'dropdown') {
                                ?>
                                        <div class="form-group">
                                            <label for=""><b><?= $key->consult_question_text ?> <span style="color:red">*</span></b></label>
                                            <input type="<?= $key->consult_question_type ?>" class="form-control" placeholder="" name="response[]" required="required">
                                            <input type="hidden" class="form-control" placeholder="" name="question[]" value="<?= $key->consult_question_text ?> " required="required">
                                        </div>
                                    <?php } else { ?>
                                        <input type="hidden" class="form-control" placeholder="" name="question[]" value="<?= $key->consult_question_text ?> " required="required">
                                        <div class="form-group">
                                            <label for=""><b><?= $key->consult_question_text ?> <span style="color:red">*</span></b></label>
                                            <select <?php if ($key->consult_question_multi == 'Y') echo 'multiple'; ?> class="form-select" name="response[]" required style="width:100%">
                                                <option value="">-Pilih <?= $key->consult_question_text ?> -</option>
                                                <?php
                                                $option = $this->m_consult_q_option->read('', '', '', $key->consult_question_id);
                                                if ($option) {
                                                    foreach ($option as $value) {
                                                        echo '<option>' . $value->consult_q_option_text . '</option>';
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                <?php }
                                } ?>

                                <div class="form-group mt-3 text-end">
                                    <button type="submit" class="btn btn-primary btn-sm" title="Tambah data"><i class="bi bi-save2"></i> Simpan</button>
                                </div>
                            </form>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                </div>
            </div>
        </section>
        <!-- Create consult_response end -->
    </div>