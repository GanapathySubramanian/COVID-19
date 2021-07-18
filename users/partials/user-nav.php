<?php
    include('../includes/db_connect.php');
    session_start();
   if(!isset($_SESSION['EMAILID']))
    {
        header('location:../user_signin.html');
    }
    else{
    $loggeduser_email=$_SESSION['EMAILID'];

    $loggeduser_name;$loggeduser_phone;$loggeduser_status;
    $query= "SELECT * FROM user_reg where email='$loggeduser_email'";
    $query_run= mysqli_query($con, $query);   
    while($row=mysqli_fetch_array($query_run)){
        $loggeduser_id=$row['user_id'];
        $loggeduser_name=$row['fullname'];
        $loggeduser_phone=$row['phoneno'];
        $loggeduser_status=$row['status'];;
        $loggeduser_password=base64_decode($row['password']);
    }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- for chart -->
        <script src="https://cdn.anychart.com/releases/8.8.0/js/anychart-base.min.js"></script>
        <script src="https://cdn.anychart.com/releases/8.8.0/js/anychart-data-adapter.min.js"></script>

        <!--Css Stylesheets-->
        <link rel="stylesheet" href="../assets/css/nav.css">
        <link rel="stylesheet" href="../assets/css/users.css">
        <link rel="stylesheet" href="../assets/css/tables.css">
      
        <!-- =====GOOGLE FONT===== -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >

        <!--FontAwesome-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

       
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     
        <!--Shortcut-->
        <link rel="shortcut icon" href="../assets/img/logo.png">

        <title>COVID-19 | User Dashboard</title>
       
    </head>
    <body id="body-pd" class="body-pd">
        <header class="header body-pd" id="header">
            <div class="header__toggle ">
                <i class='bx bx-menu bx-x' id="header-toggle"></i>
            </div>
             <div class="header_title mt-2 ml-5">
             <h5>C<img src="../assets/img/logo.png" width="30" height="25">VID - 19</h5>
             </div>
             
            
             <div class="">
                <a href="../user_signin.html" class="nav__link user_nav_link text-danger mt-3">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Logout</span>
                </a>
            </div>
        </header>
            
        <div class="l-navbar showing" id="nav-bar">
            <nav class="nav" style="overflow-y:auto">
                <div>
                    <a class="nav__logo">
                        <i class='bx bx-layer nav__logo-icon'></i>
                        <span class="nav__logo-name"><?php echo $loggeduser_name?></span>
                    </a>

                    <div id= "left-nav" class="nav__list user_nav_list">
                        <a href="../users/dashboard.php" class="nav__link user_nav_link">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Dashboard</span>
                        </a>

                        <a href="../users/country.php" class="nav__link admin_nav_link">
                            <i class='bx bxs-virus'></i>
                            <span class="nav__name">Country Status</span>
                        </a>
                        <a href="../users/states.php" class="nav__link admin_nav_link">
                            <i class='bx bxs-virus'></i>
                            <span class="nav__name">State Status</span>
                        </a>
                        
                        <a href="../users/districts.php" class="nav__link user_nav_link">
                            <i class='bx bxs-virus'></i>
                            <span class="nav__name">District Status</span>
                        </a>
                        <a href="../users/profile.php" class="nav__link user_nav_link">
                        <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Account</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        
