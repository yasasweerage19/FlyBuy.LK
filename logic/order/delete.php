<?php
 
    $itemid = $_GET['id']; 
   
    include_once '../connection.php';

     
    
    $sql = "DELETE FROM `order` WHERE id=$itemid";
    
    if ($conn->query($sql) === TRUE) {
        echo "record Deleted successfully";
        header("Location: ../../pages/cart.php");
    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: ../../pages/cart.php");
    }
    
    $conn->close();
    
?>
