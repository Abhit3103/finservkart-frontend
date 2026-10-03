<?php
include 'db_connection.php';

if (isset($_POST['payment_id']) && isset($_POST['status'])) {
    $payment_id = $_POST['payment_id'];
    $status = $_POST['status'];

    $query = "UPDATE payments SET status = '$status' WHERE id = $payment_id";
    if (mysqli_query($conn, $query)) {
        echo "Payment status updated successfully!";
    } else {
        echo "Error updating payment: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}
?>
