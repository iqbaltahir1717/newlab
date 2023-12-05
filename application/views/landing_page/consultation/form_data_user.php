<main id="main">
    <section id="greetings" class="consultation">
        <div class="container">
            <div class="d-flex flex-wrap content align-items-start">
                <div class="col-lg-6">
                    <div class="d-flex flex-column">
                        <div class="text-heading">
                            <span>Welcome to <b>NEWLAB+</b> <b><?= $this->session->userdata('user_fullname') ?>👋</b></span>
                            <h3>Please fill your profile & preference.</h3>
                        </div>
                        <?php echo form_open_multipart("consultation/create") ?>
                        <?php foreach ($consult_question as $no => $key) {
                        ?>
                            <input type="hidden" class="form-control" placeholder="" name="question[]" value="<?= $key->consult_question_text ?> " required="required">
                            <?php echo csrf(); ?>
                            <?php if ($key->consult_question_type == 'dropdown') {
                            ?>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for=""><b><?= $key->consult_question_text ?> <span style="">*</span></b></label>
                                        <select <?php if ($key->consult_question_multi == 'Y') echo 'multiple'; ?> class="select select2" name="response<?= $no ?>" required style="width:100%">
                                            <option value="">- <?= $key->consult_question_text ?> -</option>
                                            <?php
                                            $option = $this->m_consult_q_option->read('', '', '', $key->consult_question_id);
                                            if ($option) {
                                                foreach ($option as $value) {
                                                    echo '<option>' . $value->consult_q_option_text . '</option>';
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                            <?php } elseif ($key->consult_question_type == 'radio') { ?>
                                <div class="row">
                                    <div class=" form-group col-lg-12">
                                        <label for=""><b><?= $key->consult_question_text ?> <span>*</span></b></label>
                                        <div class="row mx-0">
                                            <?php
                                            $option = $this->m_consult_q_option->read('', '', '', $key->consult_question_id);
                                            if ($option) {
                                                foreach ($option as $value) {
                                            ?>
                                                    <label class="rad-label">
                                                        <input type="radio" class="rad-input" name="response<?= $no ?>" value="<?= $value->consult_q_option_text ?>">
                                                        <div class="rad-design"></div>
                                                        <div class="rad-text"><?= $value->consult_q_option_text ?></div>
                                                    </label>
                                            <?php   }
                                            } ?>
                                        </div>
                                    </div>
                                </div>

                            <?php } elseif ($key->consult_question_type == 'textarea') { ?>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for=""><b><?= $key->consult_question_text ?> <span>*</span></b></label>
                                        <textarea name="response<?= $no ?>" cols="20" rows="5" class="form-control" placeholder="Enter <?= $key->consult_question_text ?>"></textarea>
                                    </div>
                                </div>


                            <?php } else { ?>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for=""><b><?= $key->consult_question_text ?> <span>*</span></b></label>
                                        <input type="text" class="form-control form-control-xl" name="response<?= $no ?>" placeholder="Enter <?= $key->consult_question_text ?> " required>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>


                        <button type="submit" class="btn btn-primary btn-sm" title="Tambah data"> Submit -></button>
                        <!-- <a type="submit" class="btn btn-primary btn-sm">Submit -></a> -->
                        <!-- <a href="<?= site_url(); ?>consultation/form_successfully" class="btn btn-primary btn-sm">Submit -></a> -->
                        <?php echo form_close(); ?>

                    </div>
                </div>
                <div class="col-lg-5">
                    <img class="hero-image" src="<?= base_url(); ?>/assets/core-images/preview-image/thumbnail-92323.jpg" alt="preview">
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->