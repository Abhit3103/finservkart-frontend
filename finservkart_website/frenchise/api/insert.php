<?php
require "db.php";

$type = $_GET['type'];

if ($conn) {
   if (isset($_POST["submit"])) {
       switch ($type) {
           case "gallery":
               $photos = $_FILES['photo'];
               for ($i = 0; $i < count($photos['name']); $i++) {
                  uploadImage2("photo", "../gallery/img/", $i);

                  $data = array(
                      "image" => test_input($photos["name"][$i]),
                  );

                  insertToDB($conn, $type, $data);
               }

               header("Location: ../?page=gallery&upload=true", true, 301);
               exit;
               break;
               
            case "testimonials":
                // Upload Image
                uploadImage("rImage", "../testimonials/avatar/");

                // PREPARE DATA TO INSERT INTO DB
                $data = array(
                    "rImage" => test_input($_FILES["rImage"]["name"]),
                    "reviewer" => test_input($_POST["reviewer"]),
                    "testimonials" => test_input($_POST["testimonials"]),
                    "rating" => test_input($_POST["rating"])
                );

                // $tableName = 'testimonials';

                // Call insert function
                insertToDB($conn, $type, $data);

                // Go to show.php
                header("Location: ../?page=testimonials&upload=true", true, 301);
                exit;
                break;
               
           default:
               echo "ERROR";
               break;
       }
   }
} else {
   echo 'Error: ' . $e->getMessage();
}

function insertToDB($conn, $table, $data)
{
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

function implodeArray($array)
{
   return implode(", ", $array);
}

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function uploadImage2($name, $dest, $index)
{
   $target_dir = $dest;
   $target_file = $target_dir . basename($_FILES[$name]["name"][$index]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

   $check = getimagesize($_FILES[$name]["tmp_name"][$index]);
   if ($check !== false) {
       $uploadOk = 1;
   } else {
       $uploadOk = 0;
   }

   if (file_exists($target_file)) {
       $uploadOk = 0;
   }

   if ($_FILES[$name]["size"][$index] > 500000) {
       $uploadOk = 0;
   }

   if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
       $uploadOk = 0;
   }

   if ($uploadOk == 0) {
       echo "Sorry, your file was not uploaded.";
   } else {
       if (move_uploaded_file($_FILES[$name]["tmp_name"][$index], $target_file)) {
           echo "The file " . basename($_FILES[$name]["name"][$index]) . " has been uploaded.";
       } else {
           echo "Sorry, there was an error uploading your file.";
       }
   }
}

function uploadImage($name, $dest)
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
?>