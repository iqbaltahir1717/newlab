<main class="mainprojects">

    <section id="projects1" class="projects1">

        <div class="container">

            <div class="mt-3">

                <h1>Our Projects at <br> Alam Sutera</h1>

            </div>

            <div class="mt-3">

                <p>Discover a life of unmatched luxury and comfort at <br>our premier housing project, meticulously designed <br>for warmth and prestige. </p>

            </div>

        </div>

    </section>



    <section id="projects2" class="projects2 justify-content-center">

        <div class="container">

            <div class="row" style="gap: 60px; margin-top:80px">

                <?php if($project) { foreach($project as $p){ ?>

                    <div class="card-project">

                        <img class="col-lg-5" src="<?= base_url();?>upload/project/<?= $p->project_cover; ?>" alt="project">

                        <div class="content col-lg-6">

                            <h3><?= $p->project_name; ?></h3>

                            <p><?php if (strlen($p->project_description) > 220)  echo substr($p->project_description, 0, 220) . " ...";

                                                    else echo $p->project_description; ?>

                                </p>

                                <a href="<?= site_url();?>page/project_detail/<?= $p->project_id ?>" class="btn btn-secondary mt-4">More Detail</a>

                        </div>

                    </div>

                <?php }}  else {?>

                    <div class="text-center">NOTHING DATA ON DATABASE </div>

                <?php }?>

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

                        <a href="<?php echo site_url('developer'); ?>">

                            <button type="button">About Developers <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">

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