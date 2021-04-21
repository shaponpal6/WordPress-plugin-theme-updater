<?php include 'header.php';
?>
<div id="page-wrapper">
  
    <div class="row">
         <!--  page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Plugins</h1>
        </div>
         <!-- end page header -->
    </div> 
    <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                     <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Plugin</button>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Plugin Name</th>
                                    <th>Current Version</th>
                                    <th>Current Version Size</th>
                                    <th>Current Version Downloads</th>
                                    <th>Total Downloads</th>
                                    <th>   Action   </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($all_data as $value) { ?>                            
                                <tr class="odd gradeX">
                                    <td><?=$value->title;?></td>
                                    <td><center><?=$value->version;?></center></td>
                                    <td><center><?=$value->size;?></center></td>
                                    <td><center><?=$value->downloads;?></center></td>
                                    <td><center><?=$value->total_downloads;?></center></td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal_new_version">New version</button>
                                        <button onclick="edit_data2(<?=$value->id;?>)" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal_edit">Edit</button>
                                        <button onclick="delete_data(<?=$value->id;?>)" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal222">Delete</button>
                                    </td>                               
                                </tr>
                                <?php }?>                              
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>

</div>
<!-- end page-wrapper -->
<script type="text/javascript">
    function edit_data2(id)
    {
        alert('aaaaaaaaaaa--'+id+'++aaaaaaaaaa');
        $.post("ajax_edit/"+id,{'id':id},function(data){
           var obj = JSON.parse(data);
            document.getElementById("demo").innerHTML = "demo "+ obj.title + " " + obj.id;
        });
    }
    
    // Delete data
    function delete_data(id)
    {
        $.post("crud/delete/"+id,{'id':id},function(data){
            alert(data);
            console.log(title);
            //$('[name="title"]').val(data.title);
        });
    }
    
  </script>

 <!--============= Add new Plugin ================-->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header panel-heading">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Plugin</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('crud/create','class="form-horizontal"'); ?>  
          <!-- <form class="form-horizontal"> -->
            <div class="form-group">
              <label class="control-label col-sm-2" for="title">Plugin Name:</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                <p>Same as your plugin name</p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="readme_text">
                Readme.txt:</label>
              <div class="col-sm-10">          
                <div class="checkbox">
                  <label><input name="readme_text" type="checkbox">Use the readme.txt for the details displayed when a user clicks "Show version X details" in WordPress</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="description">
                Description:</label>
              <div class="col-sm-10">
                <textarea name="description" class="form-control" rows="3" id="description"></textarea>       
                <!-- <input type="text" name="description" class="form-control" id="description" placeholder="Enter description"> -->
                <p>Displayed when a user clicks "Show version X details" in WordPress</p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="requires">
                Requires:</label>
              <div class="col-sm-10">          
                <input type="text" name="requires" class="form-control input-sm" id="requires" >
                <p>Minimum WordPress version (e.g. 3.4)</p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="url">
                Plugin URL:</label>
              <div class="col-sm-10">          
                <input type="text" name="url" class="form-control" id="url" placeholder="Enter Theme url">
                <p>Displayed when a user clicks "Show version X details" in WordPress. If none is provided we will show a changelog instead.</p>
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info btn-lg">Save Plugin</button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->

   <!--============= Edit Plugin ================-->
  <!-- Modal -->
  <div class="modal fade" id="myModal_edit" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header panel-heading">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Plugin</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('crud/update','class="form-horizontal"'); ?>  
          <?php  echo form_hidden('id', '');?>
            <div class="form-group">
                <span id="demo"></span>
              <label class="control-label col-sm-2" for="title">Plugin Name:</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" value="">
                <p>Same as your plugin name</p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="readme_text">
                Readme.txt:</label>
              <div class="col-sm-10">          
                <div class="checkbox">
                  <label><input name="readme_text" type="checkbox">Use the readme.txt for the details displayed when a user clicks "Show version X details" in WordPress</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="description">
                Description:</label>
              <div class="col-sm-10">
                <textarea name="description" class="form-control" rows="3" id="description"></textarea>       
                <!-- <input type="text" name="description" class="form-control" id="description" placeholder="Enter description"> -->
                <p>Displayed when a user clicks "Show version X details" in WordPress</p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="requires">
                Requires:</label>
              <div class="col-sm-10">          
                <input type="text" name="requires" class="form-control input-sm" id="requires" >
                <p>Minimum WordPress version (e.g. 3.4)</p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="url">
                Plugin URL:</label>
              <div class="col-sm-10">          
                <input type="text" name="url" class="form-control" id="url" placeholder="Enter Theme url">
                <p>Displayed when a user clicks "Show version X details" in WordPress. If none is provided we will show a changelog instead.</p>
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info btn-lg">Update Plugin</button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->

     <!--============= New version Plugin ================-->
  <!-- Modal -->
  <div class="modal fade" id="myModal_new_version" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header panel-heading">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New version of Plugin</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('crud/update','class="form-horizontal"'); ?>  
          <!-- <form class="form-horizontal"> -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="file_dir">File input</label>
                <div class="col-sm-10">
                    <input type="file" name="file_dir" id="file_dir">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="readme_text">
                Readme.txt:</label>
              <div class="col-sm-10">          
                <div class="checkbox">
                  <label><input name="readme_text" type="checkbox">Use the readme.txt for the details displayed when a user clicks "Show version X details" in WordPress</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="description">
                Description:</label>
              <div class="col-sm-10">
                <textarea name="description" class="form-control" rows="3" id="description"></textarea>       
                <!-- <input type="text" name="description" class="form-control" id="description" placeholder="Enter description"> -->
                <p>Displayed when a user clicks "Show version X details" in WordPress</p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="requires">
                Requires:</label>
              <div class="col-sm-10">          
                <input type="text" name="requires" class="form-control input-sm" id="requires" >
                <p>Minimum WordPress version (e.g. 3.4)</p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="url">
                Plugin URL:</label>
              <div class="col-sm-10">          
                <input type="text" name="url" class="form-control" id="url" placeholder="Enter Theme url">
                <p>Displayed when a user clicks "Show version X details" in WordPress. If none is provided we will show a changelog instead.</p>
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info btn-lg">Update Plugin</button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->


<?php include 'footer.php';?>   
     
<div class="form-group">
    <label>File input</label>
    <input type="file">
</div>     

