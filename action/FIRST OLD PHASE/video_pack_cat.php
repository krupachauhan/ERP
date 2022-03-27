<?php 
include '../include/db.php';
include '../include/compression.php';

extract($_POST);

$sel_cat = mysqli_query($con,"select * from video_pack_cat where vid_cname='$vcat' ");
if(mysqli_num_rows($sel_cat)>0)
{
	echo "<script>alert('video category already exist.');
	window.location.href='../add_video_cat.php';
	</script>";

}
else
{

	$sql = "INSERT INTO video_pack_cat set vid_cname='$vcat' ";
// $inr = mysqli_query($con,$in);
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
	if($result>0)
	{

		echo "<script>alert('Category added successfully.');
		window.location.href='../add_video_cat.php';
		</script>";
	}
	else
	{
		echo "<script>alert('please add proper data');</script>";
	}

}





?>