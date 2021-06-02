<?php include('partials/admin-nav.php');?>
<div id="dashboard" >
                <div class="row">
                    <div class="col-md-12 mt-lg-4 mt-4">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800 text-primary font-weight-bold">Dashboard</h1>
<!--                             <form method="post" align="center" action="partials/admin_db.php">
			                    <input type="submit" name="admin_export" value="Download report" class="btn btn-success mt-3" />
		                    </form> -->
                        </div>
                    </div>
                    <?php include('../c_dashboard.php');?>  
                </div>      
</div>   

<?php include('partials/admin-footer.php');?>
