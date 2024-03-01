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
                    <h3>Welcome</h3>
                    <h3 class="heading-lbl">Sign up</h3> 
                </div>

                <form action="../logic/user/add.php" method="post" enctype="multipart/form-data">
                   <div class="input-wrap">
                        <label for="name">Full name</label>
                        <input class="input " type="text" placeholder="Enter full name ..." name="name" id="name" required/>
                        <span class="error-txt" id="error-name"></span>
                    </div>
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
                    <div class="input-wrap">
                        <label for="image">Profile picture</label>
                        <div class="propic-wrap">
                            <img class="img-propic" id="propic-img" src="../images/img-preview.png" />
                            <input type="file" class="custom-file-input" name="image" id="image"/>
                        </div>
                        <span class="error-txt" id="error-img"></span>
                    </div>
                    <div class="btn-row">
                        <button type="submit" class="btn btn-buy">Sign in</button>
                        <button type="reset" class="btn btn-see">Cancel</button>
                    </div>
                    <div class="btn-row">
                       Already have an account ? 
                       <a href="" class="form-link">Sign in</a>
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
    <script>
        document.getElementById('image').onchange = function (evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;
 
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function () {
                    document.getElementById("propic-img").src = fr.result;
                }
                fr.readAsDataURL(files[0]);
            }

             
            else {
                document.getElementById("error-img").innerHTML = "Can not preview the image";
            }
        }
    </script>

</html>