<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyBuyLk-admin</title>   
        <link rel="stylesheet" href="../../CSS/admin.css">  
        <link rel="stylesheet" href="../../CSS/profile.css">  
        <link rel="stylesheet" href="../../CSS/dashboard.css">  
        <link rel="stylesheet" href="../../CSS/add.css">  
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
                  
                   <?php 
                           $id =$_SESSION['userID'];
                           $catSql = "SELECT * FROM user WHERE id='$id'";
                           $catResult = $conn->query($catSql);
                           ?>
                        
                        <?php
                            
                            if ($catResult->num_rows > 0) { 
                            // output data of each row
                            while($catRow = $catResult->fetch_assoc()) {
                           
                        ?>
                        <div class="profile-card">
                    <div class="topCard-section">
                        <img src="../../uploads/users/<?php echo $catRow['propic']; ?>" id="pre-img" class="profile-card-img"/>
                    </div>
                    <div class="bottomcard-section">
                        <div class="name-container">

                            <form action="../../logic/user/update-admin-user.php" method="post" enctype="multipart/form-data">
                            <input type="file" class="custom-file-input" value="../uploads/users/<?php echo $catRow['propic']; ?>" required  name="image" id="image"/>
                            
                            <input type="hidden" value="<?php echo $_SESSION['userID']; ?>"  name="id" id="id"/>
                        </div>
                        <div class="details-container">
                            <div class="left-profile-section">
                                <div class="form-heading">
                                    User details
                                </div>
                                <div class="data-profile-container">
                                  
                                        <div class="input-wrap">
                                            <label for="name">Full name</label>
                                            <input class="input" value="<?php echo $catRow['fullName']; ?>" type="text" placeholder="Full name" name="name" id="name" required/>
                                            <span class="error-txt" id="error-name"></span>
                                        </div>  
                                        <div class="input-wrap">
                                            <label for="password">Password</label>
                                             <div class="pass-wrap">
                                                <input class="input " value="<?php echo $catRow['password']; ?>" type="password" placeholder="Enter password ..." name="password" id="password" required/>
                                                <i id="showHidePassBtn" class="show-hide-password-btn fa fa-eye"></i>
                                            </div>
                                            <span class="error-txt" id="error-name"></span>
                                        </div> 
                                         <div class="btn-row">
                                            <button type="submit" class="btn-save">Save</button>
                                            <button type="reset" class="btn-cancel">Cancel</button>
                                        </div>
                                    </form>
                                </div> 
                            </div>
                            <div class="right-profile-section">
                                <div class="form-heading">
                                    Contact details
                                </div>
                                <div class="data-profile-container">
                                    <form action="../../logic/user/update-admin-contact.php" method="post">
                                        <div class="input-wrap">
                                              <input type="hidden" value="<?php echo $_SESSION['userID']; ?>"  name="id" id="id"/>
                                            <label for="mail">E-mail</label>
                                            <input class="input" value="<?php echo $catRow['email']; ?>" type="email" placeholder="E-mail" name="mail" id="mail" required/>
                                            <span class="error-txt" id="error-mail"></span>
                                        </div> 
                                        <div class="input-wrap">
                                            <label for="tel">Contact number</label>
                                            <input class="input" value="<?php echo $catRow['tel']; ?>" type="tel" placeholder="Contact number" name="tel" id="tel" pattern="[0-9]{10}" required/>
                                            <span class="error-txt" id="error-name"></span>
                                        </div> 
                                        <div class="input-wrap">
                                            <label for="tel">Address</label>
                                            <textarea  type="text" placeholder="Address" name="address" id="address" required><?php echo $catRow['address']; ?></textarea>
                                            <span class="error-txt" id="error-name"></span>
                                        </div> 
                                         <div class="btn-row">
                                            <button type="submit" class="btn-save">Save</button>
                                            <button type="reset" class="btn-cancel">Cancel</button>
                                        </div>
                                    </form>
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