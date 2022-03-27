<?php
include '../include/db.php';

extract($_POST);

$uid = $_GET['uid'];

  $sel_banner = mysqli_query($con,"select * from video where v_id='$uid' ");
  $banner_sel = mysqli_fetch_array($sel_banner);
  $fe_img = $banner_sel['v_video'];

  $banner =  $_FILES['banner']['name'];
  $fmgg = $fe_img;



if(strlen($_FILES['banner']['name']) != 0) {


	$newThumb =  rand(100, 999) . $_FILES['banner']['name'];
	$thumbPath = "../upload/video/" . $newThumb;
	move_uploaded_file($_FILES['banner']['tmp_name'], $thumbPath);
	$fmgg = $newThumb;
	unlink("../upload/video/" . $fe_img);
}


$sql = "update video set v_video='$fmgg',v_cid='$pos_cat',v_sdate='$cal_date' where v_id=$uid";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

//  header('location: ../logo_list.php');
if($result>0)
{
	
	echo "<script>alert('video updated successfully.');
	window.location.href='../video_cat.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}
?>