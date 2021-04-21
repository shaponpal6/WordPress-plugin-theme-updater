<?php include 'header.php';
?>
<div id="page-wrapper" xmlns="http://www.w3.org/1999/html">

    <div class="row">
        <!--  page header -->
        <div class="col-lg-12">
            <h1 class="page-header"><?= $single_data->title; ?></h1>
        </div>
        <!-- end page header -->
    </div>
    <?php
    if ($this->session->flashdata('plugin')) {
        echo '<div class="alert alert-' . $this->session->flashdata("class") . ' alert-dismissable">
                        <button type="button" class="close alert-link" data-dismiss="alert" aria-hidden="true">×</button>
                        ' . $this->session->flashdata("plugin") . '
                    </div>';
    }; ?>


    <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="tooltip-demo">
                        <button type="button" onclick="new_version_data(<?= $single_data->plugin_id; ?>)"
                                class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal_new_version">Add
                            New Version
                        </button>
                        <button type="button" onclick="add_more_feature(<?= $single_data->plugin_id; ?>)"
                                class="btn btn-warning btn-sm" data-toggle="modal" data-target="#add_more_feature">Add
                            More Info
                        </button>
                        <button type="button" class="btn btn-outline btn-primary btn-sm" data-toggle="tooltip"
                                data-placement="top" title=""
                                data-original-title="Licences Key"><?= $single_data->secret_key; ?></button>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example222">
                            <thead>
                            <tr>
                                <th class="text-center">Version</th>
                                <th class="text-center">Uploaded</th>
                                <th class="text-center">Filename</th>
                                <th class="text-center">Tested</th>
                                <th class="text-center">Size</th>
                                <th class="text-center">Current version Download</th>
                                <th class="text-center">Download</th>
                                <th class="text-center"> Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="odd gradeX">
                                <td class="text-center"><?= $single_data->version; ?></td>
                                <td class="text-center"><?= $single_data->last_updated; ?></td>
                                <td class="text-center"><?= $single_data->plugin_file_name; ?></td>
                                <td class="text-center">
                                    <?php if ($single_data->tested) {
                                        echo 'WordPress ';
                                        echo $single_data->tested;
                                    } ?>
                                </td>
                                <td class="text-center"><?php if (!empty($single_data->plugin_size)) {
                                        echo sprintf("%.2f", $single_data->plugin_size / 1024);
                                    } ?>MB
                                </td>
                                <td class="text-center"><?= $current_version_download ?></td>
                                <td class="text-center"><?= $download ?></td>
                                <td class="text-center" style="min-width: 204px;">
                                    <?= form_open('Downloader/updated_file_download/' . $single_data->secret_key , 'style="display:inline-block;"') . '<button type="submit" class="btn btn-success btn-sm">Download</button>' . form_close(); ?>
                                    <button onclick="new_version_data(<?= $single_data->plugin_id; ?>)" type="button"
                                            class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#myModal_edit_version">Edit
                                    </button>
                                    <?= form_open('Plugins/delete/' . $single_data->plugin_id, 'onsubmit="return confirm(\'Are you sure you want to delete this Plugin?\');" style="display:inline-block;"') . form_hidden('plugin_id', $single_data->plugin_id) . '<button type="submit"  class="btn btn-danger btn-sm">Delete</button>' . form_close(); ?>

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
            <!-- IP List Tables -->

            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>IP Address List</b>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">IP Address</th>
                                <th class="text-center">City</th>
                                <th class="text-center">state</th>
                                <th class="text-center">Country</th>
                                <th class="text-center">country_code</th>
                                <th class="text-center">continent</th>
                                <th class="text-center">continent_code</th>
                                <th class="text-center">Version</th>
                                <th class="text-center">Downloads</th>
                                <th class="text-center"> Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $counter = 1;
                            foreach ($ip as $ip): ?>
                                <tr class="odd gradeX">
                                    <td class="text-center"><?= $counter; ?></td>
                                    <td class="text-center"><?= $ip->ip_address; ?></td>
                                    <td class="text-center"><?= $ip->city; ?></td>
                                    <td class="text-center"><?= $ip->state; ?></td>
                                    <td class="text-center"><?= $ip->country; ?></td>
                                    <td class="text-center"><?= $ip->country_code; ?></td>
                                    <td class="text-center"><?= $ip->continent; ?></td>
                                    <td class="text-center"><?= $ip->continent_code; ?></td>
                                    <td class="text-center"><?= $ip->version; ?></td>
                                    <td class="text-center"><?= $ip->download; ?></td>
                                    <td class="text-center">
                                        <?php if ($ip->status == 0) {
                                            $block = 'Unblock';
                                            $class = 'danger';
                                        } else {
                                            $block = 'Block';
                                            $class = 'info';
                                        } ?>
                                        <?= form_open('plugins/ip_blocker/' . $ip->status,
                                            'onsubmit="return confirm(\'Are you sure you want to ' . $block . ' '
                                            . $ip->ip_address . ' Address for this plugin?\');" style="display:inline-block;"')
                                        . form_hidden('licence', $single_data->secret_key)
                                        . form_hidden('ip_address', $ip->ip_address)
                                        . '<button name="ip_blocker" type="submit"  class="btn btn-' . $class . ' btn-sm">' . $block . '</button>'
                                        . form_close(); ?>

                                    </td>
                                </tr>
                                <?php $counter += 1;
                            endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->

            <!--End IP List Tables -->
            <div class="version_crl_sec">
                <h2>Plugin Code</h2>
                <p>To setup your Plugin with WP Updates please follow these steps:</p>
                <ol>
                    <?php
                    $this->load->library('RepositoryHelper');
                    $repo = new RepositoryHelper();
                    $WinnRepo = 'WinnRepo' . $repo->slug_space($single_data->title) . 'PluginUpdater';
                    $id = $single_data->plugin_id; ?>

                    <li>
                        <div
                            class="tooltip-demo"><?= form_open('Downloader/plugin_auto_update_class_download/' . $id . '/' . $WinnRepo) . form_hidden('plugin_id', $id) . 'Download the <button type="submit" class="btn btn-outline btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download file with Licences Key."> ' . $WinnRepo . ' class  </button> to your Plugin\'s root folder.' . form_close(); ?></div>
                    </li>
                    <li>Open up your Plugin's main file and insert the following code:
                        <pre style="padding: 0px;background: #333;color: #fff;">
                        <code style="">
                            <span
                                style="float: left;margin-left: 14px;font-size: 14px;">require_once( '<?= $WinnRepo; ?>.php' );</span>
                           <span style="float: left;margin-left: 14px;font-size: 14px;">new <?= $WinnRepo; ?>(  '<?= base_url(); ?>WinnRipo', '<?= $single_data->secret_key; ?>' );</span>
                        </code>
                    </pre>
                    </li>
                    <li>Thats it!</li>
                </ol>
            </div>

        </div>
    </div>

</div>
<!-- end page-wrapper -->
<script type="text/javascript">

    // New version
    function new_version_data(id) {
        $(".new_class").val(id)
        $.post("ajax_edit/" + id, {'id': id}, function (data) {
            obj = JSON.parse(data);
            $('[name="version"]').val(obj.version);
            $('[name="changelog"]').val(obj.changelog);
            $('[name="tested"]').val(obj.tested);
            $('[name="php_file_url"]').val(obj.php_file_url);
        });
    }
    // Advance options
    function add_more_feature(id) {
        $(".hidden_id2").val(id);
        $.post("ajax_edit/" + id, {'id': id}, function (data2) {
            obj2 = JSON.parse(data2);
            //$('[name="id"]').val(obj2.id);
            $('[name="title"]').val(obj2.title);
            $('[name="banners"]').val(obj2.banners);
            $('[name="author"]').val(obj2.author);
            $('[name="author_homepage"]').val(obj2.author_homepage);
            $('[name="installation"]').val(obj2.installation);
            $('[name="php_file_url"]').val(obj2.php_file_url);
        });
    }

    // Delete data
    function delete_version_data(id) {
        if (confirm('Are you sure you want to delete this thing into the database?')) {
            $.post("sp_check_before_delete_ok_jdhfj/" + id, {'id': id}, function (data) {
                window.location = '<?=site_url("plugins/delete");?>';
            });
        } else {
            // Do nothing!
        }
    }

</script>

<!-- Modal -->
<!--Add New version of plugins<-->
<div class="modal fade" id="myModal_new_version" role="dialog">
    <div class="modal-dialog modal-md">
        <?php echo form_open_multipart('Plugins/add_new_version', 'class="form-horizontal"'); ?>

        <div class="modal-content">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New version of plugins</h4>
            </div>
            <div class="modal-body">

                <input type="hidden" name="id" class="new_class" value="">
                <input type="hidden" name="php_file_url" value="">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="download_url">File :</label>
                    <div class="col-sm-10">
                        <input type="file" name="download_url" id="download_url" size="20">
                        <p>Make sure the zip filename is the same as the plugin folder name (i.e. no version
                            numbers)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="version">
                        Version:</label>
                    <div class="col-sm-10">
                        <input type="text" name="version" size="30" class="form-control input-sm" id="version">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="changelog">Changelog:</label>
                    <div class="col-sm-10">
                        <textarea name="changelog" class="form-control" rows="3" id="changelog"></textarea>
                        <p>Displayed when a user clicks "Show version X details" in WordPress</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="tested">Tested:</label>
                    <div class="col-sm-10">
                        <input type="text" name="tested" size="30" class="form-control" id="tested" placeholder="">
                        <p>The most recent version of WordPress the plugin is compatible with</p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" name="add_new_version" class="btn btn-info">Add New Version</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- End Modal -->

<!--Add more feature of plugins<-->
<div class="modal fade" id="add_more_feature" role="dialog">
    <div class="modal-dialog modal-md">
        <?php echo form_open_multipart('plugins/add_more_feature', 'class="form-horizontal"'); ?>

        <div class="modal-content">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add more info in plugin update page.</h4>
            </div>
            <div class="modal-body">

                <input type="hidden" name="id" class="hidden_id2" value="">
                <input type="hidden" name="title" class="hidden_title" value="">
                <input type="hidden" name="php_file_url" value="">
<!--                <div class="form-group">-->
<!--                    <label class="control-label col-sm-2" for="banners">Banners :</label>-->
<!--                    <div class="col-sm-10">-->
<!--                        <input type="file" name="banners" id="banners">-->
<!--                        <p>Banners size will be <b>772 x 250</b> to fit in plugin update page.</p>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="author">
                        Author:</label>
                    <div class="col-sm-10">
                        <input type="text" name="author" size="30" class="form-control input-sm" id="author">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="author_homepage">
                        Author Homepage:</label>
                    <div class="col-sm-10">
                        <input type="text" name="author_homepage" size="30" class="form-control input-sm"
                               id="author_homepage">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="installation">Installation:</label>
                    <div class="col-sm-10">
                        <textarea name="installation" class="form-control" rows="3" id="installation"></textarea>
                        <p>Displayed when a user clicks "Show version X details" in WordPress</p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" name="add_new_version" class="btn btn-info">Add More Info</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- End Modal -->

<!--============= Edit Plugin ================-->
<!-- Modal -->
<div class="modal fade" id="myModal_edit_version" role="dialog">
    <div class="modal-dialog modal-md">
        <?php echo form_open_multipart('plugins/add_new_version', 'class="form-horizontal"'); ?>

        <div class="modal-content">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New version of plugins</h4>
            </div>
            <div class="modal-body">

                <input type="hidden" name="id" class="new_class" value="">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="download_url">File :</label>
                    <div class="col-sm-10">
                        <input type="file" name="download_url" id="download_url">
                        <p>Make sure the zip filename is the same as the plugin folder name (i.e. no version
                            numbers)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="version">
                        Version:</label>
                    <div class="col-sm-10">
                        <input type="text" name="version" size="30" class="form-control input-sm" id="version">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="changelog">Changelog:</label>
                    <div class="col-sm-10">
                        <textarea name="changelog" class="form-control" rows="3" id="changelog"></textarea>
                        <p>Displayed when a user clicks "Show version X details" in WordPress</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="tested">Tested:</label>
                    <div class="col-sm-10">
                        <input type="text" name="tested" size="30" class="form-control" id="tested" placeholder="">
                        <p>The most recent version of WordPress the plugin is compatible with</p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" name="add_new_version" class="btn btn-info">Add New Version</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- End Modal -->


<?php include 'footer.php'; ?>
     
