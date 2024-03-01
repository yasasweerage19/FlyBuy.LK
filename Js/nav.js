    
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


            jQuery(document).ready(function(){
                jQuery('.titleWrapper').click(function(){
                    var toggle = jQuery(this).next('div#descwrapper');
                    jQuery(toggle).slideToggle("slow");
                });
                jQuery('.inactive').click(function(){
                    jQuery(this).toggleClass('inactive active');
                });
            });