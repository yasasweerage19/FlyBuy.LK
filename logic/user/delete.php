<?php

    session_start();

    $id = $_GET['userID'];  
   
    include_once '../connection.php';

     
    
    $sql = "DELETE FROM user WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: ../../index.php");
    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    
?>
