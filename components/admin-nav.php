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

         <nav class="nav" id="nav">
               <div>
                    <img  class="logo-brand" src="../../images/logo-brand.png">
                    <a href="dashboard.php" class="tab-accordian"> 
                        <div class="titleWrapper inactive">
                            <h3><i class="fa fa-dashboard"></i> &nbsp; Dashboard</h3> 
                        </div> 
                    </a> 
                    <!-- Tab 1 -->
                    <a href="view-items.php" class="tab-accordian">
                        <div class="titleWrapper inactive">
                            <h3><i class="fa fa-list"></i> &nbsp; Items</h3>
                        </div>
                    
                    
                    .</a>
                    <!-- Tab 2 -->
                    <a href="view-users.php" class="tab-accordian">
                        <div class="titleWrapper  inactive">
                            <h3><i class="fa fa-user"></i> &nbsp; Users</h3>
                        </div>
                    </a>
                    <!-- Tab 3 -->
                    <a href="view-category.php" class="tab-accordian">
                        <div class="titleWrapper inactive">
                            <h3><i class="fa fa-list-alt"></i> &nbsp; Category</h3>
                        </div>
                    </a>
                    <!-- Tab 4 -->
                    <a href="view-orders.php" class="tab-accordian"> 
                        <div class="titleWrapper inactive">
                            <h3><i class="fa fa-shopping-basket"></i> &nbsp; Orders</h3> 
                        </div> 
                    </a> 
               </div> 
            </nav>
