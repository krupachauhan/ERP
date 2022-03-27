<?php
include '../include/db.php';

extract($_POST);

$uid = $_GET['uid'];

  $sel_banner = mysqli_query($con,"select * from frame where id='$uid' ");
  $banner_sel = mysqli_fetch_array($sel_banner);
  $fe_img = $banner_sel['image'];

  $banner =  $_FILES['banner']['name'];
  $fmgg = $fe_img;



if(strlen($_FILES['banner']['name']) != 0) {


	$newThumb =  rand(100, 999) . $_FILES['banner']['name'];
	$thumbPath = "../upload/frame/" . $newThumb;
	move_uploaded_file($_FILES['banner']['tmp_name'], $thumbPath);
	$fmgg = $newThumb;
	unlink("../upload/frame/" . $fe_img);
}


$sql = "update frame set image='$fmgg',type='$type',logo_pos='$logo_pos',img_posi='$pro_pos' where id=$uid";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

//  header('location: ../logo_list.php');
if($result>0)
{
	// echo "<script>alert('poster updated successfully.');
	// window.location.href='../add_poster.php';
	// </script>";

	echo "<script>alert('Frame updated successfully.');
	window.location.href='../add_frame.php';
	</script>";
}
else
{
	echo "<script>alert('Please add proper data.');
	window.location.href='../add_frame.php';
	</script>";
}
?>