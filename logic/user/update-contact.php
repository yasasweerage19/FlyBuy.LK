<?php

    session_start();

    $email = $_POST['mail'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $id = $_POST['id']; 
   
    include_once '../connection.php';
 
    $sql = "UPDATE `user` SET `address`='$address' , `tel`='$tel', `email`='$email' WHERE  `id`='$id'";
    
    if ( $conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: ../../pages/profile.php");
    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    
?>
