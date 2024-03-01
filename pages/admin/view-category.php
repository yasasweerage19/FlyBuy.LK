<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyBuyLk-admin-view category</title>
    <link rel="stylesheet" href="../../CSS/admin.css">  
        <link rel="stylesheet" href="../../CSS/view.css">  
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
                  <div class="row top-row">
                     <h2>Shop Categories</h2>
                     <a href="./add-category.php" class="btn-add">
                         <i class="fa fa-plus"></i>
                         &nbsp; Add new
                     </a>
                 </div>
                
                 <div class="row">
                     <table CELLSPACING=0>
                         <tr>
                             <th>#</th>
                             <th>Category id</th>
                             <th>Category name</th>
                             <th>Category image</th> 
                         </tr>
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

                         <tr>
                             <td><?php echo $id; ?></td>
                             <td>
                                 <img src="../../uploads/categories/<?php echo $row["img"]; ?>" class="product-img"/>
                             </td>
                              <td>
                                 <?php echo $row["categoryName"]; ?>
                             </td>
                             <td>
                                 <a href="./edit-category.php?id=<?php echo $row['id']?>" class="btn-edit">
                                    <i class="fa fa-pencil"></i>
                                 </a>
                                 <a href="../../logic/category/delete.php?id=<?php echo $row['id']?>" class="btn-delete">
                                    <i class="fa fa-trash"></i>
                                 </a>
                             </td>
                         </tr>

                          <?php
                            }
                            } else {
                            echo "0 results";
                            }
                            $conn->close();
                        ?>
                     </table>
                 </div>
            </div> 
        </div>

    </div>
            </div>
    </div>
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