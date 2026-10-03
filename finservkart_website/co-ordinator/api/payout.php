<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('../../include/config.php');
date_default_timezone_set('Asia/Kolkata');
$date = date('d-m-Y H:i:s');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Directly use the posted values without exploding
  $PIDs = explode(',', $_POST['pid']);
  $pIDs = $_POST['pid'];
  $referrals = $_POST['referral'];
  $services = $_POST['service'];
  $amounts = $_POST['amount'];
  $percentages = $_POST['percentage'];
  $commissions = $_POST['commission'];
  $totalCommissions = $_POST['totalCommission'];
  $mode = $_POST['mode'];
  $bank = $_POST['bank'];
  $txnid = $_POST['txnid'];

  // Prepare SQL statement for insertion
  $insertStmt = $con->prepare("INSERT INTO agent_commision (pid, referral, service, amount, percentage, commission, totalCommission, mode, bank, txnid, payment_date) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

  // Execute the insert statement
  $insertStmt->bind_param("sssssssssss", $pIDs, $referrals, $services, $amounts, $percentages, $commissions, $totalCommissions, $mode, $bank, $txnid, $date);
  $insertStmt->execute();

  // Prepare SQL statement for updating srv_transaction
  $updateStmt = $con->prepare("UPDATE srv_tranaction SET isCommission =? WHERE pID IN (".implode(',', array_fill(0, count($PIDs), '?')).")");

  // Update srv_transaction
  $updateParams = array_merge(array("Yes"), $PIDs);
  $updateTypes = str_repeat("s", 1 + count($PIDs));
  $updateStmt->bind_param($updateTypes,...$updateParams);
  $updateStmt->execute();

  // Close prepared statements
  $insertStmt->close();
  $updateStmt->close();

  // Close connection
  $con->close();

  // Redirect or display success message
  header('Location: ../agent-commission.php?payment=true');
  exit; // Add exit to prevent further execution
}
?>
