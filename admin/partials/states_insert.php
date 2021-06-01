<?php 
    include('../includes/db_connect.php');

    $main_query= "SELECT DISTINCT state_code FROM district_cases";
    $mainquery_run= mysqli_query($con, $main_query);   
    while($row=mysqli_fetch_array($mainquery_run)){

    $states_codes=$row['state_code'];
    
    $d_confirmed=0;$d_male=0;$d_female=0;$d_active=0;$d_death=0;$d_recovered=0;
    $query= "SELECT * FROM district_cases where state_code='$states_codes'";
    $query_run= mysqli_query($con, $query);   
    while($row=mysqli_fetch_array($query_run)){
        $d_confirmed=$d_confirmed+$row['confirmed'];
        $d_male=$d_male+$row['male'];
        $d_female=$d_female+$row['female'];
        $d_active=$d_active+$row['active'];
        $d_death=$d_death+$row['death'];
        $d_recovered=$d_recovered+$row['recovered'];
    }
    $query="UPDATE state_cases set confirmed='$d_confirmed',male='$d_male',female='$d_female',active='$d_active',recovered='$d_recovered',death='$d_death'  WHERE state_code='$states_codes'";
    $data=mysqli_query($con,$query);
}
?>