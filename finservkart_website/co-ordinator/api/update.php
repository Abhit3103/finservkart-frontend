<?php
require "db.php";
// Get type from header
$type = $_GET['type'];
$urlId = $_GET["id"];
$urlImage = $_GET['img'];
$pid = $_GET["pid"];

if ($conn) {
    if (isset($_POST["update"])) {
        switch ($type) {
            case "admin":
                $name = test_input($_POST["name"]);
                $company = test_input($_POST["company"]);
                $phone = test_input($_POST["phone"]);
                $email = test_input($_POST["email"]);
                $address = test_input($_POST["address"]);
                $fb = test_input($_POST["fb"]);
                $insta = test_input($_POST["insta"]);
                $linkedin = test_input($_POST["linkedin"]);
                $twitter = test_input($_POST["twitter"]);
                $whatsapp = test_input($_POST["whatsapp"]);
                $profile = test_input($_FILES["profile"]["name"]);

                // Upload Image
                if ($_FILES["profile"]['error'] === 0) {
                    uploadImage2("profile", "../assets/profile/");
                } else {
                    $profile = $urlImage;
                }

                try {
                    $sql = "UPDATE `admin` SET `name`= ?, `company`= ?, `phone`=?, `email`=?, `address`=?, `fb`= ?, `insta`= ?, `linkedin`=?, `twitter`=?, `whatsapp`= ?, `profile`= ? WHERE `id` = ?";

                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$name, $company, $phone, $email, $address, $fb, $insta, $linkedin, $twitter, $whatsapp, $profile, $urlId]);

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                // Go to 
                header("Location: ../profile.php?update=true", true, 301);
                exit;
                break;
            
            case "services":
                $required_documents = $_POST['required_documents'];
                $required_documents = str_replace(',', "\n", $required_documents);
                $service_name = test_input($_POST["service_name"]);
                $service_image = test_input($_FILES["serviceimg"]["name"]);
                $required_documents = test_input($required_documents);
                $service_price = test_input($_POST["service_price"]);
                $govt_fees = test_input($_POST["govt_fees"]);
                $percentage = test_input($_POST["percentage"]);
                $total_amt = test_input($_POST["total_amt"]);
                $commission = test_input($_POST["commission"]);
                $terms = test_input($_POST["terms"]);

                // Upload Image
                if ($_FILES["serviceimg"]['error'] === 0) {
                    uploadImage2("serviceimg", "../assets/services/");
                } else {
                    $service_image = $urlImage;
                }

                try {
                    $sql = "UPDATE `services` SET `service_name`= ?, `service_image`= ?, `required_documents`=?, `service_price`=?, `govt_fees`=?, `percentage`=?, `total_amt`=?, `commission`=?, `terms`=? WHERE `id` = ?";

                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$service_name, $service_image, $required_documents, $service_price, $govt_fees, $percentage, $total_amt, $commission, $terms, $urlId]);

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                // Go to 
                header("Location: ../edit-service.php?id=$urlId&update=true", true, 301);
                exit;
                break;
                
            case "workflow":
                $CAID = test_input($_POST["CAID"]);

                try {
                    $sql = "UPDATE `workflow` SET `CAID`= ? WHERE `pid` = ?";

                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$CAID, $pid]);

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                $cid = $_POST["CAID"];
                // Go to 
                header("Location: ../re-assign.php?cid=$cid&pid=$pid&reassigned=true", true, 301);
                exit;
                break;

            default:
                break;
        }
    }
} else {
    echo 'API Error: ' . $e->getMessage();
}

function uploadImage2($name, $dest)
{

    $target_dir = $dest;
    $target_file = $target_dir . basename($_FILES[$name]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES[$name]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES[$name]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES[$name]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}