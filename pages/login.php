<!DOCTYPE html>
<html>
    <head>
        <title>FlyBuyLk-Sign in</title>
    
        <link rel="stylesheet" href="../CSS/home.css"> 
        <link rel="stylesheet" href="../CSS/login.css"> 
        <link rel="stylesheet" href="../assert/OwlCarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../assert/OwlCarousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="../CSS/carousel.css">
        <link rel="stylesheet" href="../assert/font-awesome/css/font-awesome.min.css">

    </head>
    <body style = "background-image: url(../images/background.jpg);">
        <div class="login-card">
            <img class="img-wrap" src="../images/login.jpg">
            <div class="form-wrap">
                <div class="heading-wrap">
                    <h3>Hi again</h3>
                    <h3 class="heading-lbl">Sign in</h3> 
                </div>

                <form action="../logic/user/login.php" method="post">
                    <div class="input-wrap">
                        <label for="email">E-mail</label>
                        <input class="input" type="email" placeholder="Enter email ..." name="email" id="email" required/>
                        <span class="error-txt" id="error-email"></span>
                    </div>
                     <div class="input-wrap">
                        <label for="password">Password</label>
                        <div class="pass-wrap">
                            <input class="input pass-input" type="password" placeholder="Enter password ..." name="password" id="password" required/>
                            <i id="showHidePassBtn" class="show-hide-password-btn fa fa-eye"></i>
                        </div>
                        <span class="error-txt" id="error-pass"></span>
                    </div>
                    <div class="btn-row">
                        <button type="submit" class="btn btn-buy">Sign in</button>
                        <button type="reset" class="btn btn-see">Cancel</button>
                    </div>
                    <div class="btn-row">
                       Need an account ? 
                       <a href="./register.php" class="form-link">Sign up</a>
                    </div>
                </form>
            </div>
        </div>
        
                <?php include_once '../components/footer.php'?>
    </body>
        <script>
        const togglePassword = document.querySelector('#showHidePassBtn');
        const password = document.querySelector('#password');
        
        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
             this.classList.toggle('fa-eye-slash');
        });
    </script>
</html>