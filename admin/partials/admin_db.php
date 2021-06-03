<?php
	include('../../includes/db_connect.php');

// for admin login
if(isset($_POST['admin_login']))
{
  $userid = $_POST['userid'];
  $password = $_POST['password'];
  if($userid=='admin' && $password=='admin@123')
  {
    header('location:../dashboard.php');
  }
  else
  {
    header('location:../../loginfail.html');
   }
}



// ==================================================DISTRICTS==================================
// add district
if(isset($_POST['add_district'])){

	$s_code=$_POST['add_statecode'];
	$district=$_POST['add_dis'];
	$confirmed=$_POST['add_confirmed'];
	$male=$_POST['add_male'];
	$female=$_POST['add_female'];
	$active=$_POST['add_active'];
	$recovered=$_POST['add_recovered'];
	$death=$_POST['add_death'];
	
	$query="INSERT INTO district_cases(state_code,districts,confirmed,male,female,active,recovered,death,date) VALUES ('$s_code','$district','$confirmed','$male','$female','$active','$recovered','$death',NOW())";
	$data=mysqli_query($con,$query);

	if($data)
	{
		
		echo"<script>window.alert('data inserted successfully')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../districts.php">
		<?php
	}
	else
	{
	echo"<script>window.alert('Failed insert data')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../districts.php">
	<?php	
	}
}


// edit district
if(isset($_POST['update_covid_data'])){
	$e_id=$_POST['edit_id'];
	$es_code=$_POST['edit_statecode'];
	$e_district=$_POST['edit_dis'];
	$e_confirmed=$_POST['edit_confirmed'];
	$e_male=$_POST['edit_male'];
	$e_female=$_POST['edit_female'];
	$e_active=$_POST['edit_active'];
	$e_recovered=$_POST['edit_recovered'];
	$e_death=$_POST['edit_death'];

	$query="UPDATE district_cases set state_code='$es_code',districts='$e_district',confirmed='$e_confirmed',male='$e_male',female='$e_female',active='$e_active',recovered='$e_recovered',death='$e_death' WHERE id='$e_id'";
	$data=mysqli_query($con,$query);

	if($data)
	{
		
		echo"<script>window.alert('data updated successfully')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../districts.php">
		<?php
	}
	else
	{
	echo"<script>window.alert('Failed update data')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../districts.php">
	<?php
	}

}

// for deleting district wise entries
if (isset($_POST['covid_delete']))
{
	$id_delete=$_POST['id'];
	$query="DELETE FROM district_cases WHERE id='$id_delete'";
	$data=mysqli_query($con,$query);
if($data)
{
	
	echo"<script>window.alert('The distrcit is successfully deleted')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../districts.php">
	<?php
}
else
{
 echo"<script>window.alert('Failed to delete the district')</script>";
 ?>
 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../districts.php">
 <?php	
}
}
// ==================================================STATES==================================
// add state
if(isset($_POST['add_state'])){

	$c_code=$_POST['add_countrycode'];
	$s_code=$_POST['add_statecode_c'];
	$s_name=$_POST['add_statename'];

	$query="INSERT INTO state_cases(country_code,state_code,states,confirmed,male,female,active,recovered,death) VALUES ('$c_code','$s_code','$s_name','0','0','0','0','0','0')";
	$data=mysqli_query($con,$query);

	if($data)
	{
		
		echo"<script>window.alert('data inserted successfully')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../states.php">
		<?php
	}
	else
	{
	echo"<script>window.alert('Failed insert data')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../states.php">
	<?php	
	}
}

// for deleting state wise entries
if (isset($_POST['state_covid_delete']))
{
	$id_delete=$_POST['id'];
	$query="DELETE FROM state_cases WHERE id='$id_delete'";
	$data=mysqli_query($con,$query);
if($data)
{
	
	echo"<script>window.alert('The state is successfully deleted')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../states.php">
	<?php
}
else
{
 echo"<script>window.alert('Failed to delete the state')</script>";
 ?>
 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../states.php">
 <?php	
}
}

// ==================================================COUNTRY==================================
// add country
if(isset($_POST['add_country'])){

	$co_code=$_POST['add_countrycode_c'];
	$co_name=$_POST['add_countryname'];
	

	$query="INSERT INTO country_cases(country_code,country,confirmed,male,female,active,recovered,death,updated_at) VALUES ('$co_code','$co_name','0','0','0','0','0','0',CURDATE())";
	$data=mysqli_query($con,$query);

	if($data)
	{
		
		echo"<script>window.alert('data inserted successfully')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../country.php">
		<?php
	}
	else
	{
	echo"<script>window.alert('Failed insert data')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../country.php">
	<?php	
	}
}


// for deleting country wise entries
if (isset($_POST['country_covid_delete']))
{
	$id_delete=$_POST['id'];
	$query="DELETE FROM country_cases WHERE id='$id_delete'";
	$data=mysqli_query($con,$query);
if($data)
{
	
	echo"<script>window.alert('The country is successfully deleted')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../country.php">
	<?php
}
else
{
 echo"<script>window.alert('Failed to delete the country')</script>";
 ?>
 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../country.php">
 <?php	
}
}
// User status - accept,reject and delete
if(isset($_POST['user_accept']))
{
	   $u_id =$_POST['user_id']; 
       $user_query1="UPDATE user_reg SET status='1'  WHERE user_id='$u_id'";
	   $data1=mysqli_query($con,$user_query1);
       echo "<script>window.alert('Request Accepted')</script>";
	   ?>
	   <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../existingusers.php">
	   <?php
}
if(isset($_POST['user_reject']))
{ 
		$u_id =$_POST['user_id']; 
        $user_query2="UPDATE user_reg SET status ='2' WHERE user_id='$u_id'";
		$data2=mysqli_query($con,$user_query2);
        echo "<script>window.alert('Request Rejected')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../rejectedusers.php">
		<?php
}
if(isset($_POST['user_delete']))
{ 
		$u_id =$_POST['user_id']; 
		$user_query3="DELETE FROM user_reg WHERE user_id='$u_id'";
		$data3=mysqli_query($con,$user_query3);
		if($data3)
		{
			
			echo"<script>window.alert('The user is successfully deleted')</script>";
			?>
			<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../existingusers.php">
			<?php
		}
		else
		{
		 echo"<script>window.alert('Failed to delete the user')</script>";
		 ?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../existingusers.php">
		 <?php	
		}
}


// for uploading csv file as data	
if(isset($_POST["admin_Import"]))
{
  $filename=$_FILES["file"]["tmp_name"];    
   if($_FILES["file"]["size"] > 0)
   {
      $file = fopen($filename, "r");
      while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
      {
	      $s = "select * from district_cases where districts='".$getData[1]."' AND state_code='".$getData[0]."' ";
        $result = mysqli_query($con, $s);
        $num = mysqli_num_rows($result);
        if($num==1)
		    {
		      $flag=1;
          $sql = "UPDATE `district_cases` SET confirmed='".$getData[2]."',male='".$getData[3]."',female='".$getData[4]."',active='".$getData[5]."',recovered='".$getData[6]."',death='".$getData[7]."',date=CURDATE() WHERE districts='".$getData[1]."'";
	    		$result = mysqli_query($con,$sql);
		    }
		    else{
          $flag=0;
          $sql = "INSERT INTO `district_cases`(`state_code`,`districts`, `confirmed`, `male`, `female`, `active`, `recovered`, `death`, `date`) VALUES('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."',CURDATE())";
          $result = mysqli_query($con,$sql);
		    }
       
      }
      if($flag=1){
           echo "<script>window.confirm('The district in the csv file already exists in the db all the column in the db are updated whith the value that you have entered in csv')</script>";
      }else{
        echo "<script>window.confirm('The district in the csv file does not exists in the db all the data that you have entered in csv is insered as new row')</script>";
      }
      if(!isset($result))
      {    
          echo "<script>window.alert('Invalid File:Please Upload CSV File.')</script>";
          ?>
          <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../districts.php">
          <?php
      }
      else {
        echo "<script>window.alert('CSV File has been successfully Uploaded.')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../districts.php">
        <?php
      }
     fclose($file);  
  }
} 


//====================================================For district report download===================================
// Checking data by post method for downloading data as csv file
if(isset($_POST["admin_district_export"])) {

	// Connect to our data base

	// Accept csv or text files
	header('Content-Type: text/csv; charset=utf-8');

	// Download csv file as coronastatus.csv
	header('Content-Disposition:attachment; filename=coronastatus.csv');

	// Storing data
	$output = fopen("php://output", "w");

	// Placing data using fputcsv
	fputcsv($output, array('state_code','districts','confirmed','male','female','active','recovered','death'));

	// SQL query to fetch data from our table
	$query = "SELECT state_code,districts,confirmed,male,female,active,recovered,death from district_cases";

	// Result
	$result = mysqli_query($con, $query);

	while($row = mysqli_fetch_assoc($result)) {

		// Fetching all rows of data one by one
		fputcsv($output, $row);
	}

	// Closing tag
	fclose($output);
}


//====================================================For state report download======================================
// Checking data by post method for downloading data as csv file
if(isset($_POST["admin_state_export"])) {

	// Connect to our data base

	// Accept csv or text files
	header('Content-Type: text/csv; charset=utf-8');

	// Download csv file as coronastatus.csv
	header('Content-Disposition:attachment; filename=coronastatus.csv');

	// Storing data
	$output = fopen("php://output", "w");

	// Placing data using fputcsv
	fputcsv($output, array('country_code','state_code','states','confirmed','male','female','active','recovered','death'));

	// SQL query to fetch data from our table
	$query = "SELECT country_code,state_code,states,confirmed,male,female,active,recovered,death from state_cases";

	// Result
	$result = mysqli_query($con, $query);

	while($row = mysqli_fetch_assoc($result)) {

		// Fetching all rows of data one by one
		fputcsv($output, $row);
	}

	// Closing tag
	fclose($output);
}

//====================================================For country report download====================================
// Checking data by post method for downloading data as csv file
if(isset($_POST["admin_country_export"])) {

	// Connect to our data base

	// Accept csv or text files
	header('Content-Type: text/csv; charset=utf-8');

	// Download csv file as coronastatus.csv
	header('Content-Disposition:attachment; filename=coronastatus.csv');

	// Storing data
	$output = fopen("php://output", "w");

	// Placing data using fputcsv
	fputcsv($output, array('country_code','country','confirmed','male','female','active','recovered','death'));

	// SQL query to fetch data from our table
	$query = "SELECT country_code,country,confirmed,male,female,active,recovered,death from country_cases";

	// Result
	$result = mysqli_query($con, $query);

	while($row = mysqli_fetch_assoc($result)) {

		// Fetching all rows of data one by one
		fputcsv($output, $row);
	}

	// Closing tag
	fclose($output);
}



?>
