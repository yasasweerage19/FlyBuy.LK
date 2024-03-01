<!DOCTYPE html>
<html>
    <head>
        <title>FlyBuyLk-Cart</title>
        <link rel="stylesheet" href="../CSS/home.css"> 
        <link rel="stylesheet" href="../CSS/cart.css">  
        <link rel="stylesheet" href="../assert/OwlCarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../assert/OwlCarousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="../CSS/carousel.css">
        <link rel="stylesheet" href="../assert/font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <?php include '../components/nav.php' ?>

        <div class="cart-container">
            <div class="headding-row">
                <div class="row-3">Product</div>
                <div class="row-2">Quentity</div>
                <div class="row-hedding">Sub total</div>
            </div>
              <?php
                            $userId = $_SESSION['userID'];
                            $itemID;
                            $_SESSION['total']=0;
                            include_once '../logic/connection.php';
                            $item = "SELECT o.id,o.itemID,o.userId,o.qty,o.price,i.itemName,i.img FROM `order` AS o ,item AS i WHERE o.userId = $userId AND  i.id = o.itemID";
                            $itemResult = $conn->query($item);
                            
                            if ($itemResult->num_rows  > 0) { 
                                
                                
                                ?>
                        
                        <?php 
                            if ($itemResult->num_rows  > 0) { 
                            // output data of each row
                            while($itemRow = $itemResult->fetch_assoc()) {
                                  $_SESSION['total'] = $_SESSION['total'] + ( $itemRow['qty'] * $itemRow['price'])
                        ?>
            <div class="data-row">
                <div class="row-3 product-wrap">
                    <img src="../uploads/items/<?php echo  $itemRow['img']; ?>" class="product-image" width="150px" style="margin-right:10px" >
                    <div class="product-description-wrap">
                        <h3><?php echo  $itemRow['itemName']; ?></h3>
                        <h5><?php echo  $itemRow['price']; ?></h5>
                        <a href="../logic/order/delete.php?id=<?php echo $itemRow['id']; ?>" class="remove-btn" >remove</a>
                    </div>
                </div>
                <div class="row-2 qty-wrap">
                    <a href="../logic/order/update.php?itemid=<?php echo $itemRow['id']; ?>&type=add&qty=<?php echo $itemRow['qty']; ?>" class="change-qty-btn"><i class="fa fa-plus"></i></a>
                    <input class="cart-qty" type="number" min="1" max="<?php echo $itemRow['qty']; ?>" value="<?php echo $itemRow['qty']; ?>" required/>
                    <a href="../logic/order/update.php?itemid=<?php echo $itemRow['id']; ?>&type=minus&qty=<?php echo $itemRow['qty']; ?>" class="change-qty-btn"><i class="fa fa-minus"></i></a>
                </div>
                <div class="row-subtotal"><p>Rs. <?php echo $itemRow['qty'] * $itemRow['price']; ?>.00</p></div>
            </div>
             <?php   }  }
                           } else {
                            echo "0 results";
                            } 
                        ?>
        </div>
        <div class="form-card">
            <div class="cart-form">
                <h2>Total : Rs.<?php echo $_SESSION['total']?>.00</h2>
                <button class="btn btn-buy">proceed to Checkout</button>
            </div>
        </div>
                <?php include_once '../components/footer.php'?>
                <script src="../assert/OwlCarousel/dist/owl.carousel.js"></script>
                <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
                <script src="../js/carousal.js"></script>
                <script src="../Js/nav.js"></script>
            </body>
</html>