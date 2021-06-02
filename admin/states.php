<?php include('partials/admin-nav.php');?>
<?php include('partials/states_insert.php');?>
<?php
    if(isset($_POST['search']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM `state_cases` WHERE  CONCAT(`state_code`,`country_code`,`states`) LIKE '%".$valueToSearch."%' order by id";
        $search_result = filterTable($query);
    }
    else {
        $query = "SELECT * FROM `state_cases` order by id";
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
<div id="statestatus">

<nav class="navbar navbar-light">
        <a class="navbar-brand text-primary font-weight-bold" href="#"><h3>state wise status</h3></a>
        <form class="d-flex">
            <button type="button" class="btn btn-primary ml-1" name="add_state" data-toggle="modal" data-target="#AdddistrictModal" data-whatever="@mdo">Add state</button>
        </form>

        <!-- Add district modal -->
        <div class="modal fade" id="AdddistrictModal" tabindex="-1" role="dialog" aria-labelledby="AdddistrictModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add States - corona cases <br>Before adding state you have to add the corresponding country !!!<br>other corona case details will be added only as district wise</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="partials/admin_db.php">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Country Code (IN for India):</label>
                        <input type="text" class="form-control" name="add_countrycode" id="country-code">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">State Code (TN for TamilNadu):</label>
                        <input type="text" class="form-control" name="add_statecode_c" id="c-state-code">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">State Name:</label>
                        <input type="text" class="form-control" name="add_statename" id="c-state-name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add_state">Add state</button>
                </div>
            </form>
            </div>
        </div>
        </div>


        <form class="d-flex"  action="" method="POST" autocomplete="off">
            <input class="form-control " type="search" name="valueToSearch" placeholder="Value To Search" aria-label="Search">
            <button class="btn btn-primary ml-2" type="submit" name="search">Search</button>
        </form>
    </nav>
    <form method="post" class="ml-3" action="partials/admin_db.php">
		<input type="submit" name="admin_state_export" value="State report" class="btn btn-success mt-3" />
    </form>
    <div class="table-responsive">
        <table class="content-table table">
            <thead>
                <tr>
                    <th>SNO</th>
                    <th>COUNTRY_CODE</th>
                    <th>STATE_CODE</th>
                    <th>STATES</th>
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
                    <td><?php echo $row['country_code']?></td>
                    <td><?php echo $row['state_code']?></td>
                    <td><?php echo $row['states']?></td>
                    <td><?php echo $row['confirmed']?></td>
                    <td><?php echo $row['male']?></td>
                    <td><?php echo $row['female']?></td>
                    <td><?php echo $row['active']?></td>
                    <td><?php echo $row['recovered']?></td>
                    <td><?php echo $row['death']?></td>
                    <td>
                    <div class="d-flex">
                        <form method="POST" action='partials/admin_db.php'>
                            <input type='hidden' name='id' value='<?php echo $row['id'] ?>'/>
                            <?php
                            echo "<input  class='btn btn-danger ml-2 btn-sm' type='submit' style='outline:none;' name='state_covid_delete'  onclick='return Delete_covid();' value='Delete' />";
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
		return confirm('Are You Sure You Want Delete this state');
	}
	</script>
<?php include('partials/admin-footer.php');?>
