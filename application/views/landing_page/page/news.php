

    <main id="main">

        <section id="news1" class="news1" style="background: linear-gradient(90deg, #FFF 26.56%, rgba(255, 255, 255, 0.83) 50.75%, rgba(255, 255, 255, 0.00) 70.23%), url(<?= base_url()."/assets/core-images/bannernews-50.jpg)"?> no-repeat center center fixed; background-size: cover; width: 100%;">

            <div class="container">

                <div class="unitimg">

                    <div class="unittext">

                        <div class="row"  style="margin-left: 0; margin-right:0">

                            <div class="col-lg-8 responsive">

                                <div class="mt-5">

                                    <h1>Newest and Updated News of Gramercy and Alam Sutera</h1>

                                </div>

                                <div>

                                    <p>Enjoy various and updated topics in Alam Sutera area, from infrastructure and new commercial etc</p>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="my-5 pt-3">

                                <?php echo form_open("page/information_search/".$this->uri->segment(3)."/".$this->uri->segment(4))?>

                                    <div class="input-group mb-3" style="width: 100%;">

                                        <input type="text" class="form-control" placeholder="Enter keyword here..." name="key">

                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2" aria-label="tombol search"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">

                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.783 14.0199C9.69098 16.4963 5.16497 16.3014 2.29872 13.4352C-0.776657 10.3598 -0.776657 5.37361 2.29872 2.29823C5.3741 -0.777146 10.3603 -0.777145 13.4357 2.29823C16.3019 5.16448 16.4968 9.69047 14.0204 12.7825L20.0353 18.7974C20.377 19.1391 20.377 19.6931 20.0353 20.0348C19.6936 20.3765 19.1396 20.3765 18.7979 20.0348L12.783 14.0199ZM3.53616 12.1977C1.1442 9.80577 1.1442 5.92763 3.53616 3.53567C5.92812 1.14371 9.80625 1.14371 12.1982 3.53567C14.5884 5.92588 14.5902 9.80007 12.2035 12.1925C12.2017 12.1942 12.2 12.1959 12.1982 12.1977C12.1964 12.1995 12.1947 12.2012 12.193 12.203C9.80057 14.5897 5.92637 14.5879 3.53616 12.1977Z" fill="white"/>

                                            </svg>

                                        </button>

                                    </div>

                                <?php echo form_close();?>

                                </div>

                                <div class="row mouse mb-5 justify-content-end">

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

                                    

                                    <div class="row justify-content-center align-items-stretch">

                                    <?php 

                                        if($news){

                                            foreach($news as $n){ 

                                    ?>

                                        <div class="col-lg-4">

                                            <article class="entry">

                                                <div class="entry-img">

                                                    <img src="<?php echo base_url();?>upload/news/<?php echo $n->news_cover;?>" alt="" class="img-fluid">

                                                </div>



                                                <h2 class="entry-title">

                                                    <a href="<?php echo site_url('page/information_detail/'.$n->news_category_id.'/'.$n->field_id.'/'.$n->news_slug);?>"><?php echo $n->news_title;?></a>

                                                </h2>



                                                <div class="entry-meta">

                                                    <ul>

                                                        <li class="d-flex align-items-center"> <i class="fa-regular fa-calendar-days"></i> <?php echo indonesiaDate($n->news_date)?> &nbsp;&nbsp;<i class="fa-solid fa-eye"></i> <b><?php echo $n->news_count_view;?>x dilihat</b> &nbsp;&nbsp;<b class="badge badge-danger"><?php echo $news_category_name[0]->news_category_name;?></b></li>

                                                    </ul>

                                                </div>

                                            </article>

                                        </div>

                                    <?php 

                                            }

                                        }else{ echo "Tidak Ada ".$news_category_name[0]->news_category_name; }

                                    ?>



                                    </div>

                                

                                    <hr>

                                    <div class="blog-pagination"><?php echo $links;?></div>



                                </div>



                                <div class="col-lg-3">

                                    <div class="sidebar">

                                        <h3 class="sidebar-title">Kategori</h3>

                                        <hr style="border: 1px solid #676767">

                                        <div class="sidebar-item categories">

                                            <ul>

                                                <?php foreach($news_category as $nc){?>

                                                    <li><a href="<?php echo site_url('page/information/'.$nc->news_category_id.'/'.$this->uri->segment(4));?>"><?php echo $nc->news_category_name;?></a></li>

                                                <?php } ?>

                                            </ul>

                                        </div>

                                        

                                        

                                        <h3 class="sidebar-title">Artikel Terbaru</h3>

                                        <hr style="border: 1px solid #676767">

                                        <div class="sidebar-item recent-posts">

                                            <?php foreach($recent as $r){ ?>

                                            <div class="post-item clearfix">

                                                <img src="<?php echo base_url();?>upload/news/<?php echo $r->news_cover?>" alt="">

                                                <h4><a href="<?php echo site_url('page/information_detail/'.$r->news_category_id.'/'.$r->field_id.'/'.$r->news_slug);?>"><?php echo $r->news_title;?></a></h4>

                                                <time style="color:gray"><i class="fa-solid fa-eye"></i> <?php echo $r->news_count_view;?>x dilihat&nbsp;&nbsp;<b class="badge badge-success"><?php echo $r->field_name;?></b></time>

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