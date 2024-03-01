<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyBuyLk-order</title>

    <link rel="stylesheet" href="../CSS/home.css"> 
    <link rel="stylesheet" href="../CSS/order.css"> 
    <link rel="stylesheet" href="../CSS/feedback.css"> 
    <link rel="stylesheet" href="../assert/OwlCarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../assert/OwlCarousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="../CSS/carousel.css">
    <link rel="stylesheet" href="../assert/font-awesome/css/font-awesome.min.css">

</head>
<body>
     <?php include '../components/nav.php' ?>
         <?php
                            $itemID = $_GET['id'];
                            include_once '../logic/connection.php';
                            $itemSql = "SELECT * FROM item WHERE id=$itemID";
                            $itemResult = $conn->query($itemSql);
                        ?>
                        
                        <?php
                            if ($itemResult->num_rows > 0) { 
                            // output data of each row
                            while($itemRow = $itemResult->fetch_assoc()) {
                                  $_SESSION['category'] = $itemRow['category'];
                        ?>
        <h3 class="heading">Item details</h3>
        <hr class="underline"/>
        <div class="container">
            <div class="order-card">
                <div class="order-left-section">
                    <img class="product-img" src="../uploads/items/<?php echo $itemRow['img']; ?>">
                     
                </div>
                <div class="order-right-section">
                    <div class="detail-column">
                        <h2 class="product-name">Your selected product name
                            <br/><span class="name"><?php echo $itemRow['itemName']; ?></span>
                        </h2>
                        <h5 class="product-price">Our best price for product is <p class="price-tag">Rs. <?php echo $itemRow['price']; ?>.00</p></h5>
                        <h5 class="product-qty"><?php echo $itemRow['qty']; ?> items left</h5>
                        <div>
                        <p> Description :</p> 
                            <textarea class="product-description" readonly><?php echo $itemRow['description']; ?></textarea>
                        </div> 
                    </div>

                    <?php if(isset($_SESSION['userID'])){ ?>
                    <div class="buy-form-wrap">
                        <form action="../logic/order/add.php" method="post" class="buy-form" onsubmit="validate()">
                            <div >
                                <input type="hidden" name="itemId" value="<?php echo $itemRow['id']; ?>">
                                <input type="hidden" name="userId" value="<?php echo $_SESSION['userID']; ?>">
                                <input type="hidden" name="price" value="<?php echo $itemRow['price']; ?>">
                                <input class="input-qty" type="number" min="0" onchange="validate('qty')"  placeholder="Enter product quantity" max="<?php echo $itemRow['qty']; ?>" name="qty" id="qty" required>
                                <span class="error-txt" id="error-qty"></span>
                            </div> 
                            <div class="btn-wrap">
                                <button type="button" class="btn btn-buy btn-order">Buy now</button>
                                <button type="submit" class="btn btn-see btn-order">Add to cart</button>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                </div>
            </div> 
            <?php   }
                           } else {
                            echo "0 results";
                            } 
                        ?>

            <div class="feedback-card">
                 <?php
                            $feedbackSql = "SELECT * FROM feedback WHERE ProductID=$itemID";
                            $starSql = "SELECT COUNT(id) AS 'count',  AVG( stars) AS 'avg' FROM feedback WHERE ProductID=$itemID";
                            $feedbackResult = $conn->query($feedbackSql);
                            $editResult = $conn->query($feedbackSql);
                            $starResult = $conn->query($starSql);
                            
                            $starCount;
                            $starAvg;
                 ?>         
                 <?php
                            if ($starResult->num_rows > 0) { 
                                // output data of each row
                                while($starRow = $starResult->fetch_assoc()) {
                                    $starCount = $starRow['count'];
                                    $starAvg =$starRow['avg'];
                                }
                            }
                ?>
                

                <h2>Customer feedbacks</h2>
                <div class="feedback-wrap">           
                    <div class="star-wrap">  
                        <span <?php if($starAvg >= 1.0000)  { ?> class="fa fa-star checked" <?php }else{ ?>class="fa fa-star " <?php } ?>></span>
                        <span <?php if($starAvg >= 2.0000)  { ?> class="fa fa-star checked" <?php }else{ ?>class="fa fa-star " <?php } ?>></span>
                        <span <?php if($starAvg >= 3.0000)  { ?> class="fa fa-star checked" <?php }else{ ?>class="fa fa-star " <?php } ?>></span>
                        <span <?php if($starAvg >= 4.0000)  { ?> class="fa fa-star checked" <?php }else{ ?>class="fa fa-star " <?php } ?>></span>
                        <span <?php if($starAvg >= 5.0000)  { ?> class="fa fa-star checked" <?php }else{ ?>class="fa fa-star " <?php } ?>></span>
                        <p><?php echo $starAvg; ?> average based on <?php echo $starCount; ?> reviews.</p>
                        <hr style="border:3px solid #f1f1f1">
                    </div>
                   <?php if(isset($_SESSION['userID'])){ ?>
                     <?php
                            if ($editResult->num_rows > 0) { 
                            // output data of each row
                            while($editRow = $editResult->fetch_assoc()) {
                        ?>
                    <div class="my-feedback-wrap">
                       <h4>Edit rating</h4>
                       <form action="../logic/feedback/update.php" method="post">
                            <div class="rating">  
                                <input <?php if($editRow['stars'] == 5)  { ?> checked <?php } ?> type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                <input <?php if($editRow['stars'] == 4)  { ?> checked <?php } ?> type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                <input <?php if($editRow['stars'] == 3)  { ?> checked <?php } ?> type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                <input <?php if($editRow['stars'] == 2)  { ?> checked <?php } ?> type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                <input <?php if($editRow['stars'] == 1)  { ?> checked <?php } ?> type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                            </div>
                            <input type="hidden" value="<?php echo $editRow['id'] ?>" name="feedbackId">
                            <input type="hidden" value="<?php echo $itemID ?>" name="itemId">
                            <div class="input-wrap">
                                <label for="ratingDis">Description</label>
                                 <textarea name="dec" id="dec"  class="product-description input-rating" required><?php echo $editRow['description'] ?></textarea>
                            </div>
                            <div class="btn-wrap margin-left-right">
                                <button type="submit" class="btn btn-buy btn-order">Submit</button>
                                <a style="text-decoration:none;" href="../logic/feedback/delete.php?id=<?php echo $editRow['id'] ?>&itemId=<?php echo $itemID ?>"  class="btn btn-see btn-order">Delete feedback</a>
                            </div>
                       </form> 
                    </div>
                    <?php }
                    }else {
                           ?>
                                              <div class="my-feedback-wrap">
                       <h4>Add rating</h4>
                       <form action="../logic/feedback/add.php" method="post">
                            <div class="rating">  
                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                            </div>
                            <input type="hidden" value="<?php echo $itemID ?>" name="itemId">
                            <input type="hidden" value="<?php echo $_SESSION['userID'] ?>" name="userId">
                            <div class="input-wrap">
                                <label for="ratingDis">Description</label>
                                <textarea name="dec" id="dec"  class="product-description input-rating" required></textarea>
                            </div>
                            <div class="btn-wrap margin-left-right">
                                <button type="submit" class="btn btn-buy btn-order">Add</button>
                                <button type="submit" class="btn btn-see btn-order">Cancel</button>
                            </div>
                       </form> 
                    </div>
                           <?php
                            }
                        } 
                        ?>
                    
                </div>
                <div class="customer-feedback">

                  
                        
                        <?php
                            if ($feedbackResult->num_rows > 0) { 
                            // output data of each row
                            while($feedbackRow = $feedbackResult->fetch_assoc()) {
                        ?>
                        <?php
                            $user = $feedbackRow['userID'];
                            $cusSql = "SELECT * FROM user WHERE id = $user ";
                            $cusResult = $conn->query($cusSql);
                        ?>
                         <?php
                            if ($cusResult->num_rows > 0) { 
                            // output data of each row
                            while($cusRow = $cusResult->fetch_assoc()) {
                        ?>
                   <div class="customer-feedback-card">
                        <div class="user-details">
                            <img src="../uploads/users/<?php echo $cusRow['propic']; ?>" class="pro-pic">
                            <div class="infor-row">
                                <h3><?php echo $cusRow['fullName']; ?></h3>
                                <h5 class="star-badge"><?php echo $feedbackRow['stars']; ?> stars</h5>
                            </div>
                        </div>
                        <textarea readonly class="feedback-description-show"><?php echo $feedbackRow['description']; ?></textarea>
                   </div>

                   <?php  }} }
                           } else {
                            echo "0 feedbacks";
                            } 
                        ?>
                </div>
            </div>
        </div>
        <h3 class="sub-hedding">Similar items</h3>
        <div class="suggetions-row">
                <?php 
                           $category =$_SESSION['category'];
                           $catSql = "SELECT * FROM item WHERE category='$category'";
                           $catResult = $conn->query($catSql);
                           ?>
                        
                        <?php
                            $count=0;
                            if ($catResult->num_rows > 0) { 
                            // output data of each row
                            while($catRow = $catResult->fetch_assoc()) {
                            if($count < 4 || $catRow['id'] !== $itemID || $catRow['qty'] > 0){      
                                $count ++;
                        ?>
            <div class="new-items-card"> 
                <img src="../uploads/items/<?php echo $catRow['img']; ?>" class="img-new-arrivals"/>
                <div class="item-card-details">
                    <p class="item-name" id="item-name"><?php echo $catRow['itemName']; ?></p>
                    <p class="item-price">price Rs. <?php echo $catRow['price']; ?>.00 </p>
                    <div class="card-btn-wrap">
                        <a href = "./order-feedback.php?id=<?php echo $catRow['id']; ?>" class="btn btn-see" >See..</a>
                    </div>
                </div>
            </div>
                       <?php }  }
                           } else {
                            echo "0 results";
                            }
                            $conn->close();
                        ?>
        </div>
        
                <?php include_once '../components/footer.php'?>
        <a href="./category.php?id=<?php echo $category ;?>" class="more-category more-items" >more..</a>
  <script> 
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
        if (document.body.scrollTop >= 80 || document.documentElement.scrollTop < 80) {
                document.getElementById("nav").style.height = "500px"; 
                document.getElementById("profile-name").style.color = "black "; 
                document.getElementById("profile-btn").style.color = "brown"; 
                document.getElementById("top-nav").style.backgroundColor = "rgba(54, 54, 54, 0.6)";   
        } else {
                document.getElementById("nav").style.height = "150px "; 
                document.getElementById("profile-name").style.color = "white "; 
                document.getElementById("profile-btn").style.color = "rgb(255, 133, 133)"; 
                document.getElementById("top-nav").style.backgroundColor = "rgba(54, 54, 54, 1)"; 
            }
        }

    </script>
    <script src="../Js/validate-order.js"></script>
    <script src="../assert/OwlCarousel/dist/owl.carousel.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
    <script src="../js/carousal.js"></script>
  
</html>