<body>
    <header id="header">
        <div class="container" style="padding: 0;">
            <nav class="navbar navbar-white navbar-expand-lg bg-white" style="padding: 0.5rem 0;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav" aria-label="navbar menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path d="M5 24H27" stroke="#455468" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5 16H27" stroke="#455468" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5 8H27" stroke="#455468" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <a href="<?php echo base_url(); ?>" class="scrollto"><img src="<?php echo base_url() ?>assets/core-images/logo-gramercy.png" width="462" height="82" class="navbar-brand" alt="logo gramercy" aria-label="logo gramercy"></a>

                <div class="navbar-collapse collapse dual-nav order-4 order-md-4 justify-content-end">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo site_url('page/project'); ?>">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo site_url('developer'); ?>">Developer</a>
                        </li>
                        <li class="drop-down">
                            <a class="active" href="#">News</a>
                            <ul>
                                <?php if ($news_category) {
                                    foreach ($news_category as $c) { ?>
                                        <li><a href="<?php echo site_url('page/information/' . $c->news_category_id . '/1') ?>"><?= $c->news_category_name; ?></a></li>
                                    <?php }
                                } else { ?>
                                    <li><a href="#">TIDAK ADA DATA</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://<?= $setting[0]->setting_instagram; ?>" target="_blank">
                                <img src="<?php echo base_url(); ?>assets/core-images/icon/instagram.svg" alt="Logo" class="social">
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header><!-- End Header -->
</body>