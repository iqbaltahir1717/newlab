<main id="main">
    <section id="greetings" class="consultation">
        <div class="container">
            <div class="d-flex flex-wrap content justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="d-flex flex-column">
                        <div class="text-heading row align-items-center">
                            <div class="col-lg-7 px-0 align-items-center justify-content-center d-flex flex-column" style="gap: 16px;">
                                <h3>Quisinoer Submitted <i class="fa-regular fa-circle-check"></i></h3>
                                <p>Hello <?= $this->session->userdata('user_fullname') ?>.your quisioner have been recorded, this our <b>recomendation product for you</b>. Thank you! <a href="">
                                        <u>Edit Quisioner</u>
                                    </a></p>
                                <div class="d-flex btn-group">
                                    <a href="<?= base_url('auth/logout'); ?>" class="btn btn-secondary">
                                        Log Out
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-product">
                            <div class="card-product-item">
                                <div class="d-flex">
                                    <img src="<?= base_url(); ?>upload/product/thumbnailproduct-20231123113654.jpg" alt="preview-product">
                                    <div class="card-detail col-lg px-0">
                                        <h3>Brightlogy Face Serum</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur. Est a imperdiet nulla sollicitudin pulvinar egestas mi. Quis id id varius facilisi pulvinar risus integer nam maecenas.</p>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                            See Product Details
                                        </button>
                                    </div>
                                </div>

                                <div class="collapse" id="collapse1">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse11" aria-expanded="true" aria-controls="collapse11">
                                                        Face Serum - Benefits Produk
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse11" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    Manfaat Brightlogy Brigtening Face Serum:
                                                    ✅ Membantu mengurangi produksi Melanin (Pigmen warna kulit - semakin banyak melanin, maka kulit semakin gelap) yang mendorong pencerahan kulit 3x lebih cepat
                                                    ✅ Melembabkan dan menghaluskan kulit
                                                    ✅ Anti inflamasi
                                                    ✅ Menyamarkan noda hitam pada kulit
                                                    ✅ Melindungi kulit dari sinar UV
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                                        Face Serum - Tutorial Produk
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse12" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                                        Face Serum - BPOM
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse13" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-product-item">
                                <div class="d-flex">
                                    <img src="<?= base_url(); ?>upload/product/thumbnailproduct-20231123113654.jpg" alt="preview-product">
                                    <div class="card-detail col-lg px-0">
                                        <h3>Brightlogy Face Serum</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur. Est a imperdiet nulla sollicitudin pulvinar egestas mi. Quis id id varius facilisi pulvinar risus integer nam maecenas.</p>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                            See Product Details
                                        </button>
                                    </div>
                                </div>

                                <div class="collapse" id="collapse2">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse21" aria-expanded="true" aria-controls="collapse21">
                                                        Face Serum - Benefits Produk
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse21" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    Manfaat Brightlogy Brigtening Face Serum:
                                                    ✅ Membantu mengurangi produksi Melanin (Pigmen warna kulit - semakin banyak melanin, maka kulit semakin gelap) yang mendorong pencerahan kulit 3x lebih cepat
                                                    ✅ Melembabkan dan menghaluskan kulit
                                                    ✅ Anti inflamasi
                                                    ✅ Menyamarkan noda hitam pada kulit
                                                    ✅ Melindungi kulit dari sinar UV
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse22" aria-expanded="false" aria-controls="collapse22">
                                                        Face Serum - Tutorial Produk
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse22" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse23" aria-expanded="false" aria-controls="collapse23">
                                                        Face Serum - BPOM
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse23" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>