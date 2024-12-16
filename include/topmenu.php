<div id="nav">
    <div id="cssmenu">
        <?php if (isset($_SESSION['usertype']) && strtolower($_SESSION['usertype']) == "admin") { ?>
            <ul style="background-color:maroon;">
                <li class="active "><a href="<?php echo baseurl() ?>admin/index.php"><span>Home</span></a></li>
                <li><a href="<?php echo baseurl() ?>admin/manageuser.php"><span>Users</span></a></li>
                <li><a href="<?php echo baseurl() ?>admin/ManageProfile.php"><span>Profile</span></a></li>
                <li><a href="<?php echo baseurl() ?>admin/managecourt.php"><span>Courts</span></a></li>
                <li><a href="<?php echo baseurl() ?>admin/manageclient.php"><span>Clients</span></a></li>
                <li><a href="<?php echo baseurl() ?>admin/managecases.php"><span>Cases</span></a></li>
                <li><a href="<?php echo baseurl() ?>admin/ReceivePayment.php"><span>Payment</span></a></li>
               
            </ul>
            <?php
        } elseif(isset($_SESSION['usertype']) && strtolower($_SESSION['usertype'])=="operator") {
            ?>
            <ul>
                  <li class="active "><a href="<?php echo baseurl() ?>operator/index.php"><span>Home</span></a></li>
                 <li><a href="<?php echo baseurl() ?>operator/ManageProfile.php"><span>Profile</span></a></li>
                <li><a href="<?php echo baseurl() ?>operator/managecourt.php"><span>Courts</span></a></li>
                <li><a href="<?php echo baseurl() ?>operator/manageclient.php"><span>Clients</span></a></li>
                <li><a href="<?php echo baseurl() ?>operator/managecases.php"><span>Cases</span></a></li>
            
            </ul>
            <?php
        } else {
            ?>
            <ul>
                <li class="active "><a href="<?php echo baseurl() ?>guest/index.php"><span>Home</span></a></li>
                
            </ul>
            <?php
        }
        ?>
    </div>
</div>
