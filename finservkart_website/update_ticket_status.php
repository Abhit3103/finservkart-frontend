<?php
include 'db_connection.php';

if (isset($_POST['ticket_id']) && isset($_POST['status'])) {
    $ticket_id = $_POST['ticket_id'];
    $status = $_POST['status'];

    $query = "UPDATE tickets SET status = '$status' WHERE id = $ticket_id";
    if (mysqli_query($conn, $query)) {
        echo "Ticket status updated successfully!";
    } else {
        echo "Error updating ticket: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}
?>
