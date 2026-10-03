<?php
include_once('../../include/config.php');
if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    // Fetch profile details
    $query = "SELECT * FROM srv_tranaction JOIN services ON srv_tranaction.serviceid = services.id JOIN agent ON srv_tranaction.referral = agent.referral JOIN customer ON srv_tranaction.CustID = customer.CustID WHERE srv_tranaction.pID = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $pid);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        echo '<div class="card mb-3">
                <div class="row g-0">
                 <div class="col-md-4">
                    <img src="../../customer/assets/profile/'.$row['CProfile'].'" class="img-fluid rounded-start" alt="...">
                 </div>
                 <div class="col-md-8">
                    <div class="card-body">
                      <p class="card-text">
                          <ul>
                              <li>Project ID: '.$row['pID'].'</li>
                              <li>Customer Name: '.$row['fname'].' '.$row['lname'].'</li>
                              <li>Customer Phone: '.$row['phone'].'</li>
                              <li>CA Name: '.$row['name'].'</li>
                              <li>Service: '.$row['service'].'</li>
                              <li>Workflow: '.$row['workflow'].'</li>
                          </ul>
                      </p>
                    </div>
                 </div>
                </div>
              </div>';
    } else {
        echo "Workflow Not Generated Yet";
    }
    $stmt->close();
    $con->close();
}
?>

