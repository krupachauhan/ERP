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
                        <h3 class="page-title">Add Image</h3>
                    </li>
                </ul>

                <div class="clearfix"></div>
            </nav>

<?php 

$uid = $_GET['uid'];
$sel = mysqli_query($con,"select * from image where id='$uid' ");
$sj = mysqli_fetch_array($sel);
?>
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

                                            <!-- <h4 class="mt-0 header-title">Add Poster</h4> -->

                                            <form method="POST" action="action/upd_image.php?uid=<?php echo $uid; ?>"  enctype="multipart/form-data">

                                                <div class="row">

                                                   <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Select date</label>
                                                        <input type="date" name="cal_date" class="form-control" value="<?php echo $sj['idate']; ?>">   
                                                    </div>
                                                </div> 

                                            </div>

                                                <div class="row">
                                                    
                                                     <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" name="name1" class="form-control" value="<?php echo $sj['name']; ?>">   
                                                    </div>
                                                </div> 


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Text Color</label>
                                                            <div data-color-format="rgb" data-color="" class="colorpicker-default input-group">
                                                                <input type="text"  class="form-control" name="tclr1" value="<?php echo $sj['text_clr']; ?>">
                                                                <span class="input-group-append add-on">
                                                                    <button class="btn btn-light" type="button">
                                                                        <i style="background-color: rgb(124, 66, 84);margin-top: 2px;"></i>
                                                                    </button>
                                                                </span>
                                                                  <span style="background:<?php echo $sj['text_clr']; ?>;display: block;width:22px;height:22px;margin-top: 2%;"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Frame Color</label>

                                                        <div data-color-format="rgb" data-color="" class="colorpicker-default input-group">
                                                            <input type="text" value="#000" class="form-control" name="fclr1">
                                                            <span class="input-group-append add-on">
                                                                <button class="btn btn-light" type="button">
                                                                    <i style="background-color: rgb(124, 66, 84);margin-top: 2px;"></i>
                                                                </button>
                                                            </span>
                                                            <span style="background:<?php echo $sj['frm_clr']; ?>;display: block;width:22px;height:22px;margin-top: 2%;"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Language</label>

                                                        <select class="form-control select2" name="lga1">
                                                            <option value="hindi"<?php if($sj['language'] =='hindi') { echo 'selected';}?>>Hindi</option>
                                                            <option value="gujarati"<?php if($sj['language'] =='gujarati') { echo 'selected';}?>>Gujarati</option>
                                                            <option value="english"<?php if($sj['language'] =='english') { echo 'selected';}?>>English</option>
                                                            
                                                        </select>
                                                        
                                                    </div>
                                                </div>

                                             <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Select poster image</label>
                                                        <input type="file" name='banner1' class="form-control" onchange="readThumb(this, 'thumb-error')" class="" accept="image/*">

                                                        <div id="thumb-error" style="color: red; margin: 10px 0px 0 10px;">Please upload file having extensions .png .jpg only.
                                                        </div> 

                                                    </div>
                                                </div>  

                                                  <div class="col-md-3">
                                                           <img id="thumb" src="upload/img/<?php echo $sj['image']; ?>" alt=""  style="width:80px;height:80px;">
                                                       </div>

                                                <div id="thumb" class="col-md-3"></div>
                                        </div>
                                        
                                          <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Is political</label>
                                                        <select class="form-control select2" name="isp1" required="">
                                                            <option value="">Select</option>
                                                            <option value="yes"<?php if($sj['is_poli'] =='yes') { echo 'selected';}?>>Yes</option>
                                                            <option value="no"<?php if($sj['is_poli'] =='no') { echo 'selected';}?>>No</option>
                                                        </select>
                                                    </div>
                                                </div>

                        <div class="row all_more">
                                            <div class="col-md-2">
                                                 <button type="button" name="ad_more" id="add_more" class="btn btn-primary">Add more + </button>
                                             </div> 
                                             <div class="col-md-9"></div>
                            </div>
                                             
                                     
                           
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                       <div class="form-group">

                                        <button type="submit" class="btn btn-pink waves-effect waves-light m-r-5" name="add">
                                            Submit
                                        </button>
                                        <a href="add_image1.php" class="btn btn-secondary waves-effect">
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

<script type="text/javascript">
    $(document).ready(function(){                    
        var i=1;
        $("#add_more").click(function(){
            i++;
            $(".all_more").after('<div id="row'+i+'" class="all"><hr/><div class="row"><div class="col-md-4"><div class="form-group"><label>Name</label><input type="text" name="name" class="form-control"></div></div><div class="col-md-4"><div class="form-group"><label>Text Color</label><div data-color-format="rgb" data-color="" class="colorpicker-default input-group"><input type="text" value="#000" class="form-control" name="tclr[]"><span class="input-group-append add-on"><button class="btn btn-light" type="button"><i style="background-color: rgb(124, 66, 84);margin-top: 2px;"></i></button></span></div></div></div><div class="col-md-4"><div class="form-group"><label>Frame Color</label><div data-color-format="rgb" data-color="" class="colorpicker-default input-group"><input type="text" value="#000" class="form-control" name="fclr[]"><span class="input-group-append add-on"><button class="btn btn-light" type="button"><i style="background-color: rgb(124, 66, 84);margin-top: 2px;"></i></button></span></div></div></div> <div class="col-md-3"><div class="form-group"><label>Language</label><select class="form-control select2" name="lga1[]"><option value="hindi">Hindi</option><option value="gujarati">Gujarati</option><option value="english">English</option></select></div></div><div class="col-md-2"><div class="form-group"><label>Select Frame image</label><input type="file" name="banner[]" class="form-control" onchange="readThumb(this, "thumb-error")" class="" accept="image/*"><div id="thumb-error" style="color: red; margin: 10px 0px 0 10px;">Please upload file having extensions .png .jpg only.</div></div></div><div id="thumb" class="col-md-2"></div> <div class="col-md-4"><div class="form-group"><label>Is political</label><select class="form-control select2" name="isp[]" required=""><option value="no">No</option><option value="yes">Yes</option></select></div></div><div class="form-group col-md-2"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div></div>');

             $('.colorpicker-default').colorpicker();  
             
             $(".select2").select2({ //   tags: true
              });
        });

         $(document).on('click', '.btn_remove', function(){ 
                 var button_id = $(this).attr("id");
                // alert(button_id);
                 $('#row' +button_id+'').remove();  

             }); 


    });
    </script>
  
</body>
</html>