<?php
require "db.php";
$type = $_GET['type'];

if ($conn && isset($_POST['IFSE'], $_POST['bank'], $_POST['branch'], $_POST['ACNo'], $_POST['id'])) {
    switch ($type) {
        case "customer":
            $sql = sprintf("UPDATE customer SET IFSE =?, bank =?, branch =?, ACNo =? WHERE id =?",
                $conn->quote($_POST['IFSE']),
                $conn->quote($_POST['bank']),
                $conn->quote($_POST['branch']),
                $conn->quote($_POST['ACNo']),
                $conn->quote($_POST['id'])
            );

            if ($conn->exec($sql)) { 
                echo 'Success'; 
            } else {
                // Log and show error
                error_log(print_r($conn->errorInfo(), true));
                echo 'Failed'; 
            }
            break;
        default:
            echo "API ERROR";
            break;
    }
} else {
    echo 'Error: API Call Time Out';
}
$conn = null;
?>
