<?php 
require "db.php";
$type = $_GET['type'];
date_default_timezone_set('Asia/Kolkata');
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 

if ($conn) {
        switch ($type) {
            case "customer":
            $fileName = "CustomerList_" . date('Y-m-d') . ".xls";
            // Column names 
            $fields = array('Customer ID', 'First Name', 'Last Name', 'Email ID', 'Phone', 'Referral Code', 'Address', 'Reg Date'); 
            
            // Display column names as first row 
            $excelData = implode("\t", array_values($fields)) . "\n"; 
            
            // Prepare the SQL statement
            $stmt = $GLOBALS['conn']->prepare("SELECT CustID, fname, lname, email, phone, referral, address, regDate FROM customer");
            
            // Execute the prepared statement
            $stmt->execute();
            
            // Fetch records from database 
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
                $lineData = array($row['CustID'], $row['fname'], $row['lname'], $row['email'], $row['phone'], $row['referral'], $row['address'], $row['regDate']); 
                array_walk($lineData, 'filterData'); 
                $excelData .= implode("\t", array_values($lineData)) . "\n"; 
            } 
            
            // Set headers for download 
            header("Content-Type: application/vnd.ms-excel"); 
            header("Content-Disposition: attachment; filename=\"$fileName\""); 
            
            // Render excel data 
            echo $excelData; 
            exit;
        case "agent":
            $fileName = "AgentList_" . date('Y-m-d') . ".xls";
            // Column names 
            $fields = array('Agent ID', 'First Name', 'Last Name', 'Email ID', 'Phone', 'Referral Code', 'Address', 'Payment ID', 'Amount', 'Payment Status', 'Reg Date'); 
            
            // Display column names as first row 
            $excelData = implode("\t", array_values($fields)) . "\n"; 
            
            // Prepare the SQL statement
            $stmt = $GLOBALS['conn']->prepare("SELECT agent.AGID, agent.fname, agent.lname, agent.email, agent.phone, agent.referral, agent.address, agents_pay.payment_id, agents_pay.amt, agents_pay.status, agents_pay.regdate FROM agent INNER JOIN agents_pay ON agent.AGID = agents_pay.agid ORDER BY agent.id;");
            
            // Execute the prepared statement
            $stmt->execute();
            
            // Fetch records from database 
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
                $lineData = array($row['AGID'], $row['fname'], $row['lname'], $row['email'], $row['phone'], $row['referral'], $row['address'], $row['payment_id'], $row['amt'], $row['status'], $row['regdate']); 
                array_walk($lineData, 'filterData'); 
                $excelData .= implode("\t", array_values($lineData)) . "\n"; 
            } 
            
            // Set headers for download 
            header("Content-Type: application/vnd.ms-excel"); 
            header("Content-Disposition: attachment; filename=\"$fileName\""); 
            
            // Render excel data 
            echo $excelData; 
            exit;
        case "ca":
            $fileName = "CAList_" . date('Y-m-d') . ".xls";
            // Column names 
            $fields = array('CA ID', 'First Name', 'Last Name', 'Email ID', 'Phone', 'Address', 'Reg Date'); 
            
            // Display column names as first row 
            $excelData = implode("\t", array_values($fields)) . "\n"; 
            
            // Prepare the SQL statement
            $stmt = $GLOBALS['conn']->prepare("SELECT CAID, fname, lname, email, phone, address, regDate FROM ca;");
            
            // Execute the prepared statement
            $stmt->execute();
            
            // Fetch records from database 
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
                $lineData = array($row['CAID'], $row['fname'], $row['lname'], $row['email'], $row['phone'], $row['address'], $row['regDate']); 
                array_walk($lineData, 'filterData'); 
                $excelData .= implode("\t", array_values($lineData)) . "\n"; 
            } 
            
            // Set headers for download 
            header("Content-Type: application/vnd.ms-excel"); 
            header("Content-Disposition: attachment; filename=\"$fileName\""); 
            
            // Render excel data 
            echo $excelData; 
            exit;
        
        default:
                echo "API ERROR";
                break;
        }
    }

// Excel file name for download 
?>
