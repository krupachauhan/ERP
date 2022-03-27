<?php 
include '../include/db.php';

$action = $_REQUEST['action'];


if($action == 'poster_pack_cat')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		$sub_cat = "delete from  poster  where pos_cid='$did'";
		$sr = mysqli_query($con,$sub_cat);

		$delete = "delete from  poster_pack_cat  where cat_id='$did'";
		$dr = mysqli_query($con,$delete);
	}
}

if($action == 'vid_category')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		 // $SQL = "SELECT * FROM banner WHERE id='$did' ";
   //  	$result = mysqli_query($con, $SQL) or die(mysqli_error($con));
   //  	$row = mysqli_fetch_assoc($result);
   //   	unlink("../upload/banner/" . $row["b_img"]);

		$delete = "delete from video_pack_cat where vid_id='$did'";
		$dr = mysqli_query($con,$delete);
	}
}

if($action == 'poster')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		 $SQL = "SELECT * FROM poster WHERE pos_id='$did' ";
    	$result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    	$row = mysqli_fetch_assoc($result);
     	unlink("../upload/poster/" . $row["pos_img"]);

		$delete = "delete from poster where pos_id='$did'";
		$dr = mysqli_query($con,$delete);
	}
}

if($action == 'exposter')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		$SQL = "SELECT * FROM extra_poster WHERE exp_id='$did' ";
    	$result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    	$row = mysqli_fetch_assoc($result);
     	unlink("../upload/extra_poster/" . $row["exp_img"]);

		$delete = "delete from extra_poster where exp_id='$did'";
		$dr = mysqli_query($con,$delete);
	}
}


if($action == 'video')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		$SQL = "SELECT * FROM video WHERE v_id='$did' ";
    	$result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    	$row = mysqli_fetch_assoc($result);
     	unlink("../upload/video/" . $row["v_video"]);

		$delete = "delete from video where v_id='$did'";
		$dr = mysqli_query($con,$delete);
	}
}


if($action == 'extra_video')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		$SQL = "SELECT * FROM extra_vid WHERE exv_id='$did' ";
    	$result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    	$row = mysqli_fetch_assoc($result);
     	unlink("../upload/extra_video/" . $row["exv_vid"]);

		$delete = "delete from extra_vid where exv_id='$did'";
		$dr = mysqli_query($con,$delete);
	}
}




if($action == 'color')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];
	
		$delete = "update colour set is_dlt='1' where id='$did'";
		$dr = mysqli_query($con,$delete);

		$product = "update  product set is_dlt='1' where color_id='$did'";
		$pr = mysqli_query($con,$product);

		
	}
}


?>