<?php include "header.php";?>

  <div id="page-wrapper">
    <div class="row">
         <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Add New Plugin</h1>
        </div>
        <!--end page header -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    WordPress Plugin
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form">
                                <div class="form-group">
                                    <label>Name</label>
                                    <label>
                                        <input class="form-control" placeholder="Same as your theme/plugin name">
                                    </label>
                                    <p>Same as your theme/plugin name</p>
                                </div>
                                
                                <div class="form-group">
                                    <label>File input</label>
                                    <input type="file">
                                </div>
                                <div class="form-group">
                                    <label>Text area</label>
                                    <textarea class="form-control" rows="3" placeholder="Displayed when a user clicks - Show version X details in WordPress"></textarea>
                                </div>
                               
                                <div class="form-group">
                                    <label>Inline Checkboxes</label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox">Use the readme.txt for the details displayed when a user clicks "Show version X details" in WordPress
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit Button</button>
                                <button type="reset" class="btn btn-success">Reset Button</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
             <!-- End Form Elements -->
        </div>
    </div>
</div>
<!-- end page-wrapper -->
<?php include 'footer.php';?>