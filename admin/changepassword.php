<?php include "../include/header.php"; ?>
<?php include "checksession.php";?>
<script>
            
            $(document).ready(function(){
                $(document).submit(function(){
                    var f=0,msg="";
                    
                    var b=$("#idPwd").val();
                    var c=$("#idConfirmPwd").val();
                    var d=$("#idNewPwd").val();
                   
                    if(b=="")
                    {
                        msg=msg+"Password is required <br>";
                        $("#spnPwd").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnPwd").html("");
                    }
                    if(d=="")
                    {
                        msg=msg+"New Password is required <br>";
                        $("#spnNewPwd").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnNewPwd").html("");
                    }
                    if(c=="")
                    {
                        msg=msg+"Confirm Password is Empty <br>";
                        $("#spnConfirmPwd").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnConfirmPwd").html("");
                    }
                    
                    $("#dvMsg").html(msg);
                    return parseInt(f)==0?true:false;
                });
        
    });
    
        
        </script>

<?php 
$msg="";
$password="";

if(isset($_POST['smtUpdate']))
{
    
    $query="select usrPwd from tbluser where usrId='$_SESSION[userid]'";
  //  die($query);
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    $password=  mysql_result($result,0,'usrPwd');
    if($password==$_POST['txtCurrentPwd'])
    {
        if($_POST['txtNewPwd']==$_POST['txtConfirmPwd'])
        {
            $query="update tbluser set usrPwd='$_POST[txtNewPwd]' where usrId='$_SESSION[userid]'";
            $result=  mysql_query($query,$con) or die(mysql_error($con));
            
            if($_SESSION['usertype']=='admin')
            {
                header("location:".baseurl()."admin/changepassword.php");
            }
            else{
                header("location:".baseurl()."operator/changepassword.php");
            }
            
            
        }
        else{
            $msg="New Paswword not match";
            
        }
        
    }
    else{
        $msg="Invalid Current Password";
        
    }
}

?>
  <div id="section" style="border: 1px solid #ccc; background-color: #f0f0f0; min-height: 400px; _height: 400px;">
            <div style="margin: 12px;">
                <?php //content start here ?>
<table style="margin: 0 auto;">
    <tr>
        <td>
            <label style="color: Maroon; font-size: 24px; text-decoration: underline; font-weight: bold; text-align: center">Change Password</label>
  
           <form id="frmChangePwd" method="post">
                <table>
                        <tr>
                            <td>
                            <fieldset >
                                <legend>
                                    Change Password
                                </legend>
                                <table>
                                     <tr>
                            <td colspan="2">
                                <label id="lblMsg" style="color: red"><?php echo $msg; echo $rown; ?></label>
               
                            </td>
                        </tr>

                                    <tr>
                                        <td> <label id="lblUserId">User Id &nbsp; <?php echo $_SESSION['userid']; ?> </label></td >


                                    </tr>
                                    <tr>
                                        <td> <label id="lblCurrentPassword">Current Password </label>
                                    <span id="spnPwd" style="color:red"></span></td >
                                        <?php
                                        $query="select usrPwd from tbluser where usrId='$_SESSION[userid]'";
  //  die($query);
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    $password=  mysql_result($result,0,'usrPwd');
    
                                        
                                        ?>
                                        <td><input id="idPwd" type="password" name="txtCurrentPwd" value="<?php echo $password;?>"></td> 
                                    </tr>
                                    <tr>
                                        <td> <label id="lblNewPassword">New Password </label>
                                    <span id="spnNewPwd" style="color:red"></span></td >
                                <td><input id="idNewPwd" type="password" name="txtNewPwd"></td> 
                                    </tr>
                                    <tr>
                                        <td> <label id="lblconfirmpassword">Confirm Password </label>
                                    <span id="spnConfirmPwd" style="color:red"></span></td >
                                        <td><input id="idConfirmPwd" type="password" name="txtConfirmPwd"></td> 
                                    </tr>

                                    <tr>
                                        <td  colspan="2" align="center">
                                            <input type="submit" name="smtUpdate" value="Update" >


                        <input type="button" name="btnCancel" value="Cancel" onclick="window.location.href='index.php'"  >
                                    </tr>
                                                                         <tr>
                            <td colspan="2">
                                <div id="dvMsg" style=" color: red"></div>
                            </td>
                        </tr>
     


                                </table>
                            </fieldset>


                        </td>
                    </tr>

                </table>
            </form>
        </td>
    </tr>
</table>

            </div>
        </div>


<?php //content end here ?>
<?php include "../include/footer.php"; ?>
