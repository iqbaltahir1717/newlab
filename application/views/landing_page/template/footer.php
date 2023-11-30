        <style>
            @media (max-width: 542px) {

                .footer-top {

                    .footer-info {

                        display: flex;

                        justify-content: center;

                    }

                }

            }
        </style>



        <footer id="footer">

            <div class="footer-top">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-3 footer-info">

                            <img class="project-2" src="<?= base_url(); ?>/assets/core-images/logo-social.avif" alt="Image 2">

                        </div>

                        <div class="col-lg-3 footer-links">

                            <h4>Menu</h4>

                            <ul>

                                <li> <a href="<?php echo base_url(); ?>">Home</a></li>

                                <li><a href="<?php echo site_url('page/siteplan'); ?>">Siteplan</a></li>

                                <li><a href="<?php echo site_url('developer'); ?>">Developer</a></li>

                                <li><a href="<?php echo site_url('page/siteplan'); ?>/#siteplan4">Facilities</a></li>

                                <?php if ($news_category) { ?>

                                    <li><a href="<?php echo site_url('page/information/' . $news_category[0]->news_category_id . '/1') ?>"><?= $news_category[0]->news_category_name ?></a></li>

                                <?php } else { ?>

                                    <li><a href="#">Not Found News Category</a></li>

                                <?php } ?>

                            </ul>

                        </div>

                        <div class="col-lg-3 footer-links">

                            <h4>Alam Sutera</h4>

                            <ul>

                                <li><a href="<?php echo site_url('page/project'); ?>">Other Projects</a></li>

                            </ul>

                        </div>

                        <div class="col-lg-3 footer-links">

                            <h4>Contact Us</h4>

                            <ul>

                                <li style="display:flex; align-items: start"><a href="mailto:<?php echo $setting[0]->setting_email; ?>" class="arrowup d-flex" style="align-items: start">
                                        <p style="min-width:50px;">Email</p>:<p><?php echo $setting[0]->setting_email; ?></p>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 17 17" fill="none">

                                            <path d="M3.15015 13.8501L13.6501 3.3501M13.6501 3.3501L5.77515 3.3501M13.6501 3.3501V11.2251" stroke="#5C5F66" stroke-width="1.575" stroke-linecap="round" stroke-linejoin="round" />

                                        </svg>
                                    </a>

                                </li>

                                <li style="display:flex; align-items: start">
                                    <p style="min-width:60px;">Telp</p>:&nbsp;&nbsp;<p> +<?php echo $setting[0]->setting_phone; ?></p>
                                </li>

                                <li style="display:flex; align-items: start">
                                    <p style="min-width:60px;">Address</p>:&nbsp;&nbsp;<p> <?php echo $setting[0]->setting_address; ?></p>
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>



            <div class="container">

                <div class="row barisbawah align-items-center justify-content-start">

                    <div class="col-md-9 d-flex text-start">

                        <div class="row" style="gap:20px">

                            <div class="col-md-0">

                                <div class="social-links d-flex">

                                    <a href="https://<?php echo $setting[0]->setting_facebook; ?>" class="facebook" target="_blank" aria-label="facebook"><i class='bx bxl-facebook-circle'></i></a>

                                    <a href="https://<?php echo $setting[0]->setting_instagram; ?>" class="instagram" target="_blank" aria-label="instagram"><i class='bx bxl-instagram'></i></a>

                                    <a href="http://<?php echo $setting[0]->setting_youtube; ?>" class="twitter" target="_blank" aria-label="twitter"><i class='bx bxl-youtube'></i></a>

                                </div>

                            </div>

                            <div class="col-md-3 baris-4">

                                <p class="text-nowrap"><a href="<?= site_url(); ?>page/<?= $content[1]->content_menu; ?>" style="color:#5C5F66">Privacy Policy</a></p>

                            </div>

                            <div class="col-md-2 baris-6">

                                <p class="text-nowrap"><a href="<?= site_url(); ?>page/<?= $content[0]->content_menu; ?>" style="color:#5C5F66">Term & Condition</a></p>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 align-items-center">

                        <div class="copyright align-items-center text-center mt-4">

                            &copy; 2023 Gramercy All Rights Reserved

                        </div>

                    </div>

                </div>

            </div>

        </footer><!-- End Footer -->



        <a href="#" class="back-to-top"><i class="fa-solid fa-arrow-up"></i></a>

        <div id="preloader"></div>



        <!-- JS Files -->

        <script src="<?php echo base_url() ?>assets/landing_page/vendor/jquery/jquery.min.js"></script>



        <script src="<?php echo base_url() ?>assets/landing_page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="<?php echo base_url() ?>assets/landing_page/vendor/jquery.easing/jquery.easing.min.js"></script>

        <script src="<?php echo base_url() ?>assets/landing_page/vendor/php-email-form/validate.js"></script>

        <script src="<?php echo base_url() ?>assets/landing_page/vendor/owl.carousel/owl.carousel.min.js"></script>

        <script src="<?php echo base_url() ?>assets/landing_page/vendor/venobox/venobox.min.js"></script>

        <script src="<?php echo base_url() ?>assets/landing_page/vendor/isotope-layout/isotope.pkgd.min.js"></script>

        <script src="<?php echo base_url() ?>assets/landing_page/vendor/aos/aos.js"></script>

        <script src="<?php echo base_url() ?>assets/landing_page/vendor/glightbox/js/glightbox.min.js"></script>

        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <!-- Main JS File -->

        <script src="<?php echo base_url() ?>assets/landing_page/js/main.js"></script>

        <script language="JavaScript" type="text/javascript">
            $(document).ready(function() {

                $('.carousel').carousel({

                    interval: 5000

                });

                $('.select2').select2();

            });
        </script>



        <script>
            var lightbox = GLightbox();

            lightbox.on('open', (target) => {

                console.log('lightbox opened');

            });

            var lightboxDescription = GLightbox({

                selector: '.glightbox2'

            });

            var lightboxVideo = GLightbox({

                selector: '.glightbox3'

            });

            lightboxVideo.on('slide_changed', ({
                prev,
                current
            }) => {

                console.log('Prev slide', prev);

                console.log('Current slide', current);



                const {
                    slideIndex,
                    slideNode,
                    slideConfig,
                    player
                } = current;



                if (player) {

                    if (!player.ready) {

                        // If player is not ready

                        player.on('ready', (event) => {

                            // Do something when video is ready

                        });

                    }



                    player.on('play', (event) => {

                        console.log('Started play');

                    });



                    player.on('volumechange', (event) => {

                        console.log('Volume change');

                    });



                    player.on('ended', (event) => {

                        console.log('Video ended');

                    });

                }

            });



            var lightboxInlineIframe = GLightbox({

                selector: '.glightbox4'

            });
        </script>

        </body>

        </html>