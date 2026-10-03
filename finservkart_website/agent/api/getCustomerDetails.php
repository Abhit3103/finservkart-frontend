<?php
require "db.php";
if (isset($_POST['custID'])) {
    $custID = $_POST['custID'];
    $sql = "SELECT * FROM `customer` WHERE CustID = :custID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':custID', $custID);
    $stmt->execute();
    $customerData = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($customerData);
    exit;
}
?>