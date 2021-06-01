<?php include('partials/user-nav.php');?>
<?php include('../admin/partials/countrys_insert.php');?>
<?php
    if(isset($_POST['search']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM `country_cases` WHERE  CONCAT(`country`) LIKE '%".$valueToSearch."%' order by id";
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
                    <th>COUNTRY</th>
                    <th>CONFIRMED</th>
                    <th>MALE</th>
                    <th>FEMLAE</th>
                    <th>ACTIVE</th>
                    <th>RECOVERED</th>
                    <th>DEATH</th>
                </tr>
            </thead>

            <?php 
            $count=0;
            while($row = mysqli_fetch_array($search_result)):
            $count+=1;
            
            ?>

                <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $row['country']?></td>
                    <td><?php echo $row['confirmed']?></td>
                    <td><?php echo $row['male']?></td>
                    <td><?php echo $row['female']?></td>
                    <td><?php echo $row['active']?></td>
                    <td><?php echo $row['recovered']?></td>
                    <td><?php echo $row['death']?></td>
                </tr>
                <?php endwhile; ?>
        </table>
    </div>

</div>

<?php include('partials/user-footer.php');?>