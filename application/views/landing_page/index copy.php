<link href="<?= base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
<script src="<?= base_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <main id="main mt-5">
    <section id="hero-new" class="hero-new">
        <div class="container barisone">
            <div class="row justify-content-center" style="flex-direction: column;">
                    <h1 class="bannertext  text-center" Data-aos="fade-down">ELEVATE YOUR LIFESTYLE</h1><br>
                    <h1 class="bannertext  text-center" Data-aos="fade-right">LUXURY HOMES</h1><br>
                    <h1 class="bannertext  text-center" Data-aos="fade-up">EXCLUSIVE  DREAMS</h1><br>
                    <p class="my-text text-center" Data-aos="fade-left">
                        A gift of gratitude, Alam Sutera offers a sanctuary for serene living in thanks for the achievements attained. Not just a house, <br>The Gramercy is a home where you can express yourself, appreciate life, connect with others, and create life memories.
                    </p>
            </div>
        </div>
    </section>
    <!-- --------------------------Section 2----------------------------------- -->
    <section id="hero-new2" class="hero-new2 mt-2">
            <div class="container">
                <div class="row">
                    <div class="image-container" >
                    </div>
                </div>
            </div>
    </section>

    <!-- --------------------------Section 3----------------------------------- -->
    <section id="hero-new3" class="hero-new3" style="background: linear-gradient(180deg, #000 0%, rgba(0, 0, 0, 0.00) 13.72%),linear-gradient(180deg, rgba(0, 0, 0, 0.00) 78.3%, #000 91.32%), url(<?= base_url();?>/assets/core-images/home/taman-jalan.jpg)  no-repeat center center fixed; background-size: cover; width: 100%;">
        <div class="container-md-12 pl-5 pr-5 barisone md-12">
            <div class="row brand-logo-gramercy justify-content-center text-center">
                <div class="col">
                    <img src="assets/core-images/alam-sutera.png" alt="Image 1">
                    <img src="assets/core-images/thegramercy.png" alt="Image 2">
                </div>
            </div>
        </div>
        <div class="container barisone md-12">
            <div class="row ourservice justify-content-center text-center">
                    <div class="col-md-4 bagian">
                        <h3>GRATITUDE</h3>
                        <p>Alam Sutere gives back to it’s  greater community by developing a sanctuary for serene living. A surprise gift for gratitude</p>
                    </div>
                    <div class="col-md-4 bagian">
                        <h3>FELLOWSHIP</h3>
                        <p>Build Opennes of heart with others who share common interest to learn. Grow and enjoy life</p>
                    </div>
                    <div class="col-md-4 bagian">
                        <h3>FREEDOM</h3>
                        <p>Creation of curated gratitude community and well designed environment</p>
                    </div>
                </div>
        </div>
        <div class="container">
            <div class="row ourservice justify-content-center text-center mt-5">
                <p>The last and most prestigious cluster locatedin favourite place of Alam Sutera “Green Tunnel”</p>
            </div>
        </div>
    </section>
    
    <!-- --------------------------Section 4----------------------------------- -->
    <section id="hero-new4" class="hero-new4">
        <div class="container justify-content-center text-center">
            <div class="row brand-logo-gramercy justify-content-center text-center">
                <img src="assets/core-images/thegramercy.png" alt="Image 2">
            </div>
            <div class="row lokasi justify-content-center text-center mb-3">
                <p class="tekslokasi">Located in Alam Sutera, South Tangerang, The Gramercy is an oasis from the bustling urban lifestyle. A well-built residential development, Alam Sutera offers a better quality of life, amidst mature greenery, complete sports facilities, office complexes, entertainment, and other support infrastructure like schools and a hospital. The Gramercy provides all your needs. A place to express gratitude and begin your story.</p>
            </div>
            <div class="row lokasi justify-content-center text-center">
                <button type="button" class="btn btn-transparent btn-sm-">Location Gramercy &nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
                </button>
            </div>
            <div class="row lokasi justify-content-center text-center mt-3">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.176456324549!2d106.65575332476405!3d-6.2404601437478595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb47b0261701%3A0x6f2b5df2b62ca182!2sThe%20Gramercy%40Alam%20Sutera!5e0!3m2!1sen!2sid!4v1698069498361!5m2!1sen!2sid" style="border:0; width: 100%; height: 600px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    
    <!-- --------------------------Section 5----------------------------------- -->

    <section id="hero-new5" class="hero-new5 mt-5">
        <div class="container barisone">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h1 class="bannertext text-center">FIND YOUR <br>LUXURY UNIT</h1>
                </div>
            </div>
            <hr style="border:1px solid #dddddd">
        </div>
    </section>

 
    <!-- --------------------------Section 6----------------------------------- -->
    <?php foreach ($unit as $u){ ?>
    <section id="unit-section" class="mb-5 pb-5">
        <div class="container-md-12">
            <div class="row align-items-center mb-5">
                <div class="col-md-6 align-items-start">
                    <div class="row align-items-start">
                        <div class="col-md-5 justify-content-start align-items-start  text-left">
                            <img class="brand" src="assets/core-images/thegramercyhitam.png" alt="Image 2">
                        </div>
                        <div class="col-md-7 justify-content-start align-items-start  text-left">
                            <h1>UNIT <?= strtoupper( $u->unit_name);?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <p>
                            <?= $u->unit_description;?>
                        </p>
                    </div>
                    <div class="row mt-3">
                        <a href="<?php echo site_url('page/unit_type/'.$u->unit_id)?>" class="btn btn-primary">See Detail Unit <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg>
                    </a>
                    </div>
                </div>
                <div class="col-md-6 justify-content-end align-items-end  text-right">
                    <img style="height: 500px" class="unitalca glightbox" src="<?= base_url()."/upload/unit/". $u->unit_preview1?>">
                </div>
            </div>
            <hr style="border:1px solid #dddddd">
        </div>
    </section>
    <?php } ?>

    <!-- --------------------------Section 7----------------------------------- -->
    <section id="hero-new7" class="hero-new7" style="background: url(<?= base_url()."/assets/core-images/home/sanctuary.jpg)"?> no-repeat center center fixed; background-size: cover; width: 100%;">
            <div class="container-md-12 align-items-start">
                <div class="row align-items-start justify-align-start">
                    <div class="col-md-12">
                        <div class="row mt-0">
                            <img class="brand" src="assets/core-images/thegramercyputih.png" alt="Image 2">
                        </div>
                        <div class="row mt-5">
                            <h1>LUSH COURTYARD<br>SANCTUARY</h1>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <div class="card">
                                <div class="card-body">
                                    <p>A home where you want to be. Surround yourself with lush greenery that captivates your life’s gratitude. Brought to life by Karl Princic, the landscape architect with experience over 30 years in planning and designing of resorts, residential and hospitality projects worldwide. Now the paradise is yours.</p>
                                    <button class="mt-3">Download Brochure <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                    </button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- --------------------------Section 8----------------------------------- -->
    <section id="hero-new8" class="hero-new8 mt-0">
        <div class="container-md-12 section8 justify-content-center text-center">
            <div class="row brand-logo-gramercy justify-content-center text-center">
                <div class="col">
                    <img src="assets/core-images/thegramercyhitam2.png" alt="Image 2">
                </div>
            </div>
            <div class="row brand-logo-gramercy justify-content-center text-center">
                <h5>A center of development and a desirable place for better living due to its well-planned infrastructure, comprehensive amenities and a focus on creating a harmonious and green community</h5>
            </div>
            <div class="row project justify-content-center text-center mt-5">
                <div class="col-md-6">
                    <img class="project-1" src="assets/core-images/project-1.png" alt="Image 2">
                </div>
                <div class="col-md-6 justify-content-center">
                    <div class="row g-5 justify-content-center">
                        <img class="project-2" src="assets/core-images/project-2.png" alt="Image 2">
                    </div>
                    <div class="row justify-content-center">
                        <img  class="project-3" src="assets/core-images/project-3.png" alt="Image 2">
                    </div>
                </div>
            </div>
            <div class="row button justify-content-center text-center mt-5">
                <a href="<?php echo site_url('page/project'); ?>">
                    <button>Others Project
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
                    </button>
                </a>
            </div>
        </div>
    </section>
    <section id="blog" class="blog pt-5 mt-5 mb-5">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <h4 class="bannertext col-lg-12 text-center mb-3">RECENT NEWS</h4>
                <p class="col-lg-12 text-center mb-5">Explore our collection of informative articles covering a wide range of topics, tailored to suit your interests</p>
                <div class="col-lg-12 entries pt-5">
                    <div class="row justify-content-center align-items-stretch">
                    <?php 
                        if($news){
                            foreach($news as $n){ 
                    ?>
                        <div class="col-lg-3">
                            <article class="entry">
                                <div class="entry-img">
                                    <img src="<?php echo base_url();?>upload/news/<?php echo $n->news_cover;?>" alt="" class="img-fluid">
                                </div>

                                <h2 class="entry-title">
                                    <a href="<?php echo site_url('page/information_detail/'.$n->news_category_id.'/'.$n->field_id.'/'.$n->news_slug);?>"><?php echo $n->news_title;?></a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"> <i class="icofont-calendar"></i> <?php echo indonesiaDate($n->news_date)?> &nbsp;&nbsp;<i class="icofont-eye-alt"></i> <b><?php echo $n->news_count_view;?>x dilihat</b> &nbsp;&nbsp;<b class="badge badge-danger"><?php echo $n->news_category_name;?></b></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                    <?php 
                            }
                        }else{ echo "Tidak Ada ".$news_category_name[0]->news_category_name; }
                    ?>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                    <a class="btn btn-primary" href="<?php echo site_url('page/information/1/1'); ?>">
                        Others Project
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </a>
                </div>
        </div>
    </section>
    </main>
    <script>
        const textContainers = document.querySelectorAll('.hero-new .bannertext');
        const textOptions = [
            ['LONG TERM LUXURY', 'LAVISH ABODES', 'LUXURY HOUSING MARKET'],
            ['EASY LUXURY OF HOME', 'SIMPLE LIFE', 'OPULENT LIVING SPACES'],
            ['WHAT A CHARMING HOUSE', 'DELUXE HOUSES', 'HIGH-END RESIDENCES'],
            ['ELEVATE YOUR LIFESTYLE', 'LUXURY HOMES', 'EXCLUSIVE  DREAMS']
        ];
        let currentIndex = 0;

        const pElements = document.querySelectorAll('.hero-new p');
        const pTextOptions = [
            ["Showing appreciation, Alam Sutera offers a peaceful retreat to honor your accomplishments. The Gramercy is more than a residence; it's a space for self-expression, happiness, connections, and lasting memories.", "In a spirit of thankfulness, Alam Sutera provides a tranquil haven to celebrate your achievements. At The Gramercy, you'll find not just a home, but a canvas for self-expression, joy, connections, and cherished memories."],
            ["In a spirit of thankfulness, Alam Sutera provides a tranquil haven to celebrate your achievements. At The Gramercy, you'll find not just a home, but a canvas for self-expression, joy, connections, and cherished memories.", "Showing appreciation, Alam Sutera offers a peaceful retreat to honor your accomplishments. The Gramercy is more than a residence; it's a space for self-expression, happiness, connections, and lasting memories."],
            ["With gratitude in mind, Alam Sutera presents a serene escape for recognizing your successes. The Gramercy is more than a house; it's your sanctuary for self-expression, happiness, connections, and cherished moments.","Showing appreciation, Alam Sutera offers a peaceful retreat to honor your accomplishments. The Gramercy is more than a residence; it's a space for self-expression, happiness, connections, and lasting memories."],
            ['A gift of gratitude, Alam Sutera offers a sanctuary for serene living in thanks for the achievements attained. Not just a house, The Gramercy is a home where you can express yourself, appreciate life, connect with others, and create life memories.', "Showing appreciation, Alam Sutera offers a peaceful retreat to honor your accomplishments. The Gramercy is more than a residence; it's a space for self-expression, happiness, connections, and lasting memories."]
        ];
        let pCurrentIndex = 0;

        function typeText(element, text, index, duration) {
            if (index < text.length) {
                element.textContent = text.substring(0, index + 1);
                setTimeout(() => {
                    typeText(element, text, index + 1, duration);
                }, duration);
            }
        }

        function changeText(direction) {
            if (direction === 'next') {
                currentIndex = (currentIndex + 1) % textOptions.length;
                pCurrentIndex = (pCurrentIndex + 1) % pTextOptions.length;
            } else if (direction === 'prev') {
                currentIndex = (currentIndex - 1 + textOptions.length) % textOptions.length;
                pCurrentIndex = (pCurrentIndex - 1 + pTextOptions.length) % pTextOptions.length;
            }

            const targetText = textOptions[currentIndex];
            textContainers.forEach((container, index) => {
                container.textContent = ''; // Clear existing text
                typeText(container, targetText[index], 0, 50); // Typing speed: 50 milliseconds per character
            });

            const targetPText = pTextOptions[pCurrentIndex];
            pElements.forEach((p, index) => {
                p.textContent = ''; // Clear existing text
                typeText(p, targetPText[index], 0, 50); // Typing speed: 50 milliseconds per character
            });
        }

        const nextTextButton = document.getElementById('nextTextButton');
        nextTextButton.addEventListener('click', () => changeText('next'));

        const prevTextButton = document.getElementById('prevTextButton');
        prevTextButton.addEventListener('click', () => changeText('prev'));
    </script>