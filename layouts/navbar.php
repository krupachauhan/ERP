<?php
    //session_start();
    include "include/db.php";
    if(!isset($_SESSION['id'])){
        //header("Location:index.php");
        echo "<script>window.location.href='index.php';</script>";
    }
    $id = $_SESSION['id'];

?>
   <!-- ========== Left Sidebar Start ========== -->
   <div class="left side-menu">

<!-- LOGO -->
<div class="topbar-left">
    <div class="">
        <!--<a href="index.php" class="logo text-center">Admiria</a>-->
        <a href="index.php" class="logo">
            <!-- <img src="public/assets/images/logo-sm.png" height="64" alt="logo" style="margin-top: 15%;"> -->
            <!--<h3 style="color: #fff;">Jyoti <br/>publication</h3>-->
        </a>
    </div>
</div>

<div class="sidebar-inner slimscrollleft">
    <div id="sidebar-menu" style="margin-top: 25px;">
        <ul>

            <li>
                <a href="index1.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </a>
            </li>
            
            
              <li>
                <a href="users.php" class="waves-effect"><i class="fa fa-users"></i> <span> User </a>
            </li>

             <li>
               <a href="add_dealer.php" class="waves-effect"><i class="fa fa-user"></i> <span> Dealer  </a>
           </li>
            
           <li>
                <a href="add_category.php" class="waves-effect"><i class="mdi mdi-file-image"></i> <span> Category </a>
            </li>
            
              <li>
                <a href="add_product.php" class="waves-effect"><i class="fa fa-picture-o"></i> <span> Product </a>
            </li>
            
            
           
          
            
            <!--<li>-->
            <!--  <a href="add_vposter.php" class="waves-effect"><i class="fa fa-picture-o"></i> <span> Extra video Posters-->
            <!--     </a>-->
            <!--</li>-->

            <!-- <li>-->
            <!--    <a href="add_user.php" class="waves-effect"><i class="fa fa-users"></i> <span> User </a>-->
            <!--</li>-->

            <!--  <li>-->
            <!--    <a href="poster_cat.php" class="waves-effect"><i class="mdi mdi-file-image"></i> <span> Poster</a>-->
            <!--</li>-->

            <!--<li>-->
            <!--    <a href="video_cat.php" class="waves-effect"><i class="fa fa-play-circle"></i> <span> Video </a>-->
            <!--</li>-->

            <!--  <li>-->
            <!--    <a href="add_extra_poster.php" class="waves-effect"><i class="fa fa-picture-o"></i> <span> Extra Posters-->
            <!--     </a>-->
            <!--</li>   -->

            <!-- <li>-->
            <!--    <a href="add_extra_vid.php" class="waves-effect"><i class="fa fa-play"></i> <span> Extra Video-->
            <!--     </a>-->
            <!--</li>  -->

            <!-- <li>-->
            <!--    <a href="add_package_cat.php" class="waves-effect"><i class="mdi mdi-newspaper"></i> <span>Poster package category </a>-->
            <!--</li>-->

            <!--<li>-->
            <!--    <a href="add_video_cat.php" class="waves-effect"><i class="fa fa-video-camera"></i> <span> Video package category </a>-->
            <!--</li>-->

              
       <!--       <li><a href="add_banner.php"><i class="mdi mdi-filmstrip-off"></i>Banner</a></li>
             
             <li><a href="add_plan.php"><i class="fa fa-minus-square"></i>Plan</a></li>
             
             <li><a href="add_other.php"><i class="fa fa-address-book"></i>Other</a></li>
 -->

             <!--<li><a href="#"><i class="fa fa-bell"></i>Notification</a></li>-->

            
         
        </ul>
    </div>
    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
