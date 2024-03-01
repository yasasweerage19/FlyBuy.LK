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
                    <div class="left-about ">
                        <div class="about-heading">
                            Mail us
                        </div>
                        <form>
                            <div class="form-row">
                                <label for="from">From</label>
                                <input type="email" placeholder="E-mail from" name="from" id ="from" class="input" required/>
                            </div>
                            <div class="form-row">
                                <label for="subject">subject</label>
                                <input type="text" placeholder="Subject" name="subject" id ="subject" class="input" required/>
                            </div>
                            <div class="form-row">
                                <label for="content">Content</label>
                                <textarea    placeholder="E-mail from" name="content" id ="content" class="input wd-150" required></textarea>
                            </div>
                          <button type="submit" class="btn btn-buy btn-send">Sign in</button>
                      </form>
                    </div>
                    <div class="right-about"></div>
                </div>
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
                
                <?php include_once '../components/footer.php'?>
    </body>
</html>
