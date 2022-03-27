<?php 
include '../include/db.php';
include '../include/compression.php';

extract($_POST);

$thumb1 =  $_FILES['banner']['name'];
if($thumb1!=''){
	$thumb = rand(100, 999) . $thumb1;

// $thumb = rand(100, 999) .  $_FILES['banner']['name'];
@$thumbpath = "../upload/banner/" . $thumb;
move_uploaded_file($_FILES['banner']['tmp_name'], $thumbpath);
compress(@$thumbPath, @$thumbPath,90);
}
else
{
	$thumb='';
}

$sql = "INSERT INTO banner set b_img='$thumb' ";
// $inr = mysqli_query($con,$in);
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
if($result>0)
{


	$st = mysqli_query($con,"select * from token");
	while($ts = mysqli_fetch_array($st)){

		 $token = $ts['token'];

		$message = "New Banner Added" ;
		$fields = [
			'notification' => [
				'title' =>"Hello",
				'body' => $message,
				'sound' => 'default',
                // 'click_action' => 'FCM_PLUGIN_ACTIVITY',
				'icon' => 'fcm_push_icon' 
			],

			'to'=>$token,            
			'priority' => 'high'  
		];

		$temp['message'] = "This is a Firebase Cloud Messaging Topic Message!";

        //$fields['data'] = json_encode($temp);

		$fields = json_encode($fields);
		$ch = curl_init('https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization:key=AAAAw76djlM:APA91bHzJTlysRrpng0-3oXEQI-CkMUz3jq4M5hr0oQqXbhzfAnF2PMtIbrSSsGyPlUF8FoPQNeLltmnAr3IaB8JIeh1Zzo16le1Wq-EbakKqanYhj6wuUrYW2jogl7S_Bm0Uxoc_Lu8' 
		));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		$result = curl_exec($ch);
         // echo  $result;

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