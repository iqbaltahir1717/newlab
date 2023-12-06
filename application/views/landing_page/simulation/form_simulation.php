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
                                <?php if ($key->sim_question_multi == 'Y') { ?>
                                    <div class="row" id="multiple">
                                        <div class="form-group col-lg-12">
                                            <label for=""><b><?= $key->sim_question_text ?> <span class="hint">(Choose one or more)​</span> <span style="">*</span></b></label>
                                            <select multiple class="select select2" name="response<?= $no ?>[]" required style="width:100%">
                                                <?php
                                                if ($sim_goals) {
                                                    foreach ($sim_goals as $value) {
                                                        echo '<option value="' . $value->sim_goals_id . '">' . $value->sim_goals_text . '</option>';
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label for=""><b><?= $key->sim_question_text ?> <span class="hint">(Choose one)​​</span> <span style="">*</span></b></label>

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
                                        </div>
                                    </div>

                                <?php } ?>


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
                                <div class="row align-items-end">
                                    <div class="form-group col-lg-10">
                                        <label for=""><b><?= $key->sim_question_text ?> <span>*</span></b></label>
                                        <input id="fileupload" accept=".jpeg, .png, .jpg" type="file" class="form-control form-control-xl" style="height:auto !important; padding:12px !important" name="response<?= $no ?>" placeholder="Enter <?= $key->sim_question_text ?> " required>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <a onclick="uploadFile();" class="btn btn-primary btn-sm btn-block" style="width:100%; padding: 14.5px" title="Scan"><i class="fa-solid fa-expand"></i></a>
                                    </div>
                                    <div class="col-lg-12">
                                        <span style="color:red"><i>Please choose a picture with close up to the object for achieve a more accurate color scan.</i></span> <a target="__blank" href="<?= base_url(); ?>upload/question/<?php if ($sim_response[0]->problems_experienced  == "Skin") echo "lip example photos.png";
                                                                                                                                                                                                                                        else echo "teeth example photos.png" ?>"><u><br>check example here</u></a>
                                    </div>
                                </div>
                                <div class="card-product-item mt-4" id="card-color">
                                    <hr>
                                    <div class="d-flex mt-4">
                                        <div class="card-detail col-lg px-0">
                                            <center>
                                                <h4><?= ucwords('Here is the result scan color of the image your uploaded') ?></h4>
                                                <div id="color" class="my-3" style="width:70px; height: 70px; border-radius:50%;">
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <center>

                                    <div class="row" id="level-bright">
                                        <div class="form-group col-lg-12">
                                            <label for=""><b>How bright do you want</b></label>
                                            <select class="select" name="sim_response_level">
                                                <option value="">- Choose Level Bright -</option>
                                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row" id="ruler-skin">
                                        <div class="form-group col-lg-12">
                                            <label for="">Color Skin References (Regular)</label>
                                            <br><img width="100%" src="<?= base_url('upload/question/skin.png') ?>">
                                        </div>
                                    </div>

                                    <div class="row" id="ruler-lips">
                                        <div class="form-group col-lg-12">
                                            <label for="">Color Lips References (Regular)</label>
                                            <br><img width="100%" src="<?= base_url('upload/question/libs.png') ?>">
                                        </div>
                                    </div>

                                    <div class="row" id="ruler-teeth">
                                        <div class="form-group col-lg-12">
                                            <label for="">Color Teeth References (Regular)</label>
                                            <br><img width="100%" src="<?= base_url('upload/question/teeth.png') ?>">
                                        </div>
                                    </div>
                                </center>

                            <?php } else { ?>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for=""><b><?= $key->sim_question_text ?> <span>*</span></b></label>
                                        <input id="input_ruler" type="<?= $key->sim_question_type ?>" class="form-control form-control-xl" style="height:auto !important; padding:12px !important" name="response<?= $no ?>" placeholder="Enter <?= $key->sim_question_text ?> " required>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>

                        <button id="submit" type="submit" class="btn btn-primary btn-sm" title="Tambah data"> Submit -></button>
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
        var problem = '<?= $sim_response[0]->problems_experienced ?>';

        $('.select2').select2();
        $('#card-color').hide();
        $('#ruler-skin').hide();
        $('#ruler-lips').hide();
        $('#ruler-teeth').hide();
        $('#level-bright').hide();


        if (problem == 'Skin' || problem == 'Teeth') {

            $('#multiple').hide();
            $('#submit').hide();
            $('#input_ruler').hide();
        }

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
                $('#color').css('background', 'linear-gradient(176deg, #' + html + ' 31.47%, rgba(245, 227, 223, 0.80) 74.09%, #FFF 113.83%)');
                $('#card-color').show();
                $('#multiple').show();
                $('#submit').show();
                $('#input_ruler').show();
                $('#level-bright').show();
                console.log(problem);
                // console.log($('#response1').val().toLowerCase().replace(/\s/g, ''));
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