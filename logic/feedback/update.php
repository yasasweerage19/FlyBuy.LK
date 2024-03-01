<?php

    session_start();
    $stars = $_POST['rating'];
    $des = $_POST['dec'];
    $id = $_POST['feedbackId'];
    $itemid = $_POST['itemId'];
    
    include_once '../connection.php';

     
    
    $sql = "UPDATE`feedback` SET `stars`='$stars', `description`='$des' WHERE  `id`=$id;";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: ../../pages/order-feedback.php?id=" .$itemid);
    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    
?>
