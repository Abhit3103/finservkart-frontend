<?php
session_start();
require "db.php";
date_default_timezone_set('Asia/Kolkata');
$type = $_GET['type'];
$uid = $_GET['id'];

// Set the content type header for JSON
header('Content-Type: application/json');

$response = array();

if ($conn) {
    if (isset($_POST["submit"])) {
        switch ($type) {
            case "services":
                uploadImage2("serviceimg", "../assets/services/");
                $required_documents = $_POST['required_documents'];
                $required_documents = str_replace(',', "\n", $required_documents);
                $data = array(
                    "service_name" => test_input($_POST["service_name"]),
                    "service_image" => test_input($_FILES["serviceimg"]["name"]),
                    "required_documents" => test_input($required_documents)
                );
                insertToDB($conn, $type, $data);
                $response = array('status' => 'success', 'message' => 'Services Added Successfully');
                break;
            // Add other cases as needed...
            default:
                $response = array('status' => 'error', 'message' => 'API ERROR');
                break;
        }
    } else {
        $response = array('status' => 'error', 'message' => 'No data received');
    }
} else {
    $response = array('status' => 'error', 'message' => 'Database connection error');
}

// Send JSON response
echo json_encode($response);

function insertToDB($conn, $table, $data) {
    $columns = implodeArray(array_keys($data));
    $prefixed_array = preg_filter('/^/', ':', array_keys($data));
    $values = implodeArray($prefixed_array);

    try {
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
        echo "New records created successfully";
    } catch (PDOException $error) {
        echo $error;
    }
}

function implodeArray($array) {
    return implode(", ", $array);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function uploadImage2($name, $dest) {
    // Check if a file was uploaded
    if (!isset($_FILES[$name])) {
      //  echo "No file was uploaded under the name $name.";
        return;
    }

    $target_dir = $dest;
    $target_file = $target_dir . basename($_FILES[$name]["name"]);
    $uploadOk =  1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_FILES[$name]["tmp_name"])) {
        $check = getimagesize($_FILES[$name]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk =  1;
        } else {
            //echo "File is not an image.";
            $uploadOk =  0;
        }
    } else {
        //echo "No file was uploaded under the name $name.";
        return;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        //echo "Sorry, file already exists.";
        $uploadOk =  0;
    }
    // Check file size
    if ($_FILES[$name]["size"] >  500000) {
        //echo "Sorry, your file is too large.";
        $uploadOk =  0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
       // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk =  0;
    }
    // Check if $uploadOk is set to  0 by an error
    if ($uploadOk ==  0) {
       // echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
            //echo "The file " . basename($_FILES[$name]["name"]) . " has been uploaded.";
        } else {
            //echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
