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
                        <a href="index.php#home" class="nav__link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="index.php#about" class="nav__link  active">About</a>
                    </li>
                    <li class="nav__item">
                        <a href="index.php#highlights" class="nav__link">Highlights</a>
                    </li>
                    <li class="nav__item">
                        <a href="index.php#explore" class="nav__link">Explore</a>
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

    <main class="main" id="navbar-example">
        <section class="home section">
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
                            About
                        </p>
                        <!-- <div class="header__btn header__h1">
                            <button class="btn" id="scrollButton"><a href="#about"
                                    class="text-decoration-none text-dark">Get
                                    Started</a></button>
                        </div> -->
                    </div>
                </header>
            </div>
        </section>

        <!-- who we are? -->
        <section class="who" id="who">
            <div class="row">
                <div class="container col-12">


                    <div class="section__container who__container">
                        <div class="who__content">
                            <h2 class="who__header">Who We Are?</h2>
                            <p class="who__subheader">
                                The Junior Philippine Computer Society (JPCS) is a dynamic collegiate organization
                                dedicated to nurturing the next
                                generation of IT professionals and computer enthusiasts. We support students pursuing
                                degrees in Information Technology
                                and related fields by providing opportunities for academic growth, professional
                                development, and networking.
                            </p>
                            <div class="who__flex">
                                <div class=" who__card">
                                    <h4>200</h4>
                                    <p>Members</p>
                                </div>
                                <div class="who__card">
                                    <h4>6</h4>
                                    <p>Officers</p>
                                </div>
                                <div class="who__card">
                                    <h4>30</h4>
                                    <p>Committees</p>
                                </div>
                            </div>
                            <!-- <button class="btn">
                                Read More <i class="ri-arrow-right-line"></i>
                            </button> -->
                        </div>
                        <div class="who__image">
                            <img src="assets/img/join-island.png" alt="join image" class="who__img"></img>
                            <div class="who__shadow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- what do we do? -->
        <section class="discover" id="discover">
            <div class="row">
                <div class="container col-12">

                    <div class="section__container discover__container">
                        <h2 class="section__header dsicover__header">WHAT DO WE DO?</h2>
                        <p class="discover__subheader">
                            At JPCS, we offer a variety of activities and opportunities for
                            our members:
                        </p>
                        <div class="discover__grid">
                            <div class="discover__card">
                                <div class="discover__image">
                                    <img src="assets/img/about/hackathon.jpg" alt="discover" />
                                </div>
                                <div class="discover__card__content">
                                    <h4>Workshop and Seminars</h4>
                                    <p>
                                        Educational sessions with industry experts to keep members abreast of the latest
                                        trends and technologies.
                                    </p>
                                </div>
                            </div>
                            <div class="discover__card">
                                <div class="discover__image">
                                    <img src="assets/img/about/competition.jpg" alt="discover" />
                                </div>
                                <div class="discover__card__content">
                                    <h4>Competitions</h4>
                                    <p>
                                        Opportunities to participate in coding contests, hackathons, and other
                                        competitive
                                        events.
                                    </p>
                                </div>
                            </div>
                            <div class="discover__card">
                                <div class="discover__image">
                                    <img src="assets/img/about/GA.jpg" alt="discover" />
                                </div>
                                <div class="discover__card__content">
                                    <h4>Social Events</h4>
                                    <p>
                                        Events that strengthen the bonds among members through fun and interactive
                                        experiences.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="explore">
            <!-- join -->
            <div class="join__container container grid">
                <div class="join__data">
                    <h2 class="section__title">
                        Get <br>
                        Involved
                    </h2>

                    <p class="join__description">
                        Interested in joining JPCS or collaborating with us? Visit our Membership Page for more
                        information on how you can be part of our community.
                    </p>

                    <form action="membership.php#register" class="join__form">
                        <!-- <input type="email" placeholder="Enter your email" class="join__input"></input> -->
                        <button class="join__button button btn">
                            Register Now! <i class="bi bi-plus-circle"></i>
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
                            <form action="about.php#contact" method="POST">
                                <h2 class="lg-view section__title">Need more answers?</h2>
                                <p class="text-light">Contact us, we're happy to help! Please tell us a bit about
                                    yourself.</p>
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