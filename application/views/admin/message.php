<?php include 'header.php';
?>
<div id="page-wrapper" xmlns="http://www.w3.org/1999/html">

    <div class="row">
        <!--  page header -->
        <div class="col-lg-12">
            <h1 class="page-header">View Message [Ticket #<?=$topic->ticket;?>]
            <?php //print_r($topic);?>

        <!--    Ticket Close-->
            <?php if ($this->session->userdata('userRules')=='superAdmin') {

                if ($topic->status == 1) {
                    $block = 'Close Now';
                    $class = 'info';
                } else {
                    $block = 'Open Again';
                    $class = 'danger';
                } ?>
                <?= form_open('supports/close_ticket/' . $topic->status,
                    'onsubmit="return confirm(\'Are you sure you want to ' . $block . ' '
                    . $topic->ticket . ' Address for this plugin?\');" style="display:inline-block;"')
                . form_hidden('licence', $topic->ticket)
                . '<button name="ip_blocker" type="submit"  class="btn btn-' . $class . ' btn-lg">' . $block . '</button>'
                . form_close();

            } ?>

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
                    <b><?=$topic->topic;?></b>
                </div>
                <?php
                //print_r($topic);
                ?>

                <div class="panel-body">
                    <div class="form-group">
                        <label id="name0" class="control-label col-sm-2"><?=$topic->name;?></label>
                        <div class="col-sm-10">
                            <p><?=$topic->description;?></p>
                            <p style="float: right;"><?=$topic->created;?></p><hr/>
                        </div>
                    </div>

                    <?php foreach ($message as $replay):?>

                    <div class="form-group">
                        <label class="control-label col-sm-2"><?=$replay->name;?></label>
                        <div class="col-sm-10">
                            <p><?=$replay->message;?></p>
                            <p style="float: right;"><?=$replay->last_updated;?></p><hr/>
                        </div>
                    </div>
                    <?php endforeach;?>

                    <div id="message_body"></div>

                    <?=form_open('supports/replay_message');?>
                        <input type="hidden"  name="ticket" value="<?=$topic->ticket;?>">
                        <input type="hidden" name="name"  value="<?=$topic->name;?>">
                        <input type="hidden" name="user_id" value="<?=$topic->user_id;?>">
                        <input type="hidden" name="email" value="<?=$topic->email;?>">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="replay">Replay:</label>
                        <div class="col-sm-10">
                            <textarea name="replay_text" class="form-control" rows="3"></textarea>
                            <button type="submit" style="width: 40%; margin-top: 10px;" class="btn btn-info btn-md"> Replay</button>
                        </div>
                    </div>
                    <?=form_close();?>

                </div>
            </div>
            <!--End Advanced Tables -->


        </div>
    </div>

</div>






<?php include 'footer.php'; ?>
     
