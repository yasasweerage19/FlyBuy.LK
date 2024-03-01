<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyBuyLk-admin-view orders</title>
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
                     <h2>Shop Orders</h2>
                      
                 </div>
                 <div class="row">
                     <table CELLSPACING=0>
                         <tr>
                             <th>#</th>
                             <th>Order id</th> 
                             <th>User id</th> 
                             <th>Item id</th> 
                             <th>Order quantity</th> 
                             <th>Unit price</th> 
                             <th>Total amount</th> 
                             <th>Order status</th> 
                             <th>option</th>  
                         </tr>
 
                                        <?php
                            include_once '../../logic/connection.php';

                            $sql = "SELECT * FROM `order` ";
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
                             <td><?php echo $row["userId"]; ?></td>
                             <td><?php echo $row["itemID"]; ?></td>
                             <td><?php echo $row["qty"]; ?></td>
                             <td>Rs.<?php echo $row["price"]; ?>.00</td>
                             <td>Rs.<?php echo $row["qty"] * $row["price"]; ?>.00</td>
                             <td><?php echo $row["status"]; ?></td>
                              <td>
                                  <?php 
                                    if($row["status"] == 'pending'){ ?>
                                 <a href="../../logic/order/update-status.php?id=<?php echo $row["id"]; ?>&status=tracked" class="btn-check">
                                    <i class="fa fa-check"></i> checked order
                                 </a>
                                 <?php } else { ?>
                                 <a href="../../logic/order/update-status.php?id=<?php echo $row["id"]; ?>&status=pending" class="btn-edit">
                                    <i class="fa fa-times"></i> uncheck order
                                 </a>
                                 <?php } ?> 
                                 <a href="../../logic/order/delete-admin.php?id=<?php echo $row["id"]; ?>" class="btn-delete">
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