<?php 
include '../include/db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

extract($_POST);

$thumb1 =  $_FILES['banner']['name'];
if($thumb1!=''){
	$thumb = rand(100, 999) . $thumb1;

// $thumb = rand(100, 999) .  $_FILES['banner']['name'];
 @$thumbpath = "../upload/video/" . $thumb;
move_uploaded_file($_FILES['banner']['tmp_name'], $thumbpath);
}
else
{
	$thumb='';
}
exit;

$sql = "INSERT INTO video set v_video='$thumb',v_cid='$pos_cat',v_sdate='$cal_date' ";
// $inr = mysqli_query($con,$in);
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
if($result>0)
{

	echo "<script>alert('video added successfully.');
	window.location.href='../video_cat.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}

?>