<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid ">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="/">
                                    <img src="/img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="/">home</a></li>
                                        <li><a href="/jobs.php">Browse Job</a></li>
                                        <li><a href="/candidate.php">Candidates</a></li>
                                        <li><a href="/blog.php">blog</a></li>
                                        <li><a href="/contact.php">Contact</a></li>
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
                                <?php if (isset($_SESSION['company_id'])): ?>
                                    <div class="d-none d-lg-block">
                                        <a class="boxed-btn3" href="/companies/jobs/">Post a Job</a>
                                    </div>
                                <?php endif; ?>
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