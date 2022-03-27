<?php
include '../include/db.php';

extract($_POST);

$uid = $_GET['uid'];

  $sel_banner = mysqli_query($con,"select * from extra_vid where exv_id='$uid' ");
  $banner_sel = mysqli_fetch_array($sel_banner);
  $fe_img = $banner_sel['exv_vid'];

  $banner =  $_FILES['banner']['name'];
  $fmgg = $fe_img;



if(strlen($_FILES['banner']['name']) != 0) {


	$newThumb =  rand(100, 999) . $_FILES['banner']['name'];
	$thumbPath = "../upload/extra_video/" . $newThumb;
	move_uploaded_file($_FILES['banner']['tmp_name'], $thumbPath);
	$fmgg = $newThumb;
	unlink("../upload/extra_video/" . $fe_img);
}


$sql = "update extra_vid set exv_vid='$fmgg',exv_cname='$exp_cat' where exv_id=$uid";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

//  header('location: ../logo_list.php');
if($result>0)
{
	
	echo "<script>alert('video updated successfully.');
	window.location.href='../add_extra_vid.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}
?>