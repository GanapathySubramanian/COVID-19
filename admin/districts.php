<?php include('partials/admin-nav.php');?>
<?php
    if(isset($_POST['search']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM `district_cases` WHERE  CONCAT(`districts`,`state_code`) LIKE '%".$valueToSearch."%' order by id";
        $search_result = filterTable($query);
    }
    else {
        $query = "SELECT * FROM `district_cases` order by id";
        $search_result = filterTable($query);
    }
// function to connect and execute the query
    function filterTable($query)
    {
        include('../includes/db_connect.php');
        $filter_Result = mysqli_query($con, $query);
        return $filter_Result;
    }

?>
<div id="districtstatus">
 
    <nav class="navbar navbar-light">
        <a class="navbar-brand text-primary font-weight-bold" href="#"><h3>District Wise Status</h3></a>
        <form class="d-flex">
            <button type="button" class="btn btn-primary ml-2" name="add_district" data-toggle="modal" data-target="#AdddistrictModal" data-whatever="@mdo">Add District</button>
        </form>

        <!-- Add district modal -->
        <div class="modal fade" id="AdddistrictModal" tabindex="-1" role="dialog" aria-labelledby="AdddistrictModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add District - corona cases <br>Before Adding districts you have to add the correspoding state and country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="partials/admin_db.php">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">State Code (TN for TamilNadu):</label>
                        <input type="text" class="form-control" name="add_statecode" id="disctrict-code">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">District Name:</label>
                        <input type="text" class="form-control" name="add_dis" id="disctrict-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Confirmed Cases:</label>
                        <input type="text" class="form-control" name="add_confirmed" id="confirmed-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Male Cases:</label>
                        <input type="text" class="form-control" name="add_male" id="male-cases">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Female Cases:</label>
                        <input type="text" class="form-control" name="add_female" id="female-cases">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Active Cases:</label>
                        <input type="text" class="form-control" name="add_active" id="active-cases">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Recovered Cases:</label>
                        <input type="text" class="form-control" name="add_recovered" id="recovered-cases">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Death:</label>
                        <input type="text" class="form-control" name="add_death" id="death">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add_district">Add district</button>
                </div>
            </form>
            </div>
        </div>
        </div>


        <form class="d-flex"  action="" method="POST" autocomplete="off">
            <input class="form-control me-2" type="search" name="valueToSearch" placeholder="Value To Search" aria-label="Search">
            <button class="btn btn-primary ml-2" type="submit" name="search">Search</button>
        </form>
    </nav>
    <form method="post" class="ml-3" action="partials/admin_db.php">
		<input type="submit" name="admin_district_export" value="District report" class="btn btn-success mt-3" />
	</form>
	<label class="text-primary font-weight-bold"> Select No.of.rows to display :</label>
      <select class="form-control" name="state" id="maxRows">
		<option value="5000">Show ALL Rows</option>
		<option value="5">5</option>
		<option value="10">10</option>
		<option value="15">15</option>
		<option value="20">20</option>
		<option value="50">50</option>
		<option value="70">70</option>
		<option value="100">100</option>
    </select>
    <div class="table-responsive">
        <table class="content-table table" id="table-id">
            <thead>
                <tr>
                    
                    <th>STATE_CODE</th>
                    <th>DISTRICTS</th>
                    <th>CONFIRMED</th>
                    <th>MALE</th>
                    <th>FEMLAE</th>
                    <th>ACTIVE</th>
                    <th>RECOVERED</th>
                    <th>DEATH</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <?php 
            
            while($row = mysqli_fetch_array($search_result)):
           
            ?>
                <tr>
                
                    <td><?php echo $row['state_code']?></td>
                    <td><?php echo $row['districts']?></td>
                    <td><?php echo $row['confirmed']?></td>
                    <td><?php echo $row['male']?></td>
                    <td><?php echo $row['female']?></td>
                    <td><?php echo $row['active']?></td>
                    <td><?php echo $row['recovered']?></td>
                    <td><?php echo $row['death']?></td>
                    <td>
                    <div class="d-flex">
                        <form method="GET" action=''>
                            <input type='hidden' name='id' value='<?php echo $row['id'] ?>'/>
                            <a href="districts.php?id=<?php echo $row['id']?>" name='covid_edit' class="px-3 btn btn-primary btn-sm">Edit</a>
                        </form> 
                        <form method="POST" action='partials/admin_db.php'>
                            <input type='hidden' name='id' value='<?php echo $row['id'] ?>'/>
                            <?php
                            echo "<input  class='btn btn-danger ml-2 btn-sm' type='submit' style='outline:none;' name='covid_delete'  onclick='return Delete_covid();' value='Delete' />";
                            ?>
                        </form>
                    </div>   
                    </td>
                </tr>
            <?php endwhile;?>
        </table>
    </div>
        
         <div class='pagination-container mt-2'>
            <nav>
                <ul class="pagination">
                   <li class="page-item" style="cursor:pointer;" data-page="prev" ><span class="page-link"> < <span class="sr-only">(current)</span></span></li>
                   <!--	Here the JS Function Will Add the Rows -->
                    <li class="page-item" style="cursor:pointer;"  data-page="next" id="prev"><span class="page-link"> > <span class="sr-only">(current)</span></span></li>
                </ul>
            </nav>
        </div>
                
</div>
<?php
if (isset($_GET['id'])) {
    include('../includes/db_connect.php');
   
    $id = $_GET["id"];
    $district_cases = mysqli_query($con, "SELECT * FROM district_cases WHERE id = '$id'");
    $district = mysqli_fetch_assoc($district_cases);
   

    echo '<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function(){
            $("#Editdistrict_status").modal(); 
        });
    </script>
        ';
    echo '
<!-- Edit district modal -->
<div class="modal fade" id="Editdistrict_status" tabindex="-1"role="dialog" aria-labelledby="EditdistrictModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit District Cases</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="partials/admin_db.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">District Id :</label>
                        <input type="text" class="form-control" name="edit_id" value="'.$id.'" readonly>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">State Code :</label>
                        <input type="text" class="form-control" placeholder="Enter the State Code" name="edit_statecode" id="edit_statecode" value="'.$district['state_code'].'">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">District Name :</label>
                        <input type="text" class="form-control" placeholder="Enter the District Name" name="edit_dis" id="edit_dis" value="'.$district['districts'].'">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Confirmed Cases :</label>
                        <input type="text" class="form-control" placeholder="Enter the Confirmed Cases" name="edit_confirmed" id="edit_confirmed" value="'.$district['confirmed'].'">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Male Cases :</label>
                        <input type="text" class="form-control" placeholder="Enter the Male Cases" name="edit_male" id="edit_male" value="'.$district['male'].'">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Female Cases :</label>
                        <input type="text" class="form-control" placeholder="Enter the Female Cases" name="edit_female" id="edit_female" value="'.$district['female'].'">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Active Cases :</label>
                        <input type="text" class="form-control" placeholder="Enter the Active Cases" name="edit_active" id="edit_active" value="'.$district['active'].'">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Recovered Cases :</label>
                        <input type="text" class="form-control" placeholder="Enter the Recovered Cases" name="edit_recovered" id="edit_recovered" value="'.$district['recovered'].'">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Death Cases :</label>
                        <input type="text" class="form-control" placeholder="Enter the Death Cases" name="edit_death" id="edit_death" value="'.$district['death'].'">
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"name="update_covid_data">Update data</button>
                </div>
            </form>
            </div>
        </div>
        </div>';
}
?>
<script>
	function Delete_covid(){
		return confirm('Are You Sure You Want Delete this district');
	}
	</script>
<?php include('partials/admin-footer.php');?>
