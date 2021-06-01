<?php include('partials/admin-nav.php');?>
<div id="uploadcsv">
            
                <form class="form-horizontal" action="partials/admin_db.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
                        <!-- Form Name -->
                        <legend class="text-primary font-weight-bold text-center">Upload CSV file here</legend>
                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="admin_Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <h3 class="text-primary">The uploded file  format and the column arrangement must be like this </h3>
            <img src="../assets/img/csv.png" alt="">
        </div>
<?php include('partials/admin-footer.php');?>