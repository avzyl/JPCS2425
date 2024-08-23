<?php
require_once 'assets/php/init.php';
include 'assets/php/connect.php';
// Assuming your database connection is already established using $conn

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $student_number = $_POST['student_number'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];
    $program = $_POST['program'];
    $join_date = date('Y-m-d'); // Assuming join_date is the current date
    $status = 'pending'; // Assuming default status is 'pending'

    $payment_mode = $_POST['payment_mode'];
    $receipt_image = null;

    // Check if all required fields are filled
    if (!empty($name) && !empty($email) && !empty($student_number) && !empty($dept) && !empty($program)) {
        // Handle the receipt upload if the payment mode is e-payment
        if ($payment_mode === 'e-payment' && isset($_FILES['receipt_image']) && $_FILES['receipt_image']['error'] === UPLOAD_ERR_OK) {
            $target_dir = __DIR__ . "/JPCS2425-Admin/assets/receipt/";

            // Create the "receipt" directory if it doesn't exist
            if (!is_dir($target_dir)) {
                if (!mkdir($target_dir, 0777, true)) {
                    $warning_msg[] = 'Failed to create directory: ' . $target_dir . '. Error: ' . error_get_last()['message'];
                }
            }

            $target_file = $target_dir . basename($_FILES["receipt_image"]["name"]);

            // Attempt to move the uploaded file
            if (move_uploaded_file($_FILES["receipt_image"]["tmp_name"], $target_file)) {
                $receipt_image = $target_file;
            } else {
                $warning_msg[] = 'Failed to move uploaded file.';
            }
        }

        try {
            // Insert the member and payment data into the database
            $add_member = $conn->prepare("INSERT INTO members (name, student_no, email, dept, program, join_date, status, payment_mode, receipt_image) VALUES (:name, :student_no, :email, :dept, :program, :join_date, :status, :payment_mode, :receipt_image)");
            $add_member->bindParam(':name', $name);
            $add_member->bindParam(':student_no', $student_number);
            $add_member->bindParam(':email', $email);
            $add_member->bindParam(':dept', $dept);
            $add_member->bindParam(':program', $program);
            $add_member->bindParam(':join_date', $join_date);
            $add_member->bindParam(':status', $status);
            $add_member->bindParam(':payment_mode', $payment_mode);
            $add_member->bindParam(':receipt_image', $receipt_image);

            if ($add_member->execute()) {
                $success_msg[] = 'Member Successfully Entered! Please wait for your verification in your email.';
            } else {
                $warning_msg[] = 'Failed to register Member';
            }
        } catch (PDOException $e) {
            $error_msg[] = 'Error: ' . $e->getMessage();
        }
    } else {
        $warning_msg[] = 'All fields are required.';
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['no'])) {
            $warning_msg[] = 'Form is not accepting registration as of now';
        }
    }
}
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JPCS</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
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
                        <a href="https://bsitport2026.com/JPCSCEUMLS/JPCS2425-Admin/login.php" class="nav__link"><i class="bi bi-person-fill"></i></a>
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
        <section class="home section" id="home">
            <!-- background image -->
            <picture>
                <source srcset="assets/img/bg1.webp" type="image/webp">
                <img src="assets/img/bg1.png" alt="home image" class="home__bg"></img>
            </picture>

            <!-- home -->
            <div class="home__shadow"></div>
            <div class="home__container container grid">
                <!-- logo animation -->
                <header class="section__container header__container">
                    <div class="header__image">
                        <div class="image-stack">
                            <picture>
                                <source srcset="assets/img/logo-animation/1.webp" type="image/webp">
                                <img src="assets/img/logo-animation/1.png" alt="Image 1" class="image">
                            </picture>
                            <picture>
                                <source srcset="assets/img/logo-animation/2.webp" type="image/webp">
                                <img src="assets/img/logo-animation/2.png" alt="Image 2" class="image">
                            </picture>
                            <picture>
                                <source srcset="assets/img/logo-animation/13.webp" type="image/webp">
                                <img src="assets/img/logo-animation/13.png" alt="Image 3" class="image">
                            </picture>
                            <picture>
                                <source srcset="assets/img/logo-animation/12.webp" type="image/webp">
                                <img src="assets/img/logo-animation/12.png" alt="Image 4" class="image">
                            </picture>
                            <picture>
                                <source srcset="assets/img/logo-animation/11.webp" type="image/webp">
                                <img src="assets/img/logo-animation/11.png" alt="Image 5" class="image">
                            </picture>
                            <picture>
                                <source srcset="assets/img/logo-animation/10.webp" type="image/webp">
                                <img src="assets/img/logo-animation/10.png" alt="Image 6" class="image">
                            </picture>
                            <picture>
                                <source srcset="assets/img/logo-animation/9.webp" type="image/webp">
                                <img src="assets/img/logo-animation/9.png" alt="Image 7" class="image">
                            </picture>
                            <picture>
                                <source srcset="assets/img/logo-animation/8.webp" type="image/webp">
                                <img src="assets/img/logo-animation/8.png" alt="Image 8" class="image">
                            </picture>
                            <picture>
                                <source srcset="assets/img/logo-animation/7.webp" type="image/webp">
                                <img src="assets/img/logo-animation/7.png" alt="Image 9" class="image">
                            </picture>
                            <picture>
                                <source srcset="assets/img/logo-animation/6.webp" type="image/webp">
                                <img src="assets/img/logo-animation/6.png" alt="Image 10" class="image">
                            </picture>
                            <picture>
                                <source srcset="assets/img/logo-animation/5.webp" type="image/webp">
                                <img src="assets/img/logo-animation/5.png" alt="Image 11" class="image">
                            </picture>
                            <picture>
                                <source srcset="assets/img/logo-animation/4.webp" type="image/webp">
                                <img src="assets/img/logo-animation/4.png" alt="Image 12" class="image">
                            </picture>
                            <picture>
                                <source srcset="assets/img/logo-animation/111.webp" type="image/webp">
                                <img src="assets/img/logo-animation/111.png" alt="Image 13" class="image">
                            </picture>
                            <picture>
                                <source srcset="assets/img/logo-animation/1111.webp" type="image/webp">
                                <img src="assets/img/logo-animation/1111.png" alt="Image 14" class="image">
                            </picture>
                            <picture>
                                <source srcset="assets/img/logo-animation/16.webp" type="image/webp">
                                <img src="assets/img/logo-animation/16.png" alt="Image 15" class="image image__no-transition">
                            </picture>
                        </div>

                    </div>

                    <!-- home text -->
                    <div class="header__content">
                        <h1 class="header__h1"><span>Junior Philippine Computer Society</span></h1>
                        <p class="section__description header__h1" style="color: white;">
                            Membership
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

        <!-- why? -->
        <section class="section__container about__container">
            <div class="row">
                <div class="container col-12">

                    <p class="why__subheader">- Join Now!</p>
                    <h2 class="why__header">WHY BE A JPCSHER?</h2>
                    <div class="why__grid">
                        <div class="about__image">
                            <img src="assets/img/join-island.png" alt="about" />
                        </div>
                        <div class="why__content">
                            <p>
                                Joining JPCS offers numerous benefits, including access to exclusive events, networking
                                opportunities with industry
                                professionals, and educational resources. Members can participate in competitions like
                                coding contests, online-game tournaments, and hackathons,
                                engage in community service projects, and benefit from mentorship and career development
                                opportunities. Additionally,
                                JPCS provides a supportive community where you can develop leadership and teamwork
                                skills, making it an invaluable
                                experience for anyone pursuing a career in Information Technology and other fields.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- how to join -->
        <section class="section__container section" id="about">
            <div class="row">
                <div class="container col-12 about__container">

                    <div class="about__header">
                        <h2 class="section__header">HOW TO JOIN?</h2>
                        <p class="section__description">
                            Joining the Junior Philippine Computer Society (JPCS) is a simple and straightforward
                            process. Follow these three easy
                            steps to become a member and start enjoying all the benefits JPCS has to offer.
                        </p>
                    </div>
                    <div class="col-12">

                        <div class="about__grid">
                            <div class="about__card">
                                <h4 class="text-warning">Register</h4>
                                <p>
                                    Fill out the online registration form below with your personal and academic
                                    details.
                                    Ensure all information is accurate to
                                    avoid any delays in processing your membership.
                                    </br>
                                    </br>
                                    <a href="membership.php#register" class="nav__link active">Registration Form</a>
                                </p>
                            </div>
                            <div class="about__card">
                                <h4 class="text-warning">Pay</h4>
                                <p>
                                    After registering, proceed to pay the membership fee. You have two convenient
                                    options:
                                    </br>
                                    GCash: Transfer the fee to our official JPCS GCash account. (Account details
                                    will be
                                    provided upon registration.)
                                    </br>
                                    Onsite Payment: Visit our office or booth to pay in person. Our office location
                                    and
                                    hours of
                                    operation will be shared upon registration.
                                </p>
                            </div>
                            <div class="about__card">
                                <h4 class="text-warning">Enjoy!</h4>
                                <p>
                                    Once your payment is confirmed, you'll receive a digital loot bag containing
                                    exclusive JPCS merchandise, resources, and
                                    access to upcoming events. Welcome to the JPCS community!
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <!-- benefits -->
        <section class="section__container service__container">
            <div class="row">
                <div class="container col-12">


                    <!-- <p class="section__subheader">Our Services</p> -->
                    <h2 class="section__header">BENEFITS</h2>
                    <div class="service__grid">
                        <div class="service__card">
                            <h4 class="fw-bold text-warning">Exclusive Events</h4>
                            <p>
                                As a JPCSher, you will have access to member-only workshops, seminars, and social
                                events. These events are designed to
                                keep you updated with the latest trends and technologies in the IT field, providing you
                                with a competitive edge in your
                                studies and future career.
                            </p>
                        </div>
                        <div class="service__card">
                            <h4 class="fw-bold text-warning">Educational Resources</h4>
                            <p>
                                Gain access to a wealth of educational resources, including exclusive study
                                materials, tutorials, and industry insights.
                                These resources are curated to help you excel in your coursework and develop a
                                deeper understanding of complex IT
                                concepts.
                            </p>

                        </div>
                        <div class="service__card">
                            <h4 class="fw-bold text-warning">Competitions</h4>
                            <p>
                                Participate in coding contests, hackathons, and other competitive events that challenge
                                your skills and creativity.
                                These competitions not only enhance your problem-solving abilities but also add
                                impressive achievements to your resume. </p>

                        </div>
                        <div class="service__card">
                            <h4 class="fw-bold text-warning">Personal and Professional Growth:</h4>
                            <p>
                                Being an active member of JPCS helps you develop essential soft skills such as
                                leadership, teamwork, communication, and
                                time management. These skills are highly valued by employers and can significantly boost
                                your employability.
                            </p>

                        </div>
                        <div class="service__card">
                            <h4 class="fw-bold text-warning">Mentorship and Guidance</h4>
                            <p>
                                Benefit from mentorship programs where experienced members and alumni offer guidance and
                                support. Having a mentor can
                                help you navigate academic challenges, career choices, and personal development.
                            </p>

                        </div>
                        <div class="service__card">
                            <h4 class="fw-bold text-warning">Camaraderie and Support</h4>
                            <p>
                                Joining JPCS means becoming part of a supportive community of like-minded individuals.
                                You will form lasting
                                friendships, find study partners, and collaborate with peers who share your passion for
                                technology.
                            </p>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ccontact us -->
        <section class="contact col-12" id="register">
            <div class="contact__deets row align-items-stretch">
                <div class="contact__form-container p-5 col-12 col-md-6 col-lg-6">

                    <div class="contact__right-container container1">
                        <div class="contact__right-inner-container">
                        <form action="membership.php#register" method="POST" enctype="multipart/form-data">
                            <h2 class="lg-view section__title">Be a Member!</h2>
                            <p class="text-light">Tell us a bit about yourself and start the JPCSher journey!</p>
                            <p class="text-light">* Required</p>
                            <input type="text" name="name" placeholder="Name *" class="contact__deets" required />
                            <input type="text" name="student_number" placeholder="Student Number (ex. 202412345) *" class="contact__deets" required />
                            <input type="email" name="email" placeholder="Email *" class="contact__deets" required />
                            <input type="text" name="dept" placeholder="Department/Organization *" class="contact__deets" required />
                            <input type="text" name="program" placeholder="Year and Section *" class="contact__deets" required />
                            
                            <!-- Mode of Payment Dropdown -->
                            <select name="payment_mode" id="mode_of_payment"
                                style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc; border-radius: 4px; padding: 5px 10px; font-size: 14px; width: 100%; height: 35px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 1rem;" 
                                required>
                                <option value="">Select Mode of Payment *</option>
                                <option value="cash">Cash</option>
                                <option value="e-payment">E-Payment</option>
                            </select>
                            
                            <!-- Image Upload Input (Initially Hidden) -->
                            <div id="e_payment_upload" style="display: none;">
                                <label for="receipt_image" class="text-light">Upload Payment Proof *</label>
                                <input type="file" name="receipt_image" id="receipt_image" class="contact__deets" accept="image/*" />
                            </div>

                            <button class="btn" type="submit" name="submit">Submit</button>
                        </form>

                        </div>
                    </div>
                </div>

                <div class="contact__form-container col-12 col-md-6 col-lg-6">
                    <div class="contact__left-container">
                        <div class="contact__left-inner-container">
                            <div class="contact__image">
                                <picture>
                                    <source srcset="assets/img/SHINE (9).webp" type="image/webp">
                                    <img src="assets/img/SHINE (9).png" alt="explore image" class="contact__img"></img>
                                </picture>
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


    <!--========================= SCRIPTS ===========================-->

    <!-- Scroll Reveal -->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
        
    <script>
    document.getElementById('mode_of_payment').addEventListener('change', function () {
        var paymentOption = this.value;
        var uploadDiv = document.getElementById('e_payment_upload');
        
        if (paymentOption === 'e-payment') {
            uploadDiv.style.display = 'block';
        } else {
            uploadDiv.style.display = 'none';
        }
    });
    </script>


    <!-- Footer -->
    <script src="assets/js/footer.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include 'assets/php/alert.php'; ?>

</body>

</html>