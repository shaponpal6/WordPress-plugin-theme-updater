<?php include 'header.php';
?>
<div id="page-wrapper" xmlns="http://www.w3.org/1999/html">

    <div class="row">
        <!--  page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Support Center
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#support" onclick="support_id()"
                 >Create New Ticket</button>
            </h1>
        </div>
        <!-- end page header -->
    </div>
    <?php
    if ($this->session->flashdata('supports')) {
        echo '<div class="alert alert-' . $this->session->flashdata("class") . ' alert-dismissable">
                        <button type="button" class="close alert-link" data-dismiss="alert" aria-hidden="true">×</button>
                        ' . $this->session->flashdata("supports") . '
                    </div>';
    }; ?>
    <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>All Messages</b>
                </div>
                <?php //print_r($all_data);?>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Ticket</th>
<!--                                <th class="text-center">Name</th>-->
<!--                                <th class="text-center">Email</th>-->
                                <th class="text-center">Topic</th>
                                <th class="text-center">Message</th>
                                <th class="text-center">Created</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Answer</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $id =1;
                            foreach ($all_data as $value):?>
                                <tr class="odd gradeX">
                                    <td class="text-center"><?=$id;?></td>
                                    <td class="text-center">#<?=$value->ticket;?></td>
<!--                                    <td class="text-center">--< ?//=$value->name;?><!--</td>-->
<!--                                    <td class="text-center">--< ?//=$value->email;?><!--</td>-->
                                    <td class="text-center"><?=$value->topic;?></td>
                                    <td class="text-center"><?=$value->description;?></td>
                                    <td class="text-center"><?=$value->created;?></td>
                                    <td class="text-center"><?php if($value->status==1){echo '<button type="button" class="btn btn-success btn-sm">Open</button>';}else{echo '<button type="button" class="btn btn-danger btn-sm">Close</button>';}?></td>
                                    <td class="text-center">
                                        <?=form_open('supports/view_message/'.ltrim($value->ticket,'#'));?>
                                        <button type="submit" class="btn btn-warning btn-sm"> Answer</button>
                                        <?=form_close();?>
                                    </td>
                                </tr>
                            <?php $id ++; endforeach;?>
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
    function aaa(id) {
        console.log(id);
    }

    // New version
    function replay_message(id) {
        //$(".new_class").val(id)
        $.post("ajax_replay_message/" + id, {'licence': id}, function (data) {
            obj = JSON.parse(data);
            console.log(data);
            $('#topic').html(obj.topic.topic);
            $('#ticket').html(obj.topic.ticket);
            $('#name0').html(obj.topic.name);

            $('[name="ticket"]').val(obj.topic.ticket);
            $('[name="name"]').val(obj.topic.name);
            $('[name="user_id"]').val(obj.topic.user_id);
            $('[name="email"]').val(obj.topic.email);

            // Message Body
            $('#message_body').html($body);
            // Body
            var $body =
                '<div class="form-group">' +
                    '<label class="control-label col-sm-2" for="replay">Replay:</label>' +
                    '<div class="col-sm-10">' +
                        '<textarea name="replay_text" class="form-control" rows="3" id="replay"></textarea>' +
                    '</div>' +
                '</div>';


        });
    }

</script>

<!-- Modal -->
<!--Add New version of plugins<-->
<div class="modal fade" id="replay" role="dialog">
    <div class="modal-dialog modal-md">
        <?php echo form_open('supports/replay_message', 'class="form-horizontal"'); ?>

        <div class="modal-content">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span id="user_name"></span>Ticket
                <button id="ticket" type="button" class="btn btn-outline btn-primary btn-sm" data-toggle="tooltip"
                        data-placement="top" title=""
                        data-original-title="Licences Key"></button>
                    <span id="topic"></span>
                </h4>
            </div>
            <div class="modal-body">

                <input type="hidden"  name="ticket" value="">
                <input type="hidden" name="name"  value="">
                <input type="hidden" name="user_id" value="">
                <input type="hidden" name="email" value="">

                <div class="form-group">
                    <label id="name0" class="control-label col-sm-2"></label>
                    <div class="col-sm-10">
                        <p id="message0"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label id="name" class="control-label col-sm-2"></label>
                    <div class="col-sm-10">
                        <p id="message"></p>
                    </div>
                </div>

                <div id="message_body"></div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="replay">Replay:</label>
                    <div class="col-sm-10">
                        <textarea name="replay_text" class="form-control" rows="3" id="replay"></textarea>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" name="replay_btn" class="btn btn-info">Replay</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- End Modal -->





<?php include 'footer.php'; ?>
     
