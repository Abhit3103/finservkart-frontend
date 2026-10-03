<?php
include_once('../include/config.php');
$query=mysqli_query($con,"select * from admin");
while($result=mysqli_fetch_array($query)){
    $fees = $result['fees'];
}
?>