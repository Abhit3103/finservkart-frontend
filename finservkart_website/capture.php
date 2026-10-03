<?php
date_default_timezone_set('Asia/Kolkata');
$capTime = date('d-m-Y h:i:s', time());

if(isset($_SERVER['HTTP_CLIENT_IP']))
{
    $ipaddr = $_SERVER['HTTP_CLIENT_IP'];
    $device = $_SERVER['HTTP_USER_AGENT'];
}
elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
{
    $ipaddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $device = $_SERVER['HTTP_USER_AGENT'];
}
else
{
    $ipaddr = $_SERVER['REMOTE_ADDR'];
    $device = $_SERVER['HTTP_USER_AGENT'];
}

if(strpos($ipaddr,',') !== false)
{
    $ipaddr = preg_split("/\,/", $ipaddr)[0];
}

$jsonData = file_get_contents('http://ip-api.com/json/' . $ipaddr);
$locationData = json_decode($jsonData, true);

$dbHost = 'localhost';
$dbName = 'root';
$dbUsername = 'finservkart';
$dbPassword = 'WindRed@12345';
function fetchData($pdo, $ipaddr, $zip) {
    $query = "SELECT * FROM track WHERE ip = :ip OR zip = :zip";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':ip', $ipaddr);
    $stmt->bindParam(':zip', $zip);
    $stmt->execute();
    return $stmt->fetchAll();
}

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = fetchData($pdo, $ipaddr, $locationData['zip']);

    $matchFound = !empty($data);

    if (!$matchFound) {
        $sql = "INSERT INTO track (ip, device, country, region, city, zip, lat, lon, timezone, isp, org, net, capture) VALUES (:ip, :device, :country, :region, :city, :zip, :lat, :lon, :timezone, :isp, :org, :net, :capTime)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':ip', $ipaddr);
        $stmt->bindParam(':device', $device);
        $stmt->bindParam(':country', $locationData['country']);
        $stmt->bindParam(':region', $locationData['regionName']);
        $stmt->bindParam(':city', $locationData['city']);
        $stmt->bindParam(':zip', $locationData['zip']);
        $stmt->bindParam(':lat', $locationData['lat']);
        $stmt->bindParam(':lon', $locationData['lon']);
        $stmt->bindParam(':timezone', $locationData['timezone']);
        $stmt->bindParam(':isp', $locationData['isp']);
        $stmt->bindParam(':org', $locationData['org']);
        $stmt->bindParam(':net', $locationData['as']);
        $stmt->bindParam(':capTime', $capTime);
        $stmt->execute();
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
