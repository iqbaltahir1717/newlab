    <main id="main">
        <section id="greetings" class="consultation">
            <div class="container">
                <div class="d-flex flex-wrap content justify-content-center">
                    <div class="col-lg-5 text-center">
                        <div class="d-flex flex-column">
                            <div class="text-heading">
                                <h3>Quisinoer Submitted</h3>
                                <p>Hello <?= $this->session->userdata('user_fullname') ?>. We've received your questionnaire, Feel free to embark on a journey towards better health by consultation with our experienced doctors. <a href="">
                                        <u>Edit Quisinoer</u>
                                    </a></p>
                            </div>
                            <div class="d-flex btn-group">

                                <a href="<?= base_url('auth/logout'); ?>" class="btn btn-secondary">
                                    Log Out
                                </a>
                            </div>
                            <div class="card-doctor">
                                <div class="profile">
                                    <img src="<?= base_url(); ?>/assets/core-images/preview-image/thumbnail-92323.jpg" alt="">
                                    <div class="content">
                                        <h5>Dr. Merissa Joan</h5>
                                        <p>Ahli Nutrisi</p>
                                    </div>
                                </div>
                                <div class="card-button">
                                    <a href="#" class="btn btn-primary"><i class="fa-brands fa-whatsapp"></i> &nbsp; Start Consultation</a>
                                    <a href="https://newlab.id" class="btn btn-secondary">Back Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->