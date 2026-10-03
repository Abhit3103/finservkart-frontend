<?php
include_once('../../include/config.php');

$fees = $_POST['fees'];
$id = 1;

$sql = "UPDATE admin SET fees = $fees WHERE id = $id";

if (mysqli_query($con, $sql)) {
    echo 'Success';
} else {
    echo 'Failed: ' . mysqli_error($con);  
}

mysqli_close($con);
?>
