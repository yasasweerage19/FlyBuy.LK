<?php
 
    $id = $_GET['id']; 
   
    include_once '../connection.php';

     
    
    $sql = "DELETE FROM `category` WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "record Deleted successfully";
        header("Location: ../../pages/admin/view-category.php");
    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: ../../pages/admin/view-category.php");
    }
    
    $conn->close();
    
?>
