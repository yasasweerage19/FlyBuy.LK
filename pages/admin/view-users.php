<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyBuyLk-admin-view users</title>
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
                     <h2>Shop users</h2>
                 </div>
                 <div class="row">
                     <table CELLSPACING=0>
                         <tr>
                             <th>#</th>
                             <th>User id</th>
                             <th>User name</th>
                             <th>Profile image</th> 
                             <th>Address</th> 
                             <th>E-mail</th> 
                             <th>Contact</th> 
                         </tr>

                          <?php
                            include_once '../../logic/connection.php';

                            $sql = "SELECT * FROM user ";
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
                             <td><?php echo $row["id"]; ?></td>
                             <td><?php echo $row["fullName"]; ?></td>
                            <td>
                                 <img src="../../uploads/users/<?php echo $row["propic"]; ?>" class="product-img"/>
                             </td>
                             <td><?php echo $row["address"]; ?></td>
                             <td><?php echo $row["email"]; ?></td>
                             <td><?php echo $row["tel"]; ?></td>
                             
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