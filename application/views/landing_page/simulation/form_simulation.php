    <main id="main" style="background-color: #EEEEEE;">
        <section id="greetings" class="simulation">
            <div class="container px-0">
                <div class="d-flex flex-wrap content justify-content-center">
                    <div class="col-lg-7 col-md-10 col-sm-12">
                        <div class="d-flex flex-column">
                            <div class="text-heading">
                                <h3>Please fill your data first for see result.</h3>
                            </div>
                            <form action="">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="">Berat Badan (kg) <span>*</span></label>
                                        <input type="number" class="form-control form-control-xl" name="response" placeholder="Value Berat Badan (kg)" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="">Tinggi Badan (cm) <span>*</span></label>
                                        <input type="number" class="form-control form-control-xl" name="response" placeholder="Value Tinggi Badan (cm)" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="">Lingkar Perut (cm) <span>*</span></label>
                                        <input type="number" class="form-control form-control-xl" name="response" placeholder="Value Lingkar Perut (cm)" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="">Specific Problem <span>*</span></label>
                                        <textarea name="user_problem_specific" id="user_problem_specific" cols="20" rows="5" class="form-control" placeholder="Enter your problem"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" form-group col-lg-12">
                                        <label for="">Bentuk Badan Yang Mendekati <span>*</span></label>
                                        <div class="row mx-0">
                                            <label class="rad-label">
                                                <input type="radio" class="rad-input" name="user_gender" value="Perempuan" checked>
                                                <div class="rad-design"></div>
                                                <div class="rad-text"><img src="<?= base_url(); ?>upload/option/option-20231128111542-6632.png" alt="" width="94"></div>
                                            </label>
                                            <label class="rad-label">
                                                <input type="radio" class="rad-input" name="user_gender" value="Perempuan" checked>
                                                <div class="rad-design"></div>
                                                <div class="rad-text"><img src="<?= base_url(); ?>upload/option/option-20231128111910-9325.png" alt="" width="94"></div>
                                            </label>
                                            <label class="rad-label">
                                                <input type="radio" class="rad-input" name="user_gender" value="Perempuan" checked>
                                                <div class="rad-design"></div>
                                                <div class="rad-text"><img src="<?= base_url(); ?>upload/option/option-20231128111917-1805.png" alt="" width="94"></div>
                                            </label>
                                            <label class="rad-label">
                                                <input type="radio" class="rad-input" name="user_gender" value="Perempuan" checked>
                                                <div class="rad-design"></div>
                                                <div class="rad-text"><img src="<?= base_url(); ?>upload/option/option-20231128111922-4874.png" alt="" width="94"></div>
                                            </label>
                                            <label class="rad-label">
                                                <input type="radio" class="rad-input" name="user_gender" value="Perempuan" checked>
                                                <div class="rad-design"></div>
                                                <div class="rad-text"><img src="<?= base_url(); ?>upload/option/option-20231128111927-8575.png" alt="" width="94"></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="">Apakah kamu menjaga pola makan dan hidup sehat? <span>*</span></label>
                                        <select class="select select2" name="user_problem" id="user_problem">
                                            <option value="">- Choose Here -</option>
                                            <option value="body">Body</option>
                                            <option value="skin">Skin</option>
                                            <option value="teeth">Teeth</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="">Pilih target turunnya berat badan​ <span>*</span></label>
                                        <select class="select select2" name="user_problem" id="user_problem">
                                            <option value="">- Choose Here -</option>
                                            <option value="body">Body</option>
                                            <option value="skin">Skin</option>
                                            <option value="teeth">Teeth</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="">Target yang ingin kamu capai? <span class="hint">?(bisa centang lebih dari 1)​</span> <span>*</span></label>
                                        <select class="select select2" name="user_problem" id="user_problem">
                                            <option value="">- Choose Here -</option>
                                            <option value="body">Body</option>
                                            <option value="skin">Skin</option>
                                            <option value="teeth">Teeth</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <a type="submit" class="btn btn-primary btn-sm">Next -></a> -->
                                <a href="<?= site_url(); ?>simulation/form_successfully" class="btn btn-primary btn-sm">Next -></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->