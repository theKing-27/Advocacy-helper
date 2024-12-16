<?php include "../include/header.php"; ?>
<?php include "checksession.php";?>
         <script>
            
            $(document).ready(function(){
                $(document).submit(function(){
                    var f=0,msg="";
                    var a=$("#idUID").val();
                    var b=$("#idPwd").val();
                    var c=$("#idConfirmPwd").val();
                    var d=$("#idName").val();
                    var e=$("#idDOB").val();
                    var h=$("#idEmail").val();
                    var g=$("#idMobile").val();
                    var i=$("#idUT").val();
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
                        msg=msg+"Password is required <br>";
                        $("#spnPwd").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnPwd").html("");
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
                     if(i=="-1")
                    {
                        msg=msg+"User Type is required <br>";
                        $("#spnUT").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnUT").html("");
                    }
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
                        $("#spnUID").html("");
                        $("#spnPwd").html("");
                        $("#spnConfirmPwd").html("");
                       $("#spnName").html("");
                      $("#spnUT").html("");
                       $("#spnDOB").html("");
                     
                     $("#spnEmail").html("");
                      
                        $("#spnMobile").html("");
                   
                    $("#dvMsg").html("");
                });
        
    });
        
        </script>

<?php 

$msg="";
if(isset($_POST['smtSave']))
{
    $query="Select count(*) from tbluser where usrId='$_POST[txtUID]'";
        $result=  mysql_query($query,$con) or die(mysql_error($con));
$counter=  mysql_result($result,0,0);
if($counter==0)
{
    if($_POST['txtPwd']==$_POST['txtConfirmPwd'])
    {
    $query="insert into tbluser(usrId,usrPwd,usrType,usrStatus,usrName,usrDOB,usrGender,usrEmail,usrAddress,usrMobile) values('$_POST[txtUID]','$_POST[txtPwd]','$_POST[txtUsrType]','$_POST[rbtnStatus]','$_POST[txtName]','$_POST[txtDOB]','$_POST[rbtnGender]','$_POST[txtEmail]','$_POST[txtAddress]','$_POST[txtMobile]')";                              
    
    //die($query);
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    
//    echo mysql_affected_rows()." Records saved successfully"; 
   // header("location:manageEmployee.php");
}


else{
    $msg="Password Not Match";
}
if($_SESSION['usertype']=='admin' || $_SESSION['usertype']=='Admin')
            {
                header("location:".baseurl()."admin/manageuser.php");
            }
            else{
                header("location:".baseurl()."operator/manageUser.php");
            }
}



else{
 $msg="User Id Already exist";   
}
}
/*
if(isset($_POST['smtCancel']))
{
    if($_SESSION['usertype']=='admin')
            {
                header("location:".baseurl()."admin/index.php");
            }
            else{
                header("location:".baseurl()."operator/index.php");
            }
}
 * 
 */

if(isset($_POST['smtSaveNew']))
{
    $query="Select count(*) from tbluser where usrId='$_POST[txtUID]'";
        $result=  mysql_query($query,$con) or die(mysql_error($con));
$counter=  mysql_result($result,0,0);
if($counter==0)
{
    
    if($_POST['txtPwd']==$_POST['txtConfirmPwd'])
    {
    $query="insert into tbluser(usrId,usrPwd,usrType,usrStatus,usrName,usrDOB,usrGender,usrEmail,usrAddress,usrMobile) values('$_POST[txtUID]','$_POST[txtPwd]','$_POST[txtUsrType]','$_POST[rbtnStatus]','$_POST[txtName]','$_POST[txtDOB]','$_POST[rbtnGender]','$_POST[txtEmail]','$_POST[txtAddress]','$_POST[txtMobile]')";                              
    //die($query);
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    
//    echo mysql_affected_rows()." Records saved successfully"; 

}


else{
    $msg="Password Not Match";
}
}
else{
 $msg="User Id Already exist";   
}
}




?>
  <div id="section" style="border: 1px solid #ccc; background-color: #f0f0f0; min-height: 400px; _height: 400px;">
            <div style="margin: 12px;">
                <?php //content start here ?>
<table style="margin: 0 auto;">
    <tr>
        <td>
            <label style="color: Maroon; font-size: 24px; text-decoration: underline; font-weight: bold;">ADD USER</label>
  
            <form id="frmAddUser"  method="post">
                <table>
                    
                    <tr>
                        <td>
                            <fieldset >
                                <legend>
                                    Account Information
                                </legend>
                                <table>
                                     <tr>
                            <td colspan="2">
                                <label id="lblMsg" style="color: red"><?php echo $msg; ?></label>
                            </td>
                        </tr>
     
                                    <tr>
                                        <td> <label id="lblUserId">User Id </label>
                                    <span id="spnUID" style="color:red"></span></td >
                                <td><input type="text" id="idUID" name="txtUID"></td> 

                                    </tr>
                                    <tr>
                                        <td> <label id="lblpassword">Password </label>
                                    <span id="spnPwd" style="color:red"></span></td >
                                <td><input type="Password" id="idPwd" name="txtPwd"></td> 
                                    </tr>
                                    <tr>
                                        <td> <label id="lblconfirmpassword">Confirm Password </label>
                                    <span id="spnConfirmPwd" style="color:red"></span></td >
                                <td><input type="password" id="idConfirmPwd" name="txtConfirmPwd"></td> 
                                    </tr>
                                    <tr>
                                        <td><label id="lblusertype">User Type
                                                <span id="spnUT" style="color: red"></span></label></td>
                                                <td>   <select id="idUT" name="txtUsrType"> 
                                                <option value="-1">[select]</option>
                                                <option>admin</option>
                                                <option>operator</option>
                                                    </select>
                                                
                                    </tr>
                                    <tr>
                                    <td>  <label id="lblUserStatus"> User Status</label></td>
                                    <td> <input type="radio" name="rbtnStatus" value="active" checked="checked">Active
                                      <input type="radio" name="rbtnStatus"  value="inactive">Inactive
                                    </td>
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
                                <td><input type="text" id="idName" name="txtName"></td>


                                    </tr>
                                    <tr>
                                        <td> <label id="lbldateofbirth">Date of Birth </label>
                                    <span id="spnDOB" style="color:red"></span></td >
                                <td><input id="idDOB" type="text" name="txtDOB"></td>

                                    </tr>

                                    <tr>
                                        <td>  <label gender="lblGender">Gender</label>
                                        </td>

                                        <td> <input type="radio" name="rbtnGender" value="Male" checked="checked">Male
                                            <input type="radio" name="rbtnGender"  value="Female">Female
                                    </tr>
                                    <tr>
                                        <td> <label id="lblemail">Email </label>
                                    <span id="spnEmail" style="color:red"></span></td >
                                        <td><input type="text" id="idEmail" name="txtEmail"></td>


                                    </tr>
                                    <tr>
                                        <td> <label id="lbladdress"> Address</label>
                                    </td >
                                    <td><input type="text" name="txtAddress"></td>


                                    </tr>
                                    <tr>
                                        <td> <label id="lblmobile">Mobile </label>
                                    <span id="spnMobile" style="color:red"></span></td >
                                        <td><input type="text" id="idMobile" name="txtMobile"></td>

                                    </tr>
                            </fieldset>
                        </td>
                    </tr>

                </table>
                </td>
                </tr>
                <tr>
                    <td  colspan="2" align="center">
                        <input type="submit" name="smtSave" value="Save"  >
                        <input type="submit" name="smtSaveNew" value="Save&New" >

                        <input type="reset" id="rstReset" value="Reset"  >

                        <input type="button" name="btnCancel" value="Cancel" onclick="window.location.href='manageuser.php'"  >

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
