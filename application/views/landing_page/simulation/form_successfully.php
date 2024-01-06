<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
<!-- AOS library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 1);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        display: none;
        opacity: 1;
        transition: opacity 0.5s ease;
        /* Add the transition property for fading effect */
    }

    .loading-text {
        font-size: 20px;
    }

    div#comparison {
        width: 300px;
        height: 400px;
        max-width: 300px;
        max-height: 400px;
        overflow: hidden;
    }

    div#comparison figure {

        background-size: cover;
        background-repeat: no-repeat;
        background-position: left;
        position: relative;
        font-size: 0;
        width: 300px;
        height: 400px;
        margin: 0;
    }

    div#comparison canvas {

        background-size: cover;
        background-repeat: no-repeat;
        background-position: left;
        position: relative;
        font-size: 0;
        width: 300px;
        height: 400px;
        margin: 0;
    }

    div#comparison figure>img {
        position: relative;
        width: 100%;
    }

    div#comparison figure div {
        background-image: url(<?= base_url('upload/upload_image/' . $sim_response[0]->sim_image_upload); ?>);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: left;
        position: absolute;
        width: 150px;
        box-shadow: 0 5px 10px -2px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        bottom: 0;
        height: 400px;
    }

    input[type=range] {
        -webkit-appearance: none;
        -moz-appearance: none;
        position: relative;
        top: -2rem;
        left: -2%;
        background-color: rgba(255, 255, 255, 0.1);
        width: 102%;
    }

    input[type=range]:focus {
        outline: none;
    }

    input[type=range]:active {
        outline: none;
    }

    input[type=range]::-moz-range-track {
        -moz-appearance: none;
        height: 15px;
        width: 98%;
        background-color: rgba(255, 255, 255, 0.1);
        position: relative;
        outline: none;
    }

    input[type=range]::active {
        border: none;
        outline: none;
    }

    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 20px;
        height: 15px;
        background: #fff;
        border-radius: 0;
    }

    input[type=range]::-moz-range-thumb {
        -moz-appearance: none;
        width: 20px;
        height: 15px;
        background: #fff;
        border-radius: 0;
    }

    input[type=range]:focus::-webkit-slider-thumb {
        background: rgba(255, 255, 255, 0.5);
    }

    input[type=range]:focus::-moz-range-thumb {
        background: rgba(255, 255, 255, 0.5);
    }
</style>
<div class="loading-overlay" id="loadingOverlay">
    <div class="loading-text">
        <dotlottie-player src="https://lottie.host/37362bd0-6e85-4772-a723-f81d63190f7b/9qSHj7UxJk.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
    </div>
</div>
<main id="main">
    <section id="greetings" class="consultation">
        <div class="container">
            <div class="d-flex flex-wrap content align-items-start">
                <div class="col-lg-5">
                    <div class="btn-group mb-3">
                        <a href="<?= base_url('auth/logout_simulation'); ?>" class="btn btn-secondary">
                            Log Out
                        </a>
                    </div>
                    <div style="padding: 32px 24px; border-radius: 21px; background: #FFF; box-shadow: 9px 9px 18px 0px rgba(121, 121, 121, 0.10), -9px -9px 18px 0px rgba(170, 170, 170, 0.05);" class="text-center">
                        <h4 class="mb-3">Before After Enhance <?php echo $sim_response[0]->problems_experienced ?></h4>
                        <p style="color:#fafafa; padding:8px 16px; background:#000; border-radius:99px; font-size:16px;">System enhance your <?php echo strtolower($sim_response[0]->problems_experienced) ?> from <b>level <?= $level + 1 ?></b> <i class="fa-solid fa-arrow-right"></i> <b style="color:#F5CC2A">level <?= $sim_response[0]->sim_response_level ?></b></p>
                        <div class="row mt-4 mb-4 justify-content-center">
                            <div id="comparison">
                                <figure>
                                    <canvas id="canvas" width="300px" height="400px"></canvas>
                                    <div id="divisor"></div>
                                </figure>
                                <input type="range" min="0" max="100" value="50" id="slider" oninput="moveDivisor()">
                            </div>
                            <div class="col-md-6">

                            </div>
                            <br>
                        </div>
                        <p>Need Consultation ?</p>
                        <div class="btn-group mb-3">
                            <a href="<?= base_url('consultation'); ?>" class="btn btn-primary">
                                Start Consultation Here
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex flex-column text-center">
                        <div class="text-heading row align-items-center">
                            <div class="col-lg-12 px-0 align-items-center justify-content-center d-flex flex-column" style="gap: 16px;">
                                <h3>Simulation Complete <i class="fa-regular fa-circle-check"></i></h3>
                                <h5>This is a result scanning & product recommendation for you</h5>
                                <p>Hello <?= $this->session->userdata('user_fullname') ?>. your questionnaire have been recorded, this is our <b>recommendation product for you</b>. Thank you! <a href="<?= base_url('simulation/form_data_user') ?>">
                                        <u>Try Again</u>
                                    </a>
                                </p>
                            </div>
                        </div>

                        <hr style="border:1px solid #000">
                        <h4>YOUR LEVEL <?php echo strtoupper($sim_response[0]->problems_experienced) ?></h4>
                        <p>The scan result indicates that the brightness level of your <?php echo strtolower($sim_response[0]->problems_experienced) ?> is at a <span style="padding:4px 12px; color:#fafafa; background:#000; border-radius:99px; font-weight:bold">level <?= $level + 1 ?></span></p>
                        <img src="<?= base_url('upload/rules/' . strtolower($sim_response[0]->problems_experienced) . '/' . $level + 1 . '.jpg'); ?>" alt="" srcset="">

                        <hr style="border:1px solid #000">
                        <h4>RECOMMENDATION PRODUCT FOR YOU</h4>
                        <div class="card-product">
                            <?php if ($product_rekomendation) {
                                foreach ($product_rekomendation as $key) {
                            ?>
                                    <div class="card-product-item" data-aos="fade-up">
                                        <div class="d-flex">
                                            <img src="<?= base_url('upload/product/' . $key->product_cover); ?>" alt="preview-product">
                                            <div class="card-detail col-lg px-0">
                                                <h3><?= $key->product_name ?></h3>
                                                <p><?= $key->product_description ?></p>
                                                <?php $summery = $this->m_product_service->read('', '', '', $key->product_id);
                                                if ($summery) { ?>
                                                    <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapse<?= $key->product_id ?>" aria-expanded="false" aria-controls="collapse<?= $key->product_id ?>">
                                                        See Product Details
                                                    </button>
                                                <?php } else "" ?>
                                                <a class="btn btn-primary" href="<?= $key->product_shopee_link ?>" target="__blank">
                                                    Buy Now ->
                                                </a>
                                            </div>
                                        </div>

                                        <div class="collapse" id="collapse<?= $key->product_id ?>">
                                            <div id="accordion">

                                                <?php $summery = $this->m_product_service->read('', '', '', $key->product_id);
                                                if ($summery) {
                                                    foreach ($summery as $s) {
                                                ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h5 class="mb-0">
                                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $key->product_id . $s->product_service_id ?>" aria-expanded="true" aria-controls="collapse<?= $key->product_id . $s->product_service_id ?>">
                                                                        <?= $s->product_service_name; ?>
                                                                    </button>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse<?= $key->product_id . $s->product_service_id ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    <?= $s->product_service_description; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php }
                                                } ?>
                                            </div>
                                        </div>
                                    </div>

                            <?php }
                            } ?>
                            <!-- <a id="lnkDownload" href="#">Save image</a> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<script>
    var divisor = document.getElementById("divisor"),
        slider = document.getElementById("slider");

    function moveDivisor() {
        divisor.style.width = slider.value + "%";
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
<script>
    var canvas = new fabric.Canvas("canvas", {
        backgroundColor: 'white',
        // backgroundImage: "<?= base_url('upload/upload_image/' . $sim_response[0]->sim_image_upload); ?>",
        width: 300,
        height: 400
    });

    var imageSaver = document.getElementById('lnkDownload');
    imageSaver.addEventListener('click', saveImage, false);

    function saveImage(e) {
        this.href = canvas.toDataURL({
            format: 'png',
            quality: 0.8
        });
        this.download = 'canvas.png'
    }

    // fabric.Image.fromURL("<?= base_url('upload/rb_image/' . $sim_response[0]->sim_image_rb); ?>", function(img) {
    fabric.Image.fromURL("<?= base_url('upload/upload_image/' . $sim_response[0]->sim_image_upload); ?>", function(img) {
        // fabric.Image.fromURL("<?= base_url('upload/crop_image/' . $sim_response[0]->sim_image_crop); ?>", function(img) {
        img.filters.push(new fabric.Image.filters.Vibrance({
            vibrance: <?= $set_image->vibrance ?>
        }));
        img.filters.push(new fabric.Image.filters.Saturation({
            saturation: <?= $set_image->saturation ?>
        }));

        img.filters.push(new fabric.Image.filters.Brightness({
            brightness: <?= $set_image->brightness ?>
        }));

        img.filters.push(new fabric.Image.filters.Contrast({
            contrast: <?= $set_image->contrast ?>
        }));

        // img.filters.push(new fabric.Image.filters.BlendColor({
        //     color: '#ffffff',
        //     opacity: 1
        // }));

        // img.filters.push(new fabric.Image.filters.BlackWhite());

        console.log(fabric.Image.filters);

        img.applyFilters();
        img.scaleToWidth(300)
        img.set({
            left: 0,
            top: 0
        });
        canvas.add(img)
    }, {
        crossOrigin: 'anonymous'
    });

    function setContrast(value) {
        console.log('setContrast: ' + value);
        var img = canvas.item(0);
        img.filters[3].contrast = value;
        img.applyFilters();
        canvas.renderAll();
    }


    function setBrightness(value) {
        console.log('setBrightness: ' + value);
        var img = canvas.item(0);
        img.filters[2].brightness = value;
        img.applyFilters();
        canvas.renderAll();
    }

    function setVibrance(value) {
        console.log('setVibrance: ' + value);
        var img = canvas.item(0);
        img.filters[0].vibrance = value;
        img.applyFilters();
        canvas.renderAll();
    }

    function setSaturation(value) {
        console.log('setSaturation: ' + value);
        var img = canvas.item(0);
        img.filters[1].saturation = value;
        img.applyFilters();
        canvas.renderAll();
    }

    //start vibrance filter code
    (function(global) {

        var fabric = global.fabric || (global.fabric = {}),
            filters = fabric.Image.filters,
            createClass = fabric.util.createClass;

        filters.Vibrance = createClass(filters.BaseFilter, {

            type: 'Vibrance',

            fragmentSource: 'precision highp float;\n' +
                'uniform sampler2D uTexture;\n' +
                'uniform float uVibrance;\n' +
                'varying vec2 vTexCoord;\n' +
                'void main() {\n' +
                'vec4 color = texture2D(uTexture, vTexCoord);\n' +
                'float max = max(color.r, max(color.g, color.b));\n' +
                'float avg = (color.r + color.g + color.b) / 3.0;\n' +
                'float amt = (abs(max - avg) * 2.0) * uVibrance;\n' +
                'color.r += max != color.r ? (max - color.r) * amt : 0.00;\n' +
                'color.g += max != color.g ? (max - color.g) * amt : 0.00;\n' +
                'color.b += max != color.b ? (max - color.b) * amt : 0.00;\n' +
                'gl_FragColor = color;\n' +
                '}',

            vibrance: 0,

            mainParameter: 'vibrance',

            applyTo2d: function(options) {
                if (this.vibrance === 0) {
                    return;
                }
                var imageData = options.imageData,
                    data = imageData.data,
                    len = data.length,
                    adjust = -this.vibrance,
                    i, max, avg, amt;

                for (i = 0; i < len; i += 4) {
                    max = Math.max(data[i], data[i + 1], data[i + 2]);
                    avg = (data[i] + data[i + 1] + data[i + 2]) / 3;
                    amt = ((Math.abs(max - avg) * 2 / 255) * adjust);
                    data[i] += max !== data[i] ? (max - data[i]) * amt : 0;
                    data[i + 1] += max !== data[i + 1] ? (max - data[i + 1]) * amt : 0;
                    data[i + 2] += max !== data[i + 2] ? (max - data[i + 2]) * amt : 0;
                }
            },

            getUniformLocations: function(gl, program) {
                return {
                    uVibrance: gl.getUniformLocation(program, 'uVibrance'),
                };
            },

            sendUniformData: function(gl, uniformLocations) {
                gl.uniform1f(uniformLocations.uVibrance, -this.vibrance);
            },
        });

        fabric.Image.filters.Vibrance.fromObject = fabric.Image.filters.BaseFilter.fromObject;

    })(typeof exports !== 'undefined' ? exports : this);
</script>

<script>
    // Show the loading overlay
    function showLoadingOverlay() {
        document.getElementById('loadingOverlay').style.display = 'flex';
        // Trigger reflow to apply the transition immediately
        document.getElementById('loadingOverlay').offsetHeight;
        document.getElementById('loadingOverlay').style.opacity = '1';
    }

    // Hide the loading overlay with a fade-out effect
    function hideLoadingOverlay() {
        document.getElementById('loadingOverlay').style.opacity = '0';
        setTimeout(function() {
            document.getElementById('loadingOverlay').style.display = 'none';
        }, 500); // Adjust the duration to match the transition duration
    }

    // // Call showLoadingOverlay when the page loads
    // showLoadingOverlay();

    // // Set a timeout to hide the loading overlay after 5 seconds
    // setTimeout(function() {
    //     hideLoadingOverlay();
    // }, 3700);
</script>