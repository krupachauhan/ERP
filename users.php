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

                                                <h4 class="mt-0 header-title">Filter User Data</h4>

                                                <form method="POST"   enctype="multipart/form-data">

                                                    <div class="row">
                                                        
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Start Date</label>
                                                                <input type="date" name='sdate' class="form-control">
                                                            </div>
                                                        </div> 
                                                        
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Expiry Date</label>
                                                                <input type="date" name='edate' class="form-control">
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
                    <h4 class="mt-0 header-title">View User</h4>
                    <div>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                              
                            
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Action</th>
                                    <th>Name</th>                                    
                                    <th>Contact Number</th>
                                    <th>Email</th>                                    
                                    <th>Photo</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            

                            <tbody>
                                <?php 
                                
                                if(isset($_POST['add']))
                                {
                                    $sdate1 =  date('Y-m-d',strtotime($_POST['sdate']));
                                    $edate1 =  date('Y-m-d',strtotime($_POST['edate']));
                                    
                                    if ($sdate1!='' && $sdate1!='1970-01-01')
                                    {
                                        $sdate11 = $sdate1;
                                    }
                                    if ($edate1!='' && $edate1!='1970-01-01')
                                    {
                                       
                                       $edate11 = $edate1;
                                    }
                                     if ($sdate1!='' && $sdate1!='1970-01-01') 
                                     {
                                        $sdate = " AND sdate='$sdate1'";
                                    } else {
                                        $sdate = '';
                                    }
                                    
                                     if ($edate1!= '' && $edate1!='1970-01-01') 
                                     {
                                        $edate = " AND edate='$edate1'";
                                    } else {
                                        $edate = '';
                                    }
                                    
                                    
                                //      mysqli_query('SET character_set_results=utf8');
                                // $sel_cat = mysqli_query($con,"select * from user where (filter='' or filter IS NULL)  $sdate  $edate or   (edate between '$sdate11' and '$edate11') or (edate between '$edate11' and '$edate11') order by id desc");
                                    
                                    
                                }
                                include 'include/db.php';
                                 // mysqli_query('SET character_set_results=utf8');
                                $sel_cat = mysqli_query($con,"select * from users  order by id desc");
                                // if(mysqli_num_rows($sel_cat)>0){
                                $no = 0;
                                while($row = mysqli_fetch_array($sel_cat)){                                    
                                    extract($row);                                    
                                    
                                    ?>
                                    <tr class="delete_mem<?php echo $id ?>">
                                        <td><?php echo $no=$no+1;?></td>
                                        <td>
                                         <div>
                                   <!--  <a href="upd_user.php?uid=<?php echo 
                                            $row['id'];?>"><i class="fa fa-edit fa-2x" style="color: grey ;"></i>
                                    </a> -->
                                     <a><i class="fa fa-edit fa-2x" style="color: grey ;"></i>
                                    </a>
                                        <a id="<?php echo $row['id']; ?>" style="margin-left: 3px;"  class="red delete"><i class="fa fa-trash fa-2x" style="color: red ;"></i>
                                        </a>
                                    </div>
                                </td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $contact_no; ?></td>
                                <td><?php echo $email; ?></td> 
                                <td><img src="upload/users/<?php echo $image; ?>" style="height:100px;width:100px;"/></td>                                
                                <td><?php echo $address; ?></td> 
                                <td><?php if($status==1){echo "Approved"; }else{ echo "Pending";} ?></td>
                                
                                                </tr>       
                                            <?php }  ?>                                            
                                        </tbody>
                                    </table>
                                </div>

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
</script>    

<script type="text/javascript">
        // $(document).ready(function() {

            $('.delete').click(function() {

                //alert("dsf");
            // var el = this;
            var id = $(this).attr("id");

            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    type: "POST",
                    url: "action/delete.php",
                    data : {id:id,action:'users'},
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
    <script>
        $(document).ready(function(){
            $(".adv").show();
            $("#adv_btn").click(function(){
                $(".adv").toggle();
            });
        });
    </script>


</body>
</html>