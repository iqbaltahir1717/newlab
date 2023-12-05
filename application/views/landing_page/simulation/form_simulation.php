<main id="main" style="background-color: #EEEEEE; min-height:100vh">
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
                                        <?php if ($key->sim_question_multi == 'Y') { ?>
                                            <label for=""><b><?= $key->sim_question_text ?> <span class="hint">(Choose one or more)​</span> <span style="">*</span></b></label>
                                        <?php } else { ?>
                                            <label for=""><b><?= $key->sim_question_text ?> <span class="hint">(Choose one)​​</span> <span style="">*</span></b></label>
                                        <?php } ?>
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
                                            <select id="response<?= $no ?>" class="select" name="response<?= $no ?>" required style="width:100%">
                                                <option value="">-Choose <?= $key->sim_question_text ?>-</option>;
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
                            <?php } elseif ($key->sim_question_type == 'file') { ?>
                                <div class="row">
                                    <div class="form-group col-lg-10">
                                        <label for=""><b><?= $key->sim_question_text ?> <span>*</span></b></label>
                                        <input id="fileupload" accept=".jpeg, .png, .jpg" type="file" class="form-control form-control-xl" style="height:auto !important; padding:12px !important" name="response<?= $no ?>" placeholder="Enter <?= $key->sim_question_text ?> " required>
                                        <span style="color:red"><i>Please choose a picture with close up to the object for achieve a more accurate color scan.</i></span> <a target="__blank" href="<?= base_url(); ?>upload/question/<?php if ($sim_response[0]->problems_experienced  == "Skin") echo "lip example photos.png";
                                                                                                                                                                                                                                        else echo "teeth example photos.png" ?>"><u><br>check example here</u></a>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label for=""><b>Scan Color</b></label>
                                        <button onclick="uploadFile();" class="btn btn-primary btn-sm" title="Tambah data"> *</button>
                                    </div>
                                </div>


                                <div class="card-product-item" id="card-color">
                                    <div class="d-flex">
                                        <div class="card-detail col-lg px-0">
                                            <center>
                                                <h3><?= ucwords('This is the dominant color of the image your uploaded')  ?></h3>
                                                <div id="color" class="my-3" style="width:70px; height: 70px; border-radius:50%; border: 3px solid #000;">
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>

                                <center>
                                    <div class="row" id="ruler-skin">
                                        <div class="form-group col-lg-12">
                                            <label for=""><b>Color Skin References (Regular) ?</b></label>
                                            <br><img width="500" src="<?= base_url('upload/question/skin.png') ?>">
                                        </div>
                                    </div>

                                    <div class="row" id="ruler-lips">
                                        <div class="form-group col-lg-12">
                                            <label for=""><b>Color Lips References (Regular) ?</b></label>
                                            <br><img width="100%" src="<?= base_url('upload/question/libs.png') ?>">
                                        </div>
                                    </div>

                                    <div class="row" id="ruler-teeth">
                                        <div class="form-group col-lg-12">
                                            <label for=""><b>How bright do you want your teeth (Regular) ?</b></label>
                                            <br><img width="500" src="<?= base_url('upload/question/teeth.png') ?>">
                                        </div>
                                    </div>
                                </center>

                            <?php } else { ?>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for=""><b><?= $key->sim_question_text ?> <span>*</span></b></label>
                                        <input type="<?= $key->sim_question_type ?>" class="form-control form-control-xl" style="height:auto !important; padding:12px !important" name="response<?= $no ?>" placeholder="Enter <?= $key->sim_question_text ?> " required>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>

                        <button type="submit" class="btn btn-primary btn-sm" title="Tambah data"> Next -></button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<script src="<?php echo base_url() ?>assets/landing_page/vendor/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?php echo base_url() ?>assets/landing_page/js/main.js"></script>

<script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
        $('#card-color').hide();
        $('#ruler-skin').hide();
        $('#ruler-lips').hide();
        $('#ruler-teeth').hide();

        // alert(problem);
    });
</script>

<script>
    var problem = '<?= $sim_response[0]->problems_experienced ?>';
    async function uploadFile() {
        let formData = new FormData();
        formData.append("file", fileupload.files[0]);

        $.ajax({
            url: '<?= base_url('simulation/upload_image') ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(html) {
                $('#color').css('background-color', '#' + html);
                $('#card-color').show();
                // $('#ruler-skin').show();
                console.log($('#response1').val().toLowerCase().replace(/\s/g, ''));
                console.log(problem);
                if (problem == 'Teeth')
                    $('#ruler-teeth').show();
                else if ($('#response1').val().toLowerCase().replace(/\s/g, '') == 'face' || $('#response1').val().toLowerCase().replace(/\s/g, '') == 'bodyskin' || $('#response1').val().toLowerCase().replace(/\s/g, '') == 'foldareas')
                    $('#ruler-skin').show();
                else if ($('#response1').val().toLowerCase().replace(/\s/g, '') == 'lips')
                    $('#ruler-lips').show();
            }
        });
    }
</script>