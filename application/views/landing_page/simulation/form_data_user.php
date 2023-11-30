    <main id="main">
        <section id="greetings" class="consultation">
            <div class="container">
                <div class="d-flex flex-wrap content align-items-start">
                    <div class="col-lg-6">
                        <div class="d-flex flex-column">
                            <div class="text-heading">
                                <span>Welcome to <b>NEWLAB+</b> <b><?= $this->session->userdata('user_fullname') ?></b> 👋</span>
                                <h3>Please fill your profile & preference.</h3>
                            </div>
                            <?php echo form_open_multipart("simulation/create") ?>
                            <?php echo csrf(); ?>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="">Fullname <span>*</span></label>
                                    <input type="text" class="form-control form-control-xl" name="sim_response_name" placeholder="Enter your fullname" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" form-group col-lg-12">
                                    <label for="">Gender <span>*</span></label>
                                    <div class="row mx-0">
                                        <label class="rad-label">
                                            <input type="radio" class="rad-input" name="sim_response_gender" value="Woman">
                                            <div class="rad-design"></div>
                                            <div class="rad-text">Woman</div>
                                        </label>
                                        <label class="rad-label">
                                            <input type="radio" class="rad-input" name="sim_response_gender" value="Man">
                                            <div class="rad-design"></div>
                                            <div class="rad-text">Man</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="">Activity Category <span>*</span></label>
                                    <div class="row mx-0">
                                        <label class="rad-label">
                                            <input type="radio" class="rad-input" name="daily_activity" value="Indoor">
                                            <div class="rad-design"></div>
                                            <div class="rad-text">Indoor</div>
                                        </label>
                                        <label class="rad-label">
                                            <input type="radio" class="rad-input" name="daily_activity" value="Outdoor">
                                            <div class="rad-design"></div>
                                            <div class="rad-text">Outdoor</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="">Choose Your Problem <span>*</span></label>
                                    <select class="select select2" name="problems_experienced" id="user_problem">
                                        <option value="">- Choose Problem -</option>
                                        <option value="Body">Body</option>
                                        <option value="Skin">Skin</option>
                                        <option value="Teeth">Teeth</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" title="Tambah data"> Next -></button>
                            <!-- <a href="<?= site_url(); ?>simulation/form_simulation" class="btn btn-primary btn-sm">Next -></a> -->
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <img class="hero-image" src="<?= base_url(); ?>/assets/core-images/preview-image/thumbnail-92323.jpg" alt="preview">
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->