<?php
require_once 'session_check.php';
protectPage(); // Redirects to login.php if not authenticated
// protectPageByRole(['admin', 'teacher']); // Example: Allow only admin and teacher
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MyKelasi | All Students</title>
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
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
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
                    <!-- Other header items like messages, notifications can be added here if needed -->
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
                            <ul class="nav sub-group-menu sub-group-active"> <!-- Ensure 'sub-group-active' is correct for this page -->
                                <li class="nav-item">
                                    <a href="all-student.php" class="nav-link menu-active"><i class="fas fa-angle-right"></i>All Students</a>
                                </li>
                                <?php if (hasRole(['admin', 'teacher'])): // Example: Only admin/teacher can admit ?>
                                <li class="nav-item">
                                    <a href="admit-form.php" class="nav-link"><i class="fas fa-angle-right"></i>Admission Form</a>
                                </li>
                                <?php endif; ?>
                                <li class="nav-item">
                                    <a href="student-details.php" class="nav-link"><i class="fas fa-angle-right"></i>Student Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="student-promotion.php" class="nav-link"><i class="fas fa-angle-right"></i>Student Promotion</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>Teachers</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="all-teacher.php" class="nav-link"><i class="fas fa-angle-right"></i>All Teachers</a>
                                </li>
                                <?php if (hasRole('admin')): // Example: Only admin can add teachers ?>
                                <li class="nav-item">
                                    <a href="add-teacher.php" class="nav-link"><i class="fas fa-angle-right"></i>Add Teacher</a>
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
                    <h3>Students</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>All Students</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Student Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Students Data</h3>
                            </div>
                           <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" 
                                data-toggle="dropdown" aria-expanded="false">...</a>
        
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" onclick="alert('Refreshing data...');"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </div>
                        <form class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Roll ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Class ..." class="form-control">
                                </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Roll</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Parents</th>
                                        <th>Address</th>
                                        <th>Date Of Birth</th>
                                        <th>Phone</th>
                                        <th>E-mail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- PHP loop to populate students START -->
                                    <?php
                                    try {
                                        // Subquery to get student details along with their user details
                                        $stmt = $pdo->query("
                                            SELECT 
                                                s.id as student_id, s.roll_number, s.gender, s.date_of_birth, s.address, s.phone_number as student_phone,
                                                u.first_name, u.last_name, u.email,
                                                c.name as class_name, c.section,
                                                GROUP_CONCAT(DISTINCT CONCAT(pu.first_name, ' ', pu.last_name) SEPARATOR ', ') as parent_names
                                            FROM students s
                                            JOIN users u ON s.user_id = u.id
                                            LEFT JOIN classes c ON s.class_id = c.id
                                            LEFT JOIN student_parent_relations spr ON spr.student_user_id = u.id
                                            LEFT JOIN users pu ON spr.parent_user_id = pu.id
                                            WHERE u.role = 'student'
                                            GROUP BY s.id
                                            ORDER BY u.first_name, u.last_name
                                        ");
                                        $students = $stmt->fetchAll();

                                        if ($students) {
                                            foreach ($students as $student) {
                                                echo "<tr>";
                                                echo "<td>" . htmlspecialchars($student['roll_number'] ?: 'N/A') . "</td>";
                                                echo "<td class='text-center'><img src='img/figure/student_placeholder.png' alt='student' style='width:30px; height:auto;'></td>"; // Placeholder
                                                echo "<td>" . htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) . "</td>";
                                                echo "<td>" . htmlspecialchars($student['gender'] ?: 'N/A') . "</td>";
                                                echo "<td>" . htmlspecialchars($student['class_name'] ?: 'N/A') . "</td>";
                                                echo "<td>" . htmlspecialchars($student['section'] ?: 'N/A') . "</td>";
                                                echo "<td>" . htmlspecialchars($student['parent_names'] ?: 'N/A') . "</td>";
                                                echo "<td>" . htmlspecialchars($student['address'] ?: 'N/A') . "</td>";
                                                echo "<td>" . htmlspecialchars($student['date_of_birth'] ? date('d/m/Y', strtotime($student['date_of_birth'])) : 'N/A') . "</td>";
                                                echo "<td>" . htmlspecialchars($student['student_phone'] ?: 'N/A') . "</td>";
                                                echo "<td>" . htmlspecialchars($student['email']) . "</td>";
                                                echo "<td>
                                                        <div class='dropdown'>
                                                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                                                                <span class='flaticon-more-button-of-three-dots'></span>
                                                            </a>
                                                            <div class='dropdown-menu dropdown-menu-right'>
                                                                <a class='dropdown-item' href='student-details.php?id=" . $student['student_id'] . "'><i class='fas fa-eye text-info'></i>View</a>
                                                                <a class='dropdown-item' href='admit-form.php?edit_id=" . $student['student_id'] . "'><i class='fas fa-cogs text-dark-pastel-green'></i>Edit</a>
                                                                <a class='dropdown-item' href='#' onclick='deleteStudent(" . $student['student_id'] . ")'><i class='fas fa-trash text-danger'></i>Delete</a>
                                                            </div>
                                                        </div>
                                                      </td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='12' class='text-center'>No students found.</td></tr>";
                                        }
                                    } catch (PDOException $e) {
                                        echo "<tr><td colspan='12' class='text-center text-danger'>Error fetching students: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
                                    }
                                    ?>
                                    <!-- PHP loop to populate students END -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Student Table Area End Here -->
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
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Data Table Js -->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    <script>
        // Basic delete confirmation
        function deleteStudent(studentId) {
            if (confirm('Are you sure you want to delete student ID ' + studentId + '? This action cannot be undone.')) {
                // Here you would typically redirect to a delete script or use AJAX
                // For now, just an alert.
                alert('Deletion for student ID ' + studentId + ' would proceed here. (Not implemented)');
                // window.location.href = 'delete_student.php?id=' + studentId; // Example
            }
        }
    </script>

</body>

</html>