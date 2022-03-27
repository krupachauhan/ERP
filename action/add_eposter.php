<?php 
include '../include/db.php';
include '../include/compression.php';

extract($_POST);


$uid = $_GET['uid'];


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
              
              $isp[$j] = '';
 	$insert = mysqli_query($con,"insert into extra_poster set cat_id='$cat',text_clr='$tclr[$j]',frm_clr='$fclr[$j]',image='$ImageName',language='$lga[$j]',is_poli='$isp[$j]' ");

if($insert>0)
{

	
	
	echo "<script>alert('Extra Poster added successfully.');
	window.location.href='../add_eposter.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data.');
	window.location.href='../add_eposter.php';
	</script>";
}
 	
 }



?>