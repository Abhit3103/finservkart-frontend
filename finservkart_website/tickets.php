<?php
include 'db_connection.php'; // डेटाबेस कनेक्शन

$query = "SELECT t.id, CONCAT(c.fname, ' ', c.lname) AS customer_name, t.status 
          FROM tickets t 
          JOIN customer c ON t.customer_id = c.id";

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tickets</title>
</head>
<body>
    <h2>Ticket List</h2>
    <table border="1">
        <tr>
            <th>Ticket ID</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Update</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <select class="ticket-status" data-id="<?php echo $row['id']; ?>">
                    <option value="Open" <?php if ($row['status'] == 'Open') echo 'selected'; ?>>Open</option>
                    <option value="Ongoing" <?php if ($row['status'] == 'Ongoing') echo 'selected'; ?>>Ongoing</option>
                    <option value="Closed" <?php if ($row['status'] == 'Closed') echo 'selected'; ?>>Closed</option>
                </select>
            </td>
        </tr>
        <?php } ?>
    </table>

    <script>
        document.querySelectorAll('.ticket-status').forEach(select => {
            select.addEventListener('change', function () {
                let ticketId = this.getAttribute('data-id');
                let newStatus = this.value;
                
                fetch('update_ticket_status.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'ticket_id=' + ticketId + '&status=' + newStatus
                })
                .then(response => response.text())
                .then(data => alert(data));
            });
        });
    </script>
</body>
</html>
