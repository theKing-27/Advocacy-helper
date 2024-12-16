<?php include "../include/header.php"; ?>
<?php include "checksession.php";?>
<script>
            
            $(document).ready(function(){
                $(document).submit(function(){
                    var f=0,msg="";
                    var a=$("#idName").val();
                    var b=$("#idCNo").val();
                    var c=$("#idCtitle").val();
                    var d=$("#idCtype").val();
                    var e=$("#idCaseAgainst").val();
                    var g=$("#idUnderSection").val();
                    var h=$("#idStartDate").val();
                    var i=$("#idCaseStatus").val();
                    var j=$("#idCurrentState").val();
                    var k=$("#idRemark").val();
                    if(a=="-1")
                    {
                        msg=msg+"Select Client  <br>";
                        $("#spnName").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnName").html("");
                    }
                    if(b=="")
                    {
                        msg=msg+"Case No. is required <br>";
                        $("#spnCNo").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnCNo").html("");
                    }
                    if(c=="")
                    {
                        msg=msg+"Case Title is Required <br>";
                        $("#spnCtitle").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnCtitle").html("");
                    }
                    if(d=="")
                    {
                        msg=msg+"Case Type is required <br>";
                        $("#spnCtype").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnCtype").html("");
                    }
                    if(e=="")
                    {
                        msg=msg+"Case Against Field is empty <br>";
                        $("#spnCaseAgainst").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnCaseAgainst").html("");
                    }
                    if(g=="")
                    {
                        msg=msg+"Under Section Required <br>";
                        $("#spnUnderSection").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnUnderSection").html("");
                    }
                    if(h=="")
                    {
                        msg=msg+"Start Date is Required <br>";
                        $("#spnStartDate").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnStartDate").html("");
                    }
                    if(i=="-1")
                    {
                        msg=msg+"Case Status Not Selected <br>";
                        $("#spnCaseStatus").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnCaseStatus").html("");
                    }
                    if(j=="-1")
                    {
                        msg=msg+"Select Current State <br>";
                        $("#spnCurrentState").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnCurrentState").html("");
                    }
                    if(k=="")
                    {
                        msg=msg+"Remark  Required <br>";
                        $("#spnRemark").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnRemark").html("");
                    }
                    
                    
                    $("#dvMsg").html(msg);
                    return parseInt(f)==0?true:false;
                });
        
    });</script>

<?php 

if(isset($_POST['smtSave']))
{
    $id="";
    $que="Select clientName,clientId from tblClient";
    //die($query);
    $r1=  mysql_query($que,$con);
    while($row=  mysql_fetch_object($r1)){
    if($_POST['txtClient']== $row->clientName)
        
    {
        $id=$row->clientId;
        
    }    
    }
    
                                     
    
    $query="insert into tblcase(caseNumber,ClientId,caseTitle,caseType,caseAgainst,caseUnderSections,caseStartDate,caseStatus,caseCurrentState,caseRemarks) values('$_POST[txtCaseNumber]',$id,'$_POST[txtCaseTitle]','$_POST[txtCaseType]','$_POST[txtCaseAgainst]','$_POST[txtUnderSection]','$_POST[txtStartDate]','$_POST[txtCaseStatus]','$_POST[txtCurrentState]','$_POST[txtRemark]')";                              
    //die($query);
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    
//    echo mysql_affected_rows()." Records saved successfully"; 
   // header("location:manageEmployee.php");



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
            <label style="color: Maroon; font-size: 24px; text-decoration: underline; font-weight: bold; text-align: center">Add Case</label>
            <form id="frmAddCase" method="post">
                <table>
                    <tr>
                        <td>
                            <fieldset>
                                <legend>Add Case</legend>
                                <table>
                                    <tr>
                                        
                                        <td style="font-weight: bold">Client
                                        <span id="spnName" style="color:red"></span></td>
                                        <td>
                                                         
                                     
                                            <select id="idName" name="txtClient">
                                                
                                                <option value="-1">[Select]</option>
                                                <?php   
                                     $query="Select clientName from tblClient";
                                     //die($query);
                                     $result=  mysql_query($query,$con);
                                     while($row= mysql_fetch_object($result))
                                        {
                                        ?>
                                                <option><?php echo $row->clientName?></option>
                                                <?php
                                        }
                                        ?>
                                            </select></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td style="font-weight: bold">Case Number
                                            <span id="spnCNo" style="color:red"></span>
                                            </td>
                                            <td><input id="idCNo" type="text" name="txtCaseNumber"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold">Case Title
                                            <span id="spnCtitle" style="color:red"></span></td>
                                        <td><input type="text" id="idCtitle" name="txtCaseTitle"></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td style="font-weight: bold">Case Type
                                            <span id="spnCtype" style="color:red"></span></td>
                                            <td><input  id="idCtype" type="text" name="txtCaseType"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold">Case Against
                                        <span id="spnCaseAgainst" style="color:red"></span></td>
                                        <td><input type="text" id="idCaseAgainst" name="txtCaseAgainst"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold">Under Section
                                        <span id="spnUnderSection" style="color:red"></span></td>
                                        <td><input type="text" id="idUnderSection" name="txtUnderSection"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold">Start Date
                                        <span id="spnStartDate" style="color:red"></span></td>
                                        <td><input type="text" id="idStartDate" name="txtStartDate"></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td style="font-weight: bold">Case Status
                                            <span id="spnCaseStatus" style="color:red"></span></td>
                                            <td><select id="idCaseStatus" name="txtCaseStatus">
                                                    <option value="-1">[Select]</option>
                                                <option>open</option>
                                                <option>pending</option>
                                                <option>closed</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold">Current State
                                        <span id="spnCurrentState" style="color:red"></span></td>
                                        <td><select id="idCurrentState" name="txtCurrentState">
                                                <option value="-1">[Select]</option>
                                                <?php   
                                     $query="Select caseState from tblcaseState";
                                     //die($query);
                                     $result=  mysql_query($query,$con);
                                     while($row= mysql_fetch_object($result))
                                        {
                                        ?>
                                                <option><?php echo $row->caseState?></option>
                                                <?php
                                        }
                                        ?>
                                            </select> </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold">Remark
                                        <span id="spnRemark" style="color:red"></span></td>
                                        <td><textarea id="idRemark" name="txtRemark" cols="19" rows="3"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                    <center>
                                        <input type="submit" name="smtSave" value="Save">
                                        <input type="button" name="btnCancel" value="Cancel" onclick="window.location.href='managecases.php'"  >
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
