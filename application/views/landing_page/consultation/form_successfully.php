<main id="main">
    <section id="greetings" class="consultation">
        <div class="container">
            <div class="d-flex flex-wrap content justify-content-center">
                <div class="col-lg-5 text-center">
                    <div class="d-flex flex-column">
                        <div class="text-heading">
                            <h3>Quisinoer Submitted</h3>
                            <p>Hello <?= $this->session->userdata('user_fullname') ?>. We've received your questionnaire, Feel free to embark on a journey towards better health by consultation with our experienced doctors. <a href="<?= site_url(); ?>consultation/form_data_user">
                                    <u>Edit Here</u>
                                </a></p>
                        </div>
                        <div class="d-flex btn-group">
                            <a href="<?= base_url('auth/logout'); ?>" class="btn btn-secondary">
                                Log Out
                            </a>
                        </div>
                        <div class="card-doctor">
                            <div class="profile">
                                <img src="<?= base_url(); ?>/upload/user/<?= $dokter[0]->user_photo ?>" alt="">
                                <div class="content">
                                    <h5><?= $dokter[0]->user_fullname; ?></h5>
                                    <p><?= $dokter[0]->user_spesialis; ?></p>
                                </div>
                            </div>
                            <div class="card-button">
                                <a href="https://wa.me/<?= $dokter[0]->user_phone; ?>?text=Halo%20Dokter,%20saya%20ingin%20konsultasi%20berikut%20data%20kuisioner%20saya:%0A%0A<?php
                                                                                                                                                                                $arr = unserialize($response[0]->consult_response_text);
                                                                                                                                                                                if ($arr) {
                                                                                                                                                                                    foreach ($arr as $value) { ?><?= $value['q']; ?>%20%3A%20<?= $value['r'] ?>%0A<?php }
                                                                                                                                                                                                                                                            } ?>%0ATerima%20kasih%20Dokter.
" class="btn btn-primary"><i class="fa-brands fa-whatsapp"></i> &nbsp; Start Consultation</a>
                                <a href="https://newlab.id" class="btn btn-secondary">Back Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->