<?php 
include '../include/db.php';
include '../include/compression.php';

extract($_POST);



$sql = "INSERT INTO plan set name='$pname',detail='$detail',price='$price',type='$type',ori_price='$ori_price' ";
// $inr = mysqli_query($con,$in);
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
if($result>0)
{

	echo "<script>alert('Plan added successfully.');
	window.location.href='../add_plan.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}

?>