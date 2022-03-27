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
                    <h3 class="page-title">Banner</h3>
                </li>
            </ul>

            <div class="clearfix"></div>
        </nav>

    </div>
    <!-- Top Bar End -->
    <?php 
    $uid = $_GET['uid'];
    $sel_banner = mysqli_query($con,"select * from banner where id='$uid' ");
    $banner_sel = mysqli_fetch_array($sel_banner);
    $fe_img = $banner_sel['b_img'];

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
                                                    <a href="add_banner.php">Add Banner</a> |
                                                    Update Banner
                                                </h4><hr/><br/>

                                                <form method="POST" action="action/update_banner.php?uid=<?php echo $uid; ?>"  enctype="multipart/form-data">

                                                    <div class="row">
                                                        
                                                          <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Link</label>
                                                                <input type="text" name='link' class="form-control" value="<?php echo $banner_sel['link']; ?>">

                                                                
                                                            </div>
                                                        </div>  

                                                        
                                                        
                                                        
                                                        
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Select Image</label>
                                                                <input type="file" name='banner' class="form-control" onchange="readThumb(this, 'thumb-error')" class="" accept="image/*">

                                                                <div id="thumb-error" style="color: red; margin: 10px 0px 0 10px; display: none;">Please upload file having extensions .jpeg / .jpg / .png only.
                                                                </div> 

                                                            </div>
                                                        </div>  

                                                        <div class="col-md-3">
                                                           <img id="thumb" src="upload/banner/<?php echo $fe_img; ?>" alt=""  style="width:80px;height:80px;">
                                                       </div>

                                                       <div id="thumb" class="col-md-4"></div>
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

<script type="text/javascript">
   function readThumb(input, error) {
    document.getElementById(error).style.display = "none";
    var filePath = input.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if (!allowedExtensions.exec(filePath)) {
        document.getElementById(error).style.display = "block";
        input.value = '';
        return false;
    } else if (input.files && input.files[0]) {
        var total = input.files.length;
        for (i = 0; i < total; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("thumb").src = e.target.result;

                    // var newButton = document.createElement("button");
                    // newButton.setAttribute("type", "button");
                    // newButton.setAttribute("onclick", "this.parentElement.remove()");
                    // newButton.innerText = "x";
                    // newDiv.appendChild(newButton);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }
</script>
<!-- App js -->
<script src="public/assets/js/app.js"></script>
</body>
</html>

