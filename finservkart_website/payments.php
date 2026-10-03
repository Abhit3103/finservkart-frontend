<?php
include 'db_connection.php'; 

$query = "SELECT p.id, c.fname AS customer_name, p.amount, p.status 
          FROM payments p 
          JOIN customer c ON p.customer_id = c.id";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn)); // Debugging ke liye
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payments</title>
</head>
<body>
    <h2>Payment List</h2>
    <table border="1">
        <tr>
            <th>Payment ID</th>
            <th>Customer</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Update</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <select class="payment-status" data-id="<?php echo $row['id']; ?>">
                    <option value="Pending" <?php if ($row['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                    <option value="Paid" <?php if ($row['status'] == 'Paid') echo 'selected'; ?>>Paid</option>
                </select>
            </td>
        </tr>
        <?php } ?>
    </table>

    <script>
        document.querySelectorAll('.payment-status').forEach(select => {
            select.addEventListener('change', function () {
                let paymentId = this.getAttribute('data-id');
                let newStatus = this.value;
                
                fetch('update_payment_status.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'payment_id=' + paymentId + '&status=' + newStatus
                })
                .then(response => response.text())
                .then(data => alert(data));
            });
        });
    </script>
</body>
</html>
