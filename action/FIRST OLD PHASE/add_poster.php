<?php 
include '../include/db.php';
include '../include/compression.php';

extract($_POST);



$thumb1 =  $_FILES['banner']['name'];
if($thumb1!=''){
	$thumb = rand(100, 999) . $thumb1;

// $thumb = rand(100, 999) .  $_FILES['banner']['name'];
@$thumbpath = "../upload/poster/" . $thumb;
move_uploaded_file($_FILES['banner']['tmp_name'], $thumbpath);
compress(@$thumbPath, @$thumbPath,90);
}
else
{
	$thumb='';
}

$sql = "INSERT INTO poster set pos_img='$thumb',pos_cid='$pos_cat',language='$lang',text_clr='$clr',logo_pos='$logo_pos',pphoto_pos='$pro_pos',social_pos='$soc_pos',cal_date='$cal_date' ";
// $inr = mysqli_query($con,$in);
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
if($result>0)
{

	echo "<script>alert('Poster added successfully.');
	window.location.href='../add_poster.php?pid=$pid';
	</script>";
// 	echo "<script>alert('Poster added successfully.');
// 	window.location.href='../poster_cat.php';
// 	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}

?>