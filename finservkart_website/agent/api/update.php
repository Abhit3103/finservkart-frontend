<?php
require "db.php";
// Get type from header
$type = $_GET['type'];
$urlId = $_GET["id"];
$urlImage = $_GET['img'];

if ($conn) {
    if (isset($_POST["update"])) {
        switch ($type) {
            case "agent":
                $fname = test_input($_POST["fname"]);
                $lname = test_input($_POST["lname"]);
                $phone = test_input($_POST["phone"]);
                $email = test_input($_POST["email"]);
                $address = test_input($_POST["address"]);
                $fb = test_input($_POST["fb"]);
                $insta = test_input($_POST["insta"]);
                $linkedin = test_input($_POST["linkedin"]);
                $twitter = test_input($_POST["twitter"]);
                $whatsapp = test_input($_POST["whatsapp"]);
                $IFSE = test_input($_POST["IFSE"]);
                $bank = test_input($_POST["bank"]);
                $branch = test_input($_POST["branch"]);
                $ACNo = test_input($_POST["ACNo"]);
                $AGProfile = test_input($_FILES["profile"]["name"]);

                // Upload Image
                if ($_FILES["profile"]['error'] === 0) {
                    uploadImage2("profile", "../assets/profile/");
                } else {
                    $AGProfile = $urlImage;
                }

                try {
                    $sql = "UPDATE `agent` SET `fname`= ?, `lname`= ?, `phone`=?, `email`=?, `address`=?, `fb`= ?, `insta`= ?, `linkedin`=?, `twitter`=?, `whatsapp`= ?, `IFSE`= ?, `bank`= ?, `branch`=?, `ACNo`=?, `AGProfile`= ? WHERE `id` = ?";

                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$fname, $lname, $phone, $email, $address, $fb, $insta, $linkedin, $twitter, $whatsapp, $IFSE, $bank, $branch, $ACNo, $AGProfile, $urlId]);

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                // Go to 
                header("Location: ../profile.php?update=true", true, 301);
                exit;
                break;
            
            case "agnt":
                $IFSE = test_input($_POST["IFSE"]);
                $bank = test_input($_POST["bank"]);
                $branch = test_input($_POST["branch"]);
                $ACNo = test_input($_POST["ACNo"]);
                
                try {
                    $sql = "UPDATE `agent` SET `IFSE`= ?, `bank`= ?, `branch`=?, `ACNo`=? WHERE `id` = ?";

                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$IFSE, $bank, $branch, $ACNo, $urlId]);

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                // Go to 
                header("Location: ../dashboard.php?update=true", true, 301);
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