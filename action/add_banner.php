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

$sql = "INSERT INTO banner set b_img='$thumb',link='$link' ";
// $inr = mysqli_query($con,$in);
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
if($result>0)
{



$sel = mysqli_query($con,"select * from user");
$row = mysqli_fetch_array($sel);
// while($row = mysqli_fetch_array($sel))
// {
    $token = $row['token'];
    $name = $row['name'];
    
    
    $topic ='branding_app';
     $fields = [
            'data' => [
                'title' =>"New Post Added",
                'body' => "Check App banner",
                'sound' => 'default',
                // 'click_action' => 'FCM_PLUGIN_ACTIVITY',
                'image'=> $site_url."/upload/banner/".$thumb,
                'icon' => 'fcm_push_icon' 
            ],
            'to' => '/topics/'.$topic,
            // 'to'=>$token,
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
            'Authorization:key=AAAA_5CK2o8:APA91bFRseJzpEyKohEA1qZsXkuFEg2Ufx3HmV9Qrf3O6GeVOMtTi9VZ4OKOzm8KxSNgtaT_T1f2olwAeBxveKHkv8FVRwnnhrUPGn12UnqDWsFDOU30HzmtuuzMq_F_LjbpI2oA9wGQ'  ));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $result = curl_exec($ch);
// }


	echo "<script>alert('Banner added successfully.');
	window.location.href='../add_banner.php';
	</script>";
}
else
{
	echo "<script>alert('please add proper data');</script>";
}

?>