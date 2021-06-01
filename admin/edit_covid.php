<?php
include('../includes/db_connect.php');
$id=$_POST['id'];
$state_c=$_POST['s_c'];
$dis=$_POST['dis'];
$confirm=$_POST['confirm'];
$male=$_POST['male'];
$female=$_POST['female'];
$active=$_POST['active'];
$recov=$_POST['recovered'];
$death=$_POST['death'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Css Stylesheets-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../assets/css/signup.css">
    
    <!-- =====FONT AWESOME===== -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- =====GOOGLE FONT===== -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    
    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--Shortcut-->
    <link rel="shortcut icon" href="assets/img/logo.png">

    <title>COVID-19 | Edit</title>
</head>
<body>
      <!-- Back Navigation -->
      <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="/COVID19/admin/districts.php"><i class="fas fa-backward"></i> Back</a>
    </nav>

    
    <div class="signup-menu">
		<div class="signup-formbox">
		    <center>
                <h1 class="signup-form-header ">Edit District Cases</h1>
            </center>

            <form action="partials/admin_db.php" method="post" id="login1" class="signup-input-group" autocomplete="off">	
		        <input type="hidden" name="edit_id" class="signup-input-field"  value='<?php echo $id?>'readonly>
		        <input type="hidden" name="edit_statecode" class="signup-input-field"  value='<?php echo $state_c?>'readonly>
		        <input type="text" name="edit_dis" class="signup-input-field"  value='<?php echo $dis?>'readonly>
		        <input type="text" name="edit_confirmed" class="signup-input-field" placeholder="Enter Confirmed Cases" value='<?php echo $confirm?>' required>
		        <input type="text" name="edit_male" class="signup-input-field" placeholder="Enter Male Cases" value='<?php echo $male?>' required>
		        <input type="text" name="edit_female" class="signup-input-field" placeholder="Enter Female Cases" value='<?php echo $female?>'required>
		        <input type="text" name="edit_active" class="signup-input-field" placeholder="Enter Active Cases"value='<?php echo $active?>' required>
		        <input type="text" name="edit_recovered" class="signup-input-field" placeholder="Enter Recovered Cases"value='<?php echo $recov?>' required>
		        <input type="text" name="edit_death" class="signup-input-field" placeholder="Enter Death Cases"value='<?php echo $death?>' required>
                <center>
                    <button type="submit" style="outline:none"  class="signup-submit mt-2" name="update_covid_data">Update data</button>
                </center>                
		    </form>
		</div>
	</div>
</body>
</html>