<?php include "../include/header.php"; ?>
<?php include "checksession.php";?>
<script>
            
            $(document).ready(function(){
                $(document).submit(function(){
                    var f=0,msg="";
                    
                    var b=$("#idPwd").val();
                    var c=$("#idConfirmPwd").val();
                    var d=$("#idName").val();
                    var e=$("#idDOB").val();
                    var h=$("#idEmail").val();
                    var g=$("#idMobile").val();
                    var i=$("#idUT").val();
                    
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
if(isset($_GET['eId']))
{
    
    $query="select usrId,usrPwd,usrType,usrStatus,usrName,usrDOB,usrAddress,usrGender,usrMobile,usrEmail from tbluser where usrId='$_GET[eId]'";
    //die($query);
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    $row=mysql_fetch_object($result);
    //print_r($row);

}
if(isset($_POST['smtUpdate']))
{
    
    $query="update tbluser set usrName='$_POST[txtName]',usrDOB='$_POST[txtDOB]',usrPwd='$_POST[txtPwd]',usrType='$_POST[txtUsrType]',usrStatus='$_POST[btnStatus]',usrGender='$_POST[rbtnGender]',usrEmail='$_POST[txtEmail]',usrAddress='$_POST[txtAddress]',usrMobile='$_POST[txtMobile]' where usrId='$_GET[eId]'";                              
   // die("$query");
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    
//    echo mysql_affected_rows()." Records saved successfully"; 
   if($_SESSION['usertype']=='admin')
            {
                header("location:".baseurl()."admin/manageuser.php");
            }
            else{
                header("location:".baseurl()."user/manageuser.php");
            }
    
}



?>
  <div id="section" style="border: 1px solid #ccc; background-color: #f0f0f0; min-height: 400px; _height: 400px;">
            <div style="margin: 12px;">
                <?php //content start here ?>
<table style="margin: 0 auto;">
    <tr>
        <td>
            <label style="color: Maroon; font-size: 24px; text-decoration: underline; font-weight: bold ; text-align: center">Edit User</label>
  
            <form method="post" id="frmEditUser">
                <table>
                    
                    <tr>
                        <td>
                            <fieldset >
                                <legend>
                                    Account Information
                                </legend>
                                <table>
                
                                    <tr>
                                        <th> <label id="lblUserId">User Id</label></th >
                                        <td> <label id="lblUserId"><?php echo$_GET['eId'];?> </label></td >
                                    
                                     

                                    </tr>
                                    <tr>
                                        <th> <label id="lblpassword">Password 
                                                           <span id="spnPwd" style="color:red"></span>
                     </label></th >
                                    
                     <td><input type="Password" id="idPwd" name="txtPwd" value="<?php echo isset($row->usrPwd)?$row->usrPwd:""; ?>"></td> 
                                    </tr>
                                    <tr>
                                        <th> <label id="lblconfirmpasswo">Confirm Password 
                                                           <span id="spnConfirmPwd" style="color:red"></span>
                     </label></th >
                                 
                     <td><input id="idConfirmPwd" type="password" name="txtConfirmPwd" value="<?php echo isset($row->usrPwd)?$row->usrPwd:""; ?>"></td> 
                                    </tr>
                                    <tr>
                                        <th><label id="lblusertype">User Type
                                            <span id="spnUT" style="color: red"></span></label></th>
                                        <td>   <select id="idUT" name="txtUsrType"> 
                                                <option value="-1">[select]</option>
                                                <option <?php echo isset($row->usrType)?($row->usrType=="admin"?"selected=selected":" "):" "; ?>>admin</option>
                                                <option <?php echo isset($row->usrType)?($row->usrType=="operator"?"selected=selected":" "):" "; ?>>operator</option>
                                            </select> </td>
                                            </tr>
                                    <th>  <label userstatus="lblUserStatus"> User Status</label></th>
                                    <td> <input type="radio" name="btnStatus" value="active"<?php echo isset($row->usrStatus)?($row->usrStatus=="active"?"checked=checked":" "):" "; ?>>Active
                                        <input type="radio" name="btnStatus"  value="inactive"<?php echo isset($row->usrStatus)?($row->usrStatus=="inactive"?"checked=checked":" "):" "; ?>>Inactive
                                    </td>




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
                                        <th> <label id="lblName">Name 
                                        <span id="spnName" style="color:red"></span>
                     
                                            </label></th >
                                    
                                        <td><input type="text" id="idName" name="txtName" value="<?php echo isset($row->usrName)?$row->usrName:" "; ?>"></td>


                                    </tr>
                                    <tr>
                                        <th> <label id="lbldateofbirth">Date of Birth 
                                            <span id="spnDOB" style="color:red"></span></label></th >
                          
                                            <td><input type="text" id="idDOB" name="txtDOB" value="<?php echo isset($row->usrDOB)?$row->usrDOB:" "; ?>"></td>

                                    </tr>

                                    <tr>
                                        <th>  <label gender="lblGender">Gender</label></th>

                                        <td> <input type="radio" name="rbtnGender" value="Male"<?php echo isset($row->usrGender)?($row->usrGender=="Male"?"checked=checked":" "):" "; ?>>Male
                                            <input type="radio" name="rbtnGender" value="Male"<?php echo isset($row->usrGender)?($row->usrGender=="Female"?"checked=checked":" "):" "; ?>>Female
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> <label id="lblemail">Email 
                                            <span id="spnEmail" style="color:red"></span></label></th >
                   
                                            <td><input type="text" name="txtEmail" id="idEmail" value="<?php echo isset($row->usrEmail)?$row->usrEmail:" "; ?>"></td>


                                    </tr>
                                    <tr>
                                        <th> <label id="lbladdress"> Address</label></th >
                                 
                                   <td><textarea name="txtAddress" cols="15" rows="4"> <?php echo isset($row->usrAddress)?$row->usrAddress:" "; ?></textarea></td>


                                    </tr>
                                    <tr>
                                        <th> <label id="lblmobile">Mobile 
                                            <span id="spnMobile" style="color:red"></span></label></th >
                                            <td><input type="text" id="idMobile" name="txtMobile" value="<?php echo isset($row->usrMobile)?$row->usrMobile:" "; ?>"></td>

                                    </tr>
                            </fieldset>
                        </td>

                </table>
                </td>
                </tr>
                <tr>
                    <td  colspan="2" align="center">
                        <input type="submit" name="smtUpdate" value="Update"> 
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
