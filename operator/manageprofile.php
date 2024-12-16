<?php include "../include/header.php"; ?>
<?php include "checksession.php";?>
<script>
            
            $(document).ready(function(){
                $(document).submit(function(){
                    var f=0,msg="";
                    
                    var d=$("#idName").val();
                    var e=$("#idDOB").val();
                    var h=$("#idEmail").val();
                    var g=$("#idMobile").val();
                    
                    if(d=="")
                    {
                        msg=msg+"Name is required <br>";
                        $("#spnName").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnName").html("");
                    }
                    if(e=="")
                    {
                        msg=msg+"Date Of Birth is required <br>";
                        $("#spnDOB").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnDOB").html("");
                    }
                    if(h=="")
                    {
                        msg=msg+"Email is required <br>";
                        $("#spnEmail").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnEmail").html("");
                    }
                    if(g=="")
                    {
                        msg=msg+"Mobile No. is required <br>";
                        $("#spnMobile").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnMobile").html("");
                    }
                    $("#dvMsg").html(msg);
                    return parseInt(f)==0?true:false;
                });
        
    });
    
    $(document).ready(function(){
                $("#rstReset").click(function(){
                    //die("sf");   
                        $("#spnName").html("");
                        $("#spnDOB").html("");
                        $("#spnEmail").html("");
                       $("#spnMobile").html("");
                    $("#dvMsg").html("");
                });
        
    });
    
        
        </script>

<?php 

if(isset($_SESSION['userid']))
{
    $query="select usrId, usrName, usrDOB, usrGender, usrEmail, usrAddress, usrMobile from tbluser where usrId='$_SESSION[userid]'";
  // die($query);
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    $row= mysql_fetch_object($result);
}
if(isset($_POST['smtUpdate']))
{
    $query="update tbluser set usrName='$_POST[txtName]',usrDOB='$_POST[txtDOB]',usrGender='$_POST[rbtnGender]',usrEmail='$_POST[txtEmail]',usrAddress='$_POST[txtAddress]',usrMobile='$_POST[txtMobile]' where usrId='$_SESSION[userid]'";
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    if($_SESSION['usertype']=='admin' || $_SESSION['usertype']=='Admin')
            {
                header("location:".baseurl()."admin/index.php");
            }
            else{
                header("location:".baseurl()."operator/index.php");
            }

    
            
}


?>
  <div id="section" style="border: 1px solid #ccc; background-color: #f0f0f0; min-height: 400px; _height: 400px;">
            <div style="margin: 12px;">
                <?php //content start here ?>
<table style="margin: 0 auto;">
    <tr>
        <td>
            <label style="color: Maroon; font-size: 24px; text-decoration: underline; font-weight: bold;">Manage Profile</label>
  
             <form method="post">
                <table>
                    <tr>
                        <td>
                            <fieldset >
                                <legend>
                                    Account Information
                                </legend>
                                <table>
                                    <tr>
                                        <td> <label id="lblUserId">User Id <?php echo $_SESSION['userid']; ?> </label></td >

                                    </tr>


                                </table>
                            </fieldset>


                        </td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend>
                                    Personal Information
                                </legend>
                                <table >
                                    <tr>
                                        <td> <label id="lblName">Name </label>
                                    <span id="spnName" style="color:red"></span></td >
                                <td><input id="idName" type="text" name="txtName" value="<?php echo isset($row->usrName)?$row->usrName:" "; ?>"></td>


                                    </tr>
                                    <tr>
                                        <td> <label id="lbldateofbirth">Date of Birth </label>
                                    <span id="spnDOB" style="color:red"></span></td >
                                        <td><input type="text" id="idDOB" name="txtDOB" value="<?php echo isset($row->usrDOB)?$row->usrDOB:" "; ?>"></td>

                                    </tr>

                                    <tr>
                                        <td>  <label gender="lblGender">Gender</label></td>

                                        <td> <input type="radio" name="rbtnGender"  value="Male"<?php echo isset($row->usrGender)?($row->usrGender=="Male"?"checked=checked":" "):" "; ?>>Male
                                            <input type="radio" name="rbtnGender"   value="Female"<?php echo isset($row->usrGender)?($row->usrGender=="Female"?"checked=checked":" "):" "; ?>>Female
                                    </tr>
                                    <tr>
                                        <td> <label id="lblemail">Email </label>
                                    <span id="spnEmail" style="color:red"></span></td >
                                        <td><input id="idEmail" type="text" name="txtEmail" value="<?php echo isset($row->usrEmail)?$row->usrEmail:" "; ?>"></td>

 
                                    </tr>
                                    <tr>
                                        <td> <label id="lbladdress"> Address</label></td >
                                   
         <td><textarea name="txtAddress" cols="15" rows="4"> <?php echo isset($row->usrAddress)?$row->usrAddress:" "; ?></textarea></td>

                                    </tr>
                                    <tr>
                                        <td> <label id="lblmobile">Mobile </label>
                                    <span id="spnMobile" style="color:red"></span></td >
                                        <td><input type="text" name="txtMobile" id="idMobile" value="<?php echo isset($row->usrMobile)?$row->usrMobile:" "; ?>"></td>

                                    </tr>
                            </fieldset>
                        </td>

                </table>
                </td>
                </tr>
                <tr>
                    <td  colspan="2" align="center">
                        <input type="submit" name="smtUpdate" value="Update" >


                        <input type="reset" id="rstReset" value="reset">  

                        <input type="button" name="btnCancel" value="Cancel" onclick="window.location.href='index.php'"  >
                    </td>
                </tr>
                                                     <tr>
                            <td colspan="2">
                                <div id="dvMsg" style=" color: red"></div>
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
