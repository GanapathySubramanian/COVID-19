<?php

session_start();

include('../../includes/db_connect.php');

// for user registration
if(isset($_POST['user_register']))
{
    $fullname= $_POST['fullname'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $password = $_POST['password'];
    $cpassword=$_POST['cpassword'];
    $EncryptPassword = base64_encode($password);

    if($password != $cpassword){
    echo "<script>alert('password is mismatching.... please re-enter your password ');</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../../user_signup.html">
        <?php
    }
    else{
    $s = "select * from user_reg where email='$email'";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);

    if($num==1)
    {
    
        echo '<script>alert("Email Id has already taken")</script>';
            ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../../user_signup.html">
        <?php
    }
    else
    {
        $reg="insert into user_reg(fullname,email,phoneno,password,status) values ('$fullname','$email','$phoneno','$EncryptPassword;','0')";
        mysqli_query($con,$reg);
        echo '<script>alert("Registration successfull !! and the request for your login is sent to admin Wait for the admin to accept your request")</script>';
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../../user_signin.html">
        <?php
    }
    }
}

// For user login
if(isset($_POST['user_login']))
{
    $EMAIL = $_POST['email'];
    $pass = $_POST['password'];

    // $s = "select * from user_reg where email='$EMAIL' && password='$hashed_pass' && status='1'";
    $query= "SELECT * FROM user_reg where email='$EMAIL'";
    $query_run= mysqli_query($con, $query);   
    $row=mysqli_fetch_array($query_run);

    // $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($query_run);
    $decode=base64_decode($row['password']);
    if(($num==1)&&($row['status']==1)&&($decode==$pass))
    {
        $_SESSION['EMAILID']=$EMAIL;
        header('location:../dashboard.php');
    }
    else if(($num==1)&&($row['status']==2)&&($decode==$pass))
    {
        echo "<script>window.alert('Your request has been rejected')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../../user_signin.html">
        <?php
    }

    else if(($num==1)&&($row['status']==0)&&($decode==$pass)){
        echo "<script>window.alert('Your request is Pending ... ')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../../user_signin.html">
        <?php
    }
    else{
        header('location:../../loginfail.html');
    }
}




// edit user profile
if(isset($_POST['edituser_profile'])){
	$u_id=$_POST['id'];
	$u_n=$_POST['username'];
	$email=$_POST['email_id'];
	$phoneno=$_POST['phone_number'];

	$query="UPDATE user_reg set fullname='$u_n',phoneno='$phoneno' WHERE user_id='$u_id'";
	$data=mysqli_query($con,$query);

    if($data)
    {
        echo"<script>window.alert('data updated successfully')</script>";
        $_SESSION['EMAILID']=$email;
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../profile.php">
        <?php
    }
    else
    {
        echo"<script>window.alert('Failed update data')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../profile.php">
        <?php
    }
}


// user Change Password
if(isset($_POST['changeuser_password'])){
	$u_id=$_POST['id'];
	$user_pass=$_POST['user_pass'];
	$old_pass=$_POST['old_password'];
    $email=$_POST['email_id'];
	$password = $_POST['new_password'];
    $cpassword=$_POST['confirm_password'];
    $EncryptPassword = base64_encode($password);
    if($old_pass!=$user_pass){

        echo "<script>alert('old_password is mismatching.... please re-enter your old_password ');</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../profile.php">
        <?php
    }
    else{
        if($password != $cpassword){
        echo "<script>alert('new_password  and confirm_password is mismatching.... please re-enter your password ');</script>";
            ?>
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../profile.php">
            <?php
        }
        else{
        $query="UPDATE user_reg set password='$EncryptPassword' WHERE user_id='$u_id'";
        $data=mysqli_query($con,$query);
            if($data)
            {
        
                echo"<script>window.alert('data updated successfully')</script>";
                
                $_SESSION['EMAILID']=$email;
                ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../profile.php">
        <?php
            }
            else
            {
                echo"<script>window.alert('Failed update data')</script>";
                ?>
                <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../profile.php">
                <?php
            }
        }
    }
}


// Checking data by post method for downloading data as csv
if(isset($_POST["user_export"])) {


	header('Content-Type: text/csv; charset=utf-8');

	header('Content-Disposition:attachment; filename=coronastatus.csv');

	$output = fopen("php://output", "w");

	
	fputcsv($output, array('country','confirmed','active','recovered','death','date'));

	
	$query = "SELECT country,confirmed,active,recovered,death from country_cases";

	
	$result = mysqli_query($con, $query);

	while($row = mysqli_fetch_assoc($result)) {

		
		fputcsv($output, $row);
	}


	fclose($output);
}
?>