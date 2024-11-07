<?php
session_start();

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$categories = $pdo->query("SELECT * FROM categories WHERE is_popular IS TRUE")->fetchAll();
$testimonials = $pdo->query("SELECT * FROM testimonial")->fetchAll();
$locations = $pdo->query("SELECT * FROM location")->fetchAll();

$jobs = $pdo->query("SELECT jobs.name, jobs.image, jobs.date, location.name AS location, job_type.name AS job_type
FROM jobs
JOIN location ON jobs.location_id = location.id
JOIN job_type ON jobs.job_type_id = job_type.id
ORDER BY jobs.date DESC
LIMIT 5")->fetchAll();

$companies = $pdo->query("SELECT company, image, available_position FROM companies LIMIT 4")->fetchAll();
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job Board</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/slicknav.css">

    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid ">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="/">home</a></li>
                                        <li><a href="jobs.php">Browse Job</a></li>
                                        <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="candidate.html">Candidates </a></li>
                                                <li><a href="job_details.php">job details </a></li>
                                                <li><a href="elements.html">elements</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="single-blog.html">single-blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="phone_num d-none d-xl-block">
                                    <?php if (!isset($_SESSION['company_id'])): ?>
                                        <a href="/login.php" style="margin-right: 10px;">Log in</a>
                                        <a href="/register.php" style="margin-right: 10px;">Register</a>
                                    <?php else: ?>
                                        <a href="/auth/logout.php">Log out</a>
                                    <?php endif; ?>
                                </div>
                                <div class="d-none d-lg-block">
                                    <a class="boxed-btn3" href="#">Post a Job</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->

<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="slider_text">
                        <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">4536+ Jobs listed</h5>
                        <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Find your Dream Job</h3>
                        <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">We provide online instant
                            cash loans with quick approval that suit your term length</p>
                        <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                            <a href="#" class="boxed-btn3">Upload your Resume</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s"
         data-wow-delay=".2s">
        <img src="img/banner/illustration.png" alt="">
    </div>
</div>
<!-- slider_area_end -->

<!-- catagory_area -->
<div class="catagory_area">
    <div class="container">
        <div class="row cat_search">
            <div class="col-lg-3 col-md-4">
                <div class="single_input">
                    <input type="text" placeholder="Search keyword">
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="single_input">
                    <select class="wide">
                        <option data-display="Location" selected value="all">Location</option>
                        <?php foreach ($locations as $location): ?>
                            <option value="<?= $location['id'] ?>"><?= $location['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="single_input">
                    <select class="wide">
                        <option data-display="Category" selected value="all">Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="job_btn">
                    <a href="#" class="boxed-btn3">Find Job</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ catagory_area -->

<!-- popular_catagory_area_start  -->
<div class="popular_catagory_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title mb-40">
                    <h3>Popular Categories</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($categories as $category): ?>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.php"><h4><?= $category['name'] ?></h4></a>
                        <p><span><?= $category['available_position'] ?></span> Available position</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- popular_catagory_area_end  -->

<!-- job_listing_area_start  -->
<div class="job_listing_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section_title">
                    <h3>Job Listing</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="brouse_job text-right">
                    <a href="jobs.php" class="boxed-btn4">Browse More Job</a>
                </div>
            </div>
        </div>
        <div class="job_lists">
            <div class="row">
                <?php foreach ($jobs as $job): ?>
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="<?= $job['image'] ?>" alt="">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="job_details.php"><h4><?= $job['name'] ?></h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p><i class="fa fa-map-marker"></i><?= $job['location'] ?></p>
                                        </div>
                                        <div class="location">
                                            <p><i class="fa fa-clock-o"></i><?= $job['job_type'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                    <a href="job_details.php" class="boxed-btn3">Apply Now</a>
                                </div>
                                <div class="date">
                                    <p>Date: <?= $job['date'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- job_listing_area_end  -->

<div class="top_companies_area">
    <div class="container">
        <div class="row align-items-center mb-40">
            <div class="col-lg-6 col-md-6">
                <div class="section_title">
                    <h3>Top Companies</h3>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="brouse_job text-right">
                    <a href="jobs.php" class="boxed-btn4">Browse More Job</a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($companies as $company): ?>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="<?= $company['image'] ?>" alt="">
                        </div>
                        <a href="jobs.php"><h3><?= $company['company'] ?></h3></a>
                        <p><span><?= $company['available_position'] ?></span> Available position</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- job_searcing_wrap  -->
<div class="job_searcing_wrap overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-6">
                <div class="searching_text">
                    <h3>Looking for a Job?</h3>
                    <p>We provide online instant cash loans with quick approval </p>
                    <a href="#" class="boxed-btn3">Browse Job</a>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-6">
                <div class="searching_text">
                    <h3>Looking for a Expert?</h3>
                    <p>We provide online instant cash loans with quick approval </p>
                    <a href="#" class="boxed-btn3">Post a Job</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- job_searcing_wrap end  -->

<!-- testimonial_area  -->
<div class="testimonial_area  ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-40">
                    <h3>Testimonial</h3>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <div class="single_carousel">
                        <div class="row">
                            <?php foreach ($testimonials as $testimonial): ?>
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="<?= $testimonial['image'] ?>" alt="">
                                            <div class="quote_icon">
                                                <i class="Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p><?= $testimonial['description'] ?></p>
                                            <span>- <?= $testimonial['author'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="single_testmonial d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="img/testmonial/author.png" alt="">
                                        <div class="quote_icon">
                                            <i class=" Flaticon flaticon-quote"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported
                                            programmes to help alleviate human suffering through animal welfare when
                                            people might depend on livestock as their only source of income or food.</p>
                                        <span>- Micky Mouse</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="single_testmonial d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="img/testmonial/author.png" alt="">
                                        <div class="quote_icon">
                                            <i class="Flaticon flaticon-quote"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported
                                            programmes to help alleviate human suffering through animal welfare when
                                            people might depend on livestock as their only source of income or food.</p>
                                        <span>- Micky Mouse</span>
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
<!-- /testimonial_area  -->


<!-- footer start -->
<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                        <p>
                            finloan@support.com <br>
                            +10 873 672 6782 <br>
                            600/D, Green road, NewYork
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".4s">
                        <h3 class="footer_title">
                            Company
                        </h3>
                        <ul>
                            <li><a href="#">About </a></li>
                            <li><a href="#"> Pricing</a></li>
                            <li><a href="#">Carrier Tips</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".5s">
                        <h3 class="footer_title">
                            Category
                        </h3>
                        <ul>
                            <li><a href="#">Design & Art</a></li>
                            <li><a href="#">Engineering</a></li>
                            <li><a href="#">Sales & Marketing</a></li>
                            <li><a href="#">Finance</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
                        <h3 class="footer_title">
                            Subscribe
                        </h3>
                        <form action="#" class="newsletter_form">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit">Subscribe</button>
                        </form>
                        <p class="newsletter_text">Esteem spirit temper too say adieus who direct esteem esteems
                            luckily.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".3s">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i class="fa fa-heart-o"
                                                                            aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ footer end  -->

<!-- link that opens popup -->
<!-- JS here -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/ajax-form.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/scrollIt.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/nice-select.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/gijgo.min.js"></script>


<!--contact js-->
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>


<script src="js/main.js"></script>
</body>

</html>