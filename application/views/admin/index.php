<?php include 'header.php'; ?>

    <!--  page-wrapper -->
    <div id="page-wrapper">

        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!--End Page Header -->
        </div>

        <div class="row">
            <!-- Welcome -->
            <div class="col-lg-12">
                <div class="alert alert-info">
                    <i class="fa fa-folder-open"></i><b>&nbsp;Hello! </b>Welcome Back
                    <b><?php echo $this->session->userdata('userName'); ?>!</b>
                    <?php //print_r( $admin);?>
                    <?php if (!empty($admin['package'])){
                        echo "You are using <b>".$admin['package']."</b> package and Licence will be end on
                    <b>".$admin['licences_end']."</b>";
                    }else{
                        echo " Your Current Package is empty. Please buy a package. <a href=".base_url('pay/index').">Show all package</a>";
                    }?>
                </div>
            </div>
            <!--end  Welcome -->

        </div>
        <div class="row">
            <!--quick info section -->

            <div class="col-lg-3">
                <div class="alert alert-success text-center">
                    <i class="fa  fa-beer fa-3x"></i>&nbsp; Total items <b style="font-size: 33px;"> <?= $admin['total_product']; ?> </b>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="alert alert-info text-center">
                    <i class="fa fa-rss fa-3x"></i>&nbsp; Themes Updated <b style="font-size: 33px;"><?= $admin['theme_count']; ?></b>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="alert alert-warning text-center">
                    <i class="fa  fa-pencil fa-3x"></i>&nbsp; Plugin Updated <b style="font-size: 33px;"><?= $admin['plugin_count']; ?></b>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="alert alert-danger text-center">
                    <i class="fa fa-calendar fa-3x"></i>&nbsp; Remaining items <b style="font-size: 33px;">
                        <?php
                        $remaining = $admin['total_product'] - ($admin['theme_count'] + $admin['plugin_count']);
                        echo $remaining;
                        ?> </b>

                </div>
            </div>
            <!--end quick info section -->
        </div>

        <div class="row">
            <div class="col-lg-12">


                <!--Plugin List table example -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Plugin List
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Version</th>
                                            <th>Last updated</th>
                                            <th>Licence Key</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($admin['plugin_list'] as $value): ?>
                                        <tr>
                                            <td><?=$value->title;?></td>
                                            <td><?=$value->version;?></td>
                                            <td><?=$value->last_updated;?></td>
                                            <td><?=$value->secret_key;?></td>
                                        </tr>
                                        <?php endforeach;?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!--End simple table example -->


                <!--Theme List table example -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Theme List
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Version</th>
                                            <th>Last updated</th>
                                            <th>Licence Key</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($admin['theme_list'] as $value): ?>
                                        <tr>
                                            <td><?=$value->title;?></td>
                                            <td><?=$value->version;?></td>
                                            <td><?=$value->last_updated;?></td>
                                            <td><?=$value->secret_key;?></td>
                                        </tr>
                                        <?php endforeach;?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!--End simple table example -->



            </div>

<!--            <div class="col-lg-4">-->
<!--                <div class="panel panel-primary text-center no-boder">-->
<!--                    <div class="panel-body yellow">-->
<!--                        <i class="fa fa-bar-chart-o fa-3x"></i><br>-->
<!--                        <button class="btn btn-success">Show Pricing Table</button>-->
<!--                    </div>-->
<!--                    <div class="panel-footer">-->
<!--                            <span class="panel-eyecandy-title">Upgrade your plan to get more supports-->
<!--                            </span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->


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