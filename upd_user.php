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
                    <h3 class="page-title">User</h3>
                </li>
            </ul>

            <div class="clearfix"></div>
        </nav>

    </div>
    <?php
    include 'include/db.php';
    $uid = $_GET['uid'];
    // echo "select * from user where id='$uid'";
    $s = mysqli_query($con,"select * from user where id='$uid'");
    $r = mysqli_fetch_array($s);
    extract($r);
    
       $mc = $r['pol_post_cat'];
       $mcv = $r['pol_vdo_cat'];
       
       $mc1 = $r['bus_pcat'];
       $mcv1 = $r['bus_vcat'];
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

                                                <h4 class="mt-0 header-title">Update User</h4><br/>

                                                <form method="POST" action="action/update_user.php?uid=<?php echo $uid; ?>"  enctype="multipart/form-data">

                                             <div class="row">
                                                 
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Name </label>
                                                        <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Hindi Name </label>
                                                        <input type="text" class="form-control" name="hname" value="<?php echo $r['name_hindi'];?>">
                                                    </div>
                                                </div>
                                                
                                                  <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Gujarati Name </label>
                                                        <input type="text" class="form-control" name="gname" value="<?php echo $r['name_guj'];?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="text" name="pwd" class="form-control" value="<?php echo $pwd; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>post</label>
                                                        <input type="text" name="post" class="form-control" value="<?php echo $post; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>post hindi</label>
                                                        <input type="text" name="posth" class="form-control" value="<?php echo $post_hindi; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>post gujarati</label>
                                                        <input type="text" name="postg" class="form-control" value="<?php echo $post_guj; ?>">
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Social Media</label>
                                                        <input type="text" name="social_media" class="form-control" value="<?php echo $social_media; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                                <div class="row">

                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label>personal Logo</label>
                                            <input type="file" name='pol_limg' class="form-control" onchange="readThumbs(this, 'thumb-errors')" class="" accept="image/*">

                                            <div id="thumb-errors" style="color: red; margin: 10px 0px 0 10px;">Please upload file having extensions .jpeg / .jpg / .png only.
                                            </div> 
                                        </div>
                                    </div>  

                                    <div id="thumbs" class="col-md-3">
                                        <?php if($personal_logo!=''){?>
                                            <img src="upload/users/<?php echo $personal_logo;?>" style="width:80px;height:80px;">
                                         <?php } ?>
                                    </div>
                    </div>
                    <!---business logo old here ---->
                             
                              <div class="row">
                                  
                                  <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Select Profile photo </label>
                                            <input type="file" name='pro_img' class="form-control" onchange="readThumbpro(this, 'thumb-errorpro')" class="" accept="image/*">

                                            <div id="thumb-errorpro" style="color: red; margin: 10px 0px 0 10px;">Please upload file having extensions .jpeg / .jpg / .png only.
                                            </div> 
                                        </div>
                                    </div>  
                                    <div id="thumbpro" class="col-md-3">
                                        <?php if($poli_pro_img!=''){?>
                                        <img src="upload/users/<?php echo $poli_pro_img;?>" style="width:80px;height:80px;">
                                          <?php } ?>
                                        </div>
                                  
                              </div>
                              <hr/>
                              
                              <div class="row">
                                  <?php 
$frm = mysqli_query($con,"select * from custom_frame where user_id='$uid' ");
while($sj = mysqli_fetch_array($frm)){

?>

<div class="row delete_mem<?php echo $sj['id']; ?>">

<input type="hidden" name="ids[]" class="form-control" value="<?php echo $sj['id']; ?>"> 
  <div class="col-md-4">
    <div class="form-group">
    <label>Select Frame image</label>
    <input type="file" name='banner1[]' class="form-control" onchange="readframe(this, 'thumb-error')" class="" accept="image/*">

    <div id="thumb-error" style="color: red; margin: 10px 0px 0 10px;">Please upload file having extensions .png .jpg only.
    </div> 

    </div>
    </div>  

    <div class="col-md-4">
        
        <?php if($sj['frm_img']!='') { ?>
    <img id="thumb" src="upload/custom_frame/<?php echo $sj['frm_img']; ?>" alt=""  style="width:80px;height:80px;">
    <?php } ?>
    </div>

  <div id="thumb" class="col-md-3"></div>
  
  <a id="<?php echo $sj['id']; ?>" style="margin-left: 3px;"  class="red delete"><i class="fa fa-trash fa-2x" style="color: red ;"></i>
                                                                </a>
</div>
<?php } ?>

</div>
 <div class="row all_more">

                                   <!--<div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Select Custom Frame</label>
                                                        <input type="file" name='banner[]' class="form-control" onchange="readframe(this, 'thumb-error')" class="" accept="image/*" required="">

                                                        <div id="thumb-error" style="color: red; margin: 10px 0px 0 10px;">Please upload file having extensions .png .jpg only.
                                                        </div> 
                                                    </div>
                                                </div>  
                                                <div id="thumb" class="col-md-2"></div>-->
                                                <div class="form-group col-md-2">
                                                 <button type="button" name="ad_more" id="add_more" class="btn btn-primary">Add More Political Frame +</button>
                                             </div> 
                                             
                                  
                              </div>
                              
                               <hr/>
                               

                              
                                            <div class="row">

                                               <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Business Name</label>
                                                        <input type="text" name="bus_name" class="form-control" value="<?php echo $bus_name; ?>">
                                                    </div>
                                                </div>

                                                
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Business Address</label>
                                                    <textarea rows="2" class="form-control" name="bus_adress"><?php echo $bus_adress;?></textarea>
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Business Mobile</label>
                                                    <input type="text" class="form-control" name="bus_mobile" value="<?php echo $bus_mobile;?>">
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Business Social Media</label>
                                                    <input type="text" class="form-control" name="bus_smedia" value="<?php echo $bus_social_media;?>">
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Business Email</label>
                                                    <input type="email" class="form-control" name="bus_email" value="<?php echo $bus_email;?>">
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Business web</label>
                                                    <input type="text" class="form-control" name="bus_web" value="<?php echo $bus_web;?>">
                                                </div>
                                            </div>

                                         
                                           

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Start date</label>
                                                    
                                                    <?php
                                                    include 'include/db.php';
                                                    $uid = $_GET['uid'];
                                                     $sup = mysqli_query($con,"select * from user_plan where uid='$id' ");
                                    $pus = mysqli_fetch_array($sup);
                                                    ?>
                                                    
                                                    <!--<input type="date" name="sdate" class="form-control" value="<?php echo $sdate;?>">-->
                                                    <?php   if($pus['sdate']!=''){?>
                                                    <input type="date" name="sdate" class="form-control" value="<?php echo $pus['sdate'];?>">
                                                    
                                                    <?php } else{ ?>
                                                    <input type="date" name="sdate" class="form-control" value="<?php echo $sdate;?>">
                                                <?php } ?>
                                                    </div>
                                            </div> 

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>End date</label>
                                                    <!--<input type="date" name="edate" class="form-control" value="<?php echo $edate;?>">-->
                                                    <?php   if($pus['edate']!=''){?>
                                                    <input type="date" name="edate" class="form-control" value="<?php echo $pus['edate'];?>">
                                                    
                                                     <?php } else{ ?>
                                                    <input type="date" name="edate" class="form-control" value="<?php echo $edate;?>">
                                                <?php } ?>
                                                </div>
                                            </div> 
                                            
                                             <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Business Detail</label>
                                                        <input type="text" name="bdetail" class="form-control" value="<?php echo $business_detail; ?>">
                                                    </div>
                                                </div>

                                    
                                   </div>
                                   
                                   <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Select business Logo </label>
                                            <input type="file" name='pol_pimg' class="form-control" onchange="readThumb(this, 'thumb-error')" class="" accept="image/*">

                                            <div id="thumb-error" style="color: red; margin: 10px 0px 0 10px;">Please upload file having extensions .jpeg / .jpg / .png only.
                                            </div> 
                                        </div>
                                    </div>  
                                    <div id="thumb" class="col-md-3">
                                        <?php if($business_logo!=''){?>
                                        <img src="upload/users/<?php echo $business_logo;?>" style="width:80px;height:80px;">
                                          <?php } ?>
                                        </div>
                                </div>
                              
                                   
                                   
                                   <div class="row">
                                  <?php 
$frm = mysqli_query($con,"select * from custom_frame where user_id='$uid' and bs_frm_img!='' ");
while($sj = mysqli_fetch_array($frm)){

?>
<div class="row delete_mem<?php echo $sj['id']; ?>">
<input type="hidden" name="idsb[]" class="form-control" value="<?php echo $sj['id']; ?>"> 
  <div class="col-md-4">
        <div class="form-group">
        <label>Select Frame image</label>
        <input type="file" name='banner2[]' class="form-control" onchange="readframeb(this, 'thumb-error')" class="" accept="image/*">
    
        <div id="thumb-error" style="color: red; margin: 10px 0px 0 10px;">Please upload file having extensions .png .jpg only.
        </div> 
    
        </div>
    </div>  

    <div class="col-md-4">
        <?php if($sj['bs_frm_img']!=''){ ?>
        <img id="thumb" src="upload/custom_frame/<?php echo $sj['bs_frm_img']; ?>" alt=""  style="width:80px;height:80px;">
        <?php } else{ }?>
    </div>

  <div id="thumbb" class="col-md-3"></div>

<a id="<?php echo $sj['id']; ?>" style="margin-left: 3px;"  class="red delete"><i class="fa fa-trash fa-2x" style="color: red ;"></i>
                                                                </a>
</div>
<?php } ?>
    </div>

                                   
                                  
                                    <div class="row all_more1">
                                         <div class="form-group col-md-4">
                                              <button type="button" name="ad_more1" id="add_more1" class="btn btn-primary">Add More Business Frame +</button>
                                        </div> 
                                    </div>
                         <br/>
                     
                                <!--<div class="text-center" style="margin-bottom:2%;"><buton id="adv_btn" class="btn btn-primary">Add Business detail</buton>-->
                                <!--</div>-->

                               

                    <div class="row">
                        <div class="col-md-12 text-center">
                         <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-pink waves-effect waves-light m-r-5" name="add">
                                    Submit
                                </button>
                                <a href="user.php" class="btn btn-secondary waves-effect">
                                    Cancel
                                </a>
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


    function readThumbs(input, error) {
        document.getElementById(error).style.display = "none";
        var filePath = input.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if(!allowedExtensions.exec(filePath)){
            document.getElementById(error).style.display = "block";
            input.value = '';
            document.getElementById("thumbs").innerHTML = "";
            return false;
        } else if(input.files && input.files[0]) {
            document.getElementById("thumbs").innerHTML = "";

            var total = input.files.length;
            for(i=0; i<total; i++ ) {
                var reader = new FileReader();
                reader.onload = function(e) {

                    var newimg = document.createElement("img");
                    newimg.setAttribute("src", e.target.result);
                    newimg.setAttribute("height", "70px");
                    document.getElementById("thumbs").appendChild(newimg);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }

    function readThumbi(input, error) {
        document.getElementById(error).style.display = "none";
        var filePath = input.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if(!allowedExtensions.exec(filePath)){
            document.getElementById(error).style.display = "block";
            input.value = '';
            document.getElementById("thumbi").innerHTML = "";
            return false;
        } else if(input.files && input.files[0]) {
            document.getElementById("thumbi").innerHTML = "";

            var total = input.files.length;
            for(i=0; i<total; i++ ) {
                var reader = new FileReader();
                reader.onload = function(e) {

                    var newimg = document.createElement("img");
                    newimg.setAttribute("src", e.target.result);
                    newimg.setAttribute("height", "70px");
                    document.getElementById("thumbi").appendChild(newimg);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }
    
    //For profile img
      function readThumbpro(input, error) {
        
        document.getElementById(error).style.display = "none";
        var filePath = input.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if(!allowedExtensions.exec(filePath)){
            document.getElementById(error).style.display = "block";
            input.value = '';
            document.getElementById("thumbpro").innerHTML = "";
            return false;
        } else if(input.files && input.files[0]) {
            document.getElementById("thumbpro").innerHTML = "";

            var total = input.files.length;
            for(i=0; i<total; i++ ) {
                var reader = new FileReader();
                reader.onload = function(e) {

                    var newimg = document.createElement("img");
                    newimg.setAttribute("src", e.target.result);
                    newimg.setAttribute("height", "70px");
                    document.getElementById("thumbpro").appendChild(newimg);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }
    
    
    //cstome frame
    
    function readframe(input, error) {
        document.getElementById(error).style.display = "none";
        var filePath = input.value;    
        var allowedExtensions = /(.png)$/i;
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
    
// custome frame business

function readframeb(input, error) {
        document.getElementById(error).style.display = "none";
        var filePath = input.value;    
        var allowedExtensions = /(.png)$/i;
        if(!allowedExtensions.exec(filePath)){
            document.getElementById(error).style.display = "block";
            input.value = '';
            document.getElementById("thumbb").innerHTML = "";
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
                    document.getElementById("thumbb").appendChild(newimg);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }
  

</script>    


<script>
    $(document).ready(function(){
        $(".adv").show();
        $("#adv_btn").click(function(){
            $(".adv").toggle();
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function(){                    
        var i=1;
        $("#add_more").click(function(){
            i++;
            $(".all_more").after('<div id="row'+i+'" class="all"><hr/><div class="row"> <div class="col-md-4"><div class="form-group"><label>Select Custom frame</label><input type="file" name="banner[]" class="form-control" onchange="readframe(this, "thumb-error")" class="" accept="image/*" required=""><div id="thumb-error" style="color: red; margin: 10px 0px 0 10px;">Please upload file having extensions .png .jpg only.</div></div></div><div id="thumb" class="col-md-2"></div> <div class="form-group col-md-2"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div></div>');
        });

         $(document).on('click', '.btn_remove', function(){ 
                 var button_id = $(this).attr("id");
                // alert(button_id);
                 $('#row' +button_id+'').remove();
             }); 
    });
    </script>
    
    <script type="text/javascript">
    $(document).ready(function(){                    
        var i=1;
        $("#add_more1").click(function(){
            i++;
            $(".all_more1").after('<div id="row'+i+'" class="all1"><hr/><div class="row"> <div class="col-md-4"><div class="form-group"><label>Select Custom frame</label><input type="file" name="bannerr[]" class="form-control" onchange="readframeb(this, "thumb-error")" class="" accept="image/*" required=""><div id="thumb-error" style="color: red; margin: 10px 0px 0 10px;">Please upload file having extensions .png only.</div></div></div><div id="thumbb" class="col-md-2"></div> <div class="form-group col-md-2"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove1">X</button></div></div></div>');
        });

         $(document).on('click', '.btn_remove1', function(){ 
                 var button_id = $(this).attr("id");
                // alert(button_id);
                 $('#row' +button_id+'').remove();
             }); 
    });
    </script>

  <script type="text/javascript">
        // $(document).ready(function() {
            $('.delete').click(function() {
            // var el = this;
            var id = $(this).attr("id");

            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    type: "POST",
                    url: "action/delete.php",
                    data : {id:id,action:'frame_multi'},
                    cache: false,
                    success: function(html) {                        
                        // $('#dynamic-table').reload();
                        $(".delete_mem" + id).fadeOut('slow');                       
                    }
                });
            } else {
                return false;
            }
        });
        // });
    </script>   

</body>
</html>