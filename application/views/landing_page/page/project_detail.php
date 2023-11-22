<style>
    p{
        margin-top: 0;
        margin-bottom: 0;
    }

    .unittype4 svg{
        margin-left: 14px;
    }
    
    .description h3{
        color:#fafafa !important;
    }
</style>

<main id="mainunittype">
    <section id="unittype1" class="unittype1" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 39.24%, #000 91.32%), linear-gradient(180deg, #000 8.67%, rgba(0, 0, 0, 0.00) 53.35%), url(<?= base_url()."/upload/project/".$project[0]->project_cover.")"?>; background-position: center; background-attachment: fixed; background-repeat: no-repeat; background-size: cover">
        <div class="container">
            <div class="row">
                <div class="unitimg">
                    <div class="unittext">
                        <div class="row" Data-aos="fade-up">
                            <h1>Project by<br>ALAM SUTERA</h1>
                        </div>
                        <div class="row mouser mb-5 justify-content-end">
                            <img src="<?php echo base_url(); ?>assets/core-images/mouse-indicator.svg" alt="Logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
    <section id="unittype2" class="unittype2">
        <div class="container-fluid" data-aos="fade-up">
            <div class="slide">
                <div class="row align-items-center mb-3">
                    <div class="col">
                        <div class="row justify-content-center">
                            <img src="<?php echo base_url(); ?>assets/core-images/Rectangleunit.svg" alt="Logo">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12 slidetextcenter">
                        <div class="row justify-content-center top-fixed">
                            <h1><?= strtoupper($project[0]->project_name); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="image-preview" class="image-preview">
        <img class="image-preview glightbox" src="<?= base_url()."/upload/project/". $project[0]->project_cover?>" alt="">
    </section>  

    <section id="unittype4" class="unittype4" style="padding-bottom: 200px !important;">
        <div class="container">
            
            <div class="col">
                <div class="row align-items-center mb-4 flex-wrap" style="gap: 10px;">
                    <div class="label">
                        <div class="d-flex align-items-center justify-content-center">
                                <p class="angka d-flex mr-3"><?= strtoupper($project[0]->project_bedroom ); ?></p>
                                <img src="<?php echo base_url(); ?>assets/core-images/icon/bedroom.svg" style="width: 30px;height: 30px;" alt="Logo">
                        </div>
                    </div>
                    <div class="label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="7" height="8" viewBox="0 0 7 8" fill="none">
                                <circle cx="3.5" cy="4" r="3.5" fill="#B0E4DD"/>
                        </svg>
                    </div>
                    <div class="label">
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="angka d-flex mr-3"><?= strtoupper($project[0]->project_bathroom ); ?></p>   
                            <img src="<?php echo base_url(); ?>assets/core-images/icon/bathroom.svg" style="width: 30px;height: 30px;" alt="Logo">
                        </div>
                    </div>
                    <div class="label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="7" height="8" viewBox="0 0 7 8" fill="none">
                                <circle cx="3.5" cy="4" r="3.5" fill="#B0E4DD"/>
                        </svg>
                    </div>
                    <div class="label">
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="angka d-flex mr-3"><?= strtoupper($project[0]->project_luas ); ?> sqm</p>
                            <img src="<?php echo base_url(); ?>assets/core-images/icon/size.svg" style="width: 30px;height: 30px;" alt="Logo">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5 justify-content-center">
                        <div  class="col-lg-12 px-0">
                            <div  style="font-size:18px; line-height: 30px"class="text mb-5 description"><?= $project[0]->project_description; ?></div>
                        </div>
                    </div>
                    <div class="gallery-feed">
                        <?php if($project_gallery) { foreach($project_gallery as $g) {  ?>
                            <div class="card-gallery">
                                <img src="<?php echo base_url(); ?>upload/project_gallery/<?= $g->project_gallery_image?>">
                                <a href="<?php echo base_url(); ?>upload/project_gallery/<?= $g->project_gallery_image?>" class="overlay glightbox" data-zoomable="true">
                                    <h2>See Photos</h2>
                                    </a>
                            </div>
                        <?php }} else { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center text-red font-weight-bold">TIDAK ADA DATA</div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

        
    </main>