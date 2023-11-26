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
                        <li class="breadcrumb-item"><a href="<?php echo site_url('sim_response'); ?>"> sim_response</a></li>
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
        <!-- Create sim_response start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <a href="<?php echo site_url('sim_response') ?>" class="btn btn-warning btn-sm" title="kembali ke halaman sebelumnya"><i class="bi bi-arrow-left"></i> kembali</a>
                        </div>
                    </div>

                    <!-- Create sim_response -->
                    <div class="row p-4">
                        <div class="col-12">
                            <?php echo form_open_multipart("sim_response/create") ?>
                            <form action="form">
                                <?php echo csrf(); ?>
                                <div class="form-group">
                                    <label for=""><b>Nama<span style="color:red">*</span></b></label>
                                    <input type="text" class="form-control" placeholder="" name="sim_response_name" value="<?php if (!empty($sim_response)) echo $sim_response[0]->sim_response_name; ?>" required="required">
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Jenis Kelamin <span style="color:red">*</span></b></label>
                                    <select class="choices form-select" name="sim_response_gender" required style="width:100%">
                                        <option value="">-Pilih Jenis Kelamin-</option>
                                        <option <?php if (!empty($sim_response) and $sim_response[0]->sim_response_gender == 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
                                        <option <?php if (!empty($sim_response) and $sim_response[0]->sim_response_gender == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for=""><b>Kegiatan Harian <span style="color:red">*</span></b></label>
                                    <select class="choices form-select" name="daily_activity" required style="width:100%">
                                        <option value="">-Pilih Kegiatan Harian-</option>
                                        <option <?php if (!empty($sim_response) and $sim_response[0]->daily_activity == 'Indoor') echo 'selected'; ?>>Indoor</option>
                                        <option <?php if (!empty($sim_response) and $sim_response[0]->daily_activity == 'Outdoor') echo 'selected'; ?>>Outdoor</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for=""><b>Permasalahan Yang Dialami <span style="color:red">*</span></b></label>
                                    <select class="choices form-select" name="problems_experienced" required style="width:100%">
                                        <option value="">-Pilih Permasalahan Yang Dialami-</option>
                                        <option <?php if (!empty($sim_response) and $sim_response[0]->problems_experienced == 'Body') echo 'selected'; ?>>Body</option>
                                        <option <?php if (!empty($sim_response) and $sim_response[0]->problems_experienced == 'Skin') echo 'selected'; ?>>Skin</option>
                                        <option <?php if (!empty($sim_response) and $sim_response[0]->problems_experienced == 'Teeth') echo 'selected'; ?>>Teeth</option>
                                    </select>
                                </div>

                                <?php
                                if ($sim_response) {
                                    echo '<hr>';
                                    foreach ($sim_question as $i => $key) {
                                        if ($key->sim_question_type != 'dropdown') {
                                ?>
                                            <input type="hidden" class="form-control" placeholder="" name="sim_question_type[]" value="<?= $key->sim_question_type ?> " required="required">
                                            <input type="hidden" class="form-control" placeholder="" name="sim_question_multi[]" value="<?= $key->sim_question_multi ?> " required="required">
                                            <input type="hidden" class="form-control" placeholder="" name="question[]" value="<?= $key->sim_question_text ?> " required="required">
                                            <input type="hidden" class="form-control" placeholder="" name="sim_response_id" value="<?= $sim_response[0]->sim_response_id ?> " required="required">
                                            <div class="form-group">
                                                <label for=""><b><?= $key->sim_question_text ?> <span style="color:red">*</span></b></label>
                                                <input <?php if ($key->sim_question_type == 'file') echo 'accept=".jpge, .jpg, .png"'; ?> type="<?= $key->sim_question_type ?>" class="form-control" placeholder="" name="response<?= $i ?>" required="required">
                                            </div>
                                        <?php } else { ?>
                                            <input type="hidden" class="form-control" placeholder="" name="sim_question_multi[]" value="<?= $key->sim_question_multi ?> " required="required">
                                            <input type="hidden" class="form-control" placeholder="" name="question[]" value="<?= $key->sim_question_text ?> " required="required">
                                            <input type="hidden" class="form-control" placeholder="" name="sim_question_type[]" value="<?= $key->sim_question_type ?> " required="required">
                                            <input type="hidden" class="form-control" placeholder="" name="sim_response_id" value="<?= $sim_response[0]->sim_response_id ?> " required="required">
                                            <div class="form-group">
                                                <label for=""><b><?= $key->sim_question_text ?> <span style="color:red">*</span> <?php if ($key->sim_question_multi == 'Y') echo '<span style="font-size:12px;">(Bisa lebih dari 1)</span>'; ?> </b></label>
                                                <?php if ($key->sim_question_multi == 'Y') { ?>
                                                    <select multiple class="choices form-select" name="response<?php echo $i . '[]'; ?>" required style="width:100%">
                                                        <option value="">-Pilihaaaa <?= $key->sim_question_text ?> -</option>
                                                        <?php
                                                        if ($sim_goals) {
                                                            foreach ($sim_goals as $value) {
                                                                echo '<option value="' . $value->sim_goals_id . '">' . $value->sim_goals_text . '</option>';
                                                            }
                                                        } ?>
                                                    </select>
                                                <?php } else { ?>
                                                    <select class="choices form-select" name="response<?php echo $i; ?>" required style="width:100%">
                                                        <option value="">-Pilih <?= $key->sim_question_text ?> -</option>
                                                        <?php
                                                        $option = $this->m_sim_q_option->read('', '', '', $key->sim_question_id);
                                                        if ($option) {
                                                            foreach ($option as $value) {
                                                                echo '<option>' . $value->sim_q_option_text . '</option>';
                                                            }
                                                        } ?>
                                                    </select>
                                                <?php } ?>
                                            </div>
                                <?php }
                                    }
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
        <!-- Create sim_response end -->
    </div>