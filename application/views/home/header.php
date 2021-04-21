<!DOCTYPE html>
<html class="no-js" lang="">
    <head> 
        <!-- Basic page needs 
        ============================================ -->	
        <meta charset="utf-8">
        <title>WP-Auto-Update </title>
        <meta name="description" content="">

        <!-- Mobile specific metas
        ============================================ -->		
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts
        ============================================ -->		
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700' rel='stylesheet' type='text/css'>

        <!-- Bootstrap CSS
        ============================================ -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

        <!-- font-awesome CSS
        ============================================ -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">

        <!-- owl.carousel CSS
        ============================================ -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">

        <!-- animate CSS
        ============================================ -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">

        <!-- fancybox CSS
        ============================================ -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fancybox/jquery.fancybox.css">	

        <!-- meanmenu CSS
        ============================================ -->		
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meanmenu.min.css">

        <!-- RS slider CSS
        ============================================ -->
<!--        <link rel="stylesheet" type="text/css" href="--><?php //echo base_url(); ?><!--assets/lib/rs-plugin/css/settings.css" media="screen" />	-->

        <!-- normalize CSS
        ============================================ -->		
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">

        <!-- main CSS
        ============================================ -->		
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">

        <!-- style CSS
        ============================================ -->			
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">

        <!-- responsive CSS
        ============================================ -->			
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">

        <!-- Custom CSS
                ============================================ -->			
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

        <!-- modernizr js
        ============================================ -->		
        <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body class="home">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <!-- header start -->

        <header>
            <div id="sticker" class="header-area">
                <div class="container">
                    <div class="row">
                        <!-- logo start -->
                        <div class="col-md-2 col-lg-3">
                            <div class="logo">
                                <a href="<?php echo base_url('home/index'); ?>">
                                    <!--<img src=< ? = //base_url("assets/img/logo.jpg"); ?> />-->
                                        <span style="font-size: 22px; color:#2accc0; font-weight:bold;">WP A</span><span style="color:#2bcdc1">uto </span><span style="font-size: 22px; color:#2accc0; font-weight:bold;">U</span><span style="color:#2bcdc1">pdate</span> 
                                    </a>                               
                            </div>
                        </div>
                        <!-- logo end -->
                        <!-- mainmenu start -->
                        <div class="col-md-10 col-lg-9">
                            <div class="header-search">
                                <form action="index-4.html#">
                                    <span class="search-button"><i class="fa fa-search"></i></span>
                                    <input type="text" placeholder="search..."/>
                                </form>						
                            </div>
                           
                            <div class="mainmenu">
                                <nav>
                                    <ul id="nav">
                                        <li><a href="<?php echo base_url('pay/index'); ?>">Pricing </a>
                                        </li>
                                        <li><a href="<?php echo base_url('home/documentation'); ?>">Documentation</a>
                                        </li>
                                        <li><a href="<?php echo base_url('home/blog'); ?>">Blog</a></li>
                                        <?php                                                                       
                                        if ( $this->session->userdata('isUserLoggedIn')){
                                            ?>
                                            <li style="background: #2accc0;"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
                                            <?php
                                        }  else {
                                            //echo '<li data-toggle="modal" data-target="#myModal"><a href="javascript:;">Login</a></li>';
                                            echo '<li><a href="'.base_url('users/signin').'">Login</a></li>';
                                        }
                                        ?>
                                        
                                        
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- mainmenu end -->
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <div class="logo">
                                    <a href="index.html"><h1>
                                            <span style="font-size: 22px; color:#2accc0; font-weight:bold;">W</span><span style="color:#2bcdc1">inn</span>
                                            <span style="font-size: 22px; color:#2accc0; font-weight:bold;">R</span><span style="color:#2bcdc1">epos</span></h1>
                                    </a>
                                </div>
                                <nav id="dropdown">
                                    <ul id="nav">
                                        <li><a href="<?php echo base_url('pay/index'); ?>">Pricing </a>
                                        </li>
                                        <li><a href="<?php echo base_url('home/documentation'); ?>">Documentation</a>
                                        </li>
                                        <li><a href="<?php echo base_url('home/blog'); ?>">Blog</a></li>
                                        <li style="background: #2accc0;"><a href="<?php echo base_url('home/dashboard'); ?>">Dashboard</a></li>
                                    </ul>
                                </nav>
                            </div>					
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area end -->		
        </header>
        <!-- header end -->
        <?php
        if ($this->session->flashdata('user')){
            echo '<div class="alert alert-'.$this->session->flashdata("class").' alert-dismissable" style="position: fixed;right: 0;top: 90%;">
                        <button type="button" class="close alert-link" data-dismiss="alert" aria-hidden="true">×</button>
                        '.$this->session->flashdata("user").'
                    </div>';
        };?>
