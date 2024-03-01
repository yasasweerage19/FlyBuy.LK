<?php
 
    $itemid = $_GET['id']; 
   
    include_once '../connection.php';

     
    
    $sql = "DELETE FROM `item` WHERE id=$itemid";
    
    if ($conn->query($sql) === TRUE) {
        echo "record Deleted successfully";
    header("Location: ../../pages/admin/view-items.php");

    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: ../../pages/admin/view-items.php");
    }
    
    $conn->close();
    
?>
