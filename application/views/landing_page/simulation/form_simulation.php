<main id="main" style="background-color: #EEEEEE;">
    <section id="greetings" class="simulation">
        <div class="container px-0">
            <div class="d-flex flex-wrap content justify-content-center">
                <div class="col-lg-7 col-md-10 col-sm-12">
                    <div class="d-flex flex-column">
                        <div class="text-heading">
                            <h3>Please fill your data first for see result.</h3>
                        </div>
                        <?php echo form_open_multipart("simulation/create_simulation") ?>

                        <?php foreach ($sim_question as $no => $key) {
                        ?>
                            <input type="hidden" class="form-control" placeholder="" name="sim_response_id" value="<?= $this->uri->segment(3) ?> " required="required">
                            <input type="hidden" class="form-control" placeholder="" name="sim_question_type[]" value="<?= $key->sim_question_type  ?> " required="required">
                            <input type="hidden" class="form-control" placeholder="" name="sim_question_multi[]" value="<?= $key->sim_question_multi  ?> " required="required">
                            <input type="hidden" class="form-control" placeholder="" name="question[]" value="<?= $key->sim_question_text ?> " required="required">
                            <?php echo csrf(); ?>
                            <?php if ($key->sim_question_type == 'dropdown') {
                            ?>

                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for=""><b><?= $key->sim_question_text ?> <span style="">*</span></b></label>
                                        <?php if ($key->sim_question_multi == 'Y') { ?>
                                            <select multiple class="select select2" name="response<?= $no ?>[]" required style="width:100%">
                                                <?php
                                                if ($sim_goals) {
                                                    foreach ($sim_goals as $value) {
                                                        echo '<option value="' . $value->sim_goals_id . '">' . $value->sim_goals_text . '</option>';
                                                    }
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                            <select class="select" name="response<?= $no ?>" required style="width:100%">
                                                <option value="">-Pilih <?= $key->sim_question_text ?>-</option>;
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
                                </div>

                            <?php } elseif ($key->sim_question_type == 'radio') { ?>
                                <div class="row">
                                    <div class=" form-group col-lg-12">
                                        <label for=""><b><?= $key->sim_question_text ?> <span>*</span></b></label>
                                        <div class="row mx-0">
                                            <?php
                                            $option = $this->m_sim_q_option->read('', '', '', $key->sim_question_id);
                                            if ($option) {
                                                foreach ($option as $value) {
                                            ?>
                                                    <label class="rad-label">
                                                        <input type="radio" class="rad-input" name="response<?= $no ?>" value="<?= $value->sim_q_option_text ?>">
                                                        <div class="rad-design"></div>
                                                        <div class="rad-text">
                                                            <?php
                                                            if (file_exists('./upload/option/' . $value->sim_q_option_text))
                                                                echo '<img width="94" src="' . base_url('upload/option/' . $value->sim_q_option_text) . '">';
                                                            else
                                                                echo $value->sim_q_option_text ?>
                                                        </div>
                                                    </label>
                                            <?php   }
                                            } ?>
                                        </div>
                                    </div>
                                </div>

                            <?php } elseif ($key->sim_question_type == 'textarea') { ?>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for=""><b><?= $key->sim_question_text ?> <span>*</span></b></label>
                                        <textarea name="response<?= $no ?>" cols="20" rows="5" class="form-control" placeholder="<?= $key->sim_question_text ?>"></textarea>
                                    </div>
                                </div>
                            <?php } elseif ($key->sim_question_type == 'info') { ?>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for=""><b><?= $key->sim_question_text ?> <span>*</span></b></label>
                                        <?php
                                        if (file_exists('./upload/question/' . $key->sim_question_image))
                                            echo '<br><img width="500" src="' . base_url('upload/question/' . $key->sim_question_image) . '">';
                                        ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for=""><b><?= $key->sim_question_text ?> <span>*</span></b></label>
                                        <input accept=".jpeg, .png, .jpg" type="<?= $key->sim_question_type ?>" class="form-control form-control-xl" name="response<?= $no ?>" placeholder="Masukkan <?= $key->sim_question_text ?> " required>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>


                        <!-- <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="">Berat Badan (kg) <span>*</span></label>
                                    <input type="number" class="form-control form-control-xl" name="response" placeholder="Value Berat Badan (kg)" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="">Tinggi Badan (cm) <span>*</span></label>
                                    <input type="number" class="form-control form-control-xl" name="response" placeholder="Value Tinggi Badan (cm)" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="">Lingkar Perut (cm) <span>*</span></label>
                                    <input type="number" class="form-control form-control-xl" name="response" placeholder="Value Lingkar Perut (cm)" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="">Specific Problem <span>*</span></label>
                                    <textarea name="user_problem_specific" id="user_problem_specific" cols="20" rows="5" class="form-control" placeholder="Enter your problem"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" form-group col-lg-12">
                                    <label for="">Bentuk Badan Yang Mendekati <span>*</span></label>
                                    <div class="row mx-0">
                                        <label class="rad-label">
                                            <input type="radio" class="rad-input" name="user_gender" value="Perempuan" checked>
                                            <div class="rad-design"></div>
                                            <div class="rad-text"><img src="<?= base_url(); ?>upload/option/option-20231128111542-6632.png" alt="" width="94"></div>
                                        </label>
                                        <label class="rad-label">
                                            <input type="radio" class="rad-input" name="user_gender" value="Perempuan" checked>
                                            <div class="rad-design"></div>
                                            <div class="rad-text"><img src="<?= base_url(); ?>upload/option/option-20231128111910-9325.png" alt="" width="94"></div>
                                        </label>
                                        <label class="rad-label">
                                            <input type="radio" class="rad-input" name="user_gender" value="Perempuan" checked>
                                            <div class="rad-design"></div>
                                            <div class="rad-text"><img src="<?= base_url(); ?>upload/option/option-20231128111917-1805.png" alt="" width="94"></div>
                                        </label>
                                        <label class="rad-label">
                                            <input type="radio" class="rad-input" name="user_gender" value="Perempuan" checked>
                                            <div class="rad-design"></div>
                                            <div class="rad-text"><img src="<?= base_url(); ?>upload/option/option-20231128111922-4874.png" alt="" width="94"></div>
                                        </label>
                                        <label class="rad-label">
                                            <input type="radio" class="rad-input" name="user_gender" value="Perempuan" checked>
                                            <div class="rad-design"></div>
                                            <div class="rad-text"><img src="<?= base_url(); ?>upload/option/option-20231128111927-8575.png" alt="" width="94"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="">Apakah kamu menjaga pola makan dan hidup sehat? <span>*</span></label>
                                    <select class="select select2" name="user_problem" id="user_problem">
                                        <option value="">- Choose Here -</option>
                                        <option value="body">Body</option>
                                        <option value="skin">Skin</option>
                                        <option value="teeth">Teeth</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="">Pilih target turunnya berat badan​ <span>*</span></label>
                                    <select class="select select2" name="user_problem" id="user_problem">
                                        <option value="">- Choose Here -</option>
                                        <option value="body">Body</option>
                                        <option value="skin">Skin</option>
                                        <option value="teeth">Teeth</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="">Target yang ingin kamu capai? <span class="hint">?(bisa centang lebih dari 1)​</span> <span>*</span></label>
                                    <select class="select select2" name="user_problem" id="user_problem">
                                        <option value="">- Choose Here -</option>
                                        <option value="body">Body</option>
                                        <option value="skin">Skin</option>
                                        <option value="teeth">Teeth</option>
                                    </select>
                                </div>
                            </div> -->


                        <button type="submit" class="btn btn-primary btn-sm" title="Tambah data"> Next -></button>
                        <!-- <a href="<?= site_url(); ?>simulation/form_successfully" class="btn btn-primary btn-sm">Next -></a> -->
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<script src="<?php echo base_url() ?>assets/landing_page/vendor/jquery/jquery.min.js"></script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<!-- Main JS File -->

<script src="<?php echo base_url() ?>assets/landing_page/js/main.js"></script>

<script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();

    });
</script>