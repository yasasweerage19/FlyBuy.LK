 <script src="../Js/nav.js"></script>

        <div id="nav" class="nav"> 
             <div id="top-nav" class="top-nav" >
               <div class="left-section">
                    <div class="nav-item">
                    <img class="logo-img" src="../images/logo-brand.png"/>
                     </div>
                    <form>
                        <input class="nav-search" type="search" placeholder="search..." />
                        <button class="search-btn" type="submit" ><i class="fa fa-search"></i></button>
                    </form>                    
               </div>
               <div class="right-section">
                <?php 
                    session_start();
                    if(isset($_SESSION['userID'])){ 
                        include_once '../logic/connection.php';
                        $userId = $_SESSION['userID'];
                        $sql = "SELECT * FROM user WHERE id= $userId";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) { 
                            while($row = $result->fetch_assoc()) {
                ?>
                    <div class="profile-section">
                        <img class="profile-img" src="../uploads/users/<?php echo $row['propic']; ?>" alt="proPic"/>
                        <div class="profile-wrap">
                            <p id="profile-name"><?php echo $row['fullName']; ?></p>
                            <a href="../pages/profile.php" id="profile-btn" class="btn-account">My account</a>
                        </div>
                    </div>
                    <a href="../pages/cart.php" class="btn-cart">
                        <i class="fa fa-shopping-cart"></i>
                        Cart
                    </a>

                    <?php     
                            }
                        }
                    } else { ?>
                     <a href="../pages/login.php" class="btn-cart">
                        <i class="fa fa-shopping-cart"></i>
                        Sign in
                    </a>
                     <a href="../pages/register.php" class="btn-cart">
                        <i class="fa fa-shopping-cart"></i>
                        Sign up
                    </a>
                    
                    <?php } ?>
               </div>
            </div> 
            <div class="bottom-nav">
                <a class="btn nav-link" href="../index.php">Home</a>
                <a class="btn nav-link" href="../pages/category.php?id=new">New arrivals</a>
                <a class="btn nav-link" href="../pages/category.php?id=all">Category</a>
                <a class="btn nav-link" href="../pages/contact.php">Contact us</a>
                <a class="btn nav-link" href="../pages/about.php">About us</a>
            </div>
        </div> 

