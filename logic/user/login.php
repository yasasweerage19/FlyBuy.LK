<?php

    session_start();

    $email = $_POST['email'];
    $pass = $_POST['password'];

    include_once '../connection.php';

     
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$pass'";
     
        $result = $conn->query($sql);
        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) {
                $_SESSION["userID"] = $row['id'];
                $_SESSION["name"] = $row['fullName'];

                if($row['type'] == 'admin'){
                    header("Location: ../../pages/admin/dashboard.php");
                }else{
                    header("Location: ../../index.php");
                }
            }
       
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: ../../index.php");
    }
    
    $conn->close();
    
?>
