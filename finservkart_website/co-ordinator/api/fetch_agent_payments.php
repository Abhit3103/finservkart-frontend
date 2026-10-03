<?php
include_once('../../include/config.php');
if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    // Fetch profile details
    $query = "SELECT * FROM agent INNER JOIN agents_pay ON agent.AGID = agents_pay.agid WHERE agents_pay.pid = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $pid);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        echo '<div class="card mb-3">
                <div class="row g-0">
                 <div class="col">
                    <div class="card-body">
                      <p class="card-text">
                          <ul>
                              <li>PID: '.$row['pid'].'</li>
                              <li>Name: '.$row['fname'].' '.$row['lname'].'</li>
                              <li>Amount : ₹'.$row['amt'].'/-</li>
                              <li>Payment ID : '.$row['payment_id'].'</li>
                              <li>Status : '.$row['status'].'</li>
                              <li>Email : '.$row['email'].'</li>
                              <li>Phone : '.$row['phone'].'</li>
                              <li>Date : '.$row['regdate'].'</li>
                          </ul>
                      </p>
                    </div>
                 </div>
                </div>
              </div>';
    } else {
        echo "Profile not found.";
    }
    $stmt->close();
    $con->close();
}
?>