<body>
    <header id="header">
        <div class="container" style="padding: 0;">
            <nav class="navbar navbar-white" style="padding: 0.5rem 0;">
                <a href="<?= site_url(); ?>auth" class="scrollto"><img src="<?php echo base_url() ?>assets/core-images/<?php if ($this->uri->segment(1) == 'consultation') echo "newlab-consultation.png";
                                                                                                                        else echo "newlab-simulation" ?>" width="240" class="navbar-brand" alt="logo gramercy" aria-label="logo gramercy"></a>
            </nav>
        </div>
    </header><!-- End Header -->
</body>