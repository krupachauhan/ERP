<?php 
include '../include/db.php';
include '../include/compression.php';

extract($_POST);

$thumb1 =  $_FILES['banner']['name'];
if($thumb1!=''){
	$thumb = rand(100, 999) . $thumb1;

// $thumb = rand(100, 999) .  $_FILES['banner']['name'];
@$thumbpath = "../upload/frame/" . $thumb;
move_uploaded_file($_FILES['banner']['tmp_name'], $thumbpath);
compress(@$thumbPath, @$thumbPath,90);
}
else
{
	$thumb='';
}

$sql = "INSERT INTO frame set image='$thumb',type='$type',logo_pos='$logo_pos',img_posi='$pro_pos' ";
// $inr = mysqli_query($con,$in);
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
if($result>0)
{

	// echo "<script>alert('Poster added successfully.');
	// window.location.href='../add_poster.php';
	// </script>";
	echo "<script>alert('Frame added successfully.');
	window.location.href='../add_frame.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data.');
	window.location.href='../add_frame.php';
	</script>";
}

?>