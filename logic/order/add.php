<?php

    session_start();

    $itemid = $_POST['itemId'];
    $userid = $_POST['userId'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
   
    include_once '../connection.php';

     
    
    $sql = "INSERT into `order` (`itemID`, `userId`, `qty`, `price`) VALUES ('$itemid','$userid',$qty,'$price')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: ../../pages/cart.php");
    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    
?>
