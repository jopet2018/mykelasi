<?php
require_once 'session_check.php';
// protectPage(); // Basic authentication check
protectPageByRole('admin'); // Only admins can access this page
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MyKelasi | Add Teacher</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="css/select2.min.css">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="css/datepicker.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
         <!-- Header Menu Area Start Here -->
        <div class="navbar navbar-expand-md header-menu-one bg-light">
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    <a href="index.php">
                        <img src="img/logo.png" alt="logo">
                    </a>
                </div>
                  <div class="toggle-button sidebar-toggle">
                    <button type="button" class="item-link">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="d-md-none mobile-nav-bar">
               <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
                    <i class="far fa-arrow-alt-circle-down"></i>
                </button>
                <button type="button" class="navbar-toggler sidebar-toggle-mobile">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
                <ul class="navbar-nav">
                    <li class="navbar-item header-search-bar">
                        <div class="input-group stylish-input-group">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="flaticon-search" aria-hidden="true"></span>
                                </button>
                            </span>
                            <input type="text" class="form-control" placeholder="Find Something . . .">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">
                                <h5 class="item-title"><?php echo htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']); ?></h5>
                                <span><?php echo htmlspecialchars(ucfirst($_SESSION['role'])); ?></span>
                            </div>
                            <div class="admin-img">
                                <img src="img/figure/admin.jpg" alt="Admin"> <!-- Placeholder image -->
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title"><?php echo htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']); ?></h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    <li><a href="#"><i class="flaticon-user"></i>My Profile</a></li>
                                    <li><a href="account-settings.php"><i class="flaticon-gear-loading"></i>Account Settings</a></li>
                                    <li><a href="logout.php"><i class="flaticon-turn-off"></i>Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- Other header items -->
                </ul>
            </div>
        </div>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
           <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="index.php"><img src="img/logo1.png" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item sidebar-nav-item">
                            <a href="index.php" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Students</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="all-student.php" class="nav-link"><i class="fas fa-angle-right"></i>All Students</a>
                                </li>
                                <?php if (hasRole(['admin', 'teacher'])): ?>
                                <li class="nav-item">
                                    <a href="admit-form.php" class="nav-link"><i class="fas fa-angle-right"></i>Admission Form</a>
                                </li>
                                <?php endif; ?>
                                <li class="nav-item">
                                    <a href="student-details.php" class="nav-link"><i class="fas fa-angle-right"></i>Student Details</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>Teachers</span></a>
                            <ul class="nav sub-group-menu sub-group-active"> <!-- Active state for this page -->
                                <li class="nav-item">
                                    <a href="all-teacher.php" class="nav-link"><i class="fas fa-angle-right"></i>All Teachers</a>
                                </li>
                                <?php if (hasRole('admin')): ?>
                                <li class="nav-item">
                                    <a href="add-teacher.php" class="nav-link menu-active"><i class="fas fa-angle-right"></i>Add Teacher</a>
                                </li>
                                <?php endif; ?>
                                <li class="nav-item">
                                    <a href="teacher-details.php" class="nav-link"><i class="fas fa-angle-right"></i>Teacher Details</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Add other menu items based on roles as needed -->
                         <li class="nav-item">
                            <a href="all-subject.php" class="nav-link"><i class="flaticon-open-book"></i><span>Subject</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="account-settings.php" class="nav-link"><i class="flaticon-settings"></i><span>Account</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Teacher</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Add New Teacher</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add New Teacher</h3>
                            </div>
                           <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" 
                                data-toggle="dropdown" aria-expanded="false">...</a>
        
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        // PHP logic to handle teacher registration
                        $teacher_errors = [];
                        $teacher_success_message = '';

                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_teacher'])) {
                            // Sanitize and retrieve form data
                            $t_first_name = trim(filter_input(INPUT_POST, 't_first_name', FILTER_SANITIZE_STRING));
                            $t_last_name = trim(filter_input(INPUT_POST, 't_last_name', FILTER_SANITIZE_STRING));
                            $t_username = trim(filter_input(INPUT_POST, 't_username', FILTER_SANITIZE_STRING));
                            $t_email = trim(filter_input(INPUT_POST, 't_email', FILTER_SANITIZE_EMAIL));
                            $t_password = $_POST['t_password']; // Will be hashed
                            $t_gender = trim(filter_input(INPUT_POST, 't_gender', FILTER_SANITIZE_STRING));
                            $t_dob = trim(filter_input(INPUT_POST, 't_dob', FILTER_SANITIZE_STRING)); // Validate as date
                            $t_phone = trim(filter_input(INPUT_POST, 't_phone', FILTER_SANITIZE_STRING));
                            $t_address = trim(filter_input(INPUT_POST, 't_address', FILTER_SANITIZE_STRING));
                            $t_qualification = trim(filter_input(INPUT_POST, 't_qualification', FILTER_SANITIZE_STRING));
                            $t_department = trim(filter_input(INPUT_POST, 't_department', FILTER_SANITIZE_STRING));
                            $t_specialization = trim(filter_input(INPUT_POST, 't_specialization', FILTER_SANITIZE_STRING));
                            $t_joining_date = trim(filter_input(INPUT_POST, 't_joining_date', FILTER_SANITIZE_STRING)); // Validate as date

                            // Basic Validation
                            if (empty($t_first_name) || empty($t_last_name) || empty($t_username) || empty($t_email) || empty($t_password) || empty($t_gender) || empty($t_qualification)) {
                                $teacher_errors[] = "Required fields (First Name, Last Name, Username, Email, Password, Gender, Qualification) are missing.";
                            }
                            if (!filter_var($t_email, FILTER_VALIDATE_EMAIL)) {
                                $teacher_errors[] = "Invalid email format for teacher.";
                            }

                            if (empty($teacher_errors)) {
                                try {
                                    $pdo->beginTransaction();

                                    // Check if username or email already exists
                                    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username OR email = :email");
                                    $stmt->execute([':username' => $t_username, ':email' => $t_email]);
                                    if ($stmt->fetch()) {
                                        $teacher_errors[] = "Username or Email already exists for this teacher.";
                                    } else {
                                        // Insert into users table
                                        $hashed_password = password_hash($t_password, PASSWORD_DEFAULT);
                                        $sql_user = "INSERT INTO users (first_name, last_name, username, email, password, role) 
                                                     VALUES (:first_name, :last_name, :username, :email, :password, 'teacher')";
                                        $stmt_user = $pdo->prepare($sql_user);
                                        $stmt_user->execute([
                                            ':first_name' => $t_first_name,
                                            ':last_name' => $t_last_name,
                                            ':username' => $t_username,
                                            ':email' => $t_email,
                                            ':password' => $hashed_password
                                        ]);
                                        $new_user_id = $pdo->lastInsertId();

                                        // Insert into teachers table
                                        $sql_teacher = "INSERT INTO teachers (user_id, department, qualification, date_of_joining, specialization, phone_number, address, date_of_birth, gender)
                                                        VALUES (:user_id, :department, :qualification, :date_of_joining, :specialization, :phone_number, :address, :date_of_birth, :gender)";
                                        $stmt_teacher = $pdo->prepare($sql_teacher);
                                        $stmt_teacher->execute([
                                            ':user_id' => $new_user_id,
                                            ':department' => $t_department,
                                            ':qualification' => $t_qualification,
                                            ':date_of_joining' => !empty($t_joining_date) ? $t_joining_date : null,
                                            ':specialization' => $t_specialization,
                                            ':phone_number' => $t_phone,
                                            ':address' => $t_address,
                                            ':date_of_birth' => !empty($t_dob) ? $t_dob : null,
                                            ':gender' => $t_gender
                                        ]);
                                        
                                        $pdo->commit();
                                        $teacher_success_message = "Teacher registered successfully! User ID: " . $new_user_id;
                                    }
                                } catch (PDOException $e) {
                                    $pdo->rollBack();
                                    error_log("Add Teacher Error: " . $e->getMessage());
                                    $teacher_errors[] = "Database error: Could not add teacher. " . $e->getMessage();
                                }
                            }
                        }
                        ?>

                        <?php if (!empty($teacher_errors)): ?>
                            <div class="alert alert-danger py-2 mt-3">
                                <strong>Please correct the following errors:</strong>
                                <ul>
                                    <?php foreach ($teacher_errors as $error): ?>
                                        <li><?php echo htmlspecialchars($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($teacher_success_message)): ?>
                            <div class="alert alert-success py-2 mt-3">
                                <?php echo htmlspecialchars($teacher_success_message); ?>
                            </div>
                        <?php endif; ?>

                        <form class="new-added-form" method="POST" action="add-teacher.php">
                            <input type="hidden" name="add_teacher" value="1">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>First Name *</label>
                                    <input type="text" name="t_first_name" placeholder="" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Last Name *</label>
                                    <input type="text" name="t_last_name" placeholder="" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Username *</label>
                                    <input type="text" name="t_username" placeholder="" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Email *</label>
                                    <input type="email" name="t_email" placeholder="" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Password *</label>
                                    <input type="password" name="t_password" placeholder="" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Gender *</label>
                                    <select class="select2" name="t_gender" required>
                                        <option value="">Please Select Gender *</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Date Of Birth</label>
                                    <input type="text" name="t_dob" placeholder="dd/mm/yyyy" class="form-control air-datepicker">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Phone</label>
                                    <input type="text" name="t_phone" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Address</label>
                                    <input type="text" name="t_address" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Qualification *</label>
                                    <input type="text" name="t_qualification" placeholder="" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Department</label>
                                    <input type="text" name="t_department" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Specialization</label>
                                    <input type="text" name="t_specialization" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Date of Joining</label>
                                    <input type="text" name="t_joining_date" placeholder="dd/mm/yyyy" class="form-control air-datepicker">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                <div class="col-lg-6 col-12 form-group mg-t-30">
                                    <label class="text-dark-medium">Upload Teacher Photo (150px X 150px)</label>
                                    <input type="file" name="t_photo" class="form-control-file">
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save Teacher</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add New Teacher Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright">© Copyrights <a href="#">MyKelasi</a> <?php echo date("Y"); ?>. All rights reserved. Designed by <a
                            href="#">MyKelasi Team (Template by PsdBosS)</a></div>
                </footer>
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Select 2 Js -->
    <script src="js/select2.min.js"></script>
    <!-- Date Picker Js -->
    <script src="js/datepicker.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

</body>

</html>