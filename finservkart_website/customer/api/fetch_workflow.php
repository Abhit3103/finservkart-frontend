<?php
include_once('../../include/config.php');
if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    // Fetch profile details
    $query = "SELECT workflow.*, ca.fname, ca.lname, ca.CAProfile FROM workflow JOIN ca ON workflow.CAID = ca.CAID WHERE workflow.pid = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $pid);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        echo '<div class="card mb-3">
                <div class="row g-0">
                 <div class="col-md-4">
                    <img src="../../CA/assets/profile/'.$row['CAProfile'].'" class="img-fluid rounded-start" alt="...">
                 </div>
                 <div class="col-md-8">
                    <div class="card-body">
                      <p class="card-text">
                          <ul>
                              <li>CA ID: '.$row['CAID'].'</li>
                              <li>CA Name: '.$row['fname'].' '.$row['lname'].'</li>
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
