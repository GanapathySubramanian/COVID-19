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
    <div class="table-responsive">
        <table class="content-table table">
            <thead>
                <tr>
                    <th>SNO</th>
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
            $count=0;
            while($row = mysqli_fetch_array($search_result)):
            $count+=1;
            ?>
                <tr>
                    <td><?php echo $count;?></td>
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
                        <form method="POST" action='edit_covid.php'>
                            <input type='hidden' name='id' value='<?php echo $row['id'] ?>'/>
                            <input type='hidden' name='s_c' value='<?php echo $row['state_code'] ?>'/>
                            <input type='hidden' name='dis' value='<?php echo $row['districts'] ?>'/>
                            <input type='hidden' name='confirm' value='<?php echo $row['confirmed'] ?>'/>
                            <input type='hidden' name='male' value='<?php echo $row['male'] ?>'/>
                            <input type='hidden' name='female' value='<?php echo $row['female'] ?>'/>
                            <input type='hidden' name='active' value='<?php echo $row['active'] ?>'/>
                            <input type='hidden' name='recovered' value='<?php echo $row['recovered'] ?>'/>
                            <input type='hidden' name='death' value='<?php echo $row['death'] ?>'/>
                            <?php
                            echo "<input class='btn btn-primary btn-sm' type='submit' style='outline:none' name='covid_edit'  value='Edit'/>";
                            ?>
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

</div>

<script>
	function Delete_covid(){
		return confirm('Are You Sure You Want Delete this district');
	}
	</script>
<?php include('partials/admin-footer.php');?>