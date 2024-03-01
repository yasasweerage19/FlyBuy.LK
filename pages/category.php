<!DOCTYPE html>
<html>
    <head>
        <title>FlyBuyLk-Category</title>
        <link rel="stylesheet" href="../CSS/home.css"> 
        <link rel="stylesheet" href="../CSS/category.css">  
        <link rel="stylesheet" href="../assert/OwlCarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../assert/OwlCarousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="../CSS/carousel.css">
        <link rel="stylesheet" href="../assert/font-awesome/css/font-awesome.min.css">
    </head>
    <body>
          <?php include '../components/nav.php' ?>

        <div class="category-card">
            <div class="row-top-card">
                <div>
                    <form>
                        <input class="nav-search" type="search" placeholder="search..." />
                            <button class="search-btn" type="submit" ><i class="fa fa-search"></i></button>
                    </form>
                </div> 
            </div>
            <div class="row">
                <div class="left-card-section">
                    <div class="product-card">
                <?php  
                    include_once '../logic/connection.php';
                    $type = $_GET['id'];

                    if($type == "all"){
                        $sql = "SELECT * FROM item ";
                    }else if($type=="new"){
                        $sql = "SELECT * FROM item order BY item.addDate";
                    }else{
                        $sql = "SELECT * FROM item where category= '$type' ";
                    }
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                ?>
                        <div class="item-card">
                            <p class="item-name"><?php echo $row['itemName'] ?></p>
                            <img src="../uploads/items/<?php echo $row['img'] ?>" class="img-new-arrivals">
                            <p class="item-name"><?php echo $row['qty'] ?> items left</p>
                            <p class="item-price">price : Rs.<?php echo $row['price'] ?>.00</p>
                            <a href="./order-feedback.php?id=<?php echo $row['id'] ?>" class="btn btn-buy margin-left-10px">Buy</a> 
                        </div> 
                <?php 
                    }
                }
                ?>

                    </div>
                </div>
                <div class="right-card-section">
                    <?php  
                    $categorysql = "SELECT * FROM category ";
                    $categoryresult = $conn->query($categorysql);
                    if ($categoryresult->num_rows > 0) { 
                    while($categoryrow = $categoryresult->fetch_assoc()) {
                ?>
                    <a href="./category.php?id=<?php echo $categoryrow['categoryName'] ?>" class="category-item">
                        <img class="category-img"src="../uploads/categories/<?php echo $categoryrow['img'] ?>"/>
                        <p class="category-text"><?php echo $categoryrow['categoryName'] ?></p>
                    </a> 
                    <?php 
                    }
                }
                ?>
                </div>
            </div>
        </div>  

        <script src="../Js/carousal.js"></script>
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
    <script src="../assert/OwlCarousel/dist/owl.carousel.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
    <script src="../js/carousal.js"></script>
  
<style>
 

.footer{
background:#000;
padding:30px 0px; 
margin-top:70px;
font-family: 'Play', sans-serif;
text-align:center;
}

.footer .row{
width:100%;
justify-content:space-around;
margin:1% 0%;
padding:0.6% 0%;
color:gray;
font-size:0.8em;
}

.footer .row a{
text-decoration:none;
color:gray;
transition:0.5s;
}

.footer .row a:hover{
color:#fff;
}

.footer .row ul{
width:100%;
}

.footer .row ul li{
display:inline-block;
margin:0px 30px;
}

.footer .row a i{
font-size:2em;
margin:0% 1%;
}

@media (max-width:720px){
.footer{
text-align:left;
padding:5%;
}
.footer .row ul li{
display:block;
margin:10px 0px;
text-align:left;
}
.footer .row a i{
margin:0% 3%;
}
}
</style>

<footer>
<div class="footer">
<div class="row">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-youtube"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
</div>

<div class="row">
 

<div class="row">
Copyright © 2022 FlyBuyLK - All rights reserved 
</div>
</div>
</footer>

    </body>
</html>