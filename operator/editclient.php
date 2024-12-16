<?php include "../include/header.php"; ?>
<?php include "checksession.php";?>
<script>
            
            $(document).ready(function(){
                $(document).submit(function(){
                    var f=0,msg="";
                    var a=$("#idCN").val();
                    var b=$("#idAddress").val();
                    var c=$("#idMobile").val();
                    var d=$("#idEmail").val();
                    var e=$("#idComment").val();
                    if(a=="")
                    {
                        msg=msg+"Client Name is required <br>";
                        $("#spnCN").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnCN").html("");
                    }
                    if(b=="")
                    {
                        msg=msg+"Address is required <br>";
                        $("#spnAddress").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnAddress").html("");
                    }
                    if(c=="")
                    {
                        msg=msg+"Mobile NO. Required <br>";
                        $("#spnMobile").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnMobile").html("");
                    }
                    if(d=="")
                    {
                        msg=msg+"Email is required <br>";
                        $("#spnEmail").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnEmail").html("");
                    }
                    if(e=="")
                    {
                        msg=msg+"Comment required <br>";
                        $("#spnComment").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnComment").html("");
                    }
                    
                    $("#dvMsg").html(msg);
                    return parseInt(f)==0?true:false;
                });
        
    });</script>
<?php 


$msg="";


if(isset($_GET['eId']))
{
    
    $query="select  clientName,clientAddress,clientPhone,clientMobile,clientEmail,clientComments from tblclient where clientId='$_GET[eId]'";
    //die($query);
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    $row=mysql_fetch_object($result);
    //print_r($row);

}
if(isset($_POST['smtUpdate']))
{
    
    $query="update tblclient set clientName='$_POST[txtClientName]',clientAddress='$_POST[txtAddress]',clientPhone='$_POST[txtPhone]',clientMobile='$_POST[txtMobile]',clientEmail='$_POST[txtEmail]',clientComments='$_POST[txtComment]' where clientId=$_GET[eId] ;";       
    
  //die($query);
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    
//    echo mysql_affected_rows()." Records saved successfully"; 
   if($_SESSION['usertype']=='admin')
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
            <label style="color: Maroon; font-size: 24px; text-decoration: underline; font-weight: bold; text-align: center">Edit Client</label>
            
            <form id="frmAddClient" method="post">
                <table>
                    <tr>
                        <td>
                            <fieldset>
                                <legend>Add Client</legend>
                                <table>
                                        <tr>
                                        <th >
                                            <label >Client Name
                                            <span id="spnCN" style="color:red"></span>

                                            
                                            </label> </th>
                                        <td>
                                            <input type="text" id="idCN" name="txtClientName" value="<?php echo isset($row->clientName)?$row->clientName:" "; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>Address
                                            <span id="spnAddress" style="color:red"></span>
                                            
                                            </label> </th>
                                        <td>
                                            <textarea name="txtAddress" id="idAddress" cols="19" rows="4"><?php echo isset($row->clientAddress)?$row->clientAddress:" "; ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th >
                                            <label >Phone
                                            <span id="spnPhone" style="color:red"></span>
                                            </label> </th>
                                        <td>
                                            <input id="spnPhone" type="text" name="txtPhone" value="<?php echo isset($row->clientPhone)?$row->clientPhone:""; ?>">
                                        </td>
                                        <th >
                                            <label >Mobile
                                            
                                            <span id="spnMobile" style="color:red"></span>
                                            </label> </th>
                                        <td>
                                            <input type="text" id="idMobile" name="txtMobile" value="<?php echo isset($row->clientMobile)?$row->clientMobile:" "; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th >
                                            <label >Email
                                            <span id="spnEmail" style="color:red"></span>
                                            
                                            </label> </th>
                                        <td>
                                            <input type="text" id="idEmail" name="txtEmail" value="<?php echo isset($row->clientEmail)?$row->clientEmail:" "; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>Comment
                                            <span id="spnComment" style="color:red"></span>
                                            
                                            </label> </th>
                                        <td>
                                            <textarea id="idComment" name="txtComment" cols="19" rows="4"><?php echo isset($row->clientComments)?$row->clientComments:" "; ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                    <center>
                                            <input type="submit" name="smtUpdate" value="Update">
                                            <input type="button" name="btnCancel" value="Cancel" onclick="window.location.href='manageclient.php'"  >
                                    </center>
                                            
                                        </td>
                                    </tr>
                                                                        <tr>
                                        <td>
                                            
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
