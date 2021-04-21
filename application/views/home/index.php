<?php include 'header.php'; ?>

<!-- HOME SLIDER -->
<div class="slider-wrap">
    <div class="fullwidthbanner-container" >
        <div class="fullwidthbanner-4">
            <ul>
                <!-- SLIDE  1-->
                <li class="vedio-background" data-transition="random" data-slotamount="7" data-masterspeed="300" data-thumb="img/slider/slider-1/bg2.jpg"  data-saveperformance="off"  data-title="Slide2">
                    <!-- MAIN IMAGE -->
                    <img src="<?php echo base_url(); ?>assets/img/bg.jpg"  alt="bg"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <!-- video-area start -->
                    <div class="video-area-5 fix">

                        <div class="video-text">
                            <h1 class="wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".3s">WP-Auto-Update <strong><span style="color:#2accc0;" class="typewrite" data-period="2000" data-type='[ " 1,443,761"," 1,312"," 1,114" ]'>
                                        <span class="wrap"></span>
                                    </span></strong> updates <strong><span style="color:#2accc0;" class="typewrite" data-period="2000" data-type='[ " served "," themes "," plugins" ]'>
                                        <span class="wrap"></span>
                                    </span></strong></h1>


                            <p class="wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".6s">Helps you provide automatic updates for your premium WordPress themes and plugins with ONLY two lines of code.</p>
                            <?php if (!$this->session->userdata('isUserLoggedIn')){?>
                                <?php if (!$this->session->userdata('isUserLoggedIn')){?>
                                    <a class="read-more wow fadeInRight" data-toggle="modal" data-target="#myModal" href="$('#loginbox').hide(); $('#signupbox').show()" data-wow-duration="1.5s" data-wow-delay=".9s">SIGN UP FOR FREE</a>
                                <?php }?>
                            <?php }?>
                        </div>
                    </div>
                    <!-- video-area end -->
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- END HOME SLIDER -->

<!-- creative-intensy-area start -->

<!-- creative-intensy-area end -->
<!-- collapse-area start -->
<div class="collapse-area fix">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="collapse-content wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="index-2.html#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Just add 2 lines of code to your theme or plugin
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    Simplfy your updating with only two lines of code.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="index-2.html#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Manage author and changelog information
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    You can manage all of your changelog and all from within WinnRepo
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="index-2.html#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Manage unlimited versions of each theme or plugin
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    Lorim ipsum dolar Lorim ipsum dolar Lorim ipsum dolar Lorim ipsum dolar
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingfour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="index-2.html#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                        Keep all of your updates in one place
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                                <div class="panel-body">
                                    Lorim ipsum dolar Lorim ipsum dolar Lorim ipsum dolar Lorim ipsum dolar
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingfour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="index-2.html#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                        Details analytics of downloads, sites and versions
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                                <div class="panel-body">
                                    Lorim ipsum dolar Lorim ipsum dolar Lorim ipsum dolar Lorim ipsum dolar
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingfour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="index-2.html#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                        Detailed documentation
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                                <div class="panel-body">
                                    Lorim ipsum dolar Lorim ipsum dolar Lorim ipsum dolar Lorim ipsum dolar
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingfive">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="index-2.html#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                        Upgrades are seemless  upgrades
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                                <div class="panel-body">
                                    Just like WordPress.org updates and upgrades, everything is done seamlessly through the backend on a periodic check
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="macbook-content wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".6s">
                    <img src="<?php echo base_url(); ?>assets/img/features/macbook.png" alt="" />
                    <div class="macbook-list">
                        <div class="video-container macbook-img">
                            <iframe width="100%" height="" src="https://www.youtube.com/embed/OeD-bvtoPrc" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="video-container macbook-img">
                            <iframe width="100%" height="" src="https://www.youtube.com/embed/OeD-bvtoPrc" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="video-container macbook-img">
                            <iframe width="100%" height="" src="https://www.youtube.com/embed/OeD-bvtoPrc" frameborder="0" allowfullscreen></iframe>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- collapse-area end -->
<!-- creative-intensy-area start -->
<div class="creative-intensy-area fix">
    <div class="container">
        <div class="row">
            <!-- creative-img start -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hidden-sm">
                <div class="creative-img wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <img src="<?php echo base_url(); ?>assets/img/creative/top_b.png" alt="" />
                </div>
            </div>
            <!-- creative-img end -->
            <!-- creative-text start -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="creative-text">
                    <div class="creative-heading wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".5s">
                        <h1>Easy <strong>Integration</strong></h1>
                        <p>Integration with WP Auto Update is too easy!</p>
                    </div>
                    <div class="creative-info wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".7s">
                        <div class="creative-icon">
                            <i class="fa fa-chevron-right"></i>
                        </div>
                        <div class="creative-desc">
                            <h3>Drop two lines of code into your theme/plugin</h3>
                            <p>Download one of our updater classes and pop it in your theme or plugin with only 2 lines of code.</p>
                        </div>
                    </div>
                    <div class="creative-info wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".9s">
                        <div class="creative-icon">
                            <i class="fa fa-chevron-right"></i>
                        </div>
                        <div class="creative-desc">
                            <h3>Upload a new version</h3>
                            <p>When a new version of your theme/plugin is ready, simply upload it at wp-updates.com.</p>
                        </div>
                    </div>
                    <div class="creative-info wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.1s">
                        <div class="creative-icon">
                            <i class="fa fa-chevron-right"></i>
                        </div>
                        <div class="creative-desc">
                            <h3>Users can now auto update</h3>
                            <p>Users can now auto-update their theme/plugin from WordPress, just like normal themes/plugins.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- creative-text end -->
        </div>
    </div>
</div>
<!-- creative-intensy-area end -->
<!-- counter-area start -->
<div class="counter-area fix">
    <div class="container">
        <div class="row">
            <!-- single-counter start -->
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="single-counter wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <h1 class="counter">1,443,905</h1>
                    <h3>TOTAL SERVERS</h3>
                </div>
            </div>
            <!-- single-counter end -->
            <!-- single-counter start -->
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="single-counter wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".5s">
                    <h1 class="counter">7,114</h1>
                    <h3>TOTAL PLUGINS</h3>
                </div>
            </div>
            <!-- single-counter end -->
            <!-- single-counter start -->
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="single-counter wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".7s">
                    <h1 class="counter">1,311</h1>
                    <h3>TOTAL THEMES</h3>
                </div>
            </div>
            <!-- single-counter end -->
            <!-- single-counter start -->
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="single-counter wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".9s">
                    <h1 class="counter">1,375</h1>
                    <h3>TOTAL MEMBERS</h3>
                </div>
            </div>
            <!-- single-counter end -->
        </div>
    </div>
</div>
<!-- counter-area end -->

<?php
include 'footer.php';
