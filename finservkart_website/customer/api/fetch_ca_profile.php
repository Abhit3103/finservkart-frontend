<?php
include_once('../../include/config.php');
if(isset($_POST['caid'])){
    $caid = $_POST['caid'];
    // Fetch profile details
    $query = "SELECT * FROM ca WHERE CAID = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $caid);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        echo '<div class="card mb-3">
                <div class="row g-0">
                 <div class="col-md-4" style="width: 175px; height: 175px; overflow: hidden;">
                    <img src="../../CA/assets/profile/'.$row['CAProfile'].'" class="img-fluid rounded-start" alt="..." style="width: 100%; height: 100%; object-fit: cover;">
                 </div>
                 <div class="col-md-8">
                    <div class="card-body">
                      <p class="card-text">
                          <ul>
                              <li>CA ID: '.$row['CAID'].'</li>
                              <li>Name: '.$row['fname'].' '.$row['lname'].'</li>
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