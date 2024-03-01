<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FlyBuyLk - Home</title>
 
        <link rel="stylesheet" href="assert/OwlCarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="assert/OwlCarousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="CSS/home.css">
        <link rel="stylesheet" href="CSS/carousel.css">
        <link rel="stylesheet" href="assert/font-awesome/css/font-awesome.min.css">

    </head>
    <body>
       <?php session_start(); ?>
          <div id="nav" class="nav"> 
             <div id="top-nav" class="top-nav" >
               <div class="left-section">
                    <div class="nav-item">
                        <img class="logo-img" src="images/logo-brand.png"/>
                    </div>
                    <form>
                        <input class="nav-search" type="search" placeholder="search..." />
                        <button class="search-btn" type="submit" ><i class="fa fa-search"></i></button>
                    </form>
               </div>
               <div class="right-section">
                   <?php  
                    if(isset($_SESSION['userID'])){ 
                        include_once 'logic/connection.php';
                        $userId = $_SESSION['userID'];
                        $sql = "SELECT * FROM user WHERE id= $userId";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) { 
                            while($row = $result->fetch_assoc()) {
                ?>
                    <div class="profile-section">
                        <img class="profile-img" src="uploads/users/<?php echo $row['propic']; ?>" alt="proPic"/>
                        <div class="profile-wrap">
                            <p id="profile-name"><?php echo $row['fullName']; ?></p>
                            <a href="./pages/profile.php" id="profile-btn" class="btn-account">My account</a>
                        </div>
                    </div>
                    <a href="./pages/cart.php" class="btn-cart">
                        <i class="fa fa-shopping-cart"></i>
                        Cart
                    </a>

                    <?php     
                            }
                        }
                    } else { ?>
                     <a href="pages/login.php" class="btn-cart">
                        <i class="fa fa-shopping-cart"></i>
                        Sign in
                    </a>
                     <a href="pages/register.php" class="btn-cart">
                        <i class="fa fa-shopping-cart"></i>
                        Sign up
                    </a>
                    
                    <?php } ?>
               </div>
            </div> 
            <div class="bottom-nav">
                <a class="btn nav-link" href="index.php">Home</a>
                <a class="btn nav-link" href="pages/category.php?id=new">New arrivals</a>
                <a class="btn nav-link" href="pages/category.php?id=all">Category</a>
                <a class="btn nav-link" href="pages/contact.php">Contact us</a>
                <a class="btn nav-link" href="pages/about.php">About us</a>
            </div>
        </div> 

        <h3 class="heading">Hot deals</h3>
        <hr class="underline"/>
        <div class="item-section">
             <?php 
                            include './logic/connection.php';
                           $catSql = "SELECT  i.itemName,i.id,i.img,i.price,i.itemName,COUNT(o.itemID) AS 'count' FROM item AS i, `order` AS o WHERE i.id = o.itemID LIMIT 4;";
                           $catResult = $conn->query($catSql);
                           ?>
                        
                        <?php
                            
                            if ($catResult->num_rows > 0) { 
                            // output data of each row
                            while($catRow = $catResult->fetch_assoc()) {
                           
                        ?>
            <div class="new-items-card"> 
                <img src="./uploads/items/<?php echo $catRow['img']; ?>" class="img-new-arrivals"/>
                <div class="item-card-details">
                    <p class="item-name" id="item-name"><?php echo $catRow['itemName']; ?></p>
                    <p  ><?php echo $catRow['count']; ?> Total sales</p>
                    <p class="item-price">price Rs. <?php echo $catRow['price']; ?>.00 </p>
                    <div class="card-btn-wrap">
                        <a href="./pages/order-feedback.php?id=<?php echo $catRow['id']; ?>" class="btn btn-buy margin-left-10px">Buy</a> 
                    </div>
                </div>
            </div>

                                 <?php }  
                           } else {
                            echo "0 results";
                            }
                           
                        ?>
                </div>
        </div>  

        <h3 class="heading">Categories</h3>
        <hr class="underline"/>
        <div class="category-section">
            
                         <?php
                            include_once 'logic/connection.php';

                            $categorySql = "SELECT * FROM category ";
                            $categoryResult = $conn->query($categorySql);
                        ?>
                        
                        <?php
                            if ($categoryResult->num_rows > 0) {
                            $id = 0;
                            // output data of each row
                            while($categoryRow = $categoryResult->fetch_assoc()) {
                                if($id < 8){
                                    $id++;
                        ?>
                <a href="./pages/category.php?id=<?php echo $categoryRow['categoryName']; ?>" class="category-item">
                    <img class="category-img" src="./uploads/categories/<?php echo $categoryRow['img']; ?>"/>
                    <p class="category-text"><?php echo $categoryRow['categoryName']; ?></p>
                 </a>
            <?php   }
                          }  } else {
                            echo "0 results";
                            } 
                        ?>
            
        </div>
        <a href="./pages/category.php?id=all" class ="more-category">More ...</a>
      
        <h3 class="heading">Shop now</h3>
        <hr class="underline"/>
        <div class="items-section">
            <div class="item-wrapper">
                <div class="item-head-row">
                     
                </div>
                <div class="item-gride">

                 <?php
                            include_once 'logic/connection.php';

                            $itemSql = "SELECT * FROM item ";
                            $itemResult = $conn->query($itemSql);
                        ?>
                        
                        <?php
                            if ($itemResult->num_rows > 0) {
                            $id = 0;
                            // output data of each row
                            while($itemRow = $itemResult->fetch_assoc()) {
                                if($id < 8 || $itemRow['qty']  > 0){
                                    $id++;
                        ?>
                    <div class="item-card">
                        <p class="item-name"><?php echo $itemRow['itemName']; ?></p>
                        <img src="./uploads/items/<?php echo $itemRow['img']; ?>"/ class="img-new-arrivals">
                        <p class="item-name"><?php echo $itemRow['qty']; ?> items left</p>
                        <p class="item-price">price : Rs.<?php echo $itemRow['price']; ?>.00</p>
                        <a href="./pages/order-feedback.php?id=<?php echo $itemRow['id']; ?>" class="btn btn-buy margin-left-10px">Buy</a> 
                    </div>
                     <?php   }
                          }  } else {
                            echo "0 results";
                            }
                            $conn->close();
                        ?>
                </div>
            </div>
        </div>
        
                <?php include_once './components/footer.php'?>
    </body> 

    <script> 
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                document.getElementById("nav").style.height = "150px "; 
            } else {
                document.getElementById("nav").style.height = "500px"; 
                document.getElementById("top-nav").style.backgroundColor = "rgba(54, 54, 54, 0.6)"; 
            }
        }
    </script>
    <script src="assert/OwlCarousel/dist/owl.carousel.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
    <script src="Js/carousal.js"></script>
    <script src="Js/nav.js"></script>
</html> 