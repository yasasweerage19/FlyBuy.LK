<?php

    session_start();

    $itemid = $_POST['itemId'];
    $userid = $_POST['userId'];
    $stars = $_POST['rating'];
    $des = $_POST['dec'];
   
    include_once '../connection.php';

     
    
    $sql = "INSERT into `feedback` (`userID`, `ProductID`, `stars`, `description`) 
    VALUES ('$userid','$itemid',$stars,'$des')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: ../../pages/order-feedback.php?id=" .$itemid);
    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    
?>
