<?php include('partials/admin-nav.php');?>

<?php
    if(isset($_POST['search']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM `user_reg` WHERE status='0' AND CONCAT(fullname,email) LIKE '%".$valueToSearch."%'";
        $search_result = filterTable($query);
    }
    else {
        $query = "SELECT * FROM `user_reg` WHERE status='0' ";
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
<div id="newuser">

    <nav class="navbar navbar-light">
        <a class="navbar-brand text-primary font-weight-bold" href="#"><h3>New Users</h3></a>
        <form class="d-flex"  action="" method="POST" autocomplete="off">
            <input class="form-control me-2" type="search" name="valueToSearch" placeholder="Value To Search" aria-label="Search">
            <button class="btn ml-2 btn-primary" type="submit" name="search">Search</button>
        </form>
    </nav>

    <div class="table-responsive">
        <table class="content-table table">
            <thead>
                <tr>
                    <th>SNO</th>
                    <th>FULLNAME</th>
                    <th>EMAIL</th>
                    <th>PHONENUMBER</th>
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
                    <td><?php echo $row['fullname']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['phoneno']?></td>
                    <td>
                        <form method="POST" action='partials/admin_db.php'>
		                    <input type='hidden' name='user_id' value='<?php echo $row['user_id'] ?>'/>
                            <?php
		                        if($row['status']==0)  
                                {				
                                    echo "<input class='btn btn-success btn-sm' type='submit' style='outline:none' name='user_accept'   value='ACCEPT'/>";
				                    echo "<input  class='btn btn-danger ml-2 btn-sm' type='submit' style='outline:none;' name='user_reject'  onclick='return Reject_user();' value='REJECT' />";
					            }
				            ?>
			            </form> 
                    </td>
                </tr>
                <?php endwhile;?>
                </table> 
            </div>
</div>
    <script>
	function Reject_user(){
		return confirm("Are You Sure You Want Reject this user's request");
	}
	</script>

<?php include('partials/admin-footer.php');?>
