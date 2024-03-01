<?php

    session_start();

    $itemid = $_GET['itemid'];
    $type = $_GET['type'];
    $qty = $_GET['qty']; 
   
    include_once '../connection.php';

     
    if($type== 'minus'){
        $qty = $qty - 1;
    }else if($type == 'add'){
         $qty = $qty + 1;
    }
 
    $sql = "UPDATE `order` SET `qty`=$qty WHERE  `id`=$itemid";
    
    if ( $conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: ../../pages/cart.php");
    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    
?>
