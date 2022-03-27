<?php 
include '../include/db.php';

$action = $_REQUEST['action'];


if($action == 'frame')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		$SQL = "SELECT * FROM frame WHERE id='$did' ";
    	$result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    	$row = mysqli_fetch_assoc($result);
     	unlink("../upload/frame/" . $row["image"]);

		$sub_cat = "delete from  frame  where id='$did'";
		$sr = mysqli_query($con,$sub_cat);

	}
}



if($action == 'frame_multi')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		$SQL = "SELECT * FROM custom_frame WHERE id='$did' ";
    	$result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    	$row = mysqli_fetch_assoc($result);
     	unlink("../upload/custom_frame/" . $row["image"]);

		$sub_cat = "delete from  custom_frame  where id='$did'";
		$sr = mysqli_query($con,$sub_cat);

	}
}


if($action == 'plan')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];


		$sub_cat = "delete from  plan  where id='$did'";
		$sr = mysqli_query($con,$sub_cat);

	}
}



if($action == 'image')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		$SQL = "SELECT * FROM image WHERE id='$did' ";
    	$result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    	$row = mysqli_fetch_assoc($result);
     	unlink("../upload/img/" . $row["image"]);

		$sub_cat = "delete from  image  where id='$did'";
		$sr = mysqli_query($con,$sub_cat);

	}
}

if($action == 'eposter')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		$SQL = "SELECT * FROM extra_poster WHERE id='$did' ";
    	$result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    	$row = mysqli_fetch_assoc($result);
     	unlink("../upload/extra_poster/" . $row["image"]);

		$sub_cat = "delete from  extra_poster  where id='$did'";
		$sr = mysqli_query($con,$sub_cat);

	}
}


if($action == 'banner')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		 $SQL = "SELECT * FROM banner WHERE id='$did' ";
    	$result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    	$row = mysqli_fetch_assoc($result);
     	unlink("../upload/banner/" . $row["b_img"]);

		$delete = "delete from banner where id='$did'";
		$dr = mysqli_query($con,$delete);
	}
}


if($action == 'video')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		 $SQL = "SELECT * FROM video WHERE id='$did' ";
    	$result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    	$row = mysqli_fetch_assoc($result);
     	unlink("../upload/video/" . $row["video"]);

		$delete = "delete from video where id='$did'";
		$dr = mysqli_query($con,$delete);
	}
}



if($action == 'vposter')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		 $SQL = "SELECT * FROM extra_video WHERE id='$did' ";
    	$result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    	$row = mysqli_fetch_assoc($result);
     	unlink("../upload/extra_video/" . $row["video"]);

		$delete = "delete from extra_video where id='$did'";
		$dr = mysqli_query($con,$delete);
	}
}


if($action == 'users')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		 // $SQL = "SELECT * FROM users WHERE uid='$did' ";
   //  	$result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    
		$delete = "delete from users where id='$did'";
		$dr = mysqli_query($con,$delete);
	}
}


if($action == 'category')
{
	if (! empty($_POST["id"]))
	{
		$did=$_POST['id'];

		 // $SQL = "SELECT * FROM users WHERE uid='$did' ";
   //  	$result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    
		$delete = "delete from category where id='$did'";
		$dr = mysqli_query($con,$delete);
	}
}
?>