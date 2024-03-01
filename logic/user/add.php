<?php

    session_start();

    $fullName = $_POST['name'];
    $email = $_POST['email'];
    $image = basename($_FILES["image"]["name"]);
    $pass = $_POST['password'];
    $target_dir = "../../uploads/users/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    include_once '../connection.php';

    
    // Check if image file is a actual image or fake image
    if(isset($_POST["image"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
 
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    $sql = "INSERT INTO user (fullName, email, propic,password,type)
    VALUES ('$fullName','$email','$image','$pass','user')";
    
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

        $sql1 = "SELECT * FROM user WHERE email='$email' AND password='$pass'";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) {
                $_SESSION["userID"] = $row['id'];
                $_SESSION["name"] = $row['fullName'];
                header("Location: ../../index.php");
            }
        }
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: ../../index.php");
    }
    
    $conn->close();
    
?>
