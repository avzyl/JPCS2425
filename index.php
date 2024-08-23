<?php
require_once 'assets/php/init.php';
include 'assets/php/connect.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $dept = !empty($_POST['dept']) ? $_POST['dept'] : null;
    $message = $_POST['message'];

    if (!empty($name) && !empty($email) && !empty($message)) {
        try {
            $add_inquiry = $conn->prepare("INSERT INTO inquiries (name, email, dept, message) VALUES (:name, :email, :dept, :message)");
            $add_inquiry->bindParam(':name', $name);
            $add_inquiry->bindParam(':email', $email);
            $add_inquiry->bindParam(':dept', $dept);
            $add_inquiry->bindParam(':message', $message);
            
            if ($add_inquiry->execute()) {
                $success_msg[] = 'Inquiry Successfully Entered!';
            } else {
                $warning_msg[] = 'Failed to send inquiry';
            }
        } catch (PDOException $e) {
            $error_msg[] = 'Error: ' . $e->getMessage();
        }
    } else {
        $warning_msg[] = 'All fields are required, except Department.';
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JPCS</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Fontawesome -->
    <script src="https://use.fontawesome.com/e5218896e0.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example">
    <!-- NAVIGATION -->
    <header class="header" id="header">
        <nav class="nav container" id="navbar-example">
            <a href="https://www.facebook.com/JPCSCEUMLLS" class="nav__logo text-decoration-none"
                target="_blank">JPCS</a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">About</a>
                    </li>
                    <li class="nav__item">
                        <a href="#highlights" class="nav__link">Highlights</a>
                    </li>
                    <li class="nav__item">
                        <a href="#explore" class="nav__link">Explore</a>
                    </li>
                    <li class="nav__item">
                        <a href="jpcshers.html" class="nav__link"><i class="bi bi-person-fill"></i></a>
                    </li>
                </ul>
                <div class="nav__close" id="nav-close">
                    <i class="bi bi-x"></i>
                </div>
            </div>
            <div class="nav__toggle" id="nav-toggle">
                <i class="bi bi-list"></i>
            </div>
        </nav>
    </header>


    <!-- MAIN -->
    <main class="main" id="navbar-example">
        <section class="home section" id="home">
            <!-- background image -->
            <img src="assets/img/bg1.png" alt="home image" class="home__bg">

            <!-- home -->
            <div class="home__shadow"></div>
            <div class="home__container container grid">
                <!-- logo animation -->
                <header class="section__container header__container">
                    <div class="header__image">
                        <div class="image-stack">
                            <img src="assets/img/logo-animation/1.png" alt="Image 1" class="image">
                            <img src="assets/img/logo-animation/2.png" alt="Image 2" class="image">
                            <img src="assets/img/logo-animation/13.png" alt="Image 3" class="image">
                            <img src="assets/img/logo-animation/12.png" alt="Image 4" class="image">
                            <img src="assets/img/logo-animation/11.png" alt="Image 5" class="image">
                            <img src="assets/img/logo-animation/10.png" alt="Image 6" class="image">
                            <img src="assets/img/logo-animation/9.png" alt="Image 7" class="image">
                            <img src="assets/img/logo-animation/8.png" alt="Image 8" class="image">
                            <img src="assets/img/logo-animation/7.png" alt="Image 9" class="image">
                            <img src="assets/img/logo-animation/6.png" alt="Image 10" class="image">
                            <img src="assets/img/logo-animation/5.png" alt="Image 11" class="image">
                            <img src="assets/img/logo-animation/4.png" alt="Image 12" class="image">
                            <img src="assets/img/logo-animation/111.png" alt="Image 13" class="image">
                            <img src="assets/img/logo-animation/1111.png" alt="Image 14" class="image">
                            <img src="assets/img/logo-animation/16.png" alt="Image 15"
                                class="image image__no-transition">
                        </div>
                    </div>

                    <!-- home text -->
                    <div class="header__content">
                        <h1 class="header__h1"><span>Junior Philippine Computer Society</span></h1>
                        <p class="section__description header__h1" style="color: white;">
                            Centro Escolar University - Malolos
                        </p>
                        <div class="header__btn header__h1">
                            <button class="btn" id="scrollButton"><a href="#about"
                                    class="text-decoration-none text-dark">Get
                                    Started</a></button>
                        </div>
                    </div>
                </header>
            </div>
        </section>

        <!-- ABOUT -->
        <section class="about section pt-5" id="about">
            <div class="about__container container grid">
                <div class="about__data">
                    <h2 class="section__title">
                        About Us
                    </h2>

                    <p class="section__description">
                        JPCS is a non-profit organization established in 2020. It is a student-run group
                        providing a
                        platform for Bachelor of
                        Science in Information Technology students at Centro Escolar University (CEU) Malolos.
                    </p>

                    <div class="a-btn">
                        <button class="btn" id="scrollButton"><a href="about.html" target="_blank"
                                class="text-decoration-none text-dark">Know More</a></button>
                    </div>
                </div>
                <div class="about__data">
                    <h2 class="section__title">
                        Vision and Mission
                    </h2>

                    <p class="section__description">
                        To unite and commit the youth to technical and leadership excellence; fostering lasting
                        friendship and constructive cooperation, in genuine love of God and country.
                    </p>
                </div>
        </section>


        <!-- Organizational Chart -->
        <section class="organization" id="about">
            <h2 class="section__title">
                Organizational Chart
            </h2>

            <div class="popular__container1 container grid">
                <article class="popular__card">
                    <div class="card cardcon center">
                        <img class="card-img-top" src="assets/img/JPCS/11.png" alt="Dr. Josan Tamayo's Photo">
                        <div class="card-body">
                            <h5 class="card-title text-light">Dr. Josan Tamayo</h5>
                            <p class="card-text text-light">JPCS Adviser</p>
                        </div>
                    </div>
                </article>
            </div>

            <div class="popular__container container grid">
                <article class="popular__card">
                    <div class="card cardcon">
                        <img class="card-img-top" src="assets/img/JPCS/12.png" alt="Lyzza Abig's Photo">
                        <div class="card-body">
                            <h5 class="card-title text-light">Lyzza Rose Abig</h5>
                            <p class="card-text text-light">President</p>
                        </div>
                    </div>
                </article>

                <article class="popular__card">
                    <div class="card cardcon">
                        <img class="card-img-top" src="assets/img/JPCS/13.png" alt="Marc Zapata's Photo">
                        <div class="card-body">
                            <h5 class="card-title text-light">Marc Anthony Zapata</h5>
                            <p class="card-text text-light">Vice President</p>
                        </div>
                    </div>
                </article>

                <article class="popular__card">
                    <div class="card cardcon">
                        <img class="card-img-top" src="assets/img/JPCS/14.png" alt="Asha Maniacop's Photo">
                        <div class="card-body">
                            <h5 class="card-title text-light">Asha Mikaila Maniacop</h5>
                            <p class="card-text text-light">Secretary</p>
                        </div>
                    </div>
                </article>

                <article class="popular__card">
                    <div class="card cardcon">
                        <img class="card-img-top" src="assets/img/JPCS/15.png" alt="Sean Diaz's Photo">
                        <div class="card-body">
                            <h5 class="card-title text-light">Sean Carlo Diaz</h5>
                            <p class="card-text text-light">Treasurer</p>
                        </div>
                    </div>
                </article>

                <article class="popular__card">
                    <div class="card cardcon">
                        <img class="card-img-top" src="assets/img/JPCS/16.png" alt="Russel Saballero's Photo">
                        <div class="card-body">
                            <h5 class="card-title text-light">Russell Daniel Saballero</h5>
                            <p class="card-text text-light">Auditor</p>
                        </div>
                    </div>
                </article>

                <article class="popular__card">
                    <div class="card cardcon">
                        <img class="card-img-top" src="assets/img/JPCS/17.png" alt="Lan Cruz's Photo">
                        <div class="card-body">
                            <h5 class="card-title text-light">Lan Ysraelle Cruz</h5>
                            <p class="card-text text-light">Public Relations Officer</p>
                        </div>
                    </div>
                </article>


            </div>
        </section>


        <!-- Baka JPCShers Yarn?!? -->
        <section class="highlight section" id="highlights">
            <h2 class="section__title">
                JPCShers Yarn!
            </h2>

            <div class="highlight__container">
                <!-- Slide Items -->
                <div class="mySlides">
                    <div class="numbertext">1 / 30</div>
                    <img src="assets/img/highlights/1.png" alt="Image 1" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">2 / 30</div>
                    <img src="assets/img/highlights/2.png" alt="Image 2" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">3 / 30</div>
                    <img src="assets/img/highlights/3.png" alt="Image 3" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">4 / 30</div>
                    <img src="assets/img/highlights/4.png" alt="Image 4" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">5 / 30</div>
                    <img src="assets/img/highlights/5.png" alt="Image 5" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">6 / 30</div>
                    <img src="assets/img/highlights/6.png" alt="Image 6" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">7 / 30</div>
                    <img src="assets/img/highlights/7.png" alt="Image 7" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">8 / 30</div>
                    <img src="assets/img/highlights/8.png" alt="Image 8" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">9 / 30</div>
                    <img src="assets/img/highlights/9.png" alt="Image 9" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">10 / 30</div>
                    <img src="assets/img/highlights/10.png" alt="Image 10" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">11 / 30</div>
                    <img src="assets/img/highlights/11.png" alt="Image 11" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">12 / 30</div>
                    <img src="assets/img/highlights/12.png" alt="Image 12" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">13 / 30</div>
                    <img src="assets/img/highlights/13.png" alt="Image 13" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">14 / 30</div>
                    <img src="assets/img/highlights/14.png" alt="Image 14" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">15 / 30</div>
                    <img src="assets/img/highlights/15.png" alt="Image 15" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">16 / 30</div>
                    <img src="assets/img/highlights/16.png" alt="Image 16" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">17 / 30</div>
                    <img src="assets/img/highlights/17.png" alt="Image 17" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">18 / 30</div>
                    <img src="assets/img/highlights/18.png" alt="Image 18" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">19 / 30</div>
                    <img src="assets/img/highlights/19.png" alt="Image 19" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">20 / 30</div>
                    <img src="assets/img/highlights/20.png" alt="Image 20" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">21 / 30</div>
                    <img src="assets/img/highlights/21.png" alt="Image 21" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">22 / 30</div>
                    <img src="assets/img/highlights/22.png" alt="Image 22" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">23 / 30</div>
                    <img src="assets/img/highlights/23.png" alt="Image 23" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">24 / 30</div>
                    <img src="assets/img/highlights/24.png" alt="Image 24" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">25 / 30</div>
                    <img src="assets/img/highlights/25.png" alt="Image 25" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">26 / 30</div>
                    <img src="assets/img/highlights/26.png" alt="Image 26" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">27 / 30</div>
                    <img src="assets/img/highlights/27.png" alt="Image 27" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">28 / 30</div>
                    <img src="assets/img/highlights/28.png" alt="Image 28" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">29 / 30</div>
                    <img src="assets/img/highlights/29.png" alt="Image 29" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides">
                    <div class="numbertext">30 / 30</div>
                    <img src="assets/img/highlights/30.png" alt="Image 30" class="highlight__img">
                    <div class="text">Caption Text</div>
                </div>
                <!-- End Slide Items -->

                <!-- Navigation Arrows -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
            <!-- Dots/Circles -->
            <div style="text-align: center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
                <span class="dot" onclick="currentSlide(5)"></span>
                <span class="dot" onclick="currentSlide(6)"></span>
                <span class="dot" onclick="currentSlide(7)"></span>
                <span class="dot" onclick="currentSlide(8)"></span>
                <span class="dot" onclick="currentSlide(9)"></span>
                <span class="dot" onclick="currentSlide(10)"></span>
                <span class="dot" onclick="currentSlide(11)"></span>
                <span class="dot" onclick="currentSlide(12)"></span>
                <span class="dot" onclick="currentSlide(13)"></span>
                <span class="dot" onclick="currentSlide(14)"></span>
                <span class="dot" onclick="currentSlide(15)"></span>
                <span class="dot" onclick="currentSlide(16)"></span>
                <span class="dot" onclick="currentSlide(17)"></span>
                <span class="dot" onclick="currentSlide(18)"></span>
                <span class="dot" onclick="currentSlide(19)"></span>
                <span class="dot" onclick="currentSlide(20)"></span>
                <span class="dot" onclick="currentSlide(21)"></span>
                <span class="dot" onclick="currentSlide(22)"></span>
                <span class="dot" onclick="currentSlide(23)"></span>
                <span class="dot" onclick="currentSlide(24)"></span>
                <span class="dot" onclick="currentSlide(25)"></span>
                <span class="dot" onclick="currentSlide(26)"></span>
                <span class="dot" onclick="currentSlide(27)"></span>
                <span class="dot" onclick="currentSlide(28)"></span>
                <span class="dot" onclick="currentSlide(29)"></span>
                <span class="dot" onclick="currentSlide(30)"></span>
            </div>


            <!-- BSIT Ports -->
            <div class="section">

                <h2 class="section__title">
                    BSIT Ports
                </h2>

                <div class="popular__container container grid">
                    <article class="popular__card">
                        <div class="popular__image">
                            <img src="assets/img/port-17.png" alt="port seventeen image" class="popular__img">
                            <div class="popular__shadow"></div>
                        </div>

                        <h2 class="port__title">
                            <a href="https://port-seventeen.com/" class="text-decoration-none" target="_blank">Port
                                Seventeen</a>
                        </h2>

                    </article>

                    <article class="popular__card">
                        <div class="popular__image">
                            <img src="assets/img/port-24.png" alt="port twenty-four image" class="popular__img">

                            <div class="popular__shadow"></div>
                        </div>

                        <h2 class="port__title">
                            <a href="https://www.port-twentyfour.info/" class="text-decoration-none"
                                target="_blank">Port-TwentyFour</a>
                        </h2>

                    </article>

                    <article class="popular__card">
                        <div class="popular__image">
                            <img src="assets/img/port-26.png" alt="port twenty-six image" class="popular__img">
                            <div class="popular__shadow"></div>
                        </div>

                        <h2 class="port__title">
                            <a href="https://bsitport2026.com/" class="text-decoration-none" target="_blank">Port
                                Twenty-Six</a>
                        </h2>

                    </article>
                </div>


                <!-- events -->
                <div class="container section col-12">

                    <div class="gallery__container">
                        <h2 class="gallery__header">Past Events</h2>
                        <p class="discover__subheader">
                            School Year 2023 - 2024
                        </p>
                        <div class="gallery__grid">
                            <div class="gallery__card">
                                <img src="assets/img/about/membership_campaign.jpg" alt="gallery" />
                                <div class="gallery__content">
                                    <h4>Memership Campaign</h4>
                                    <p>August 31, 2023</p>
                                </div>
                            </div>
                            <div class="gallery__card">
                                <img src="assets/img/about/bighero6.png" alt="gallery" />
                                <div class="gallery__content">
                                    <h4>General Assembly</h4>
                                    <p>October 06, 2023</p>
                                </div>
                            </div>
                            <div class="gallery__card">
                                <img src="assets/img/about/icp_build_camp.jpg" alt="gallery" />
                                <div class="gallery__content">
                                    <h4>Hackathon</h4>
                                    <p>December 06, 2023</p>
                                </div>
                            </div>
                            <div class="gallery__card">
                                <img src="assets/img/about/tech_colosseum.png" alt="gallery" />
                                <div class="gallery__content">
                                    <h4>Game Fest</h4>
                                    <p>January 31, 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>

        <!-- EXPLORE -->
        <section class="explore" id="explore">
            <div class="explore__container">
                <div class="explore__image">
                    <img src="assets/img/explore-jpcs.jpg" alt="explore image" class="explore__img"></img>
                    <div class="explore__shadow"></div>
                </div>

                <div class="explore__content container grid">
                    <div class="explore__data">
                        <h2 class="section__title1">
                            Be a <br>
                            <span>JPCS</span>her!
                        </h2>

                        <p class="explore__description">
                            Why be a JPCSher? Well, aside from leveling up your tech skills faster than a download bar,
                            you'll also gain access to a
                            squad that's as cool as a well-commented code! From hackathons to geeky meetups, JPCS is
                            where nerdy meets awesome.
                        </p>
                    </div>

                    <div class="explore__user">
                        <img src="assets/img/logo.png" alt="explore image" class="explore__perfil"></img>
                        <span class="explore__name">JPCS 2023 - 2024</span>
                    </div>
                </div>
            </div>

            <div class="section">

                <!-- join -->
                <div class="join__container container grid">
                    <div class="join__data">
                        <h2 class="section__title">
                            Join Our <br>
                            Community
                        </h2>

                        <p class="join__description">
                            Ready to level up your tech game and join the coolest squad in town? Become a JPCSher and
                            dive
                            into a world of coding,
                            camaraderie, and countless coffee-fueled adventures! Unleash your inner tech ninja, make
                            lifelong geeky friends, and
                            let's turn those 'bugs' into features. Join us at JPCS, where bytes turn into bytes of fun!
                        </p>

                        <form action="membership.php#register" class="join__form">
                            <!-- <input type="email" placeholder="Enter your email" class="join__input"></input> -->
                            <button class="join__button button btn">
                                Join Now <i class="bi bi-plus-circle"></i>
                            </button>
                        </form>
                    </div>

                    <div class="join__image">
                        <img src="assets/img/join-island.png" alt="join image" class="join__img"></img>
                        <div class="join__shadow"></div>
                    </div>
                </div>
        </section>


        <!-- ccontact us -->
        <section class="contact section col-12" id="contact">
            <div class="contact__deets row align-items-stretch">
                <div class="contact__form-container p-5 col-12 col-md-6 col-lg-6">

                    <div class="contact__right-container container1">
                        <div class="contact__right-inner-container">
                            <form action="index.php#contact" method="POST">
                                <h2 class="lg-view section__title">Work with Us!</h2>
                                <p class="text-light">Tell us a bit about yourself, and let's kickstart some epic
                                    collaborations.</p>
                                <p class="text-light">* Required</p>
                                <input type="text" name="name" placeholder="Name *" class="contact__deets" />
                                <input type="email" name="email" placeholder="Email *" class="contact__deets" />
                                <input type="text" name="dept" placeholder="Department/Organization" class="contact__deets" />
                                <textarea rows="5" name="message" placeholder="Message"></textarea>
                                <button class="btn" type="submit" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="contact__form-container col-12 col-md-6 col-lg-6">
                    <div class="contact__left-container">
                        <div class="contact__left-inner-container">
                            <div class="contact__image">
                                <img src="assets/img/SHINE (9).png" alt="explore image" class="contact__img"></img>
                                <div class="contact__shadow"></div>
                                <p></p>
                            </div>
                        </div>
                        <p>JPCS 2024 - 2025</p>
                    </div>
                </div>

            </div>

        </section>
    </main>

    <!-- FOOTER -->
    <footer class="footer" id="footer"></footer>

    <!-- Scroll Up -->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Scroll Reveal -->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Footer -->
    <script src="assets/js/footer.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include 'assets/php/alert.php'; ?>
</body>

</html>