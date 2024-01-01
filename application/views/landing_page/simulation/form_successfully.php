<main id="main">
    <section id="greetings" class="consultation">
        <div class="container">
            <div class="d-flex flex-wrap content justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="d-flex flex-column">
                        <div class="text-heading row align-items-center">
                            <div class="col-lg-7 px-0 align-items-center justify-content-center d-flex flex-column" style="gap: 16px;">
                                <h3>Quisinoer Submitted <i class="fa-regular fa-circle-check"></i></h3>
                                <p>Hello <?= $this->session->userdata('user_fullname') ?>. your questionnaire have been recorded, this is our <b>recommendation product for you</b>. Thank you! <a href="<?= base_url('simulation/form_data_user') ?>">
                                        <u>Try Again</u>
                                    </a></p>
                                <div class="d-flex btn-group">
                                    <a href="<?= base_url('auth/logout_simulation'); ?>" class="btn btn-secondary">
                                        Log Out
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                Before
                                <br>
                                <br>
                                <br>
                                <br>
                                <img src="<?= base_url('upload/upload_image/' . $sim_response[0]->sim_image_upload); ?>" alt="" srcset="">
                            </div>
                            <div class="col-md-6">
                                After <br>
                                <span>Vibrance</span>
                                <input type="range" value="0" min="-1" max="1" step="0.1" onchange="setVibrance(this.value)" /><br>
                                <span>Saturation</span>
                                <input type="range" value="0" min="-1" max="1" step="0.1" onchange="setSaturation(this.value)" /><br>
                                <span>Brightness</span>
                                <input type="range" value="0" min="-1" max="1" step="0.1" onchange="setBrightness(this.value)" />
                                <canvas id="canvas" width="400" height="800"></canvas>
                            </div>
                            <br>

                        </div>
                        <div class="card-product">
                            <?php if ($product_rekomendation) {
                                foreach ($product_rekomendation as $key) {
                            ?>
                                    <div class="card-product-item">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
<script>
    var canvas = new fabric.Canvas("canvas", {
        backgroundColor: 'white',
        // backgroundImage: "<?= base_url('upload/upload_image/WhatsApp Image 2023-12-27 at 12.25.11.jpeg'); ?>",
        width: 400,
        height: 533
    });

    fabric.Image.fromURL("<?= base_url('upload/upload_image/' . $sim_response[0]->sim_image_upload); ?>", function(img) {
        img.filters.push(new fabric.Image.filters.Vibrance({
            vibrance: 0
        }));
        img.filters.push(new fabric.Image.filters.Saturation({
            saturation: 0
        }));

        img.filters.push(new fabric.Image.filters.Brightness({
            brightness: 0
        }));
        console.log(fabric.Image.filters);

        img.applyFilters();
        img.scaleToWidth(400)
        img.set({
            left: 20,
            top: 20
        });
        canvas.add(img)
    }, {
        crossOrigin: 'anonymous'
    });

    function setBrightness(value) {
        var img = canvas.item(0);
        img.filters[2].brightness = value;
        img.applyFilters();
        canvas.renderAll();
    }

    function setVibrance(value) {
        var img = canvas.item(0);
        img.filters[0].vibrance = value;
        img.applyFilters();
        canvas.renderAll();
    }

    function setSaturation(value) {
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

    setVibrance(0);
    setSaturation(0);
    setBrightness(0.5);
</script>