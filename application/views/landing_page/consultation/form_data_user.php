    <main id="main">
        <section id="greetings" class="consultation">
            <div class="container">
                <div class="d-flex flex-wrap content align-items-start">
                    <div class="col-lg-6">
                        <div class="d-flex flex-column">
                            <div class="text-heading">
                                <span>Welcome to <b>NEWLAB+</b> <b>Nikita</b> 👋</span>
                                <h3>Please fill your profile & preference.</h3>
                            </div>
                            <form action="">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="">Fullname <span>*</span></label>
                                        <input type="text" class="form-control form-control-xl" name="user_fullname" placeholder="Enter your fullname" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" form-group col-lg-12">
                                        <label for="">Gender <span>*</span></label>
                                        <div class="row mx-0">
                                            <label class="rad-label">
                                                <input type="radio" class="rad-input" name="user_gender" value="Perempuan" checked>
                                                <div class="rad-design"></div>
                                                <div class="rad-text">Woman</div>
                                            </label>
                                            <label class="rad-label">
                                                <input type="radio" class="rad-input" name="user_gender" value="Perempuan">
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
                                                <input type="radio" class="rad-input" name="user_activity" value="Indoor" checked>
                                                <div class="rad-design"></div>
                                                <div class="rad-text">Indoor</div>
                                            </label>
                                            <label class="rad-label">
                                                <input type="radio" class="rad-input" name="user_activity" value="Outdoor">
                                                <div class="rad-design"></div>
                                                <div class="rad-text">Outdoor</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="">Choose Your Problem <span>*</span></label>
                                        <select class="select select2" name="user_problem" id="user_problem">
                                            <option value="">- Choose Problem -</option>
                                            <option value="body">Body</option>
                                            <option value="skin">Skin</option>
                                            <option value="teeth">Teeth</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="">Specific Problem <span>*</span></label>
                                        <textarea name="user_problem_specific" id="user_problem_specific" cols="20" rows="5" class="form-control" placeholder="Enter your problem"></textarea>
                                    </div>
                                </div>
                                <!-- <a type="submit" class="btn btn-primary btn-sm">Next -></a> -->
                                <a href="<?= site_url(); ?>consultation/form_successfully" class="btn btn-primary btn-sm">Next -></a>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <img class="hero-image" src="<?= base_url(); ?>/assets/core-images/preview-image/thumbnail-92323.jpg" alt="preview">
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->