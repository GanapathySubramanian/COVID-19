<?php include('partials/admin-nav.php');?>
<div id="rejecteduser">
<?php
    if(isset($_POST['search']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM `user_reg` WHERE status='2' AND CONCAT(fullname,email) LIKE '%".$valueToSearch."%'";
        $search_result = filterTable($query);
    }
    else {
        $query = "SELECT * FROM `user_reg` WHERE status='2' ";
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
<div id="rejecteduser">

    <nav class="navbar navbar-light">
        <a class="navbar-brand text-primary font-weight-bold" href="#"><h3>Rejected Users</h3></a>
        <form class="d-flex"  action="" method="POST" autocomplete="off">
            <input class="form-control me-2" type="search" name="valueToSearch" placeholder="Value To Search" aria-label="Search">
            <button class="btn ml-2 btn-primary" type="submit" name="search">Search</button>
        </form>
    </nav>
<label class="text-primary font-weight-bold"> Select No.of.rows to display :</label>
  <select class  ="form-control" name="state" id="maxRows">
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
                   
                    <th>FULLNAME</th>
                    <th>EMAIL</th>
                    <th>PHONENUMBER</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <?php 
           
            while($row = mysqli_fetch_array($search_result)):
           
            ?>
                <tr>
                    
                    <td><?php echo $row['fullname']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['phoneno']?></td>
                    <td>
                        <form method="POST" action='partials/admin_db.php'>
		                    <input type='hidden' name='user_id' value='<?php echo $row['user_id'] ?>'/>
                            <?php
		                        if($row['status']==2)  
                                {				
                                    echo "<input class='btn btn-success btn-sm' type='submit' style='outline:none' name='user_accept'   value='ACCEPT'/>";
                                    echo "<input class='btn btn-danger ml-2 btn-sm' type='submit' style='outline:none' name='user_delete'  onclick='return Delete_user();' value='DELETE'/>";
					            }
				            ?>
			            </form>             
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
    <script>
	function Delete_user(){
		return confirm('Are You Sure You Want Delete this user');
	}
	</script>
<?php include('partials/admin-footer.php');?>
