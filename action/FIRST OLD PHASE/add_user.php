<?php 
include '../include/db.php';
include '../include/compression.php';

extract(@$_POST);

//poli user logo img
$thumb1 =  $_FILES['pol_limg']['name'];
if($thumb1!=''){
	$thumb = rand(100, 999) . $thumb1;
// $thumb = rand(100, 999) .  $_FILES['banner']['name'];
@$thumbpath = "../upload/user/" . $thumb;
move_uploaded_file($_FILES['pol_limg']['tmp_name'], $thumbpath);
compress(@$thumbPath, @$thumbPath,90);
}
else
{
	$thumb='';
}

//poli user profile img
$thumb2 =  $_FILES['pol_pimg']['name'];
if($thumb2!=''){
	$thumbs = rand(100, 999) . $thumb2;
@$thumbpath2 = "../upload/user/" . $thumbs;
move_uploaded_file($_FILES['pol_pimg']['tmp_name'], $thumbpath2);
compress(@$thumbPath2, @$thumbPath2,90);
}
else
{
	$thumbs ='';
}


//business user logo img
$thumb3 =  $_FILES['bus_limg']['name'];
if($thumb3!=''){
	$thumb3 = rand(100, 999) . $thumb3;
@$thumbpath3 = "../upload/user/" . $thumb3;
move_uploaded_file($_FILES['bus_limg']['tmp_name'], $thumbpath3);
compress(@$thumbPath3, @$thumbPath3,90);
}
else
{
	$thumb3 ='';
}

@$pol_post_cat1 = implode(',',$pol_post_cat);
@$pol_vdo_cat1 = implode(',',$pol_vdo_cat);
@$bus_pcat1 = implode(',',$bus_pcat);
@$bus_vcat1 = implode(',',$bus_vcat);

// bus_unmae='$bus_unmae', bus_pwd='$bus_pwd', pol_logo_pos='$pol_logo_pos', pol_pro_pos='$pol_pro_pos',

$sql = "INSERT INTO user set  poli_on='$poli_on', bus_on='$bus_on', user_cat='$user_cat', client_name='$client_name', user_name='$user_name', pwd='$pwd', unm_eng='$unm_eng', unm_hin='$unm_hin', unm_guj='$unm_guj', dis_name_eng='$dis_name_eng', dis_name_hin='$dis_name_hin', dis_name_guj='$dis_name_guj', pol_soc='$pol_soc', pol_post_cat='$pol_post_cat1', pol_vdo_cat='$pol_vdo_cat1', pol_sdate='$pol_sdate', pol_edate='$pol_edate',  pol_limg='$thumb', pol_pimg='$thumbs', bus_limg='$thumb3', bus_name_eng='$bus_name_eng', bus_name_hin='$bus_name_hin', bus_name_guj='$bus_name_guj', bus_add_eng='$bus_add_eng', bus_add_hin='$bus_add_hin', bus_add_guj='$bus_add_guj', bus_det_eng='$bus_det_eng', bus_det_hin='$bus_det_hin', bus_det_guj='$bus_det_guj', bus_email='$bus_email', bus_mob='$bus_mob', bus_website='$bus_website', bus_pcat='$bus_pcat1', bus_vcat='$bus_vcat1', bus_soc='$bus_soc', bus_sdte='$bus_sdte', bus_edate='$bus_edate', bus_lpos='$bus_lpos'";

$result = mysqli_query($con, $sql) or die(mysqli_error($con));
if($result>0)
{

	echo "<script>alert('User added successfully.');
	window.location.href='../add_user.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}

?>