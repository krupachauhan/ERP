<?php
include '../include/db.php';

extract($_POST);

$uid = $_GET['uid'];

$sql = "update plan set name='$pname',detail='$detail',price='$price',type='$type',ori_price='$ori_price' where id='$uid'  ";
// $inr = mysqli_query($con,$in);
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
if($result>0)
{

	echo "<script>alert('Plan updated successfully.');
	window.location.href='../add_plan.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}

?>