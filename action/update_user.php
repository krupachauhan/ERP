<?php 
include '../include/db.php';
include '../include/compression.php';

extract(@$_POST);

$uid = $_GET['uid'];


$ids = $_POST['ids'];

$idsb = $_POST['idsb'];


for($jsc=0;$jsc<count($idsb);$jsc++)
 {
     $iidb = $idsb[$jsc];
     
     
       $sel_banner = mysqli_query($con,"select * from custom_frame where id='$iidb' ");
       $banner_sel = mysqli_fetch_array($sel_banner); 
       
      $fe_img6 = $banner_sel['bs_frm_img'];
      
      $banner6 =  $_FILES['banner2']['name'][$jsc];
       $fmgg6 = $fe_img6;
     
     
      if(strlen($_FILES['banner2']['name'][$jsc]) != 0) {
    
      $newThumb_frms =  rand(100, 999) . $_FILES['banner2']['name'][$jsc];
      $thumbPath_frms = "../upload/custom_frame/" . $newThumb_frms;
      move_uploaded_file($_FILES['banner2']['tmp_name'][$jsc], $thumbPath_frms);
      $fmgg6 = $newThumb_frms;
      unlink("../upload/custom_frame/" . $fe_img6);
    }
    
    //echo "update custom_frame set bs_frm_img = '$fmgg6' where id='$iidb' and user_id='$uid'   ";
    $update_ff = mysqli_query($con,"update custom_frame set bs_frm_img = '$fmgg6' where id='$iidb' and user_id='$uid'   ");
     
 }


for($js=0;$js<count($ids);$js++)
 {
     $iid = $ids[$js];
     
       $sel_banner = mysqli_query($con,"select * from custom_frame where id='$iid' ");
     $banner_sel = mysqli_fetch_array($sel_banner);
      $fe_img5 = $banner_sel['frm_img'];

     
      $banner =  $_FILES['banner1']['name'][$js];
      $fmgg5 = $fe_img5;
      
      
      
    if(strlen($_FILES['banner1']['name'][$js]) != 0) {
    
    	$newThumb_frm =  rand(100, 999) . $_FILES['banner1']['name'][$js];
    	$thumbPath_frm = "../upload/custom_frame/" . $newThumb_frm;
    	move_uploaded_file($_FILES['banner1']['tmp_name'][$js], $thumbPath_frm);
    	$fmgg5 = $newThumb_frm;
    	unlink("../upload/custom_frame/" . $fe_img5);
    }
    //echo "update custome_frame set frm_img = '$fmgg5' where id='$iid' and user_id='$uid'   ";
    $update_f = mysqli_query($con,"update custom_frame set frm_img = '$fmgg5' where id='$iid' and user_id='$uid'   ");

}


$Images = $_FILES["banner"];
 $TmpImg = array(); 
 for($j=0;$j<count($Images);$j++)
 {

			$ImageName = $Images["name"][$j];
              if($ImageName!='')
              {
                  
             $ImageName =  rand(100, 999) . $ImageName;
             $ImagePath = "../upload/custom_frame/" . $ImageName;
             array_push($TmpImg, $ImageName);
             move_uploaded_file($Images["tmp_name"][$j], $ImagePath);
             
             $insert = mysqli_query($con,"insert into custom_frame set frm_img='$ImageName',user_id='$uid' ");
             
              }
              else
              {
                  $ImageName ='';
              } 
 	
	
 }
 
 $Imagess = $_FILES["bannerr"];
 $TmpImgg = array(); 
 for($jj=0;$jj<count($Imagess);$jj++)
 {

      $ImageNames = $Imagess["name"][$jj];
              if($ImageNames!='')
              {
                  
             $ImageNames =  rand(100, 999) . $ImageNames;
             $ImagePaths = "../upload/custom_frame/" . $ImageNames;
             array_push($TmpImgg, $ImageNames);
             move_uploaded_file($Imagess["tmp_name"][$jj], $ImagePaths);
             
             $insert = mysqli_query($con,"insert into custom_frame set bs_frm_img='$ImageNames',user_id='$uid' ");
             
              }
              else
              {
                  $ImageNames ='';
              } 
  
  
 }



$s = mysqli_query($con,"select * from user where id ='$uid' ");
$r = mysqli_fetch_array($s);

 $fe_img = $r['personal_logo'];
 $fmgg = $fe_img;

 $fe_img1 = $r['business_logo'];
 $fmgg1 = $fe_img1;

 $fe_img2 = $r['bus_limg'];
 $fmgg2 = $fe_img2;
 
 $fe_img3 = $r['poli_pro_img'];
 $fmgg3 = $fe_img3;
 
 

//poli user logo img
 if(strlen($_FILES['pol_limg']['name']) != 0) {

	$newThumb =  rand(100, 999) . $_FILES['pol_limg']['name'];
	$thumbPath = "../upload/users/" . $newThumb;
	move_uploaded_file($_FILES['pol_limg']['tmp_name'], $thumbPath);
	@$fmgg = $newThumb;
	unlink("../upload/users/" . $fe_img);
}

//poli user profile img
 if(strlen($_FILES['pol_pimg']['name']) != 0) {

	$newThumb1 =  rand(100, 999) . $_FILES['pol_pimg']['name'];
	$thumbPath1 = "../upload/users/" . $newThumb1;
	move_uploaded_file($_FILES['pol_pimg']['tmp_name'], $thumbPath1);
	@$fmgg1 = $newThumb1;
	unlink("../upload/users/" . $fe_img1);
}



//user profile img
 if(strlen($_FILES['pro_img']['name']) != 0) {

	$newThumb3 =  rand(100, 999) . $_FILES['pro_img']['name'];
	$thumbPath3 = "../upload/users/" . $newThumb3;
	move_uploaded_file($_FILES['pro_img']['tmp_name'], $thumbPath3);
	@$fmgg3 = $newThumb3;
	unlink("../upload/users/" . $fe_img3);
}




// bus_unmae='$bus_unmae', bus_pwd='$bus_pwd',pol_logo_pos='$pol_logo_pos', pol_pro_pos='$pol_pro_pos',
  $sql = "update  user set poli_pro_img='$fmgg3',name_hindi='$hname',name_guj='$gname',post_hindi='$posth',post_guj='$postg',business_detail='$bdetail',name='$name',email='$email',pwd='$pwd',post='$post',social_media='$social_media',personal_logo='$fmgg',business_logo='$fmgg1',bus_name='$bus_name',bus_adress='$bus_adress',bus_mobile='$bus_mobile',bus_social_media='$bus_smedia',bus_email='$bus_email',bus_web='$bus_web',sdate='$sdate',edate='$edate'  where id='$uid' ";

$result = mysqli_query($con, $sql) or die(mysqli_error($con));
if($result>0)
{

	echo "<script>alert('User updated successfully.');	window.location.href='../user.php';	</script>";
}
else
{
    echo "<script>alert('please add proper data.');
	window.location.href='../user.php';
	</script>";
// 	echo "<script>alert('please add proper data');</script>";
}

?>