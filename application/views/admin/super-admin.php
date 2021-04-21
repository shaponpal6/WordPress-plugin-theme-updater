<?php include 'header.php'; ?>

    <!--  page-wrapper -->
    <div id="page-wrapper">

        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12">
                <h1 class="page-header">Super Admin Dashboard</h1>
            </div>
            <!--End Page Header -->
        </div>

        <?php
        if ($this->session->flashdata('supports')) {
            echo '<div class="alert alert-' . $this->session->flashdata("class") . ' alert-dismissable">
                        <button type="button" class="close alert-link" data-dismiss="alert" aria-hidden="true">×</button>
                        ' . $this->session->flashdata("supports") . '
                    </div>';
        }; ?>

        <div class="row">
            <!-- Welcome -->
            <div class="col-lg-12">
                <div class="alert alert-info">
                    <i class="fa fa-folder-open"></i><b>&nbsp;Hello! </b>Super Admin
                    <b><?php echo $this->session->userdata('userName'); ?>!</b>
                </div>
            </div>
            <!--end  Welcome -->
        </div>
        <div class="row">
            <!--quick info section -->

            <div class="col-lg-3">
                <div class="alert alert-success text-center">
                    <i class="fa  fa-calendar fa-3x"></i>
<!--                    <img src=""-->
<!--                    style=" width: 68px; position: absolute;left: 13px;top: 2px;}"/>-->
                    &nbsp; Total items <b style="font-size: 33px;"><?= $admin['total_products']; ?> </b>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="alert alert-info text-center">
                    <i class="fa fa-rss fa-3x"></i>&nbsp; Total Themes <b style="font-size: 33px;"><?= $admin['total_themes']; ?></b>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="alert alert-warning text-center">
                    <i class="fa  fa-pencil fa-3x"></i>&nbsp; Total Plugin <b style="font-size: 33px;"><?= $admin['total_plugins']; ?></b>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="alert alert-danger text-center">
                    <i class="fa fa-beer fa-3x"></i>&nbsp; Total Earn <b style="font-size: 33px;">$<?= $admin['total_sell']; ?></b>

                </div>
            </div>
            <!--end quick info section -->
        </div>

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
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Topic</th>
                                    <th class="text-center">Message</th>
                                    <th class="text-center">Created</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Replay</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($supports as $value):?>
                                    <tr class="odd gradeX">
                                        <td class="text-center"><?=$value->support_id;?></td>
                                        <td class="text-center"><?=$value->ticket;?></td>
                                        <td class="text-center"><?=$value->name;?></td>
                                        <td class="text-center"><?=$value->email;?></td>
                                        <td class="text-center"><?=$value->topic;?></td>
                                        <td class="text-center"><?=$value->description;?></td>
                                        <td class="text-center"><?=$value->created;?></td>
                                        <td class="text-center"><?php if($value->status==1){echo '<button type="button" class="btn btn-success btn-sm">Open</button>';}else{echo '<button type="button" class="btn btn-info btn-sm">Close</button>';}?></td>
                                        <td class="text-center">
                                            <?=form_open('supports/view_message/'.ltrim($value->ticket,'#'));?>
                                            <button type="submit" class="btn btn-info btn-sm"> Replay</button>
                                            <?=form_close();?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->



            </div>
        </div>


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
                            <th class="text-center">State</th>
                            <th class="text-center">Country</th>
                            <th class="text-center">Country code</th>
                            <th class="text-center">Continent</th>
                            <th class="text-center">Continent code</th>
                            <th class="text-center">Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $counter=1;
                        foreach ($ip_list as $ip): ?>
                            <tr class="odd gradeX">
                                <td class="text-center"><?=$counter;?></td>
                                <td class="text-center"><?=$ip->ip_address;?></td>
                                <td class="text-center"><?=$ip->city;?></td>
                                <td class="text-center"><?=$ip->state;?></td>
                                <td class="text-center"><?=$ip->country_code;?></td>
                                <td class="text-center"><?=$ip->country;?></td>
                                <td class="text-center"><?=$ip->continent;?></td>
                                <td class="text-center"><?=$ip->continent_code;?></td>
                                <td class="text-center"><?=$ip->updated_time;?></td>

                            </tr>
                            <?php $counter += 1;
                        endforeach;?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->

        <!--End IP List Tables -->




    </div>
    <!-- end page-wrapper -->

<?php include 'footer.php';