<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>

<script>
    function showValidationModal() {
        $('#validationModal').modal('show');
    }
</script>

<style>
    .image_area {
        position: relative;
    }

    img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }

    .modal-lg {
        max-width: 1000px !important;
    }

    .overlay {
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.5);
        overflow: hidden;
        height: 0;
        transition: .5s ease;
        width: 100%;
    }

    .image_area:hover .overlay {
        height: 50%;
        cursor: pointer;
    }

    .text {
        color: #333;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }

    form {
        height: 100vh;
    }

    #main {
        background-color: #FFF;
        height: 87vh;
    }
</style>

<main id="main">
    <div id="greetings" class="simulation h-100">
        <div class="container-fluid px-0  h-100" style="position:relative">
            <ul class="slider px-0  h-100">
                <?php echo form_open_multipart("simulation/create_simulation") ?>
                <?php foreach ($sim_question as $no => $key) {
                ?>
                    <input type="hidden" class="form-control" placeholder="" name="sim_response_id" value="<?= $this->uri->segment(3) ?> " required="required">
                    <input type="hidden" class="form-control" placeholder="" name="sim_question_type[]" value="<?= $key->sim_question_type  ?> " required="required">
                    <input type="hidden" class="form-control" placeholder="" name="sim_question_multi[]" value="<?= $key->sim_question_multi  ?> " required="required">
                    <input type="hidden" class="form-control" placeholder="" name="question[]" value="<?= $key->sim_question_text ?> " required="required">
                    <?php echo csrf(); ?>
                    <li class="h-100 slider-item <?php if ($key->sim_question_order == 1) echo 'active' ?>">
                        <div class="d-flex flex-wrap content h-100 justify-content-start">
                            <div class="col-lg-6 px-0 h-100 container-left">
                                <div class="image-container image-holder">
                                    <div class="overlays"></div>
                                    <div class="overlays2"></div>
                                    <img class="image-banner" src="<?= base_url('upload/banner/' . strtolower($sim_response[0]->problems_experienced) . '/' . ($no + 1) . '.png'); ?>" alt="preview">
                                </div>
                            </div>
                            <div class="col-lg-5 container-right" style="padding: 32px;">
                                <div class="text-heading intro">
                                    <h3>Let's Understand Your <?php echo $sim_response[0]->problems_experienced ?>.</h3>
                                    <p>Before we reveal personalized results, please share some information about your <?php echo strtolower($sim_response[0]->problems_experienced) ?>.</p>
                                </div>
                                <hr>
                                <?php if ($key->sim_question_type == 'dropdown') {
                                ?>
                                    <?php if ($key->sim_question_multi == 'Y') { ?>
                                        <div class="row description" id="multiple">
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
                                        <div class="row description">
                                            <div class="form-group col-lg-12">
                                                <label><b><?= $key->sim_question_text ?> <span class="hint">(Choose one)​​</span> <span style="">*</span></b></label>
                                                <div class="">
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
                                        </div>
                                    <?php } ?>
                                <?php } elseif ($key->sim_question_type == 'radio') { ?>
                                    <div class="row description">
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
                                    <div class="row description">
                                        <div class="form-group col-lg-12">
                                            <label for=""><b><?= $key->sim_question_text ?> <span>*</span></b></label>
                                            <textarea required name="response<?= $no ?>" cols="20" rows="5" class="form-control" placeholder="<?= $key->sim_question_text ?>"></textarea>
                                        </div>
                                    </div>
                                <?php } elseif ($key->sim_question_type == 'info') { ?>
                                    <div class="row description">
                                        <div class="form-group col-lg-12">
                                            <label for=""><b><?= $key->sim_question_text ?> <span>*</span></b></label>
                                            <?php
                                            if (file_exists('./upload/question/' . $key->sim_question_image))
                                                echo '<br><img width="500" src="' . base_url('upload/question/' . $key->sim_question_image) . '">';
                                            ?>
                                        </div>
                                    </div>
                                <?php } elseif ($key->sim_question_type == 'file') { ?>
                                    <div class="row align-items-end description">
                                        <div class="form-group col-lg-12">
                                            <label for=""><b><?= $key->sim_question_text ?> <span>*</span></b></label>
                                            <input id="fileupload" accept=".jpeg, .png, .jpg" type="file" class="form-control form-control-xl" style="height:auto !important; padding:12px !important" name="response<?= $no ?>" placeholder="Enter <?= $key->sim_question_text ?> " required>
                                        </div>
                                    </div>
                                    <div class="row mt-4 description" id="level-bright">
                                        <div class="form-group col-lg-12 text-left">
                                            <label for=""><b>How bright do you want</b></label>
                                            <select required class="select" name="sim_response_level">
                                                <option value="">- Choose Level Bright -</option>
                                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row description" id="ruler-skin">
                                        <div class="form-group col-lg-12">
                                            <label for="">Color Skin References (Regular)</label>
                                            <br><img width="100%" src="<?= base_url('upload/question/skin.png') ?>">
                                        </div>
                                    </div>

                                    <div class="row description" id="ruler-lips">
                                        <div class="form-group col-lg-12">
                                            <label for="">Color Lips References (Regular)</label>
                                            <br><img width="100%" src="<?= base_url('upload/question/lips.png') ?>">
                                        </div>
                                    </div>
                                    <div class="row description" id="ruler-teeth">
                                        <div class="form-group col-lg-12">
                                            <label for="">Color Teeth References (Regular)</label>
                                            <br><img width="100%" src="<?= base_url('upload/question/teeth.png') ?>">
                                        </div>
                                    </div>
                                    <div class="row description">
                                        <div class="form-group col-lg-12">
                                            <button type="submit" class="btn-secondary" style="width:100%; padding: 14.5px" title="Scan"><i class="fa-solid fa-expand"></i> &nbsp; SCAN NOW</button>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="row description">
                                        <div class="form-group col-lg-12">
                                            <label for=""><b><?= $key->sim_question_text ?> <span>*</span></b></label>
                                            <input id="input_ruler" type="<?= $key->sim_question_type ?>" class="form-control form-control-xl" style="height:auto !important; padding:12px !important" name="response<?= $no ?>" placeholder="Enter <?= $key->sim_question_text ?> " required>
                                        </div>
                                    </div>

                                <?php } ?>

                                <?php if ($no == 7) { ?>
                                    <div class="row description">
                                        <div class="form-group col-lg-12">
                                            <button type="submit" class="btn-secondary" style="width:100%; padding: 14.5px" title="Scan"><i class="fa-solid fa-expand"></i> &nbsp; SCAN NOW</button>
                                        </div>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>
                    </li>
                <?php } ?>
                <?php echo form_close(); ?>
            </ul>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img src="" id="sample_image" />
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button onclick="uploadFile()" type="button" class="btn btn-primary" id="crop">Crop</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between nav-form">
                <div class="controls">
                    <a class="previous nav-button">
                        <span class="visually-hidden">Previous</span>
                        <span class="icon arrow-left" aria-hidden="true"></span>
                    </a>
                </div>
                <div class="controls">
                    <a class="next nav-button">
                        <span class="visually-hidden">Next</span>
                        <span class="icon arrow-right" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
</main>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="sample_image" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button onclick="uploadFile()" type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="validationModal" tabindex="-1" role="dialog" aria-labelledby="validationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="validationModalLabel">Please fill required question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Please fill in all required fields before proceeding.</p>
            </div>
        </div>
    </div>
</div>



<!-- <script src="<?php echo base_url() ?>assets/landing_page/vendor/jquery/jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?php echo base_url() ?>assets/landing_page/js/main.js"></script>

<script>
    $(document).ready(function() {
        var $modal = $('#modal');
        var image = document.getElementById('sample_image');

        $('#fileupload').change(function(event) {
            var files = event.target.files;

            $modal.modal('show');
            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };

            if (files && files.length > 0) {
                reader = new FileReader();
                reader.onload = function(event) {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 2,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 100,
                height: 100,
            });

            canvas.toBlob(function(blob) {
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    console.log(base64data);
                    $.ajax({
                        url: "<?= base_url('simulation/crop_image/' . decrypt_url($this->uri->segment(3))) ?>",
                        method: "POST",
                        data: {
                            image: base64data
                        },
                        success: function(data) {
                            console.log(data);
                            $modal.modal('hide');
                            $('#uploaded_image').attr('src', data);
                            //alert("success upload image");
                        }
                    });
                }
            });
        });

    });
</script>

<script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
        var problem = '<?= strtolower($sim_response[0]->problems_experienced); ?>';

        $('.select2').select2();
        $('#card-color').hide();
        $('#ruler-skin').hide();
        $('#ruler-lips').hide();
        $('#ruler-teeth').hide();
        $('#ruler-' + problem).show();
    });
</script>

<script>
    var problem = '<?= $sim_response[0]->problems_experienced ?>';

    async function uploadFile() {
        // Show the loading spinner before making the AJAX call
        // $('#loading-spinner').show();

        let formData = new FormData();
        formData.append("file", fileupload.files[0]);

        $.ajax({
            url: '<?= base_url('simulation/upload_image/' . decrypt_url($this->uri->segment(3))) ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(html) {
                // Hide the loading spinner in the success callback
                // $('#loading-spinner').hide();
            },
            error: function() {
                // Hide the loading spinner in case of an error
                // $('#loading-spinner').hide();
                // Handle the error as needed
                alert('Error uploading image');
            }
        });
    }
</script>

<!-- SWIPER FORM -->
<script>
    const items = document.querySelectorAll('.slider-item');
    const itemCount = items.length;
    const nextItem = document.querySelector('.next');
    const previousItem = document.querySelector('.previous');
    // const scanButton = document.querySelector('.btn-secondary');
    let count = 0;
    previousItem.style.display = 'none';

    function showNextItem() {
        // Check validation before moving to the next slide
        if (validateCurrentSlide()) {
            items[count].classList.remove('active');

            if (count < itemCount - 1) {
                count++;
            } else {
                count = 0;
            }

            items[count].classList.add('active');
            updateButtonVisibility();
        } else {
            // Display a modal if validation fails
            showValidationModal();
        }
    }

    function showPreviousItem() {
        items[count].classList.remove('active');

        if (count > 0) {
            count--;
        } else {
            count = itemCount - 1;
        }

        items[count].classList.add('active');
        updateButtonVisibility();
    }

    function validateCurrentSlide() {
        // Add your validation logic here
        // Example: Check if all required fields in the current slide are filled
        const currentSlideInputs = items[count].querySelectorAll('input[required], select[required], textarea[required]');
        let isValid = true;

        currentSlideInputs.forEach(input => {
            if (!input.value.trim()) {
                // Highlight the unfilled input field (you may want to customize this part)
                input.style.border = '2px solid red';
                isValid = false;
            } else {
                input.style.border = ''; // Reset border for filled inputs
            }
        });

        return isValid;
    }

    function updateButtonVisibility() {
        if (count === 0) {
            previousItem.style.display = 'none';
        } else {
            previousItem.style.display = 'flex';
        }

        if (count === itemCount - 1) {
            nextItem.style.display = 'none';
        } else {
            nextItem.style.display = 'flex';
        }
    }

    function keyPress(e) {
        e = e || window.event;

        if (e.keyCode == '37') {
            showPreviousItem();
        } else if (e.keyCode == '39') {
            showNextItem();
        }
    }

    function handleScanButtonClick() {
        // Move to the next slide when the "Scan Now" button is clicked
        showNextItem();
    }

    nextItem.addEventListener('click', showNextItem);
    previousItem.addEventListener('click', showPreviousItem);
    document.addEventListener('keydown', keyPress);

    // Attach the click event handler for the "Scan Now" button
    scanButton.addEventListener('click', handleScanButtonClick);

    // Initial button visibility setup
    updateButtonVisibility();
</script>