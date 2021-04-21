<?php include 'header.php';
?>
<div id="page-wrapper">

    <div class="row">
        <!--  page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Plugins</h1>

            <?php
            if ($this->session->flashdata('plugin')){
                echo '<div class="alert alert-'.$this->session->flashdata("class").' alert-dismissable">
                        <button type="button" class="close alert-link" data-dismiss="alert" aria-hidden="true">×</button>
                        '.$this->session->flashdata("plugin").'
                    </div>';
            };?>
        </div>
        <!-- end page header -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#repoModelInsert">Add New
                        plugin
                    </button>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th class="text-center">Plugin Name</th>
                                <th class="text-center">Version</th>
                                <th class="text-center">Size</th>
                                <th class="text-center">Licence</th>
                                <th class="text-center">Last Updated</th>
                                <th class="text-center"> Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($all_data as $value) { ?>
                                <tr class="odd gradeX">
                                    <td class="text-center"><a href="" onclick="manage_data(<?= $value->plugin_id; ?>)"><?= $value->title; ?></a>
                                    </td>
                                    <td class="text-center"><?= $value->version; ?></td>
                                    <td class="text-center"><?php if(!empty($value->plugin_size)){ echo sprintf ("%.2f", $value->plugin_size/1024);}?> MB</td>
                                    <td class="text-center"><?= $value->secret_key; ?></td>
                                    <td class="text-center"><?=$value->last_updated; ?></td>
                                    <td class="text-center tooltip-demo" style="min-width: ">
                                        <button onclick="manage_data(<?= $value->plugin_id; ?>)" type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Expand Plugin"><i class="fa fa-expand"></i></button>
                                        <button onclick="edit_data(<?= $value->plugin_id; ?>)" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#repoModelEdit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></button>
                                        <?= form_open('Plugins/delete/' . $value->plugin_id, 'onsubmit="return confirm(\'Are you sure you want to delete this Plugin?\');" style="display: inline-block;"') . form_hidden('plugin_id', $value->plugin_id) . '<button type="submit"  class="btn btn-danger btn-sm" data-target="#repoModelEdit" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete" ><i class="fa fa-trash-o"></i></button>' . form_close(); ?>
                                    </td>
                                </tr>
                            <?php } ?>
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

    //Manage Data
    function manage_data(id) {
        $.post("manage_data/" + id, {'id': id}, function (data) {
            window.location = '<?=site_url("plugins/view");?>';
        });
    }

    // Edit Data
    function edit_data(id) {
        $.post("ajax_edit/" + id, {'id': id}, function (data) {
            obj = JSON.parse(data);
            $('[name="id"]').val(obj.plugin_id);
            $('[name="title"]').val(obj.title);
            $('[name="description"]').val(obj.description);
            $('[name="requires"]').val(obj.requires);
            $('[name="homepage"]').val(obj.homepage);
            //alert(obj.homepage);
        });
    }

</script>


<!--============= Add new Plugin ================-->
<!-- Modal -->
<div class="modal fade" id="repoModelInsert" role="dialog">
    <div class="modal-dialog modal-md">
        <?php echo form_open('plugins/create', 'class="form-horizontal"'); ?>
        <div class="modal-content">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New plugins</h4>
            </div>
            <div class="modal-body">

                <!-- <form class="form-horizontal"> -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">Your Plugin Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                        <p>Same as your plugins name</p>
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
                        <input type="text" name="requires" class="form-control input-sm" id="requires">
                        <p>Minimum WordPress version (e.g. 3.4)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="url">
                        Homepage URL:</label>
                    <div class="col-sm-10">
                        <input type="text" name="homepage" class="form-control" id="url" placeholder="Enter plugin url">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" name="save_plugins" class="btn btn-info">Save plugins</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- End Modal -->

<!--============= Edit Plugin ================-->
<!-- Modal -->
<div class="modal fade" id="repoModelEdit" role="dialog">
    <div class="modal-dialog modal-md">
        <?php echo form_open('plugins/update', 'class="form-horizontal"'); ?>
        <div class="modal-content">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit plugins</h4>
            </div>
            <div class="modal-body">
                <?php //echo form_hidden('id', '');?>
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                    <?= form_label('Plugins Name:', 'title', array('class' => 'control-label col-sm-2')); ?>
                    <div class="col-sm-10">
                        <?= form_input('title', '', 'type="text" class="form-control" id="title" placeholder="Enter Title"') ?>
                        <?=form_error('title');?>
                        <p>Same as your plugins name</p>
                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Description:', 'description', array('class' => 'control-label col-sm-2')); ?>
                    <div class="col-sm-10">
                        <?= form_textarea('description', '', 'id="description" name="" class="form-control" rows="3"'); ?>
                        <?=form_error('description');?>
                        <p>Displayed when a user clicks "Show version X details" in WordPress</p>
                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Requires:', 'Requires', array('class' => 'control-label col-sm-2')); ?>
                    <div class="col-sm-10">
                        <?= form_input('requires', '', 'class="form-control input-xs" id="requires" placeholder="3.4" style="width: 100px;"'); ?>
                        <?=form_error('requires');?>
                        <p>Minimum WordPress version (e.g. 4.0)</p>
                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('plugins URL:', 'url', array('class' => 'control-label col-sm-2')); ?>
                    <div class="col-sm-10">
                        <?=form_input('homepage', '', 'class="form-control" id="url" placeholder="http://example.com"'); ?>
                        <?=form_error('homepage');?>
                        <p>Displayed when a user clicks "Show version X details" in WordPress. If none is provided we
                            will show a changelog instead.</p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <?= form_submit('', 'Update plugins', 'class="btn btn-info"'); ?>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        <?= form_close(); ?>
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
                <h4 class="modal-title">Add New version of plugins</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('plugins/update', 'class="form-horizontal"'); ?>
                <!-- <form class="form-horizontal"> -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="file_dir">plugin input</label>
                    <div class="col-sm-10">
                        <input type="file" name="file_dir" id="file_dir">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="readme_text">
                        Readme.txt:</label>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label><input name="readme_text" type="checkbox">Use the readme.txt for the details
                                displayed when a user clicks "Show version X details" in WordPress</label>
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
                        <input type="text" name="requires" class="form-control input-sm" id="requires">
                        <p>Minimum WordPress version (e.g. 3.4)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="url">
                        plugins URL:</label>
                    <div class="col-sm-10">
                        <input type="text" name="url" class="form-control" id="url" placeholder="Enter plugin url">
                        <p>Displayed when a user clicks "Show version X details" in WordPress. If none is provided we
                            will show a changelog instead.</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-info btn-lg">Update plugins</button>
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


<?php include 'footer.php'; ?>
     
