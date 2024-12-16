<?php include "../include/header.php"; ?>

                    <script>
            
            $(document).ready(function(){
                $(document).submit(function(){
                    var f=0,msg="";
                    var a=$("#idUID").val();
                    var b=$("#idEmail").val();
                    if(a=="")
                    {
                        msg=msg+"UID is required <br>";
                        $("#spnUID").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnUID").html("");
                    }
                    if(b=="")
                    {
                        msg=msg+"Email is required <br>";
                        $("#spnEmail").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnEmail").html("");
                    }
                    $("#dvMsg").html(msg);
                    return parseInt(f)==0?true:false;
                });
        
    });
        
        </script>

<?php $msg="";
 $status="recover";
 $password="";
 if(isset($_POST['smtRecover']))
 {
     $query="select usrPwd from tbluser where usrId='$_POST[txtUID]' and usrEmail='$_POST[txtEmail]'";
     //die($query);
     $result=  mysql_query($query,$con) or die(mysql_error($con));
     if(mysql_num_rows($result)>0)
     {
         $password=  mysql_result($result,0,'usrPwd');
         $status="success";
     }
     else{
         $msg="Invalid Information";
     }
 } ?>
<div id="section" style="border: 1px solid #ccc; background-color: #f0f0f0; min-height: 400px; _height: 400px;">
    <div style="margin: 12px;">
        <?php //content start here ?>
        <table style="margin: 0 auto;" align="center">
            <tr>
                <td align="center">
                    <label style="color: Maroon; font-size: 24px; text-decoration: underline; font-weight: bold;">Recover Password</label>
                    
                    <form id="frmRecoverPass" method="post">
            <table>
                <?php
                if($status=="recover")
               {
                ?>
                <tr>
                    <td>
                <fieldset>
                    <legend>Recover Password</legend>
                    <table height="190" width="250"> 
                        <tr>
                            
                            <td colspan="2">
                                <label id="lblMsg" style="color: red"><?php echo $msg; ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                Note: Enter your user ID and Email<br>
                                Your Password Will be known to you
                            </td>
                        </tr>
                        <tr>
                            <th> <label id="lblUID">User ID</label>
                                    <span id="spnUID" style="color: red"></span>
                    
                                </th>
                                <td><input type="text" id="idUID" name="txtUID"></td>
                        </tr>
                        <tr>
                            <th> <label id="lblPass">Email</label>
                                
                                <span id="spnEmail" style="color:red"></span></th>
                            <td><input type="text" id="idEmail" name="txtEmail"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><center> <input type="submit" name="smtRecover" value="Recover"> &nbsp;
                            <input type="button" value="Cancel" onclick="window.location.href='login.php'"></center> </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center">
                                                                <div id="dvMsg" style=" color: red"></div>

                            </td>
                        </tr>
                       
                    </table>
                        
                </fieldset>
                     </td>
                </tr>
                <?php
                }
                else{
                    ?>
                <tr>
                    <td>
                <fieldset>
                    <legend>Password Information</legend>
                    <table > 
                        <tr>
                            <td colspan="2">
                                Your Password is: <?php echo $password;?>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <a href="<?php echo baseurl();?>guest/login.php">Click here</a>&nbsp;to login.
                            </td>
                        </tr>
                        
                    </table>
                        
                </fieldset>
                     </td>
                </tr>
                <?php } 
                ?>
            </table>
        </form>
        
                </td>
            </tr>
        </table>
        <?php //content end here ?>
    </div>
</div>
<?php //content end here ?>
<?php include "../include/footer.php"; ?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

