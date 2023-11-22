<style>

    .navbar{

        background: #040403 !important;

    }

    .nav-link{

        color: #fafafa !important;

    }

    .unittype1{

        margin-top: 0;

    }

    #header{

        background: #040403;

    }

    .developer1{

        margin-top: 0;

    }

</style>



<body>    

    <header id="header">

        <div class="container">

            <nav class="navbar navbar-white navbar-expand-md">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav" aria-label="navbar">

                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="12" viewBox="0 0 40 12" fill="none">

                        <path d="M27 1.5H0M40 10.5H0" stroke="white" stroke-width="1.5"/>

                    </svg>

                </button>



                <div class="navbar-collapse collapse dual-nav order-1 order-md-0">

                <ul class="navbar-nav align-items-center">

                    <li class="nav-item">

                    <a class="nav-link" href="https://bit.ly/GramercyWeb" target="_blank">

                        <img src="<?php echo base_url(); ?>assets/core-images/whatapp-white.svg"  alt="Logo">

                    </a>

                    </li>

                    <li class="nav-item">

                    <a class="nav-link active" href="<?php echo base_url(); ?>">Home</a>

                    </li>

                    <li class="drop-down">

                        <a class="active" href="#" style="color: #fafafa;">Unit Type</a>

                        <ul>

                            <?php if($unit) { foreach($unit as $u){ ?>

                            <li><a href="<?php echo site_url('page/unit_type/'.$u->unit_id)?>"><?= $u->unit_name; ?></a></li>

                            <?php }} else {?>

                                <li><a href="#">TIDAK DATA</a></li>

                            <?php } ?>

                        </ul>

                    </li>

                    <li class="nav-item">

                    <a class="nav-link active" href="<?php echo site_url('page/siteplan'); ?>">Siteplan</a>

                    </li>

                </ul>

                </div>



                <a href="<?php echo base_url();?>" class="scrollto"><img src="<?php echo base_url()?>assets/core-images/logogramercy-white.svg" class="navbar-brand mx-auto order-0 order-md-5 p-2" alt="logo gramercy white" aria-label="logo gramercy white"></a>



                <div class="navbar-collapse collapse dual-nav order-4 order-md-4 justify-content-end">

                <ul class="navbar-nav align-items-center">

                    <li class="nav-item">

                    <a class="nav-link active" href="<?php echo site_url('page/project'); ?>">Projects</a>

                    </li>

                    <li class="nav-item">

                    <a class="nav-link active" href="<?php echo site_url('developer'); ?>">Developer</a>

                    </li>

                    <li class="drop-down">

                        <a class="active" href="#" style="color: #fafafa;">News</a>

                        <ul>

                            <?php if($news_category) { foreach($news_category as $c){ ?>

                            <li><a href="<?php echo site_url('page/information/'.$c->news_category_id . '/1')?>"><?= $c->news_category_name; ?></a></li>

                            <?php }} else {?>

                                <li><a href="#">TIDAK DATA</a></li>

                            <?php } ?>

                        </ul>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link"  href="https://<?= $setting[0]->setting_instagram; ?>">

                            <img src="<?php echo base_url(); ?>assets/core-images/icon/instagram-white.svg" alt="Logo">

                        </a>

                    </li>

                </ul>

                </div>

            </nav>

        </div>

    </header><!-- End Header -->

</body>