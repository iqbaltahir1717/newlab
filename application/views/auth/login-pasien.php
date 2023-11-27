<?php
include_once APPPATH . "../vendor/autoload.php";
$google_client = new Google_Client();
$google_client->setClientId('332796968225-407u02j6ftod68mv1fvq0ejlriep0h61.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://localhost/newlab/google/index/' . $this->uri->segment(3));
$google_client->addScope('email');
$google_client->addScope('profile');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $setting[0]->setting_short_appname; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main/app.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pages/auth.css">
</head>

<body style="height: 100vh; overflow: hidden;">
    <img src="<?php echo base_url(); ?>assets/core-images/ornament-1.png" class="ornament ornament1">
    <img src="<?php echo base_url(); ?>assets/core-images/ornament-2.png" class="ornament ornament2">
    <img src="<?php echo base_url(); ?>assets/core-images/ornament-3.png" class="ornament ornament3">
    <img src="<?php echo base_url(); ?>assets/core-images/ornament-4.png" class="ornament ornament4">
    <div id="auth" class="d-flex align-items-center" style="height: 100%;">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 col-sm-12">
                    <div id="auth-left" class="auth-border">
                        <div class="row align-items-center text-center">
                            <div class="col-12 mb-4">
                                <img src="<?php echo base_url() ?>assets/core-images/newlab-consultation.png" class="logo-apps-form" alt="Logo aplikasi">
                            </div>
                            <div class="col-12 mb-3">
                                <p class="auth-subtitle mb-3">LOGIN FIRST FOR CONTINUE</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-sm">
                                <!-- ALERT -->
                                <?php
                                if ($this->session->flashdata('alert')) {
                                    echo $this->session->flashdata('alert');
                                    unset($_SESSION['alert']);
                                }
                                ?>
                            </div>
                        </div>

                        <a class="btn btn-login btn-block mb-3" href="<?php echo $google_client->createAuthUrl(); ?>"><i class="fa-brands fa-google"></i> &nbsp; Login with Google</a>

                        <a class="btn btn-login btn-block mb-3" href="<?= site_url(); ?>consultation">Form</a>
                    </div>
                </div>
                <!-- footer form login -->
                <div>
                    <p class="text-center copy">
                        Created by <a href="#"><?php echo $setting[0]->setting_owner_name; ?></a>
                    </p>
                    <p class="text-center copy">
                        <b>Copyright &copy; <?php echo date('Y'); ?> <?php echo $setting[0]->setting_short_appname; ?></b>
                    </p>
                </div>
            </div>
        </div>

    </div>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
</body>

</html>