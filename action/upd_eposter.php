<?php 
include '../include/db.php';
include '../include/compression.php';

extract($_POST);


$uid = $_GET['uid'];


$tclr1 = $_POST['tclr1'];
$fclr1 = $_POST['fclr1'];

$sel_banner = mysqli_query($con,"select * from extra_poster where id='$uid' ");
  $banner_sel = mysqli_fetch_array($sel_banner);
  $fe_img = $banner_sel['image'];

  $banner =  $_FILES['banner1']['name'];
  $fmgg = $fe_img;



if(strlen($_FILES['banner1']['name']) != 0) {


	$newThumb =  rand(100, 999) . $_FILES['banner1']['name'];
	$thumbPath = "../upload/extra_poster/" . $newThumb;
	move_uploaded_file($_FILES['banner1']['tmp_name'], $thumbPath);
	$fmgg = $newThumb;
	unlink("../upload/extra_poster/" . $fe_img);
}

 
//   $update1 =mysqli_query($con,"update image set cat_id='$cat',text_clr='$tclr1',frm_clr='$fclr1',image='$fmgg',language='$lga1' ");


 $update1 = mysqli_query($con,"update extra_poster set is_poli='$isp1',cat_id='$cat',text_clr='$tclr1',frm_clr='$fclr1',image='$fmgg',language='$lga1' where id='$uid' ");
 
 echo "<script>alert('Extra Poster Updated successfully.');
	window.location.href='../add_eposter.php';
	</script>";
 

 $Images = $_FILES["banner"];
 $TmpImg = array(); 
 for($j=0;$j<count($tclr);$j++)
 {

			$ImageName = $Images["name"][$j];
              if($ImageName!='')
              {
                  
             $ImageName =  rand(100, 999) . $ImageName;
             $ImagePath = "../upload/extra_poster/" . $ImageName;
             array_push($TmpImg, $ImageName);
             move_uploaded_file($Images["tmp_name"][$j], $ImagePath);
             
              }
              else
              {
                  $ImageName ='';
              } 
 	$insert = mysqli_query($con,"insert into extra_poster set is_poli='$isp[$j]',cat_id='$cat',text_clr='$tclr[$j]',frm_clr='$fclr[$j]',image='$ImageName',language='$lga[$j]' ");

// if($insert>0 || $update1>0)
// {

	// echo "<script>alert('Poster added successfully.');
	// window.location.href='../add_poster.php';
	// </script>";
	echo "<script>alert('Extra Poster Updated successfully.');
	window.location.href='../add_eposter.php';
	</script>";
// }
// else
// {
// 	echo "<script>alert('please add proper data.');
// 	window.location.href='../add_eposter.php';
// 	</script>";
// }
 	
 }



?>