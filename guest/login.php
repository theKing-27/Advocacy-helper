<?php include "../include/header.php"; ?>
                    <script>
            
            $(document).ready(function(){
                $(document).submit(function(){
                    var f=0,msg="";
                    var a=$("#idUID").val();
                    var b=$("#idPassword").val();
                    if(a=="")
                    {
                        msg=msg+"ID is required <br>";
                        $("#spnUID").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnUID").html("");
                    }
                    if(b=="")
                    {
                        msg=msg+"Name is required <br>";
                        $("#spnPass").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnPass").html("");
                    }
                    $("#dvMsg").html(msg);
                    return parseInt(f)==0?true:false;
                });
        
    });
        
        </script>

<?php 

$msg="";

if(isset($_POST['smtLogin']))
{
    $query="select usrId,usrPwd,usrStatus,usrType,usrName from tbluser where usrId='$_POST[txtUID]'";
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    if(mysql_num_rows($result)>0)
    {
        $row=  mysql_fetch_object($result);
        if($row->usrPwd==$_POST['txtPassword'])
        {
            if($row->usrStatus=='active' || $row->usrStatus=='Active')
            {
                $_SESSION['userid']=$row->usrId;
                $_SESSION['username']=$row->usrName;
                $_SESSION['usertype']=$row->usrType;
                if($row->usrType=='admin' || $row->usrType=='Admin')
                {
                    header("location:".baseurl()."admin/index.php");
                }
                else{
                    header("location:".baseurl()."operator/index.php");
                }
            }
            else{
                $msg="Your Account is INACTIVE";
            }
        }
        else{
            $msg="Invalid UID/Password";
        }
        
    }
    else{
        $msg="Invalid UID/Password";
    }
}



?>
<div id="section" style="border: 1px solid #ccc; background-color: #f0f0f0; min-height: 400px; _height: 400px;">
    <div style="margin: 12px;">
        <?php //content start here ?>
        <table style="margin: 0 auto;" align="center">
            <tr>
                <td align="center">

                   

   <form id="frmLogin" method="post">
            <table>
                <tr>
                    <td>
                        
                <fieldset>
                    <legend>Login</legend>
                    <table height="150" width="250"> 
                        <tr>
                            <td colspan="2">
                                <label id="lblMsg" style="color: red"><?php echo $msg; ?></label>
                             
                            </td>
                        </tr>
                        <tr>
                            <td> <label id="lblUID">User ID</label>
                                <span id="spnUID" style="color:red"></span></td>
                            <td><input type="text" name="txtUID" id="idUID"></td>
                        </tr>
                        <tr>
                            <td> <label id="lblPass">Password</label>
                                <span id="spnPass" style="color:red"></span></td>
                            <td><input type="password" name="txtPassword" id="idPassword"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><center> <input type="submit" name="smtLogin" value="Login"></center> </td>
                        </tr>
                        <tr>
                            <td colspan="2"><center> <a href="recoverPass.php">Forgot Password?</a></center> </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div id="dvMsg" style="color: red"></div>
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
        <?php //content end here ?>
    </div>
</div>
<?php //content end here ?>
<?php include "../include/footer.php"; ?>
