<?php
include '../include/db.php';

extract($_POST);

$uid = $_GET['uid'];

$sql = "update poster_pack_cat set cat_name='$cat' where cat_id=$uid";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

if($result>0)
{
	echo "<script>alert('Category updated successfully.');
	window.location.href='../add_package_cat.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}
?>