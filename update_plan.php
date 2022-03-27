<?php
session_start();
?>
<?php include 'layouts/header.php'; ?>

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
                    <h3 class="page-title">Plan</h3>
                </li>
            </ul>

            <div class="clearfix"></div>
        </nav>

    </div>
    <!-- Top Bar End -->
    <?php 
    $uid = $_GET['uid'];
    $sel_banner = mysqli_query($con,"select * from plan where id='$uid' ");
    $banner_sel = mysqli_fetch_array($sel_banner);
    $type = $banner_sel['type'];
    extract($banner_sel);
    ?>
                    <!-- ==================
                         PAGE CONTENT START
                         ================== -->
                         <div class="page-content-wrapper">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card m-b-20">
                                            <div class="card-body">

                                                <h4 class="mt-0 header-title">
                                                    <a href="add_banner.php">Add Plan</a> |
                                                    Update Plan
                                                </h4><hr/><br/>

                                                <form method="POST" action="action/update_plan.php?uid=<?php echo $uid; ?>"  enctype="multipart/form-data">

                                                    <div class="row">
                                                       
                                                       <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Plan Name</label>
                                                                <input type="text" name='pname' class="form-control" value="<?php echo $name;?>">
                                                            </div>
                                                        </div>
                                                        
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Original Price</label>
                                                                <input type="text" name='ori_price' class="form-control" value="<?php echo $ori_price;?>">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Price</label>
                                                                <input type="text" name='price' class="form-control" value="<?php echo $price;?>">
                                                            </div>
                                                        </div>
                                                        
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Type</label>
                                                                <select name='type' class="form-control select2">
                                                                     <option value="">Select Type</option>
                                                                    <option value="1"<?php if($type==1) echo "selected='selected'" ?>>Poster</option>
                                                                    <option value="2"<?php if($type==2) echo "selected='selected'" ?>>Video</option>
                                                                    <option value="3"<?php if($type==3) echo "selected='selected'" ?>>Video and Poster</option>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                        
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Plan Description</label>
                                                                <textarea rows="2" cols="1" name='detail' class="form-control"><?php echo $detail;?></textarea>
                                                            </div>
                                                        </div> 
                                                        
                                                        
                                                   </div>  
                                                   <div class="row">
                                                    <div class="col-md-12 text-center">
                                                     <div class="form-group">
                                                        <div>
                                                            <button type="submit" class="btn btn-pink waves-effect waves-light m-r-5" name="update">
                                                                Update
                                                            </button>
                                                    <!--     <button type="reset" class="btn btn-secondary waves-effect">
                                                            Cancel
                                                        </button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

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

<!-- App js -->
<script src="public/assets/js/app.js"></script>
</body>
</html>

