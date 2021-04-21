<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WP Auto Update | Admin Dashboad</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/main-style.css" rel="stylesheet" />

    <!-- Page-Level CSS -->
    <link href="<?php echo base_url(); ?>assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

</head>

<body class="body-Login-back"
      style="background: url(<?php echo base_url('assets/img/registration.jpg'); ?>) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                <a href="<?php echo base_url('home/index'); ?>">
                    <img src=<?=base_url("assets/img/logo.jpg");?> />
                    <!-- <span style="font-size: 22px; color:#2accc0; font-weight:bold;">W</span><span style="color:#2bcdc1">inn</span><span style="font-size: 22px; color:#2accc0; font-weight:bold;">R</span><span style="color:#2bcdc1">epos</span> -->
                </a>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <div class="panel-title">Registration</div>
                        <div style="float:right; font-size: 85%; position: relative; top:-10px">
                            <a href="<?php echo base_url('users/signin'); ?>">Log In</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open('Users/registration', ''); ?>

                            <fieldset>
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Name </label>
                                    <div class="col-md-9">
                                        <input class="form-control" placeholder="E-mail" name="name" type="text" autofocus>
                                    </div>
                                </div><br/><br/>
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email </label>
                                    <div class="col-md-9">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                </div><br/><br/>
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Password </label>
                                    <div class="col-md-9">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                </div><br/><br/>
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Confirm </label>
                                    <div class="col-md-9">
                                        <input class="form-control" placeholder="Password" name="conf_password" type="password" value="">
                                    </div>
                                </div><br/><br/>

                                <!-- Change this to a button or input when using this as a form -->
                                <input id="btn-login" name="regisSubmit" type="submit" class="btn btn-lg btn-success btn-block"
                                       value="Registration" >
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            if ($this->session->flashdata('user')){
                echo '<div class="alert alert-'.$this->session->flashdata("class").' alert-dismissable" style="position: fixed;right: 0;top: 90%;">
                        <button type="button" class="close alert-link" data-dismiss="alert" aria-hidden="true">×</button>
                        '.$this->session->flashdata("user").'
                    </div>';
            };?>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="<?= base_url();?>assets/plugins/jquery-1.10.2.js"></script>
    <script src="<?= base_url();?>assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url();?>assets/plugins/pace/pace.js"></script>
    <script src="<?= base_url();?>assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="<?= base_url();?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?= base_url();?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>

