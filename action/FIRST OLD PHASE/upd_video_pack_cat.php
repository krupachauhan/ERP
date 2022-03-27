<?php
include '../include/db.php';

extract($_POST);

$uid = $_GET['uid'];

$sql = "update video_pack_cat set vid_cname='$vcat' where vid_id=$uid";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

if($result>0)
{
	echo "<script>alert('Category updated successfully.');
	window.location.href='../add_video_cat.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}
?>