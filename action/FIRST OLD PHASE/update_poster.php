<?php
include '../include/db.php';

extract($_POST);

$uid = $_GET['uid'];

  $sel_banner = mysqli_query($con,"select * from poster where pos_id='$uid' ");
  $banner_sel = mysqli_fetch_array($sel_banner);
  $fe_img = $banner_sel['pos_img'];

  $banner =  $_FILES['banner']['name'];
  $fmgg = $fe_img;



if(strlen($_FILES['banner']['name']) != 0) {


	$newThumb =  rand(100, 999) . $_FILES['banner']['name'];
	$thumbPath = "../upload/poster/" . $newThumb;
	move_uploaded_file($_FILES['banner']['tmp_name'], $thumbPath);
	$fmgg = $newThumb;
	unlink("../upload/poster/" . $fe_img);
}


$sql = "update poster set pos_img='$fmgg',pos_cid='$pos_cat',language='$lang',text_clr='$clr',logo_pos='$logo_pos',pphoto_pos='$pro_pos',social_pos='$soc_pos',cal_date='$cal_date' where pos_id=$uid";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

//  header('location: ../logo_list.php');
if($result>0)
{
	echo "<script>alert('poster updated successfully.');
	window.location.href='../add_poster.php?pid=$pos_cat';
	</script>";

// 	echo "<script>alert('poster updated successfully.');
// 	window.location.href='../poster_cat.php';
// 	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}
?>