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
    <!-- Remixcon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
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
                        <a href="index.php#home" class="nav__link active">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="index.php#about" class="nav__link">About</a>
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
                            Frequently Asked Questions (FAQs)
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

        <!-- ABOUT -->
        <section class="about section pt-5">
            <div class="about__container container grid">
                <div class="about__data">
                    <h2 class="section__title">
                        FAQs
                    </h2>

                    <p class="section__description">
                        Welcome to the Junior Philippine Computer Society (JPCS) Frequently Asked Questions (FAQs) page.
                        Here, you'll find
                        answers to common questions about our organization, membership, events, and more. If you have
                        any further questions,
                        feel free to contact us directly.
                    </p>
                </div>
                <div class="about__data">
                    <h2 class="section__title">
                        How to Use This Page
                    </h2>

                    <p class="section__description">
                        To make finding the information you need easier, we’ve categorized our FAQs into sections.
                        Simply click on a category to
                        view the relevant questions and answers.
                        </br>
                        Categories
                    <ul>
                        <li class="nav__item">
                            <a href="#general" class="faqs__link">1. General Questions</a>
                        </li>
                        <li class="nav__item">
                            <a href="#membership" class="faqs__link">2. Membership Questions</a>
                        </li>
                        <li class="nav__item">
                            <a href="#event" class="faqs__link">3. Event Questions</a>
                        </li>
                        <li class="nav__item">
                            <a href="#contact" class="faqs__link">4. Contact and Support Questions</a>
                        </li>
                        <li class="nav__item">
                            <a href="#p&p" class="faqs__link">5. Policies and Procedures Questions</a>
                        </li>
                    </ul>
                    </p>
                </div>
        </section>

        <section class="section__container question__container" id="general">
            <!-- <p class="section__subheader">Hhave Questions?</p> -->
            <h2 class="section__header">General Questions</h2>
            <div class="question__accordian">
                <div class="question__box">
                    <div class="title">
                        <span>What is JPCS?</span>
                        <span class="icon"><i class="ri-add-fill"></i></span>
                    </div>
                    <div class="content">
                        The Junior Philippine Computer Society (JPCS) is a collegiate organization dedicated to
                        supporting students in
                        Information Technology and related fields through various educational, professional, and social
                        activities.
                    </div>
                </div>
                <div class="question__box">
                    <div class="title">
                        <span>What is JPCSher?</span>
                        <span class="icon"><i class="ri-add-fill"></i></span>
                    </div>
                    <div class="content">
                        A JPCSher is what we proudly call our JPCS members. The term combines "JPCS" with "sheesh" and
                        the suffix "-er," forming
                        "JPCSher" (pronounced J-P-C-Sher).
                    </div>
                </div>
                <div class="question__box">
                    <div class="title">
                        <span>What are the main goals of JPCS?</span>
                        <span class="icon"><i class="ri-add-fill"></i></span>
                    </div>
                    <div class="content">
                        Our main goals are to foster academic growth, provide professional development opportunities,
                        facilitate networking,
                        and promote social responsibility among our members.
                    </div>
                </div>
                <div class="question__box">
                    <div class="title">
                        <span>Who can join JPCS?</span>
                        <span class="icon"><i class="ri-add-fill"></i></span>
                    </div>
                    <div class="content">
                        JPCS is available to students from all programs who are interested in information technology and
                        related industries.
                    </div>
                </div>
                <div class="question__box">
                    <div class="title">
                        <span>How can I join JPCS?</span>
                        <span class="icon"><i class="ri-add-fill"></i></span>
                    </div>
                    <div class="content">
                        You can join JPCS by completing the application form on our <a href="membership.html"
                            class="nav__link active">Membership Page</a> submitting the
                        required documents, and
                        paying the membership fees.
                    </div>
                </div>
                <div class="question__box">
                    <div class="title">
                        <span>How can I stay updated on JPCS events and news?</span>
                        <span class="icon"><i class="ri-add-fill"></i></span>
                    </div>
                    <div class="content">
                        You can stay updated by following us on our social media channels and regularly checking our
                        Events Page and Newsfeed Page.
                    </div>
                </div>
            </div>
        </section>

        <!-- membership -->
        <section class="section__container question__container" id="membership">
            <!-- <p class="section__subheader">Hhave Questions?</p> -->
            <h2 class="section__header">Membership Questions</h2>
            <div class="question__accordian">
                <div class="question__box">
                    <div class="title">
                        <span>What are the benefits of becoming a member (JPCSher)?</span>
                        <span class="icon"><i class="ri-add-fill"></i></span>
                    </div>
                    <div class="content">
                        Benefits include access to exclusive events, educational resources, networking opportunities,
                        competitions, and
                        community service projects. More details can be found on our <a href="membership.html"
                            class="nav__link active">Membership Page</a>.
                    </div>
                </div>
                <div class="question__box">
                    <div class="title">
                        <span>How much does Membership cost?</span>
                        <span class="icon"><i class="ri-add-fill"></i></span>
                    </div>
                    <div class="content">
                        The membership fee is ₱150.00 for all programs.
                    </div>
                </div>
                <div class="question__box">
                    <div class="title">
                        <span>Why is there a Membership Fee and other fees?</span>
                        <span class="icon"><i class="ri-add-fill"></i></span>
                    </div>
                    <div class="content">
                        The membership fee is crucial for sustaining and enhancing the quality of our programs and
                        activities. It helps cover
                        costs for: </br>

                        - Organizing workshops, seminars, and competitions </br>
                        - Providing educational resources and materials </br>
                        - Hosting social and networking events </br>
                        - Supporting community service projects </br>
                        By contributing to these initiatives, your membership fee ensures that we can continue offering
                        valuable experiences and
                        opportunities to all members.
                    </div>
                </div>
            </div>
        </section>

        <!-- events -->
        <section class="section__container question__container" id="event">
            <!-- <p class="section__subheader">Hhave Questions?</p> -->
            <h2 class="section__header">Event Questions</h2>
            <div class="question__accordian">
                <div class="question__box">
                    <div class="title">
                        <span>How can I find out about upcoming events?</span>
                        <span class="icon"><i class="ri-add-fill"></i></span>
                    </div>
                    <div class="content">
                        Upcoming events are listed on our JPCShares and are regularly updated. You can also follow us
                        on our social media
                        channels for the latest updates.
                    </div>
                </div>
                <div class="question__box">
                    <div class="title">
                        <span>Can non-members attend JPCS events?</span>
                        <span class="icon"><i class="ri-add-fill"></i></span>
                    </div>
                    <div class="content">
                        Some events are exclusive to members, while others are open to non-members. Event details and
                        eligibility are specified
                        on the posters.
                    </div>
                </div>
            </div>
        </section>

        <!-- contact -->
        <section class="section__container question__container" id="contact">
            <!-- <p class="section__subheader">Hhave Questions?</p> -->
            <h2 class="section__header">Contact Questions</h2>
            <div class="question__accordian">
                <div class="question__box">
                    <div class="title">
                        <span>How can I contact JPCS?</span>
                        <span class="icon"><i class="ri-add-fill"></i></span>
                    </div>
                    <div class="content">
                        You can contact us via email at jpcs_mls@mls.ceu.edu.ph, phone at [Phone Number], or visit our
                        office at
                        [Office Location].
                        Detailed contact information is available on our Contact Page.
                    </div>
                </div>
            </div>
        </section>

        <!-- policies -->
        <section class="section__container question__container" id="p&p">
            <!-- <p class="section__subheader">Hhave Questions?</p> -->
            <h2 class="section__header">Policies and Procedures Questions</h2>
            <div class="question__accordian">
                <div class="question__box">
                    <div class="title">
                        <span>
                            Where can I find JPCS's privacy policy?
                        </span>
                        <span class="icon"><i class="ri-add-fill"></i></span>
                    </div>
                    <div class="content">
                        Our privacy policy can be found on the Privacy Policy Page.
                    </div>
                </div>
                <div class="question__box">
                    <div class="title">
                        <span>
                            What are the terms of service for using the JPCS website and services?
                        </span>
                        <span class="icon"><i class="ri-add-fill"></i></span>
                    </div>
                    <div class="content">
                        Our terms of service are detailed on the Terms of Service Page.
                    </div>
                </div>
            </div>
        </section>

        <!-- ccontact us -->
        <section class="contact section col-12" id="contact">
            <div class="contact__deets row align-items-stretch">
                <div class="contact__form-container p-5 col-12 col-md-6 col-lg-6">

                    <div class="contact__right-container container1">
                        <div class="contact__right-inner-container">
                            <form action="faqs.php#contact" method="POST">
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

        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer" id="footer"></footer>

    <!-- Scroll Up -->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="bi bi-arrow-up-short"></i>
    </a>


    <!--========================= SCRIPTS ===========================-->
    <!-- Scroll Reveal -->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!-- FAQs -->
    <script>
        const questionBox = document.getElementsByClassName("question__box");

        for (let i = 0; i < questionBox.length; i++) {
            questionBox[i].addEventListener("click", function () {
                this.classList.toggle("active");
            });
        }

    </script>

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