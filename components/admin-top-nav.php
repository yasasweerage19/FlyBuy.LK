<?php
    session_start();
?>
 <?php
                            include '../../logic/connection.php';
                            $userID = $_SESSION['userID'] ;
                            $sql = "SELECT * FROM user where id= $userID";
                            $result = $conn->query($sql);
                        ?>
                        
                        <?php
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                             
                        ?>
<nav class="top-nav">                
     <img class="nav-profile-image" src="../../uploads/users/<?php echo $row["propic"]; ?>"/>
     <a href="admin-profile.php"><?php echo $_SESSION['name']; ?></a>
     <a href="../../logic/user/admin-logout.php" class="fa fa-power-off btn-logout"></a>
</nav>

<?php
                            }
                            } else {
                            echo "0 results";
                            }
                            
                        ?> 