<?php include('header.php'); ?>
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area pages-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 breadcrumb-padding pages-p">
                    <div class="breadcrumb-title">
                        <h1>Plan and Pricing</h1>
                    </div>
                    <div class="breadcrumb-list">
                        <ul class="breadcrumb">
                            <li>You are here:</li>
                            <li><a href="<?php echo site_url('home/index'); ?>">Home</a></li>
                            <li><a href="<?php echo site_url('home/price'); ?>">price</a></li>
                            <li>Plan and Pricing</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
<?php // echo '<pre>'; //print_r($products[0]->price).'</pre>'; ?>
    <!-- pricing-area start -->
    <div class="pricing-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pricing-details">
                        <!-- single-plan start -->
                        <div class="single-plan">
                            <div class="plan-inner">
                                <div class="plan-head">
                                    <div class="plan-name">Free</div>
                                    <div class="plan-price">
                                        <span class="plan-price-before">$</span>
                                        <span class="plan-price-value">0</span>
                                    </div>
                                </div>
                                <p>Signup for free, you don't need to enter any credit card info...</p>
                                <div class="plan-options">
                                    <ul>
                                        <li><span class="plan-border">Up to <strong>1</strong> product</span></li>
                                        <li><span><strong>Unlimited</strong> users</span></li>
                                        <li><span><strong>Basic</strong> analyticts</span></li>
                                        <li><span>Basic Security</span></li>
                                        <li><span class="plan-border">Access to Support</span></li>
                                    </ul>
                                </div>
                                <div class="sign-up basic">
                                    <?php if (!$this->session->userdata('isUserLoggedIn')){?>
                                        <button type="button" class="btn btn-outline btn-danger buy-now read-more wow fadeInRight" data-toggle="modal" data-target="#myModal" href="$('#loginbox').hide(); $('#signupbox').show()" data-wow-duration="1.5s" data-wow-delay=".9s">SIGN UP ( 1 product Free )</button>
                                     <?php } else{?>
                                         <button disabled type="button" data-toggle="modal" data-target="#myModal" class="btn btn-outline btn-danger buy-now">YOU HAVE USED THIS</button>
                                    <?php }?>
                                 </div>
                            </div>
                        </div>
                        <!-- single-plan end -->
                        <!-- single-plan start -->
                        <div class="single-plan">
                            <div class="plan-inner">
                                <div class="plan-head">
                                    <div class="plan-name">Starter</div>
                                    <div class="plan-price">
                                        <span class="plan-price-before">$</span>
                                        <span class="plan-price-value"><?= $products[0]->price; ?></span>
                                        <sub class="plan-price-before">/month</sub>
                                    </div>
									<br/>
                                    <div class="plan-price">
                                        <span class="plan-price-before">$</span>
                                        <span class="plan-price-value"><?= $products[1]->price; ?></span>
                                        <span class="plan-price-before">/year</span>
                                    </div>
                                </div>
                                <p>Starter package, we give you enough room to start out and grow with!</p>
                                <div class="plan-options">
                                    <ul>
                                        <li><span class="plan-border">Up to <strong>10</strong> products</span></li>
                                        <li><span><strong>Unlimited</strong> users</span></li>
                                        <li><span><strong>Full</strong> analyticts</span></li>
                                        <li><span>Professional Security</span></li>
                                        <li><span class="plan-border">Access to Support</span></li>
                                    </ul>
                                </div>
                                <!--   Buy Product-->
                                <?php echo form_open('pay/getLicence/1', 'class=""'); ?>
                                <input type="hidden" name="buy_now">
                                <button type="submit" class="btn btn-outline btn-warning buy-now">BUY NOW ( $5/Month )</button>
                                <?php echo form_close(); ?>
                                <!--   Buy Product-->
                                <?php echo form_open('pay/getLicence/2', 'class=""'); ?>
                                <input type="hidden" name="buy_now">
                                <button type="submit" class="btn btn-outline btn-success buy-now">BUY NOW ( $49/Year )</button>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                        <!-- single-plan end -->
                        <!-- single-plan start -->
                        <div class="single-plan standard-space">
                            <div class="plan-inner">
                                <div class="plan-head standard-b">
                                    <div class="plan-popular">MOST POPULAR</div>
                                    <div class="plan-name">Developer</div>
                                    <div class="plan-price">
                                        <span class="plan-price-before">$</span>
                                        <span class="plan-price-value"><?= $products[2]->price; ?></span>
                                        <sub class="plan-price-before">/month</sub>
                                    </div>
									<br/>
                                    <div class="plan-price">
                                        <span class="plan-price-before">$</span>
                                        <span class="plan-price-value"><?= $products[3]->price; ?></span>
                                        <span class="plan-price-before">/year</span>
                                    </div>
                                </div>
                                <p>Perfect solution with clients you're doing work for, where you an give them the option to updating their theme or plugin.</p>
                                <div class="plan-options">
                                    <ul>
                                        <li><span class="plan-border">Up to <strong>50</strong> products</span></li>
                                        <li><span><strong>Unlimited</strong> users</span></li>
                                        <li><span><strong>Full</strong> analyticts</span></li>
                                        <li><span>Standard Security</span></li>
                                        <li><span class="plan-border">Access to Support</span></li>
                                    </ul>
                                </div>
                                <div class="sign-up most-popular-button">
                                    <!--   Buy Product-->
                                    <?php echo form_open('pay/getLicence/3', 'class=""'); ?>
                                        <input type="hidden" name="buy_now">
                                        <button type="submit" class="btn btn-outline btn-warning buy-now">BUY NOW ( $9/Month )</button>
                                    <?php echo form_close(); ?>
                                    <!--   Buy Product-->
                                    <?php echo form_open('pay/getLicence/4', 'class=""'); ?>
                                        <input type="hidden" name="buy_now">
                                        <button type="submit" class="btn btn-outline btn-success buy-now">BUY NOW ( $79/Year )</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                        <!-- single-plan end -->
                        <!-- single-plan start -->
                        <div class="single-plan">
                            <div class="plan-inner">
                                <div class="plan-head">
                                    <div class="plan-name">CEO</div>
                                    <div class="plan-price">
                                        <span class="plan-price-before">$</span>
                                        <span class="plan-price-value"><?= $products[4]->price; ?></span>
                                        <sub class="plan-price-before">/month</sub>
                                    </div>
                                    <br/>
                                    <div class="plan-price">
                                        <span class="plan-price-before">$</span>
                                        <span class="plan-price-value"><?= $products[5]->price; ?></span>
                                        <span class="plan-price-before">/year</span>
                                    </div>
                                </div>
                                <p>CEO package, is basically the ULTIMATE solution for any theme or plugin developer looking to expand their business and offer top notch support of automatic updating for their clients!</p>
                                <div class="plan-options">
                                    <ul>
                                        <li><span class="plan-border"><strong>Unlimited</strong> products</span></li>
                                        <li><span><strong>Unlimited</strong> users</span></li>
                                        <li><span><strong>Full</strong> analyticts</span></li>
                                        <li><span>Premium Security</span></li>
                                        <li><span class="plan-border">Access to Support</span></li>
                                    </ul>
                                </div>
                                <!--   Buy Product-->
                                <?php echo form_open('pay/getLicence/5', 'class=""'); ?>
                                <input type="hidden" name="buy_now">
                                <button type="submit" class="btn btn-outline btn-warning buy-now">BUY NOW ( $19/Month )</button>
                                <?php echo form_close(); ?>
                                <!--   Buy Product-->
                                <?php echo form_open('pay/getLicence/6', 'class=""'); ?>
                                <input type="hidden" name="buy_now">
                                <button type="submit" class="btn btn-outline btn-success buy-now">BUY NOW ( $149/Year )</button>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                        <!-- single-plan end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pricing-area end -->


<?php include 'footer.php';