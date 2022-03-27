<?php
    session_start();
?>
<?php include 'layouts/header.php'; ?>
<!-- C3 charts css -->
<link href="public/plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />

<?php include 'layouts/headerStyle.php'; ?>

<body class="fixed-left">

        <?php include 'layouts/loader.php'; ?>

        <!-- Begin page -->
        <div id="wrapper">

        <?php include 'layouts/navbar.php'; ?>

            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                 <?php include 'layouts/topbar.php';?>
                  <!-- Page title -->
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                   <!--  <button type="button" class="button-menu-mobile open-left waves-effect" style="display: inline-block !important;"> -->
                                     <button type="button" class="button-menu-mobile open-left waves-effect" >
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">Dashboard</h3>
                                </li>
                            </ul>

                            <div class="clearfix"></div>
                        </nav>

                    </div>
                    <!-- Top Bar End -->

                    <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-6 col-xl-3">
                                    <div class="mini-stat clearfix bg-white">
                                        <span class="mini-stat-icon bg-purple mr-0 float-right"><i class="mdi mdi-black-mesa"></i></span>
                                        <div class="mini-stat-info">
                                               <?php   $cat = mysqli_query($con,"select count(*) as tc from users  ");$r = mysqli_fetch_array($cat);?>
                                            <span class="counter text-purple"><?php echo $r['tc'];?></span>
                                            Total  User
                                        </div>
                                        <div class="clearfix"></div>
                                        <!-- <p class=" mb-0 m-t-20 text-muted">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p> -->
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="mini-stat clearfix bg-white">
                                        <span class="mini-stat-icon bg-blue-grey mr-0 float-right"><i class="mdi mdi-basket"></i></span>
                                        <div class="mini-stat-info">
                                              <?php   $cat = mysqli_query($con,"select count(*) as tcu from users");
                                              $r = mysqli_fetch_array($cat);?>
                                            <span class="counter text-blue-grey"><?php echo $r['tcu']; ?></span>
                                           Total Dealer
                                        </div>
                                        <div class="clearfix"></div>
                                        <!-- <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p> -->
                                    </div>
                                </div>
                               <!--  <div class="col-md-6 col-xl-3">
                                    <div class="mini-stat clearfix bg-white">
                                        <span class="mini-stat-icon bg-brown mr-0 float-right"><i class="mdi mdi-buffer"></i></span>
                                        <div class="mini-stat-info">
                                              <?php   $news = mysqli_query($con,"select count(*) as ns from video");$rn = mysqli_fetch_array($news);?>
                                            <span class="counter text-brown"><?php echo $rn['ns'];?></span>
                                            Total Video
                                        </div>
                                        <div class="clearfix"></div>
                                        <!-- <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p> -->
                                    </div>
                                </div> -->
                                
                                <!--  <div class="col-md-6 col-xl-3">
                                    <div class="mini-stat clearfix bg-white">
                                        <span class="mini-stat-icon bg-brown mr-0 float-right"><i class="fa fa-user"></i></span>
                                        <div class="mini-stat-info">
                                              <?php $date = date('Y-m-d');   $news = mysqli_query($con,"select count(*) as nus from user WHERE DATE(cdate)='$date' ");$rn = mysqli_fetch_array($news);?>
                                            <span class="counter text-brown"><?php echo $rn['nus'];?></span>
                                           Todays new user
                                        </div>
                                        <div class="clearfix"></div>
                                        <!-- <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p> -->
                                    </div>
                                </div> -->

                             <!--    <div class="col-md-6 col-xl-3">
                                    <div class="mini-stat clearfix bg-white">
                                        <span class="mini-stat-icon bg-teal mr-0 float-right"><i class="mdi mdi-coffee"></i></span>
                                        <div class="mini-stat-info">
                                            <span class="counter text-teal">123</span>
                                            Unique Visitors
                                        </div>
                                        <div class="clearfix"></div>
                                        <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                                    </div>
                                </div> -->
                                
                            </div>


                

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <?php include 'layouts/footer.php'; ?>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->

 
<?php include 'layouts/footerScript.php'; ?>

        <!-- Peity chart JS -->
        <script src="public/plugins/peity-chart/jquery.peity.min.js"></script>

        <!--C3 Chart-->
        <script src="public/plugins/d3/d3.min.js"></script>
        <script src="public/plugins/c3/c3.min.js"></script>

        <!-- KNOB JS -->
        <script src="public/plugins/jquery-knob/excanvas.js"></script>
        <script src="public/plugins/jquery-knob/jquery.knob.js"></script>

        <!-- Page specific js -->
        <script src="public/assets/pages/dashboard.js"></script>

        <!-- App js -->
        <script src="public/assets/js/app.js"></script>
    </body>
</html>