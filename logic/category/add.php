<?php
    $name = $_POST['name'];
    $image = basename($_FILES["image"]["name"]);
    $target_dir = "../../uploads/categories/";
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
    
    $sql = "INSERT INTO category (categoryName, img)
    VALUES ('$name','$image')";
    
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: ../../pages/admin/view-category.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: ../../pages/admin/add-category.php");
    }
    
    $conn->close();
    
?>
