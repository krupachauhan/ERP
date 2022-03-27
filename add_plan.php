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
                        <h3 class="page-title">Plan</h3>
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

                                                <h4 class="mt-0 header-title">Add Plan</h4>

                                                <form method="POST" action="action/add_plan.php"  enctype="multipart/form-data">

                                                    <div class="row">
                                                        
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Plan Name</label>
                                                                <input type="text" name='pname' class="form-control">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Original Price</label>
                                                                <input type="text" name='ori_price' class="form-control">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Price</label>
                                                                <input type="text" name='price' class="form-control">
                                                            </div>
                                                        </div>
                                                        
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Type</label>
                                                                <select name='type' class="form-control" required="">
                                                                     <option value="">Select Type</option>
                                                                    <option value="1">Poster</option>
                                                                    <option value="2">Video</option>
                                                                    <option value="3">Video and Poster</option>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                        
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Plan Description</label>
                                                                <textarea rows="2" cols="1" name='detail' class="form-control"></textarea>
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

                                        </div>
                                    </div>

                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">View Plan</h4>

                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Action</th>
                                                        <th>Name</th>
                                                         <th>Original Price</th>
                                                        <th>Price</th>
                                                        <th>Type</th>
                                                        <th>Description</th>
                                                        <th>Created At</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php 
                                                    $fe_banner = mysqli_query($con,"select * from plan order by id desc ");
                                                    $no = 0;
                                                    while($r_banner = mysqli_fetch_array($fe_banner)){ 
                                                        extract($r_banner);
                                                        ?>
                                                        <tr class="delete_mem<?php echo $id ?>">
                                                            <td><?php echo $no=$no+1;?></td>
                                                            <td>
                                                                <div>
                                                                <a href="update_plan.php?uid=<?php echo 
                                                                    $r_banner['id'];?>"><i class="fa fa-edit fa-2x" style="color: grey ;"></i>
                                                                </a>
                                                                <a id="<?php echo $r_banner['id']; ?>" style="margin-left: 3px;"  class="red delete"><i class="fa fa-trash fa-2x" style="color: red ;"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $name; ?></td>
                                                        <td><?php echo $ori_price; ?></td>
                                                        <td><?php echo $price; ?></td>
                                                        <td>
                                                        <?php if($type==1) { echo "Poster"; }
                                                              if($type==2) { echo "Video"; }
                                                              if($type==3) { echo "Video And Poster"; }
                                                        ?>
                                                        </td>
                                                        <td><?php echo $detail; ?></td>
                                                        <td><?php echo  date('d-m-Y H:i:s',strtotime($cdate)); ?></td>
                                                    </tr> 
                                                <?php }?>                                                  
                                            </tbody>
                                        </table>

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
                    data : {id:id,action:'plan'},
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