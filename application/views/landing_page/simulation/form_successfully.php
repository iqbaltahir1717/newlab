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
                                        <u>Edit Here</u>
                                    </a></p>
                                <div class="d-flex btn-group">
                                    <a href="<?= base_url('auth/logout'); ?>" class="btn btn-secondary">
                                        Log Out
                                    </a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php if ($image_picker) {
                        ?>
                            <div class="card-product-item">
                                <div class="d-flex">
                                    <div class="card-detail col-lg px-0">
                                        <h3><?= ucwords('this is your ' . $part_of_body . ' color')  ?></h3>
                                        <center>
                                            <div class="" style="width:100px; height: 50px; background-color: #<?= $image_picker ?>;">
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } ?>

                        <?php if (!empty($sim_response) and $sim_response[0]->problems_experienced == 'Skin' and  ($part_of_body == 'Wajah' or $part_of_body == 'Kulit Tubuh' or $part_of_body == 'Area Lipatan')) { ?>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for=""><b>How bright do you want your skin to be (Regular) ?</b></label>
                                    <br><img width="500" src="<?= base_url('upload/question/skin.png') ?>">
                                </div>
                            </div>
                        <?php } else if (!empty($sim_response) and $sim_response[0]->problems_experienced == 'Skin' and $part_of_body == 'Bibir') { ?>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for=""><b>How bright do you want your libs (Regular) ?</b></label>
                                    <br><img width="500" src="<?= base_url('upload/question/libs.png') ?>">
                                </div>
                            </div>
                        <?php } else if (!empty($sim_response) and $sim_response[0]->problems_experienced == 'Teeth') { ?>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for=""><b>How bright do you want your teeth (Regular) ?</b></label>
                                    <br><img width="500" src="<?= base_url('upload/question/teeth.png') ?>">
                                </div>
                            </div>
                        <?php } ?>

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
                                                <button class="btn btn-secondary mb-3" type="button" data-toggle="collapse" data-target="#collapse<?= $key->product_id ?>" aria-expanded="false" aria-controls="collapse<?= $key->product_id ?>">
                                                    See Product Details
                                                </button>
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