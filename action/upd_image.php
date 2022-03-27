<?php 
include '../include/db.php';
include '../include/compression.php';

extract($_POST);


$uid = $_GET['uid'];

$date = $_GET['date'];
$ids = $_POST['ids'];

$cal_date = $_POST['cal_date'];

for($js=0;$js<count($ids);$js++)
 {
     $iid = $ids[$js];
     
     $tclr1 = $_POST['tclr1'][$js];
     $fclr1 = $_POST['fclr1'][$js];
     
     $sel_banner = mysqli_query($con,"select * from image where id='$iid' ");
     $banner_sel = mysqli_fetch_array($sel_banner);
     $fe_img = $banner_sel['image'];

      $banner =  $_FILES['banner1']['name'][$js];
      $fmgg = $fe_img;



if(strlen($_FILES['banner1']['name'][$js]) != 0) {


	$newThumb =  rand(100, 999) . $_FILES['banner1']['name'][$js];
	$thumbPath = "../upload/img/" . $newThumb;
	move_uploaded_file($_FILES['banner1']['tmp_name'][$js], $thumbPath);
	$fmgg = $newThumb;
	unlink("../upload/img/" . $fe_img);
}



  $update1 = mysqli_query($con,"update image set idate='$cal_date',is_poli='$isp1[$js]',name='$name1[$js]',text_clr='$tclr1',frm_clr='$fclr1',language='$lga1[$js]',image='$fmgg'  where id='$iid' and idate='$date' ");
    //   echo "update image set image='$fmgg'  where ;
     
     
     
}

echo "<script>alert('Image Updated successfully.');
	window.location.href='../add_image.php';
	</script>";
	
	
 $Images = $_FILES["banner"];
 $TmpImg = array(); 
 for($j=0;$j<count($tclr);$j++)
 {

			$ImageName = $Images["name"][$j];
              if($ImageName!='')
              {
                  
             $ImageName =  rand(100, 999) . $ImageName;
             $ImagePath = "../upload/img/" . $ImageName;
             array_push($TmpImg, $ImageName);
             move_uploaded_file($Images["tmp_name"][$j], $ImagePath);
             
              }
              else
              {
                  $ImageName ='';
              } 
 	$insert = mysqli_query($con,"insert into image set is_poli='$isp[$j]',name='$name[$j]',idate='$cal_date',text_clr='$tclr[$j]',frm_clr='$fclr[$j]',image='$ImageName',language='$lga1[$j]' ");

if($insert>0)
{

	// echo "<script>alert('Poster added successfully.');
	// window.location.href='../add_poster.php';
	// </script>";
	echo "<script>alert('Image Updated successfully.');
	window.location.href='../add_image.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data.');
	window.location.href='../add_image.php';
	</script>";
}
 	
 }


?>