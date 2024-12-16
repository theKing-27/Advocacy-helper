<?php include "../include/header.php"; ?>
<?php include "checksession.php";?>

<?php 
//    $idquery="select clientId from tblClient where clientName='$_POST[txtClient]'";
  //  $idresult=  mysql_query($idquery,$con) or die(mysql_error($con));
    //$idrow=  mysql_fetch_object($idresult);
    //$id=$idrow->clientId;






if(isset($_POST['smtSave']))
{
    $clientid="select clientName from tblclient where clientId=$_POST[txtClient]";
    //die($clientid);
    $clientidResult=mysql_query($clientid,$con) or die(mysql_error($con));
    $clientidrow= mysql_fetch_object($clientidResult);
    
    $name=$clientidrow->clientName;

    $caseId="select caseId from tblcase where clientId=$_POST[txtClient]";
    //die($caseId);
    $caseIdResult=mysql_query($caseId,$con) or die(mysql_error($con));
    $caseIdrow= mysql_fetch_object($caseIdResult);
    $cid=$caseIdrow->caseId;
    
    $savequery="insert into tblCaseAmount(caseId,amountReceivedBy,amountReceivedDate,amountReceived,amountReceivedRemarks)values($cid,'$name','$_POST[txtDate]','$_POST[txtAmount]','$_POST[txtRemark]')";
 // die($savequery);
    $saveResult=  mysql_query($savequery,$con) or die(mysql_error($con));
    
   header("location:".baseurl()."admin/index.php");
   
}

?>
  <div id="section" style="border: 1px solid #ccc; background-color: #f0f0f0; min-height: 400px; _height: 400px;">
            <div style="margin: 12px;">
                <?php //content start here ?>
<table style="margin: 0 auto;">
    <tr>
        <td>
            <label style="color: Maroon; font-size: 24px; text-decoration: underline; font-weight: bold; text-align: center">Receive Payment</label>
            <form id="frmPayment" name="frmPayment" method="post">
                <table>
                    <tr>
                        <td>
                            <fieldset>
                                <legend>
                                    Receive Payment
                                </legend>
                                <table>
                                    <tr>
                                        <td>
                                            <label style="font-weight: bold">Client</label>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                           </td>
                            
                                        <td>
                                            <select name="txtClient" onchange="document.frmPayment.submit();">
                                                <option value="-1">[SELECT]</option>
                                            
                                            <?php   
                                            
                                                $clientquery="Select clientName,clientId from tblClient";
                                                $clientresult=  mysql_query($clientquery,$con);


                                     while($clientrow= mysql_fetch_object($clientresult))
                                        {
                                        ?>
                                                <option value="<?php echo $clientrow->clientId;?>"<?php echo isset($_POST['txtClient'])?($_POST['txtClient']==$clientrow->clientId?"selected='selected'":""):""; ?>><?php echo $clientrow->clientName?></option>
                                                <?php
                                        }
                                        ?>
                                            </select>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <label style="font-weight: bold">Case</label>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                           </td>
                            
                                        <td>
                                            <select name="ddlCase">
                                                <option value="-1">[SELECT]</option>
                                                <?php   
                                                $casequery="select caseId,caseTitle from tblCase where clientId=$_POST[txtClient]";
                                                $caseResult=mysql_query($casequery,$con) or die(mysql_error($con));

                                     while($caserow= mysql_fetch_object($caseResult))
                                        {
                                        ?>
                                                <option value="<?php echo $caserow->caseId?>"><?php echo $caserow->caseTitle?></option>
                                                <?php
                                        }
                                        ?>
                                                
                                                
                                                
                                            </select>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <label style="font-weight: bold">Date</label>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                           </td>
                            
                                        <td>
                                            <input type="text" name="txtDate">
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <label style="font-weight: bold">Amount</label>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                           </td>
                            
                                        <td>
                                            <input type="text" name="txtAmount">
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <label style="font-weight: bold">Remark</label>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                           </td>
                            
                                        <td>
                                            <input type="text" name="txtRemark">
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                    <center>
                                        <input type="submit" name="smtSave" value="Save">
                                        <input type="submit" name="smtCancel" value="Cancel">
                                    </center>
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
