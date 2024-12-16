
<div id="footer">
    <div style="margin: 0 auto;">
        <?php if (isset($_SESSION['usertype']) && strtolower($_SESSION['usertype'])== "admin") { ?>
            <ul>
                <li><a href="<?php echo baseurl() ?>admin/index.php">Home</a></li>
                <li><a href="<?php echo baseurl() ?>admin/ManageProfile.php">Profile</a></li>
                <li><a href="<?php echo baseurl() ?>admin/ChangePassword.php">Change Password</a></li>
    
            </ul>
            <?php
        } elseif (isset($_SESSION['usertype']) && strtolower($_SESSION['usertype']) == "operator") {
            ?>
             <ul>
                <li><a href="<?php echo baseurl() ?>operator/index.php">Home</a></li>
                <li><a href="<?php echo baseurl() ?>operator/ManageProfile.php">Profile</a></li>
                <li><a href="<?php echo baseurl() ?>operator/ChangePassword.php">Change Password</a></li>
            </ul>
            <?php
        } else {
            ?>
            <ul>             
               
            </ul>
    <?php
}
?>
    </div>
    <br />
    <span style="width: 100%; margin: 0 auto;color:white;">&copy; 2015 <a style="color:white;" href="http://www.alphaitworld.co.in">
            Alpha Net Technologies Pvt. Ltd.</a> All Rights Reserved </span>
</div>
<br />
</div>
</body>
</html>

