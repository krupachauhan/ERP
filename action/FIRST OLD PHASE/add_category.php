<?php 
include '../include/db.php';
include '../include/compression.php';

extract($_POST);

$thumb1 =  $_FILES['cat_img']['name'];
if($thumb1!=''){
	$thumb = rand(100, 999) . $thumb1;
	
// $thumb = rand(100, 999) .  $_FILES['cat_img']['name'];
@$thumbpath = "../upload/category/" . $thumb;
move_uploaded_file($_FILES['cat_img']['tmp_name'], $thumbpath);
compress(@$thumbPath, @$thumbPath,90);
}
else
{
	$thumb='';
}


$sel_cat = mysqli_query($con,"select * from category where name='$cat' and posi='$posi' ");
if(mysqli_num_rows($sel_cat)>0)
{
	echo "<script>alert('Category with position allready exist.');
	window.location.href='../add_category.php';
	</script>";

}
else
{

	$sql = "INSERT INTO category set name='$cat',c_img='$thumb',posi='$posi' ";
// $inr = mysqli_query($con,$in);
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
	if($result>0)
	{

		echo "<script>alert('Category added successfully.');
		window.location.href='../add_category.php';
		</script>";
	}
	else
	{
		echo "<script>alert('please add proper data');</script>";
	}

}





?>