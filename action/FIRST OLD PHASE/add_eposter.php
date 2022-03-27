<?php 
include '../include/db.php';
include '../include/compression.php';

extract($_POST);

$Images = $_FILES["images"];
$TotalFiles = count($Images["name"]);
$TmpImg = array();

for($i=0; $i<$TotalFiles; $i++ ) {
	$ImageName = rand(100, 999) . $Images["name"][$i];
	$ImagePath = "../upload/extra_poster/" . $ImageName;
	array_push($TmpImg, $ImageName);

	move_uploaded_file($Images["tmp_name"][$i], $ImagePath);
	compress($ImagePath, $ImagePath, 90);
	$ImgStr = implode(",", $TmpImg);
}
// $ImgStr = implode(",", $TmpImg);
 
for($i=0;$i<count($TmpImg);$i++)
{		
	$imgg = $TmpImg[$i];
		 $sql = "INSERT INTO extra_poster set exp_cname='$exp_cat', exp_img='$imgg' ";
         $inr = mysqli_query($con,$sql);
        //$result = mysqli_query($con, $sql) or die(mysqli_error($con));
         if($inr >0)
          {
          	echo "<script>alert('Poster added successfully.');
					window.location.href='../add_extra_poster.php';
					</script>";
          }
          else
          {
          	echo "<script>alert('please add proper data');</script>";
          }
}
exit;
$sql = "INSERT INTO extra_poster set exp_cname='$exp_cat', exp_img='$thumb' ";
// $inr = mysqli_query($con,$in);
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
if($result>0)
{


	$st = mysqli_query($con,"select * from token");
	while($ts = mysqli_fetch_array($st)){

		$token = $ts['token'];

		$message = "New Banner Added" ;


	}


	echo "<script>alert('Banner added successfully.');
	window.location.href='../add_banner.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}

?>