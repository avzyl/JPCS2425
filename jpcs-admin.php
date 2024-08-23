<?php
require_once 'assets/php/init.php';
include 'assets/php/connect-admin.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $student_number = $_POST['student_number'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];
    $program = $_POST['program'];
    $join_date = date('Y-m-d'); // Assuming join_date is the current date
    $status = 'pending'; // Assuming default status is 'pending'

    // Check if all required fields are filled
    if (!empty($name) && !empty($email) && !empty($student_number) && !empty($dept) && !empty($program)) {
        try {
            $add_member = $conn->prepare("INSERT INTO members (name, student_no, email, dept, program, join_date, status) VALUES (:name, :student_no, :email, :dept, :program, :join_date, :status)");
            $add_member->bindParam(':name', $name);
            $add_member->bindParam(':student_no', $student_number);
            $add_member->bindParam(':email', $email);
            $add_member->bindParam(':dept', $dept);
            $add_member->bindParam(':program', $program);
            $add_member->bindParam(':join_date', $join_date);
            $add_member->bindParam(':status', $status);

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
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit'])) {
        if (!empty($_POST['edit'])) {
            $edit = new Edit($_POST['edit']);
            if ($edit->editStatus()) {
                $success_msg[] = 'Status Successfully Updated!';
            } else {
                $warning_msg[] = 'Failed to update status.';
            }
        } else {
            $warning_msg[] = 'Edit ID is empty.';
        }
    }
}

if (isset($_POST['deactivate'])) {
    if (!empty($_POST['deactivate'])) {
        $deactivate = new Deactivate($_POST['deactivate']); // Ensure the class name is capitalized if that's the correct class name
        if ($deactivate->inactive()) {
            $success_msg[] = 'Member Successfully Deleted!';
        } else {
            $warning_msg[] = 'Failed to update status.';
        }
    } else {
        $warning_msg[] = 'Edit ID is empty.';
    }
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>JPCS Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script>
        function submitForm(form) {
            form.submit();
            setTimeout(function() {
                window.location.reload();
            }, 50); // Adjust the timeout as needed
        }
    </script>
</head>
<body>
   <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3>J<span>PCS</span></h3>
        </div>
        
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(assets/img/logo.png)"></div>
                <h4>Junior Philippine Computer Society</h4>
                <small>CEU Malolos</small>
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="" class="active">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                       <a href="">
                            <span class="las la-user-alt"></span>
                            <small>Profile</small>
                        </a>
                    </li>
                    <li>
                       <a href="">
                            <span class="las la-envelope"></span>
                            <small>Mailbox</small>
                        </a>
                    </li>
                    <li>
                       <a href="">
                            <span class="las la-clipboard-list"></span>
                            <small>Projects</small>
                        </a>
                    </li>
                    <li>
                       <a href="">
                            <span class="las la-shopping-cart"></span>
                            <small>Orders</small>
                        </a>
                    </li>
                    <li>
                       <a href="">
                            <span class="las la-tasks"></span>
                            <small>Tasks</small>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    
    <div class="main-content">
        
        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>
                
                <div class="header-menu">
                    <label for="">
                        <span class="las la-search"></span>
                    </label>
                    
                    <div class="notify-icon">
                        <span class="las la-envelope"></span>
                        <span class="notify">4</span>
                    </div>
                    
                    <div class="notify-icon">
                        <span class="las la-bell"></span>
                        <span class="notify">3</span>
                    </div>
                    
                    <div class="user">
                        <div class="bg-img" style="background-image: url(img/1.jpeg)"></div>
                        
                        <span class="las la-power-off"></span>
                        <span>Logout</span>
                    </div>
                </div>
            </div>
        </header>
        
        
        <main>
            
            <div class="page-header">
                <h1>Dashboard</h1>
                <small>Home / Dashboard</small>
            </div>
            
            <div class="page-content">
            
                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <h2>107,200</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Active Members</small>
                            <div class="card-indicator">
                                <div class="indicator three" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>340,230</h2>
                            <span class="las la-eye"></span>
                        </div>
                        <div class="card-progress">
                            <small>Pending Members</small>
                            <div class="card-indicator">
                                <div class="indicator four" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="card">
                        <div class="card-head">
                            <h2>$653,200</h2>
                            <span class="las la-shopping-cart"></span>
                        </div>
                        <div class="card-progress">
                            <small>Monthly revenue growth</small>
                            <div class="card-indicator">
                                <div class="indicator three" style="width: 65%"></div>
                            </div>
                        </div>
                    </div> -->

                    <div class="card">
                        <div class="card-head">
                            <h2>47,500</h2>
                            <span class="las la-envelope"></span>
                        </div>
                        <div class="card-progress">
                            <small>Inquiries</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="records table-responsive">


                    <!-- Modal for adding member -->
                    <div id="addMemberModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <form action="jpcs-admin.php" method="POST">
                                <h2 class="section__title">Be a JPCSher!</h2>
                                <p class="text-center">Fill up the form correctly for registration</p>
                                <p class="contact__info">* Required</p>
                                <input type="text" name="name" placeholder="Name *" class="contact__deets" />
                                <input type="text" name="student_number" placeholder="Student Number *" class="contact__deets" />
                                <input type="email" name="email" placeholder="Email *" class="contact__deets" />
                                <input type="text" name="dept" placeholder="Department/Organization *" class="contact__deets" />
                                <input type="text" name="program" placeholder="Year and Section *" class="contact__deets" />
                                <!-- <textarea rows="5" name="message" placeholder="Message"></textarea> -->
                                <button class="btn-sub" type="submit" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>

                    <div class="record-header">
                        <div class="add">
                            <h2 style="padding: 1rem; color: black;">Active Members</h2>

                            <!-- <span>Entries</span>
                            <select name="" id="">
                                <option value="">ID</option>
                            </select>
                            <button id="addMemberBtn">Add Member</button>                         -->
                        </div>

                        <div class="browse">
                           <input type="search" placeholder="Search" class="record-search">
                            <select name="" id="">
                                <option value="">Status</option>
                            </select>
                        </div>
                    </div>

                    <div>   
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th style="padding: 1rem;">#</th>
                                    <th style="padding: 1rem;"><span class="las la-sort"></span> MEMBER</th>
                                    <th style="padding: 1rem;"><span class="las la-sort"></span> STUDENT NUMBER</th>
                                    <th style="padding: 1rem;"><span class="las la-sort"></span> EMAIL</th>
                                    <th style="padding: 1rem;"><span class="las la-sort"></span> DEPARTMENT</th>
                                    <th style="padding: 1rem;"><span class="las la-sort"></span> YEAR AND SECTION</th>
                                    <th style="padding: 1rem;"><span class="las la-sort"></span> ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        // Assuming $result is an array of rows fetched from the database
                                        if (count($result) > 0) {
                                            $counter = 0; // Initialize counter for active members
                                            // Output data of each row
                                            foreach ($result as $row) {
                                                // Check if the status is "active"
                                                if ($row["status"] === "active") {
                                                    $counter++; // Increment counter for each active member
                                                    ?>
                                                    <tr>
                                                        <td style="padding: 1rem;">
                                                            <?php echo $counter; // Display the counter ?>
                                                        </td>
                                                        <td style="padding: 1rem;">
                                                            <h4><?php echo htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8'); ?></h4>
                                                        </td>
                                                        <td style="padding: 1rem;">
                                                            <?php echo htmlspecialchars($row["student_no"], ENT_QUOTES, 'UTF-8'); ?>
                                                        </td>
                                                        <td style="padding: 1rem;">
                                                            <small><?php echo htmlspecialchars($row["email"], ENT_QUOTES, 'UTF-8'); ?></small>
                                                        </td>
                                                        <td style="padding: 1rem;">
                                                            <?php echo htmlspecialchars($row["dept"], ENT_QUOTES, 'UTF-8'); ?>
                                                        </td>
                                                        <td style="padding: 1rem;">
                                                            <?php echo htmlspecialchars($row["program"], ENT_QUOTES, 'UTF-8'); ?>
                                                        </td>
                                                        <td style="padding: 1rem;">
                                                            <div class="actions">
                                                                <!-- Edit Button -->
                                                                <form method="POST" action="" style="display:inline;" onsubmit="submitForm(this); return false;">
                                                                    <input type="hidden" name="deactivate" value="<?php echo $row['member_id']; ?>">
                                                                    <button type="submit" class="btn"><span class="lab la-telegram-plane"></span></button>
                                                                </form>
                                                                <!-- Delete Button -->
                                                                <!-- <form method="POST" action="jpcs-admin.php" style="display:inline;">
                                                                    <input type="hidden" name="delete" value="<?php echo $row['member_id']; ?>">
                                                                    <button type="submit" class="btn"><span class="las la-eye"></span></button>
                                                                </form> -->
                                                                <!-- <span class="las la-ellipsis-v"></span> -->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            if ($counter == 0) {
                                                echo "<tr><td colspan='8' style='padding: 1rem;'>No active members found</td></tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='8' style='padding: 1rem;'>0 results</td></tr>";
                                        }
                                    ?>

                                </tr>

                                
                            </tbody>
                        </table>
                    </div>

                </div>
            
            </div>
            
        </main>
        
    </div>


    <script>
        // Get the modal
        var modal = document.getElementById("addMemberModal");

        // Get the button that opens the modal
        var btn = document.getElementById("addMemberBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
            modal.style.display = "none";
            }
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include 'assets/php/alert.php'; ?>

</body>
</html>