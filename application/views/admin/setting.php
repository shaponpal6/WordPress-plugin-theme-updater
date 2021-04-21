<?php include 'header.php'; ?>
    <!--  page-wrapper -->
    <div id="page-wrapper">

        <div class="row">
            <!--page header-->
            <div class="col-lg-12">
                <h1 class="page-header">Setting</h1>
            </div>
            <!--end page header-->
        </div>


        <div class="row">

            <div class="col-lg-10">
                <?php
                if ($this->session->flashdata('user')) {
                    echo '<div class="alert alert-' . $this->session->flashdata("class") . ' alert-dismissable">
                        <button type="button" class="close alert-link" data-dismiss="alert" aria-hidden="true">×</button>
                        ' . $this->session->flashdata("user") . '
                    </div>';
                }; ?>

                <!--Pill Tabs   -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Account Settings
                    </div>
                    <?php
                    if (!empty($success_msg)) {
                        echo ' <div style="display:block" id="login-alert" class="alert alert-danger col-sm-12">' . $success_msg . '</div>';
                    } elseif (!empty($error_msg)) {
                        echo ' <div style="display:block" id="login-alert" class="alert alert-danger col-sm-12">' . $error_msg . '</div>';
                    }
                    ?>
                    <div class="panel-body">
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#profile" data-toggle="tab">Profile</a>
                            </li>
                            <li><a href="#change_password" data-toggle="tab">Change Password</a>
                            </li>
                            <li><a href="#change_email" data-toggle="tab">Change Email</a>
                            </li>
                            <li><a href="#delete_ac" data-toggle="tab">Delete Account</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane fade in active" id="profile">

                                <h4>Billing Profile
                                    <button class="btn btn-info" data-target="#edit_profile" data-toggle="tab">Edit
                                        Profile
                                    </button>
                                </h4>

                                <!--User Profile-->
                                <div class="row">
                                    <div>
                                        <div class="col-md-2">
                                            <h5>Name: </h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5><?=$profile->name;?></h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-md-2">
                                            <h5> Address: </h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>&nbsp <?=$profile->address;?></h5>
                                        </div>
                                    </div>
                                    <!-------Block------ -->
                                    <div>
                                        <div class="col-md-2">
                                            <h5> City: </h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>&nbsp<?=$profile->city;?></h5>
                                        </div>
                                    </div>
                                    <!-------Block------ -->
                                    <div>
                                        <div class="col-md-2">
                                            <h5> State: </h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>&nbsp<?=$profile->state;?></h5>
                                        </div>
                                    </div>
                                    <!-------Block------ -->
                                    <div>
                                        <div class="col-md-2">
                                            <h5> Zipcode: </h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>&nbsp<?=$profile->zipcode;?></h5>
                                        </div>
                                    </div>
                                    <!-------Block------ -->
                                    <div>
                                        <div class="col-md-2">
                                            <h5> Country: </h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>&nbsp<?=$profile->country;?></h5>
                                        </div>
                                    </div>
                                    <!-------Block------ -->
                                    <div>
                                        <div class="col-md-2">
                                            <h5> Telephone: </h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>&nbsp<?=$profile->telephone;?></h5>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="tab-pane fade in" id="edit_profile">
                                <!--Edit Profile-->
                                <h4>Edit Profile
                                    <button class="btn btn-success" data-target="#profile" data-toggle="tab">Profile
                                    </button>
                                </h4>

                                <!--User Profile-->
                                <div class="row">
                                    <?= form_open('Setting/edit_profile'); ?>
                                    <div class="col-md-2">
                                        <h5>Name: </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <input required type="text" name="name" value="<?=$profile->name;?>" class="form-control ">
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-2">
                                        <h5> Address: </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="address" value="<?=$profile->address;?>" class="form-control ">
                                    </div>
                                </div>
                                <br/>
                                <!-------Block------ -->
                                <div class="row">
                                    <div class="col-md-2">
                                        <h5> City: </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <input required type="text" name="city" value="<?=$profile->city;?>" class="form-control ">
                                    </div>
                                </div>
                                <br/>
                                <!-------Block------ -->
                                <div class="row">
                                    <div class="col-md-2">
                                        <h5> State: </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <input required type="text" name="state" value="<?=$profile->state;?>" class="form-control ">
                                    </div>
                                </div>
                                <br/>
                                <!-------Block------ -->
                                <div class="row">
                                    <div class="col-md-2">
                                        <h5> Zipcode: </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <input required type="text" name="zipcode" value="<?=$profile->zipcode;?>" class="form-control ">
                                    </div>
                                </div>
                                <br/>
                                <!-------Block------ -->
                                <div class="row">
                                    <div class="col-md-2">
                                        <h5> Country: </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <input required type="text" name="country" value="<?=$profile->country;?>" class="form-control ">
                                    </div>
                                </div>
                                <br/>
                                <!-------Block------ -->
                                <div class="row">
                                    <div class="col-md-2">
                                        <h5> Telephone: </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <input required type="text" name="telephone" value="<?=$profile->telephone;?>" class="form-control ">
                                    </div>
                                </div>
                                <br/>
                                <!-------Submit------ -->
                                <div class="row padding-bottom">
                                    <div class="col-md-2">
                                        <h5></h5>
                                    </div>
                                    <div class="col-md-6 col-offset-4">
                                        <input id="btn-login" name="edit_profile" type="submit" class="btn btn-success"
                                               value="Edit Profile" style="float: right; width: 100%;">
                                    </div>
                                </div>
                                <br/>
                                </form>


                            </div>
                            <!-- Change Password -->
                            <div class="tab-pane fade" id="change_password">
                                <h4>Change Password</h4>

                                <?php echo form_open('Setting/change_password', 'class="form-horizontal"'); ?>

                                <div class="row padding-bottom">
                                    <div class="col-md-2">
                                        <h5> Password: </h5>
                                    </div>
                                    <div class="col-md-6 col-offset-4">
                                        <input required type="password" name="password" placeholder=""
                                               class="form-control ">
                                    </div>
                                </div>
                                <br/>
                                <!----------- Block------------>
                                <div class="row padding-bottom">
                                    <div class="col-md-2">
                                        <h5> New Password: </h5>
                                    </div>
                                    <div class="col-md-6 col-offset-4">
                                        <input required type="password" name="new_password" placeholder=""
                                               class="form-control ">
                                    </div>
                                </div>
                                <br/>
                                <!----------- Block------------>
                                <div class="row padding-bottom">
                                    <div class="col-md-2">
                                        <h5> Confirm Password: </h5>
                                    </div>
                                    <div class="col-md-6 col-offset-4">
                                        <input required type="password" name="conf_password" placeholder=""
                                               class="form-control ">
                                    </div>
                                </div>
                                <br/>
                                <div class="row padding-bottom">
                                    <div class="col-md-2">
                                        <h5></h5>
                                    </div>
                                    <div class="col-md-6 col-offset-4">
                                        <input id="btn-login" name="change_password" type="submit" class="btn btn-success"
                                               value="Change Password" style="float: right; width: 100%;">
                                    </div>
                                </div>
                                <br/>

                                </form>
                            </div>
                            <!-- End Change Password -->
                            <!-- Change Email -->
                            <div class="tab-pane fade" id="change_email">
                                <h4>Change Email</h4>
                                <?php echo form_open('Setting/change_email', 'class="form-horizontal"'); ?>
                                <!----------- Block------------>
                                <div class="row padding-bottom">
                                    <div class="col-md-2">
                                        <h5> Password: </h5>
                                    </div>
                                    <div class="col-md-6 col-offset-4">
                                        <input required type="password" name="password" placeholder=""
                                               class="form-control ">
                                    </div>
                                </div>
                                <br/>
                                <!----------- Block------------>
                                <div class="row padding-bottom">
                                    <div class="col-md-2">
                                        <h5> New Email: </h5>
                                    </div>
                                    <div class="col-md-6 col-offset-4">
                                        <input required type="email" name="email" placeholder="" class="form-control ">
                                    </div>
                                </div>
                                <br/>
                                <!----------- Block------------>
                                <div class="row padding-bottom">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-6 col-offset-4">
                                        <input id="btn-login" name="change_email" type="submit" class="btn btn-success"
                                               value="Change Email" style="float: right; width: 100%;">
                                    </div>
                                </div>
                                <br/>

                                </form>
                            </div>
                            <!-- Change Email -->
                            <!-- Delete Account-->
                            <div class="tab-pane fade" id="delete_ac">
                                <h4>Delete Account</h4>
                                <?php echo form_open('Setting/delete_account', 'class="form-horizontal"'); ?>
                                <!----------- Block------------>
                                <div class="row padding-bottom">
                                    <div class="col-md-2">
                                        <h5>Why you want to delete Account </h5>
                                    </div>
                                    <div class="col-md-6 col-offset-4">
                                        <input required type="text" name="reason" placeholder="" class="form-control ">
                                    </div>
                                </div>
                                <br/>
                                <!----------- Block------------>
                                <div class="row padding-bottom">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-6 col-offset-4">
                                        <input id="btn-login" name="delete_account" type="submit"
                                               class="btn btn-success"
                                               value="Delete Account" style="float: right; width: 100%;">
                                    </div>
                                </div>
                                <br/>
                                </form>
                            </div>
                            <!-- End Delete Account-->
                        </div>
                    </div>
                </div>
                <!--End Pill Tabs   -->
            </div>
        </div>

    </div>
    <!-- end page-wrapper -->

<?php include 'footer.php';