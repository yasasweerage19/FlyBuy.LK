<?php

    session_start();

    $itemid = $_GET['id']; 
    $status = $_GET['status']; 
   
    include_once '../connection.php';

     
 
    $sql = "UPDATE `order` SET `status`='$status' WHERE  `id`=$itemid";
    
    if ( $conn->query($sql) === TRUE) {
        echo "New record created successfully";
 
    header("Location: ../../pages/admin/view-orders.php");
    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    
?>
