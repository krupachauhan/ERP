<?php
include '../include/db.php';

extract($_POST);

$uid = $_GET['uid'];

  $sel_banner = mysqli_query($con,"select * from banner where id='$uid' ");
  $banner_sel = mysqli_fetch_array($sel_banner);
  $fe_img = $banner_sel['b_img'];

  $banner =  $_FILES['banner']['name'];
  $fmgg = $fe_img;



if(strlen($_FILES['banner']['name']) != 0) {


	$newThumb =  rand(100, 999) . $_FILES['banner']['name'];
	$thumbPath = "../upload/banner/" . $newThumb;
	move_uploaded_file($_FILES['banner']['tmp_name'], $thumbPath);
	$fmgg = $newThumb;
	unlink("../upload/banner/" . $fe_img);
}


$sql = "update banner set b_img='$fmgg' where id=$uid";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

//  header('location: ../logo_list.php');
if($result>0)
{
	echo "<script>alert('Banner updated successfully.');
	window.location.href='../add_banner.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}
?>