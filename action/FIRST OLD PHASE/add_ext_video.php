<?php 
include '../include/db.php';



extract($_POST);

$thumb1 =  $_FILES['banner']['name'];
if($thumb1!=''){
	$thumb = rand(100, 999) . $thumb1;

// $thumb = rand(100, 999) .  $_FILES['banner']['name'];
 @$thumbpath = "../upload/extra_video/" . $thumb;
move_uploaded_file($_FILES['banner']['tmp_name'], $thumbpath);

}
else
{
	$thumb='';
}


echo $sql = "INSERT INTO extra_vid set exv_vid='$thumb',exv_cname='$exp_cat' ";
// $inr = mysqli_query($con,$in);
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
if($result>0)
{

	echo "<script>alert('video added successfully.');
	window.location.href='../add_extra_vid.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}

?>