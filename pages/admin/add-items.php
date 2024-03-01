<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyBuyLk-admin-add-item</title>   
        <link rel="stylesheet" href="../../CSS/admin.css">  
        <link rel="stylesheet" href="../../CSS/add.css">  
        <link rel="stylesheet" href="../../assert/OwlCarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../../assert/OwlCarousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="../../CSS/carousel.css">
        <link rel="stylesheet" href="../../assert/font-awesome/css/font-awesome.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
           <?php include '../../components/admin-nav.php' ?>
            <div class="content">
                <?php include '../../components/admin-top-nav.php' ?>
                  <div class="row">
                    <h2>Add new Item</h2>
                </div>
                <div class="row add-card ">
                    <form action="../../logic/item/add.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-5 image-col">
                                Item image :
                                <img class="pre-product" id="pre-product" src="../../images/img-preview.png">
                                <input type="file" class="custom-file-input" name="image" id="image" required/>
                            </div>
                            <div class="col-5">
                                <div class="input-row">
                                    <label for="name">Item name</label>
                                    <input type="text" class="input" name="name" id="name" placeholder="Enter Item name" required>
                                    <span class="error-txt" id="error-name"></span>
                                </div>
                                <div class="input-row">
                                    <label for="price">Item price</label>
                                    <input type="number" min="0" class="input" name="price" id="price" placeholder="Enter Item price" required>
                                    <span class="error-txt" id="error-price"></span>
                                </div>
                                <div class="input-row">
                                    <label for="qty">Item quantity</label>
                                    <input type="number" min="0" class="input" name="qty" id="qty" placeholder="Enter Item quantity" required>
                                    <span class="error-txt" id="error-qty"></span>
                                </div>
                                <div class="input-row">
                                    <label for="category">Item category</label>
                                    <select class="input" name="category" id="category">
                                         <?php
                                                include_once '../../logic/connection.php';

                                                $sql = "SELECT * FROM category ";
                                                $result = $conn->query($sql);
                                            ?>

                                            <?php
                                                if ($result->num_rows > 0) {
                                                $id = 0;
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $id++
                                            ?>
                                        <option value="<?php echo $row["categoryName"]; ?>"><?php echo $row["categoryName"]; ?></option>
                                         <?php
                                         }
                                    } else {
                                    ?>
                                     <option value="1">no category found</option>
                                    <?php
                                    }
                                    $conn->close();
                                ?>
                                    </select>
                                    <span class="error-txt" id="error-category"></span>
                                </div>
                                <div class="input-row">
                                    <label for="dec">Item description</label>
                                    <textarea class="input" name="dec" id="dec" placeholder="Enter Item description" required></textarea>
                                    <span class="error-txt" id="error-dec"></span>
                                </div>
                                <div class="btn-row">
                                   <button class="btn-save" type="submit" >Save</button>
                                   <button class="btn-cancel" type="reset" >Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div> 
        </div>

    </div>
            </div>
    </div>
         <script>
        document.getElementById('image').onchange = function (evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;
 
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function () {
                    document.getElementById("pre-product").src = fr.result;
                }
                fr.readAsDataURL(files[0]);
            }

             
            else {
                document.getElementById("error-img").innerHTML = "Can not preview the image";
            }
        }
    </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>