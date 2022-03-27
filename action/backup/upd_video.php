<?php 
include '../include/db.php';
include '../include/compression.php';

extract($_POST);


$uid = $_GET['uid'];


$tclr1 = $_POST['tclr1'];
$fclr1 = $_POST['fclr1'];

$sel_banner = mysqli_query($con,"select * from video where id='$uid' ");
  $banner_sel = mysqli_fetch_array($sel_banner);
  $fe_img = $banner_sel['video'];

  $banner =  $_FILES['banner1']['name'];
  $fmgg = $fe_img;



if(strlen($_FILES['banner1']['name']) != 0) {


	$newThumb =  rand(100, 999) . $_FILES['banner1']['name'];
	$thumbPath = "../upload/video/" . $newThumb;
	move_uploaded_file($_FILES['banner1']['tmp_name'], $thumbPath);
	$fmgg = $newThumb;
	unlink("../upload/video/" . $fe_img);
}



  $update1 =mysqli_query($con,"update video set is_poli='$isp1',name='$name1',idate='$cal_date',text_clr='$tclr1',frm_clr='$fclr1',language='$lga',video='$fmgg'  where id='$uid' ");
echo "<script>alert('video Updated successfully.');
	window.location.href='../add_video.php';
	</script>";
	
 $Images = $_FILES["banner"];
 $TmpImg = array(); 
 for($j=0;$j<count($tclr);$j++)
 {

			$ImageName = $Images["name"][$j];
              if($ImageName!='')
              {
                  
             $ImageName =  rand(100, 999) . $ImageName;
             $ImagePath = "../upload/video/" . $ImageName;
             array_push($TmpImg, $ImageName);
             move_uploaded_file($Images["tmp_name"][$j], $ImagePath);
             
              }
              else
              {
                  $ImageName ='';
              } 
              
              
 	$insert = mysqli_query($con,"insert into video set is_poli='$isp[$j]',name='$name[$j]',idate='$cal_date',text_clr='$tclr[$j]',frm_clr='$fclr[$j]',video='$ImageName',language='$lga1[$j]' ");

if($insert>0)
{

// 	echo "<script>alert('Poster added successfully.');
// 	window.location.href='../add_poster.php';
// 	</script>";
	echo "<script>alert('video Updated successfully.');
	window.location.href='../add_video.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data.');
	window.location.href='../add_video.php';
	</script>";
}
 	
 }



?>