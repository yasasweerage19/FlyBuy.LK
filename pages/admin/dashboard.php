<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyBuyLk-admin</title>   
        <link rel="stylesheet" href="../../CSS/admin.css">  
        <link rel="stylesheet" href="../../CSS/dashboard.css">  
        <link rel="stylesheet" href="../../assert/OwlCarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../../assert/OwlCarousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="../../CSS/carousel.css">
        <link rel="stylesheet" href="../../assert/font-awesome/css/font-awesome.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
           <?php include_once '../../components/admin-nav.php' ?>
            <div class="content">
                <?php include '../../components/admin-top-nav.php' ?>
                 <div class="row salles-card-wrap">
                   <?php 
                           $id =$_SESSION['userID'];
                           $catSql = "SELECT COUNT(i.id) AS 'itemCount',COUNT(u.id) AS 'userCount',COUNT(o.id) AS 'orderCount' FROM user AS u , `order` AS o, item AS i";
                           $catResult = $conn->query($catSql);
                           ?>
                        
                        <?php
                            
                            if ($catResult->num_rows > 0) { 
                            // output data of each row
                            while($catRow = $catResult->fetch_assoc()) {
                           
                        ?>    
                 <div class="row col-3 card bg-green">
                         <div class="col-4 card-icon">
                             <i class=" fa fa-line-chart"></i>
                         </div>
                         <div class="col-6">
                             <div class="row">
                                 <div class="col-10">
                                     <div class="row">Total items :</div>
                                     <div class="row font-20"><?php echo $catRow['itemCount']; ?></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                      <div class="row col-3 card bg-blue">
                         <div class="col-4 card-icon">
                             <i class=" fa fa-users"></i>
                         </div>
                         <div class="col-6">
                             <div class="row">
                                 <div class="col-10">
                                     <div class="row">Total users :</div>
                                     <div class="row font-20"><?php echo $catRow['userCount']; ?></div>
                                 </div>
                             </div>
                         </div>
                     </div> 
                     <div class="row col-3 card bg-red">
                         <div class="col-4 card-icon">
                             <i class=" fa fa-money"></i>
                         </div>
                         <div class="col-6">
                             <div class="row">
                                 <div class="col-10">
                                     <div class="row">Total Sales :</div>
                                     <div class="row font-20"><?php echo $catRow['orderCount']; ?></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                      <?php }  
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