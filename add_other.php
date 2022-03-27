<?php
session_start();
?>
<?php include 'layouts/header.php'; ?>

<!-- Plugins css -->
<link href="public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="public/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="public/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="public/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

<!-- DataTables -->
<link href="public/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="public/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="public/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />


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
                        <h3 class="page-title">Other</h3>
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
<?php

$sel = mysqli_query($con,"select * from other");
$les = mysqli_fetch_array($sel);
?>
                                                <h4 class="mt-0 header-title">Add Other</h4>

                                                <form method="POST" enctype="multipart/form-data">

                                                    <div class="row">
                                                        
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Days for free subscription</label>
                                                                <input type="text" name='sub' class="form-control" value="<?php echo $les['sub_day']; ?>">
                                                            </div>
                                                        </div>  
                                                        
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>App version to update</label>
                                                                <input type="text" name='app_version' value="<?php echo $les['app_version']; ?>" class="form-control">
                                                            </div>
                                                        </div> 

                                                       
                                                    </div>  
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                           <div class="form-group">
                                                            <div>
                                                                <button type="submit" class="btn btn-pink waves-effect waves-light m-r-5" name="add">
                                                                    Submit
                                                                </button>
                                                                <button type="reset" class="btn btn-secondary waves-effect">
                                                                    Cancel
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        <?php 
                                        
                                        if(isset($_POST['add']))
                                        {
                                            extract($_POST);
                                            $upd = mysqli_query($con,"update other set sub_day='$sub',app_version='$app_version' where id='1'  ");
                                            echo "<script>alert('other added successfully.');
                                                	window.location.href='add_other.php';
	                                               </script>";
                                        }
                                        ?>
                                        </div>
                                    </div>

                                </div> <!-- end col -->
                            </div> <!-- end row -->

                             <!-- end row -->

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


    <!-- Required datatable js -->
    <script src="public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="public/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="public/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="public/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="public/plugins/datatables/jszip.min.js"></script>
    <script src="public/plugins/datatables/pdfmake.min.js"></script>
    <script src="public/plugins/datatables/vfs_fonts.js"></script>
    <script src="public/plugins/datatables/buttons.html5.min.js"></script>
    <script src="public/plugins/datatables/buttons.print.min.js"></script>
    <script src="public/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="public/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="public/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="public/assets/pages/datatables.init.js"></script>

    <!-- App js -->
    <script src="public/assets/js/app.js"></script>

    

  
</body>
</html>