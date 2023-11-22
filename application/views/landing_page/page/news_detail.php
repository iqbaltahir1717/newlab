    <main id="main">

        <section id="news1" class="news1 news1-detail" style="background: linear-gradient(90deg, #FFF 26.56%, rgba(255, 255, 255, 0.83) 50.75%, rgba(255, 255, 255, 0.00) 70.23%), url(<?= base_url()."/upload/news/".$news[0]->news_cover.")"?> no-repeat center center fixed; background-size: cover; width: 100%;">

            <div class="container">

                <div class="unitimg">

                    <div class="unittext">

                        <div class="row" style="margin-left: 0; margin-right:0">

                            <div class="col-md-9">

                                <div class="mt-5">

                                    <h1><?php echo $news[0]->news_title;?></h1>

                                </div>

                            </div>

                            <div class="col-md-2">

                                <div class="mouse mb-5 justify-content-end">

                                    <img src="<?php echo base_url(); ?>assets/core-images/mouse-indicator.svg" alt="Logo">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>  

        <section id="services" class="services">

            <div class="container" data-aos="fade-up">

                <section id="blog" class="blog">

                    <div class="container" data-aos="fade-up">

                        <div class="row">

                            <div class="col-lg-9 entries">

                                <?php foreach($news as $n){ ?>

                                <article class="entry" >

                                    <div class="entry-img" style="width: 100%; height: 400px;">

                                        <img class="glightbox" src="<?php echo base_url();?>upload/news/<?php echo $n->news_cover;?>" alt="" style="width: 100%; height: 100%">

                                    </div>



                                    <div class="entry-meta" style="color:#777777;font-size:12px;">

                                        <ul>

                                            

                                            <li class="d-flex align-items-center"> <i class="fa-solid fa-calendar"></i> <?php echo indonesiaDate($n->news_date)?> </li>

                                            <li class="d-flex align-items-center"> <i class="fa-solid fa-eye"></i> <b><?php echo indonesiaDate($n->news_count_view)?>x Views</b></li>

                                            <li class="d-flex align-items-center"> <b class="badge badge-danger"><?php echo $news_category_name[0]->news_category_name;?></b> </li>

                                            <li class="d-flex align-items-center"> <b class="badge badge-success"><?php echo $n->field_name;?></b> </li>

                                        </ul>

                                    </div>



                                    <div class="entry-content">

                                        <p>

                                            <?php echo $n->news_text;?>

                                        </p>

                                        

                                    </div>

                                    <hr style="border: 1px solid #dadada">

                                    <b>Share to Social Media :</b>



                                    <!-- AddToAny BEGIN -->

                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="padding-bottom: 32px;">

                                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>

                                        <a class="a2a_button_facebook"></a>

                                        <a class="a2a_button_twitter"></a>

                                        <a class="a2a_button_whatsapp"></a>

                                        <a class="a2a_button_google_gmail"></a>

                                        <a class="a2a_button_copy_link"></a>

                                    </div>

                                    <script async src="https://static.addtoany.com/menu/page.js"></script>

                                    <!-- AddToAny END -->



                                </article>



                                <?php } ?>

                            </div>



                            <div class="col-lg-3">

                                <div class="sidebar">

                                    <div class="sidebar-item search-form">

                                        <!-- <?php echo form_open("page/information_search/".$this->uri->segment(3)."/".$this->uri->segment(4))?>

                                            <input type="text" name="key" placeholder="Cari Judul">

                                            <button type="submit">Cari</button>

                                        <?php echo form_close();?> -->

                                    <h3 class="sidebar-title">Category Information</h3>

                                    <hr style="border: 1px solid #676767">

                                    <div class="sidebar-item categories">

                                        <ul>

                                            <?php foreach($news_category as $nc){?>

                                                <li><a href="<?php echo site_url('page/information/'.$nc->news_category_id.'/'.$this->uri->segment(4));?>"><?php echo $nc->news_category_name;?></a></li>

                                            <?php } ?>

                                        </ul>

                                    </div>

                                    

                                    

                                    <h3 class="sidebar-title">Recent News</h3>

                                    <hr style="border: 1px solid #676767">

                                    <div class="sidebar-item recent-posts">

                                        <?php foreach($recent as $r){ ?>

                                        <div class="post-item clearfix">

                                            <img src="<?php echo base_url();?>upload/news/<?php echo $r->news_cover?>" alt="">

                                            <h4><a href="<?php echo site_url('page/information_detail/'.$r->news_category_id.'/'.$r->field_id.'/'.$r->news_slug);?>"><?php echo $r->news_title;?></a></h4>

                                            <time style="color:gray"><i class="fa-solid fa-eye"></i> <?php echo $r->news_count_view;?>x Views&nbsp;&nbsp;<b class="badge badge-success"><?php echo $r->field_name;?></b></time>

                                        </div>

                                        <?php } ?>

                                    </div>

                                </div>

                            </div>

                        </div>



                    </div>

                </section>

            </div>

        </section>

    </main>