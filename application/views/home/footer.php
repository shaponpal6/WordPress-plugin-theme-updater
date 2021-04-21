<!-- footer start -->
<footer>
    <!-- footer-top-area start -->
    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <!-- newsletter start -->
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="newsletter">
                        <h3>Terms and Privacy:</h3>
                        <a href="https://www.winncomm.net/about/company/privacy/" target="_blank">Privacy Policy</a>
                    </div>
                </div>
                <!-- newsletter end -->
                <!-- footer-contact start -->
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="footer-contact">
                        <ul>
                            <li>
                                <span>Address:</span>
                                <span>27177 185th Ave SE<br>
									Ste: 111-202<br>
									Covington, WA 98042 - USA</span></li>
                            <li>
                                <span>Phone:</span>
                                <span>
										+1 253.293.9551 - Office<br>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- footer-contact end -->
                <!-- footer-contact start -->
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="footer-contact">
                        <ul>
                            <li class="cc-space">
                                <span>Email:</span>
                                <span><a href="#">shaponpal4@gmail.com</a> <br/>
                                </span>
                                <div class="su-spacer"></div>
                            </li>
                            <li>
                                <span>Follow Us:</span>
                                <span>
										<a href="https://www.facebook.com/shaponp/" target="_blank"><i
                                                    class="fa fa-facebook"></i></a>
										<a href="https://www.linkedin.com/shaponpal" target="_blank"><i
                                                    class="fa fa-linkedin-square"></i></a>
										<a href="https://twitter.com/shaponpal" target="_blank"><i
                                                    class="fa fa-twitter"></i></a>
										<a href="https://plus.google.com/u/0/+shaponpal" target="_blank"><i
                                                    class="fa fa-google-plus"></i></a>
									</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- footer-contact end -->
            </div>
        </div>
    </div>
    <!-- footer-top-area end -->
    <!-- footer-bottom-area start -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="copyright">
                        <p>COPYRIGHT © 2017 ALL RIGHT RESERVED BY <a href="index-3.html#" target="_blank">WP-Auto-Update</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom-area end -->
    <!--  support -->
    <!--    <img src=-->
	<? //=base_url("assets/img/help-desk.png");?><!-- data-toggle="modal" data-target="#myModal" >-->
    <img src=<?= base_url("assets/img/support.png"); ?> data-toggle="modal" data-target="#support" onclick="support_id2()"
         style="cursor:pointer;position: fixed; right: 0;bottom: 75px; background: #2bccc0; padding: 7px;">
    <!--  support -->

</footer>
<!-- footer end -->
<script>
    // Advance options
    function support_id() {
        $.post("index.php/supports/last_support_id/", {'id': ''}, function (data4) {
            $('#ticket_id_show').html(data4);
            $('[name="ticket"]').val(data4);
            console.log(data4);
        });
    }

    // Ajax response
    function support_id2(e){
        $.ajax({
            url:"<?php echo base_url();?>index.php/supports/last_support_id/",
            dataType:'text',
            type:"POST",
            success: function(result){
                var obj = $.parseJSON(result);
                //console.log(obj);
                $('#ticket_id_show').html(obj);
                $('[name="ticket"]').val(obj);
            }
        })
    }A
</script>
<!--Support Model-->
<div class="modal fade" id="support" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="loginbox" style="margin-top:50px;"
                 class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Support Ticket <b>#<span id="ticket_id_show"></span></b>
                            <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal" style="float:right;">Close</button>
                        </div>
                    </div>

                    <div style="padding-top:30px" class="panel-body">
						<?=form_open('supports/create');?>
                        <input type="hidden" name="ticket" value="">
                        <!----------- Block------------>
                        <div class="row padding-bottom">

                            <div class="col-md-12">
                                <span class="support-items">Name:</span>
                                <input required type="text" name="name" placeholder="" class="form-control ">
                            </div>
                        </div>
                        <br/>
                        <!----------- Block------------>
                        <div class="row padding-bottom">
                            <div class="col-md-12">
                                <span class="support-items">Email:</span>
                                <input required type="text" name="email" placeholder="" class="form-control ">
                            </div>
                        </div>
                        <br/>
                        <!----------- Block------------>
                        <div class="row padding-bottom">
                            <div class="col-md-12">
                                <span class="support-items">Topic:</span>
                                <input required type="text" name="topic" placeholder="" class="form-control ">
                            </div>
                        </div>
                        <br/>
                        <!----------- Block------------>
                        <div class="row padding-bottom">

                            <div class="col-md-12">
                                <span class="support-items">Description:</span>
                                <textarea rows="3" required type="text" name="description"  class="form-control "></textarea>
                            </div>
                        </div>
                        <br/>
                        <!----------- Submit------------>
                        <div class="row padding-bottom">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-12">
                                <input id="btn-login" name="supports" type="submit"
                                       class="btn btn-success"
                                       value="SEND" style="float: right; width: 100%;">
                            </div>
                        </div>
                        <br/>
                        <div class="modal-footer">
                            <center>Powered By - <a href="http://shapon.website/">Shapon Pal</a> </center>
                        </div>
						<?=form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Support Model-->
<!-- Modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="loginbox" style="margin-top:50px;"
                 class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot
                                password?</a></div>
                    </div>

                    <div style="padding-top:30px" class="panel-body">
						<?php
						if (!empty($success_msg)) {
							echo ' <div style="display:block" id="login-alert" class="alert alert-danger col-sm-12">' . $success_msg . '</div>';
						} elseif (!empty($error_msg)) {
							echo ' <div style="display:block" id="login-alert" class="alert alert-danger col-sm-12">' . $error_msg . '</div>';
						}
						?>

                        <!--<form action="" method="post" id="loginform" class="form-horizontal" role="form">-->
						<?php //echo from_open('users/login','id="loginform" class="form-horizontal" role="form"');?>
						<?php echo form_open('Users/login', 'class="form-horizontal"'); ?>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <!--<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">-->
                            <input id="login-username" type="email" class="form-control inputEmail" name="email"
                                   placeholder="Email" data-error="That email address is invalid" required="" value="">
							<?php //echo form_error('email','<span class="help-block">','</span>'); ?>
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <!--<input id="login-password" type="password" class="form-control" name="password" placeholder="password">-->
                            <input id="login-password" type="password" class="form-control inputPassword"
                                   name="password" placeholder="Password" required="">
							<?php echo form_error('password', '<span class="help-block">', '</span>'); ?>
                        </div>
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12 control">
                            <div style="padding-bottom: 8px;">
                                Don't have an account!
                                <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                    Sign Up Here
                                </a>
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-sm-12 controls"
                                 style="border-top: 1px solid#888; padding-top:10px; font-size:85%">
                                <input id="btn-login" name="loginSubmit" type="submit" class="btn btn-success"
                                       value="Login" style="float: right; width: 100%;">
                            </div>
                        </div>
                        </form>


                    </div>
                </div>

            </div>


            <div id="signupbox" style="display:none; margin-top:50px"
                 class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Sign Up</div>
                        <div style="float:right; font-size: 85%; position: relative; top:-10px">
                            <a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">
                                Sign In</a>
                        </div>
                    </div>
                    <div class="panel-body">
						
						
						<?php echo form_open('Users/registration', 'id="signupform" class="form-horizontal"'); ?>

                        <div id="signupalert" style="display:none" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>


                        <div class="form-group">
                            <label for="firstname" class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" placeholder="Name" required=""
                                       value="<?php echo !empty($user['name']) ? $user['name'] : ''; ?>">
								<?php echo form_error('name', '<span class="help-block">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Email </label>
                            <div class="col-md-9">
                                <input type="email" class="form-control inputEmail" name="email" placeholder="Email"
                                       data-error="That email address is invalid" required=""
                                       value="<?php echo !empty($user['email']) ? $user['email'] : ''; ?>">
								<?php echo form_error('email', '<span class="help-block">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Password </label>
                            <div class="col-md-9">
                                <input type="password" class="form-control inputPassword" name="password"
                                       placeholder="Password" required="">
								<?php echo form_error('password', '<span class="help-block">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Confirm </label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" data-match=".inputPassword"
                                       data-match-error="Whoops, these don't match" name="conf_password"
                                       placeholder="Confirm password" required="">
								<?php echo form_error('conf_password', '<span class="help-block">', '</span>'); ?>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-offset-3 col-md-9">
                                <div>
                                    Don you have an account!
                                    <a href="#" onClick="$('#signupbox').hide(); $('#loginbox').show()">
                                        Login Here
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="form-group" style="border-top: 1px solid #999; padding-top:10px">
                            <!-- Button -->
                            <div class="col-md-offset-3 col-md-9">
                                <input id="btn-signup" name="regisSubmit" type="submit" class="btn btn-success"
                                       value="Sign Up" style="float: right; width: 50%;">
                            </div>
                        </div>


                        </form>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- footer end -->


<!-- JS -->

<!-- jquery js -->
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.11.2.min.js"></script>

<!-- bootstrap js -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

<!-- owl.carousel.min js -->
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>

<!-- meanmenu js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.meanmenu.js"></script>

<!-- jquery.countdown js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.countdown.min.js"></script>

<!-- parallax js -->
<script src="<?php echo base_url(); ?>assets/js/parallax.js"></script>

<!-- jquery.collapse js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.collapse.js"></script>

<!-- jquery.easing js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.easing.1.3.min.js"></script>

<!-- jquery.scrollUp js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.scrollUp.min.js"></script>

<!-- knob circle js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.knob.js"></script>

<!-- jquery.appear js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.appear.js"></script>

<!-- jquery.mixitup js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.mixitup.min.js"></script>

<!-- fancybox js -->
<script src="<?php echo base_url(); ?>assets/js/fancybox/jquery.fancybox.pack.js"></script>

<!-- jquery.counterup js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/waypoints.min.js"></script>


<!-- wow js -->
<script src="<?php echo base_url(); ?>assets/js/wow.js"></script>
<script>
    new WOW().init();
</script>
<script>
    var vid = document.getElementById("bg");
    //vid.loop = true;
    //vid.muted = true
</script>

<!-- plugins js -->
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>

<!-- main js -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>


</body>
</html>
</div>