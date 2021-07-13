<?php include('partials/admin-nav.php');?>
<?php include('partials/states_insert.php');?>
<?php include('partials/countrys_insert.php');?>
<?php
    if(isset($_POST['search']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM `country_cases` WHERE  CONCAT(`country`,`country_code`) LIKE '%".$valueToSearch."%' order by id";
        $search_result = filterTable($query);
    }
    else {
        $query = "SELECT * FROM `country_cases` order by id";
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
<div id="countrystatus">
    

    <nav class="navbar navbar-light">
        <a class="navbar-brand text-primary font-weight-bold" href="#"><h3>country wise status</h3></a>
        <form class="d-flex">
            <button type="button" class="btn btn-primary ml-1" name="add_country" data-toggle="modal" data-target="#AdddistrictModal" data-whatever="@mdo">Add country</button>
        </form>

        <!-- Add district modal -->
        <div class="modal fade" id="AdddistrictModal" tabindex="-1" role="dialog" aria-labelledby="AdddistrictModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add country - corona cases <br> other corona case details will be added only as district wise</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="partials/admin_db.php">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">County Code(IN for India):</label>
                        <input type="text" class="form-control" name="add_countrycode_c" id="country-code">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Country Name:</label>
                        <input type="text" class="form-control" name="add_countryname" id="disctrict-name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add_country">Add Country</button>
                </div>
            </form>
            </div>
        </div>
        </div>


        <form class="d-flex"  action="" method="POST" autocomplete="off">
            <input class="form-control" type="search" name="valueToSearch" placeholder="Value To Search" aria-label="Search">
            <button class="btn btn-primary ml-2" type="submit" name="search">Search</button>
        </form>
    </nav>
    <form method="post" class="ml-3" action="partials/admin_db.php">
		<input type="submit" name="admin_country_export" value="Country report" class="btn btn-success mt-3" />
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
                   
                    <th>COUNTRY_CODE</th>
                    <th>COUNTRY</th>
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
                    <td><?php echo $row['country_code']?></td>
                    <td><?php echo $row['country']?></td>
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
                            echo "<input  class='btn btn-danger ml-2 btn-sm' type='submit' style='outline:none;' name='country_covid_delete'  onclick='return Delete_covid();' value='Delete' />";
                            ?>
                        </form>
                    </div>   
                </td>
            </tr>
                <?php endwhile; ?>
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

<script>
	function Delete_covid(){
		return confirm('Are You Sure You Want Delete this country');
	}
	</script>
<?php include('partials/admin-footer.php');?>
