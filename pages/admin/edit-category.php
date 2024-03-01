<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyBuyLk-admin-add-category</title>   
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
                    <h2>Edit Category details</h2>
                </div>
                <?php
                            include_once '../../logic/connection.php';
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM category where id= $id";
                            $result = $conn->query($sql);
                        ?>

                        <?php
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                               
                        ?>
                <div class="row add-card ">
                    <form action="../../logic/category/update.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-5 image-col">
                                Category image :
                                <img class="pre-product" id="pre-product" src="../../uploads/categories<?php echo $row['img']?>">
                                <input type="file" class="custom-file-input" name="image" id="image" required/>
                            </div>
                            <div class="col-5">
                                <div class="input-row">
                                    <label for="name">Category name</label>
                                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                    <input type="text" class="input" value="<?php echo $row['categoryName']?>" name="name" id="name" placeholder="Enter category name" required>
                                    <span class="error-txt" id="error-name"></span>
                                </div> 
                                <div class="btn-row">
                                   <button class="btn-save" type="submit" >Save</button>
                                   <button class="btn-cancel" type="reset" >Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                            }
                            } else {
                            echo "0 results";
                            }
                            $conn->close();
                        ?>
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
        <script>
            jQuery(document).ready(function(){
                jQuery('.titleWrapper').click(function(){
                    var toggle = jQuery(this).next('div#descwrapper');
                    jQuery(toggle).slideToggle("slow");
                });
                jQuery('.inactive').click(function(){
                    jQuery(this).toggleClass('inactive active');
                });
            });

        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>