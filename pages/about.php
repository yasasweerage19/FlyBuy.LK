<!DOCTYPE html>
<html>
    <head>
        <title>FlyBuyLk-profile</title>
   
        <link rel="stylesheet" href="../CSS/home.css"> 
        <link rel="stylesheet" href="../CSS/about.css"> 
        <link rel="stylesheet" href="../assert/OwlCarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../assert/OwlCarousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="../CSS/carousel.css">
        <link rel="stylesheet" href="../assert/font-awesome/css/font-awesome.min.css">

    </head>
    <body>
          <?php include '../components/nav.php' ?>
                
                <div class="about-container">
                    <div class="left-about">
                        <div class="about-heading">
                            About us
                        </div>
                        <img src="../images/logo-white.png" class ="about-logo">
                    </div>
                    <div class="right-about"></div>
                </div>
                <?php include_once '../components/footer.php'?>
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
    </body>
</html>
