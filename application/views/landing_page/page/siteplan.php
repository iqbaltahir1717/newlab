<style>

    @media (max-width: 550px){

        .siteplan1, .siteplan3, .hero-new3{

            background-attachment: scroll !important;

            background-repeat: no-repeat !important;

            background-size: cover !important;

        }

    }

</style>



<main id="mainsiteplan">

    <section id="siteplan1" class="siteplan1" style="background:url(<?= base_url()."/upload/siteplan/". $siteplan[0]->siteplan_image1 ?>); background-position: center; background-attachment: fixed;">

        <div class="container">

            <div class="row">

                <div class="unitimg">

                    <div class="row mouser mr-5 justify-content-end">

                        <a href="<?= base_url()."/upload/siteplan/". $siteplan[0]->siteplan_image1 ?>" class="glightbox">

                            <img src="<?php echo base_url(); ?>assets/core-images/mouse-indicatorsiteplan.svg" alt="Logo">

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    

    <section id="siteplan2" class="siteplan2">

        <div class="container" data-aos="fade-up">

            <div class="mt-5">

                <p><?= $siteplan[0]->siteplan_image1_description ?></p>

            </div>

        </div>

    </section>



    <section id="siteplan3" class="siteplan3" style="background:url(<?= base_url()."/upload/siteplan/". $siteplan[0]->siteplan_image2 ?>); background-position: center; background-attachment: fixed;">

        <div class="container">

            <div class="row">

                <div class="unitimg">

                    <div class="row mouser mr-5 justify-content-end">

                        <a href="<?= base_url()."/upload/siteplan/". $siteplan[0]->siteplan_image2 ?>" class="glightbox">

                            <img src="<?php echo base_url(); ?>assets/core-images/mouse-indicatorsiteplan.svg" alt="Logo">

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <section id="siteplan2" class="siteplan2" >

        <div class="container" data-aos="fade-up">

            <div class="mt-5">

                <p><?= $siteplan[0]->siteplan_image2_description; ?></p>

            </div>

        </div>

    </section>

    <hr style="border:1px solid #dddddd">



    <section id="siteplan4" class="siteplan4">

    

        <div class="container">

            <div class="row justify-content-center">

                    <h1 class="bannertext col-lg-12 text-center mb-4">FACILITIES</h1>

                    <div class="col-lg-12"><?= $siteplan[0]->siteplan_cluster; ?></div>

            </div>

            <div class="row">

                <div class="slider">

                    <div class="slide-track">

                        <?php if($cluster) { foreach($cluster as $c) {?>

                            <div class="slide">

                            <img style="cursor: pointer; height: 100%; object-fit:cover" src="<?php echo base_url(); ?>upload/cluster/<?= $c->cluster_cover ?>" class="glightbox3" alt="<?= $c->cluster_name; ?>" >

                            <div class="overlay">

                                <div class="content">

                                    <h3><?= $c->cluster_name; ?></h3>

                                </div>

                            </div>

                        </div>

                        <?php } } else {?>

                            <div class="text-danger"> <b>DATA TIDAK ADA</b></div>

                        <?php }?>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <hr style="border:1px solid #dddddd">



    <!-- strategic section -->

    <section id="optical-section" class="optical-section mt-5">

        <div class="container barisone">

            <div class="row justify-content-center mb-5">

                    <h1 class="bannertext col-lg-12 text-center mb-4">STRATEGIC LOCATION</h1>

                    <div class="col-lg-12"><?= $siteplan[0]->siteplan_optical; ?></div>

            </div>

            <div class="image-site mb-5">

                <img class="col-lg-5 glightbox2"   src="<?= base_url();?>assets/core-images/location-1.avif" alt="">

                <img class="col-lg-5 glightbox2"   src="<?= base_url();?>assets/core-images/location-2.avif" alt="">

            </div>

            <hr style="border:1px solid #dddddd">

            <div class="row mt-5 justify-content-center" style="flex: wrap;">

                <?php if($optical) { foreach($optical as $o) {?>

                <div class="col-lg-4 mb-4">

                    <div class="card-location dark">

                        <img src="<?php echo base_url(); ?>upload/optical/<?= $o->optical_cover?>" class="card-img-top glightbox2" style="object-fit:contain; background:#EDEDED"  alt="<?= $o->optical_name; ?>">

                        <div class="card-body">

                            <div class="text-section">

                                <h5 class="card-title fw-bold"><?= $o->optical_name; ?></h5>

                                <!-- batas -->

                                <div class="row">

                                    <div class="col">

                                        <p class="card-text">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">

                                        <path d="M12.75 12.625C12.75 13.6605 13.5895 14.5 14.625 14.5C15.6605 14.5 16.5 13.6605 16.5 12.625C16.5 11.5895 15.6605 10.75 14.625 10.75C13.5895 10.75 12.75 11.5895 12.75 12.625ZM12.75 12.625H4.625C3.7962 12.625 3.00134 12.2958 2.41529 11.7097C1.82924 11.1237 1.5 10.3288 1.5 9.5C1.5 8.6712 1.82924 7.87634 2.41529 7.29029C3.00134 6.70424 3.7962 6.375 4.625 6.375H12.125C12.788 6.375 13.4239 6.11161 13.8928 5.64277C14.3616 5.17393 14.625 4.53804 14.625 3.875C14.625 3.21196 14.3616 2.57607 13.8928 2.10723C13.4239 1.63839 12.788 1.375 12.125 1.375H4.625" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>

                                        </svg>

                                        <?= $o->optical_distance; ?> km

                                        <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">

                                            <circle cx="2" cy="2" r="2" fill="#B0E4DD"/>

                                        </svg>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="15" viewBox="0 0 24 15" fill="none">

                                        <path d="M19.5 2.5C19.5 2.10218 19.342 1.72064 19.0607 1.43934C18.7794 1.15804 18.3978 1 18 1H14.25L19.5 10M4.5 1H7.125L12.375 10M15.9457 4H8.87503L4.5 10M23.25 10C23.25 12.0711 21.5711 13.75 19.5 13.75C17.4289 13.75 15.75 12.0711 15.75 10C15.75 7.92893 17.4289 6.25 19.5 6.25C21.5711 6.25 23.25 7.92893 23.25 10ZM8.25 10C8.25 12.0711 6.57107 13.75 4.5 13.75C2.42893 13.75 0.75 12.0711 0.75 10C0.75 7.92893 2.42893 6.25 4.5 6.25C6.57107 6.25 8.25 7.92893 8.25 10Z" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>

                                        </svg>

                                        <?= $o->optical_distance_walk; ?> mnt

                                        <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">

                                            <circle cx="2" cy="2" r="2" fill="#B0E4DD"/>

                                        </svg>

                                        <?= $o->optical_distance_vehicle; ?>  mnt

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <?php } } else {?>

                           <div class="text-danger"> <b>DATA TIDAK ADA</b></div>

                <?php }?>

            </div>

        </div>

    </section>

    

    <!-- gratitude section -->

    <section id="hero-new3" class="hero-new3" style="background: linear-gradient(180deg, #000 0%, rgba(0, 0, 0, 0.00) 13.72%),linear-gradient(180deg, rgba(0, 0, 0, 0.00) 78.3%, #000 91.32%), url(<?= base_url();?>/assets/core-images/home/taman-jalan.avif)  no-repeat center center fixed; background-size: cover; width: 100%;">

        <div class="container-md-12 pl-5 pr-5 barisone md-12">

            <div class="row brand-logo-gramercy justify-content-center text-center">

                <div class="col">

                    <img src="<?= base_url(); ?>/assets/core-images/alam-sutera.avif" alt="Image 1">

                </div>

                <div class="col">

                    <img src="<?= base_url(); ?>/assets/core-images/thegramercy.avif" alt="Image 2">

                </div>

            </div>

        </div>

        <div class="container barisone md-12">

            <div class="row ourservice justify-content-around text-center flex-wrap" style="gap:32px">

                    <div class="bagian">

                        <img class="mb-4" src="<?= base_url();?>/assets/core-images/icon/quick_process.svg" alt="">

                        <h3>Timeless Design</h3>

                        <p>Gramercy has this european classic vibe and timeless design look</p>

                    </div>

                    <div class="bagian">

                        <img class="mb-4" src="<?= base_url();?>/assets/core-images/icon/custom_house.svg" alt="">

                        <h3>109 unit</h3>

                        <p>Exclusively built only for limited unit and luxury driven result</p>

                    </div>

                    <div class="bagian">

                        <img class="mb-4" src="<?= base_url();?>/assets/core-images/icon/property_insurance.svg" alt="">

                        <h3>The Last One</h3>

                        <p>A gift from Alam Sutera for you to have and enjoy this master piece in Alam Sutera</p>

                    </div>

                </div>

        </div>

        <div class="container">

            <div class="row ourservice justify-content-center text-center mt-5">

                <p>The last and most prestigious cluster locatedin favourite place of Alam Sutera “Green Tunnel”</p>

            </div>

        </div>

    </section>





    <!-- <section id="siteplan7" class="siteplan7">

        <div class="container">

            <div class="row">

                <div class="col-md-5">

                    <div class="row">

                        <h1>EXCEPTIONAL EXPERIENCE</h1>

                    </div>

                    <div class="row text">

                        <p>We are committed to providing top quality creations. from complete facilities to enjoyable entertainment centers. Reimagine your life at a higher standard.</p>

                    </div>

                    <div class="row dev">

                        <a class="arrow" href="<?php echo site_url('developer'); ?>"><button type="button">About Developers <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">

                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>

                            </svg>

                        </button>

                        </a>

                    </div>

                </div>

                <div class="col-md-7">

                    <img src="<?php echo base_url(); ?>assets/core-images/developerpeople.svg" alt="Logo">

                </div>

            </div>

        </div>

    </section> -->

        

    </main>