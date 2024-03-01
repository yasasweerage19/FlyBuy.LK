<?php

    session_start();

    $itemid = $_GET['itemId'];
    $id = $_GET['id'];  
   
    include_once '../connection.php';

     
    
    $sql = "DELETE FROM feedback WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: ../../pages/order-feedback.php?id=" .$itemid);
    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    
?>
