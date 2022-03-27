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
                        <h3 class="page-title">Update Frame</h3>
                    </li>
                </ul>

                <div class="clearfix"></div>
            </nav>

        </div>




         <?php 
    $uid = $_GET['uid'];
    $sel_cat = mysqli_query($con,"select * from frame where id='$uid' ");
    $cat_sel = mysqli_fetch_array($sel_cat);
    $fe_img = $cat_sel['image'];
    $logo_posi = $cat_sel['logo_pos'];
    $img_posi = $cat_sel['img_posi'];

    ?>
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

                                            <!-- <h4 class="mt-0 header-title">Add Poster</h4> -->

                                            <form method="POST" action="action/update_frame.php?uid=<?php echo $uid; ?>"  enctype="multipart/form-data">

                                                <div class="row">
                                                    
                                                    
                                                       <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Select Type</label>
                                                        <select class="form-control select2" name="type">
                                                           <option value="">Select</option>
                                                           <option value="business"<?php if($cat_sel['type']=='business') echo "selected='selected'"  ?>>Business</option>
                                                           <option value="political"<?php if($cat_sel['type']=='political') echo "selected='selected'"  ?>>Political</option>
                                                       </select>
                                                   </div>
                                               </div>

                                               <!--<div class="col-md-3">-->
                                               <!--         <div class="form-group">-->
                                               <!--             <label>Logo Position</label>-->
                                               <!--             <select class="form-control select2" name="logo_pos">-->
                                               <!--                <option value="">Select</option>-->
                                               <!--                <option value="left"<?php if($cat_sel['logo_pos']=='left') echo "selected='selected'"  ?>>left</option>-->
                                               <!--                <option value="right"<?php if($cat_sel['logo_pos']=='right') echo "selected='selected'"  ?>>right</option>-->
                                               <!--                <option value="center"<?php if($cat_sel['logo_pos']=='center') echo "selected='selected'"  ?>>center</option>-->
                                               <!--             </select>-->
                                               <!--     </div>-->
                                               <!-- </div>  -->
  

                                               <!--<div class="col-md-3">-->
                                               <!--         <div class="form-group">-->
                                               <!--             <label>Profile photo Position</label>-->
                                               <!--             <select class="form-control select2" name="pro_pos">-->
                                               <!--                <option value="">Select</option>-->
                                               <!--                <option value="left"<?php if($cat_sel['img_posi']=='left') echo "selected='selected'"  ?>>left</option>-->
                                               <!--                <option value="right"<?php if($cat_sel['img_posi']=='right') echo "selected='selected'"  ?>>right</option>-->
                                               <!--                <option value="center"<?php if($cat_sel['img_posi']=='center') echo "selected='selected'"  ?>>center</option>-->
                                               <!--             </select>-->
                                               <!--     </div>-->
                                               <!-- </div> -->



                                          <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Select poster image</label>
                                                        <input type="file" name='banner' class="form-control" onchange="readThumb(this, 'thumb-error')" class="" accept="image/*">

                                                        <div id="thumb-error" style="color: red; margin: 10px 0px 0 10px;">Please upload file having extensions .png .jpg only.
                                                        </div> 

                                                    </div>
                                                </div>  

                                                  <div class="col-md-3">
                                                           <img id="thumb" src="upload/frame/<?php echo $fe_img; ?>" alt=""  style="width:80px;height:80px;">
                                                       </div>

                                                <div id="thumb" class="col-md-3"></div>


                                        

                                </div>  
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                       <div class="form-group">

                                        <button type="submit" class="btn btn-pink waves-effect waves-light m-r-5" name="add">
                                            Submit
                                        </button>
                                        <a href="add_frame.php" class="btn btn-secondary waves-effect">
                                            Cancel
                                        </a>

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

<script type="text/javascript">
    function readThumb(input, error) {
        document.getElementById(error).style.display = "none";
        var filePath = input.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if(!allowedExtensions.exec(filePath)){
            document.getElementById(error).style.display = "block";
            input.value = '';
            document.getElementById("thumb").innerHTML = "";
            return false;
        } else if(input.files && input.files[0]) {
            document.getElementById("thumb").innerHTML = "";

            var total = input.files.length;
            for(i=0; i<total; i++ ) {
                var reader = new FileReader();
                reader.onload = function(e) {

                    var newimg = document.createElement("img");
                    newimg.setAttribute("src", e.target.result);
                    newimg.setAttribute("height", "70px");
                    document.getElementById("thumb").appendChild(newimg);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }
</script>     

   
</body>
</html>