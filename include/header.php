<?php include_once "../include/settings.php" ?>﻿
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title></title>
        <link href="<?php echo baseurl() ?>css/sitestyle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo baseurl() ?>css/menustyle.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="<?php echo baseurl();?>scripts/jquery-ui-1.11.1/external/jquery/jquery.js"></script>
   <script language="javascript" type="text/javascript" src="<?php echo baseurl();?>scripts/jquery-1.10.2.js"></script>
    
    <link  rel="stylesheet" type="text/css"  href="<?php echo baseurl();?>scripts/jquery-ui-1.11.1/jquery-ui.min.css" />
    <script  type="text/javascript"  src="<?php echo baseurl();?>scripts/jquery-ui-1.11.1/jquery-ui.min.js"></script>
    </head>
    <body style="background-image: url(<?php echo baseurl(); ?>images/back.jpg); background-repeat: repeat;background:maroon;">
        <div style="margin: 0 auto; width: 950px;">
            <div id="header" style="border-bottom: solid 3px #ccc; padding-bottom: 5px; height: 90px;
               
                 color: white; background-color: maroon;width:950px;height:120px;">
               <img src="<?php echo baseurl(); ?>images/legal.jpg" height="125px" width="150px;">
                <span style="padding-left: 60px; font-size: 70px; font-weight: bold; text-decoration: underline;text-shadow: #fff -1px 1px 1px;vertical-align:top;">
                    AdvocacyHelper</span>
                <span style="position: relative; top: 70px; right: 10px; font-size: 12px;
                      font-weight: normal;  text-shadow: #fff -1px 1px 1px;float:right;color:white;">
                    Welcome <?php
                    if (isset($_SESSION['usertype'])) {
                        echo $_SESSION['username'] . "!!!";
                    } else {
                        echo "Guest!!!";
                    }
                    ?>&nbsp;&nbsp;&nbsp;<?php if (isset($_SESSION['usertype'])) { ?>

                        <a  style="color:white" href="<?php echo baseurl() ?>logout.php" style="color:Blue;text-decoration:none;">SignOut</a>
                        <?php
                    } else {
                        ?><a style="color:white" href="<?php echo baseurl() ?>guest/login.php" style="color:Blue;text-decoration:none;">SignIn</a>
                        <?php
                    }
                    ?></span>
            </div>
            <div>
                <?php include_once "topmenu.php" ?>
            </div>