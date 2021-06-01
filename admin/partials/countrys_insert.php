<?php 
    include('../includes/db_connect.php');

    
    $main_query= "SELECT DISTINCT country_code FROM state_cases";
    $mainquery_run= mysqli_query($con, $main_query);   
    while($row=mysqli_fetch_array($mainquery_run)){

    $countrys_codes=$row['country_code'];
    $s_confirmed=0;$s_male=0;$s_female=0;$s_active=0;$s_death=0;$s_recovered=0;
    $query= "SELECT * FROM state_cases where country_code='$countrys_codes'";
    $query_run= mysqli_query($con, $query);   
    while($row=mysqli_fetch_array($query_run)){
        $s_confirmed=$s_confirmed+$row['confirmed'];
        $s_male=$s_male+$row['male'];
        $s_female=$s_female+$row['female'];
        $s_active=$s_active+$row['active'];
        $s_death=$s_death+$row['death'];
        $s_recovered=$s_recovered+$row['recovered'];
    }
    $query="UPDATE country_cases set confirmed='$s_confirmed',male='$s_male',female='$s_female',active='$s_active',recovered='$s_recovered',death='$s_death',updated_at=CURDATE()  WHERE country_code='$countrys_codes'";
    $data=mysqli_query($con,$query);
}
?>