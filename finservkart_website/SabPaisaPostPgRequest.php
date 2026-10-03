<?php 
session_start();
include 'Authentication.php';

// Initialize the encData variable
$encData = null;

// Define your SabPaisa API credentials
$clientCode = "FMHC87";  
$username = "finservkart.com@gmail.com";  
$password = "FMHC87_SP19912";  
$authKey = "MpyemajI9BKhniSX";  
$authIV = "wXk7nilYzPsoKfzU";  

// Collect customer details (could be from session or form)
$payerName = $_POST['name']; 
$payerEmail = $_POST['email'];  
$payerMobile = $_POST['contact'];  
$payerAddress = "Patna, Bihar";  

// Define the transaction details
$clientTxnId = rand(1000, 9999); 
$amount = $_POST['amount'];  
$amountType = 'INR'; 
$mcc = 5137;  
$channelId = 'W'; 
$callbackUrl = 'https://finservkart.com/SabPaisaPostPgResponse.php';  // Callback URL after payment processing

// Construct the encData string to be encrypted
$encData = "?clientCode=" . $clientCode . "&transUserName=" . $username . "&transUserPassword=" . $password .
           "&payerName=" . $payerName . "&payerMobile=" . $payerMobile . "&payerEmail=" . $payerEmail .
           "&payerAddress=" . $payerAddress . "&clientTxnId=" . $clientTxnId . "&amount=" . $amount . 
           "&amountType=" . $amountType . "&mcc=" . $mcc . "&channelId=" . $channelId . "&callbackUrl=" . $callbackUrl;

// Encrypt the encData using AES encryption (with the provided authKey and authIV)
$AesCipher = new AesCipher(); 
$data = $AesCipher->encrypt($authKey, $authIV, $encData);
?>

<!-- HTML form to submit the encrypted data to SabPaisa -->
<form action="https://securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1" method="post">
    <input type="hidden" name="encData" value="<?php echo $data ?>" id="frm1">
    <input type="hidden" name="clientCode" value="<?php echo $clientCode ?>" id="frm2">
    <input type="submit" id="submitButton" name="submit" value="Proceed to Payment">
</form>

<script>
// Optionally, auto-submit the form when the page loads
document.getElementById('submitButton').click();
</script>
