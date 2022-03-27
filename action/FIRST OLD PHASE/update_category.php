<?php
include '../include/db.php';

extract($_POST);

$uid = $_GET['uid'];

  $sel_cat = mysqli_query($con,"select * from category where id='$uid' ");
  $cat_sel = mysqli_fetch_array($sel_cat);
  $fe_img = $cat_sel['c_img'];

  $cat_img =  $_FILES['cat_img']['name'];
  $fmgg = $fe_img;



if(strlen($_FILES['cat_img']['name']) != 0) {


	$newThumb =  rand(100, 999) . $_FILES['cat_img']['name'];
	$thumbPath = "../upload/category/" . $newThumb;
	move_uploaded_file($_FILES['cat_img']['tmp_name'], $thumbPath);
	$fmgg = $newThumb;
	unlink("../upload/category/" . $fe_img);
}


$sql = "update category set name='$cat',c_img='$fmgg',posi='$posi' where id=$uid";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

if($result>0)
{
	echo "<script>alert('Category updated successfully.');
	window.location.href='../add_category.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}
?>