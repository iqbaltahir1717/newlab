    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Settings</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- ALert -->
                <?php
                if ($this->session->flashdata('alert')) {
                    echo $this->session->flashdata('alert');
                    unset($_SESSION['alert']);
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- Setting start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Data</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <?php echo form_open_multipart("setting/update") ?>
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <?php echo csrf(); ?>
                                                <label for="setting_appname">Application Name</label>
                                                <input type="hidden" class="form-control" name="setting_id" value="<?php echo $setting[0]->setting_id; ?>" required>
                                                <input type="hidden" class="form-control" name="setting_logo" value="<?php echo $setting[0]->setting_logo; ?>" required>
                                                <input type="text" id="setting_appname" class="form-control" name="setting_appname" required value="<?= $setting[0]->setting_appname ?>">
                                                <input type="hidden" class="form-control" name="setting_background" value="<?php echo $setting[0]->setting_background; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_short_appname">Application Name (short)</label>
                                                <input type="text" id="setting_short_appname" class="form-control" name="setting_short_appname" value="<?= $setting[0]->setting_short_appname ?>" required >
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_owner_name">Owner App</label>
                                                <input type="text" id="setting_owner_name" class="form-control" name="setting_owner_name"  value="<?= $setting[0]->setting_owner_name ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_phone">Phone Number </label>
                                                <input type="text" id="setting_phone" class="form-control" name="setting_phone" value="<?= $setting[0]->setting_phone ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_email">Email</label>
                                                <input type="email" id="setting_email" class="form-control" name="setting_email" value="<?= $setting[0]->setting_email ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_address">Address</label>
                                                <textarea id="setting_address" class="form-control" name="setting_address" rows="4"><?= $setting[0]->setting_address ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="about">About Apps</label>
                                                <textarea id="about" class="form-control" name="setting_about" rows="4"><?= $setting[0]->setting_about ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form">
                                    <div class="row">
                                    <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_instagram">Instagram</label>
                                                <input type="text" id="setting_instagram" class="form-control" name="setting_instagram"  value="<?= $setting[0]->setting_instagram ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_youtube">Youtube</label>
                                                <input type="text" id="setting_youtube" class="form-control" name="setting_youtube"  value="<?= $setting[0]->setting_youtube ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_facebook">Facebook</label>
                                                <input type="text" id="setting_facebook" class="form-control" name="setting_facebook"  value="<?= $setting[0]->setting_facebook ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="logo">Logo App</label>
                                                <input type="file" id="logo" class="form-control" name="logo">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Preview Logo :</strong></label> <br>
                                                <img src="<?php echo base_url(); ?>assets/core-images/<?php echo $setting[0]->setting_logo; ?>" height="50" alt="Preview Logo">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="background">Background Login</label>
                                                <input type="file" id="background" class="form-control" name="background">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Preview Background Login :</strong></label> <br>
                                                <img src="<?php echo base_url(); ?>assets/core-images/<?php echo $setting[0]->setting_background; ?>" height="150" alt="Preview Background">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end mt-2">
                                            <button type="submit" class="btn btn-info btn-sm me-1 mb-1" title="Ubah data setting"><i class="bi bi-pencil-square"></i> Update</button>
                                            <a href="<?php echo site_url('setting') ?>" class="btn btn-success btn-sm me-1 mb-1" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> refresh</a>
                                        </div>
                                        </form>
                                        <?php echo form_close(); ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Setting end -->
    </div>