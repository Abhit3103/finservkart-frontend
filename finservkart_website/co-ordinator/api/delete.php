<?php
require "db.php";
// Get id & type from header
$type = $_GET['type'];
$id = $_GET['id'];

if ($conn) {
    switch ($type) {
        case "services":
            delete($conn, $type, $id, "manage-services.php?isDeleted=true");
            break;
        case "ca":
            delete($conn, $type, $id, "manage-ca.php?isDeleted=true");
            break;
        case "agent":
            delete($conn, $type, $id, "manage-agent.php?isDeleted=true");
            break;
        case "customer":
            delete($conn, $type, $id, "manage-customer.php?isDeleted=true");
            break;
        case "support":
            delete($conn, $type, $id, "support.php?isDeleted=true");
            break;
        case "contact":
            delete($conn, $type, $id, "contact.php?isDeleted=true");
            break;
            case "franchise": // Added franchise delete
                delete($conn, "franchise", $id, "manage-franchise.php?isDeleted=true");
                break;
                
                case "master_franchise": // Added Master Franchise Delete
                    delete($conn, "master_franchise", $id, "manage-master-franchise.php?isDeleted=true");
                    break;

                    case "telecaller":
                        delete($conn, $type, $id, "manage-telecaller.php?isDeleted=true");
                        break;
        default:
            break;
    }
} else {
    echo 'Error: ' . $e->getMessage();
}

function delete($conn, $table, $id, $goto)
{

    try {
        // sql to delete a record
        $sql = "DELETE FROM $table WHERE id = $id";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "$table Deleted Successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

    header("Location: ../$goto", true, 301);
    exit;
}
?>