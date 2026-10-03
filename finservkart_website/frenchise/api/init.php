<?php
include_once('../include/config.php');
$query=mysqli_query($con,"select * from admin");
while($result=mysqli_fetch_array($query)){
    $fb = $result['fb'];
    $insta = $result['insta'];
    $whatsapp = $result['whatsapp'];
    $linkedin = $result['twitter'];
    $twitter = $result['linkedin'];
    $phone = $result['phone'];
    $email = $result['email'];
    $company = $result['company'];
}
?>