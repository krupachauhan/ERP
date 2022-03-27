<?php
session_start();
include 'include/db.php';
?>
<?php include 'layouts/header.php'; ?>

<!-- Plugins css -->
<link href="public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="public/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="public/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="public/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />


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
            <h3 class="page-title"> Video Category</h3>
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
                            <div class="col-lg-12">
                                <div class="card m-b-20">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Video Category</h4>
                                        <div class="col-lg-4">
                                            <?php $sel = mysqli_query($con,"select * from video_pack_cat");
                                                           while ($ra = mysqli_fetch_array($sel)) {
                                                            ?>
                                             <a href="add_video.php?pid=<?php echo 
                                                        $ra['vid_id'];?>" class="btn btn-pink waves-effect waves-light m-r-5">
                                                   <?php echo $ra['vid_cname'] ?>
                                                </a>
                                                 <?php } ?>
                                        </div>

                                        <!-- <h4 class="mt-0 header-title">Add Poster</h4> -->
                                    </div>
                                </div>

                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div><!-- container-fluid -->
                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            <?php include 'layouts/footer.php'; ?>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->

    <?php include 'layouts/footerScript.php'; ?>

    <!-- Plugins js -->
    <script src="public/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="public/plugins/select2/js/select2.min.js"></script>
    <script src="public/plugins/bootstrap-maxlength/bootstrap-maxlength.js"></script>
    <script src="public/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
    <script src="public/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Plugins Init js -->
    <script src="public/assets/pages/form-advanced.js"></script>

    <!-- App js -->
    <script src="public/assets/js/app.js"></script>


</body>
</html>