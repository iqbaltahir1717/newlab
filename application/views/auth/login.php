<?php
include_once APPPATH . "../vendor/autoload.php";
$google_client = new Google_Client();
$google_client->setClientId('332796968225-407u02j6ftod68mv1fvq0ejlriep0h61.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://localhost/newlab/google');
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

<body>
    <div id="auth">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-9 col-sm-12">
                            <div id="auth-left">
                                <div class="row align-items-center text-center">
                                    <div class="col-12 mb-4">
                                        <img src="<?php echo base_url() ?>assets/core-images/<?php echo $setting[0]->setting_logo; ?>" class="logo-apps" alt="Logo aplikasi">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <p class="auth-subtitle mb-3">Welcome Back 👋, please login first before using app</p>
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

                                <!-- <a class="btn btn-login btn-block mb-3" href="<?php echo $google_client->createAuthUrl(); ?>"><i class="fa-brands fa-google"></i> &nbsp; Login with Google</a> -->
                                <div class="d-flex" style="gap: 16px;">
                                    <a class="btn btn-login btn-block mb-3" href="<?= site_url('login/index/consultation'); ?>">Consultation</a>
                                    <a class="btn btn-login btn-block mb-3" href="<?= site_url('login/index/simulation'); ?>">Simulation</a>
                                </div>
                                <p class="text-center" style="color: #A5A5A5;">Or login with</p>
                                <!-- Input Form -->
                                <?php echo form_open("auth/validate", "class='login-form'"); ?>
                                <form>
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <?php echo csrf(); ?>
                                        <input type="text" class="form-control form-control-xl" placeholder="Email / Username" required="required" name="username">
                                    </div>
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="password" class="form-control form-control-xl" placeholder="Password" required="required" name="password">
                                    </div>
                                    <button class="btn btn-success btn-block mb-4">LOGIN</button>
                                </form>
                                <?php echo form_close(); ?>

                            </div>
                        </div>
                    </div>
                    <!-- footer form login -->
                    <div>
                        <p class="text-center">
                            Created by <a href="#"><?php echo $setting[0]->setting_owner_name; ?></a> <br><b>Copyright &copy; <?php echo date('Y'); ?> <?php echo $setting[0]->setting_short_appname; ?></b>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block px-0">
                    <div id="auth-right">
                        <img src="<?php echo base_url(); ?>assets/core-images/<?php echo $setting[0]->setting_background; ?>" alt="background" style="height : 100vh; width: 100%; object-fit:cover">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
</body>

</html>