<?php include "../include/header.php"; ?>
<?php include "checksession.php";?>
<script>
            
            $(document).ready(function(){
                $(document).submit(function(){
                    var f=0,msg="";
                    
                    var b=$("#idCourt").val();
                    var c=$("#idJudge").val();
                    var d=$("#idDate").val();
                    var e=$("#idDetail").val();
                    
                    if(b=="")
                    {
                        msg=msg+"Court Name is required <br>";
                        $("#spnCourt").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnCourt").html("");
                    }
                    if(c=="")
                    {
                        msg=msg+"Judge Name Is Required <br>";
                        $("#spnJudge").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnJudge").html("");
                    }
                    if(d=="")
                    {
                        msg=msg+"Date is required <br>";
                        $("#spnDate").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnDate").html("");
                    }
                    if(e=="")
                    {
                        msg=msg+"Details required <br>";
                        $("#spnDetail").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnDetail").html("");
                    }
                    $("#dvMsg").html(msg);
                    return parseInt(f)==0?true:false;
                });
        
    });
    $(document).ready(function(){
                $("#rstReset").click(function(){
                    //die("sf");   
                        $("#spnCourt").html("");
                        $("#spnJudge").html("");
                        $("#spnDate").html("");
                       $("#spnDetail").html("");
                    $("#dvMsg").html("");
                });
        
    });
    
        
        </script>


<?php 
$status="save";
if(isset($_GET['hId']))
{
    $hearingquery="select h.caseHearingId,c.courtName,h.caseHearingJudge,h.caseHearingDate,h.caseHearingDetails from tblcourt c, tblCaseHearing h where c.courtId=h.courtId and h.caseHearingId=$_GET[hId]";
    
    //die($hearingquery);
    $hearingresult=  mysql_query($hearingquery,$con) or die(mysql_error($con));
    
    
    $hearingrow=  mysql_fetch_object($hearingresult);
        $status="update";
    
}
if(isset($_GET[cId]))
{
    $query="select h.caseHearingId,c.courtName,h.caseHearingJudge,h.caseHearingDate,h.caseHearingDetails from tblcourt c, tblCaseHearing h where c.courtId=h.courtId and h.caseId=$_GET[cId]";
    //die($query);
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    
    $query1="select caseTitle from tblcase where caseId=$_GET[cId]";
    //die($query);
    $result1=  mysql_query($query1,$con) or die(mysql_error($con));
    $row2=mysql_fetch_object($result1);
    //print_r($row);
    $cTitle=$row2->caseTitle;
    
    
}
if(isset($_POST['smtSave']))
{
    $courtIDquery="select courtName,courtId from tblCourt";
                                     //die($query);
                                     $courtIDresult=  mysql_query($courtIDquery,$con);
                                   
                               while($courtIDrow= mysql_fetch_object($courtIDresult))
                                     {
                                         if($courtIDrow->courtName==$_POST['txtCourt'])
                                         {
                                     $courtID= $courtIDrow->courtId;    
                                     }
                                     }
   
                                     
    $savequery="insert into tblCaseHearing (caseId,caseHearingDate,courtId,CaseHearingJudge,caseHearingDetails)values($_GET[cId],'$_POST[txtDate]',$courtID,'$_POST[txtJudge]','$_POST[txtDetail]')";
    //die($savequery);
    $saveResult=  mysql_query($savequery,$con) or die(mysql_error());
    if($_SESSION['usertype']=='admin' || $_SESSION['usertype']=='Admin')
            {
                                header("location:".baseurl()."admin/ManageCaseHearing.php?cId=$_GET[cId]");
            }
            else{
                header("location:".baseurl()."operator/ManageCaseHearing.php");
                }



   
}
if(isset($_POST['smtUpdate']))
{
    $courtIDquery="select courtName,courtId from tblCourt";
                                     //die($query);
                                     $courtIDresult=  mysql_query($courtIDquery,$con);
                                   
                               while($courtIDrow= mysql_fetch_object($courtIDresult))
                                     {
                                         if($courtIDrow->courtName==$_POST['txtCourt'])
                                         {
                                     $courtID= $courtIDrow->courtId;   
                                     }
                                     }
   
                                     
    $savequery="update  tblCaseHearing set caseId=$_GET[cId],caseHearingDate='$_POST[txtDate]',courtId=$courtID,CaseHearingJudge='$_POST[txtJudge]',caseHearingDetails='$_POST[txtDetail]' where caseHearingId=$_GET[hId]";
    //die($savequery);
    $saveResult=  mysql_query($savequery,$con) or die(mysql_error());
    if($_SESSION['usertype']=='admin' || $_SESSION['usertype']=='Admin')
            {
                                header("location:".baseurl()."admin/ManageCaseHearing.php?cId=$_GET[cId]");
            }
            else{
                header("location:".baseurl()."operator/ManageCaseHearing.php");
                }


}


?>
  <div id="section" style="border: 1px solid #ccc; background-color: #f0f0f0; min-height: 400px; _height: 400px;">
            <div style="margin: 12px;">
                <?php //content start here ?>
                <script language="javascript" type="text/javascript">
                    
                    function abc()
                    {
                        var a=confirm("Are you sure you want to delete?");
                        
                        if(a==true)
                        {
                            return true;   
                        }
                        else{
                            return false;
                        }
                    }
                </script>
<table style="margin: 0 auto;">
    <tr>
        <td>
            <label style="color: Maroon; font-size: 24px; text-decoration: underline; font-weight: bold; text-align: center">Manage Case Hearing</label>
            <form id="frmManageCaseHearing" method="post">
                <table>
                    <tr>
                        <td>
                            <fieldset>
                                <legend>Manage Case Hearing</legend>
                                <table>
                                    
                                    <tr>
                                        <td style="font-weight: bold">Case Title</td>
                                         <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                           </td>
                            
                                        <td><?php echo $cTitle; ?></td>
                                         <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            
                                        <th>Hearings</th> <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                           </td>
                            
                                        <td><input type="button" name="btnCancel" value="Back To Case" onclick="window.location.href='managecases.php'"  ></td>
                                    </tr>
                                    <table border="1" width="500">
                                        <tr>
                                            <th>Court</th>
                                            <th>Judge</th>
                                            <th>Date</th>
                                            <th>Details</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                         <?php
                                         while($row=mysql_fetch_object($result))
                                         {
                                         ?>
                                        <tr>
                                        
                                            <td><?php echo $row->courtName; ?></td>
                                            <td><?php echo $row->caseHearingJudge; ?></td>
                                            <td><?php echo $row->caseHearingDate; ?></td>
                                            <td><?php echo $row->caseHearingDetails; ?></td>
                                            <td><a href="ManageCaseHearing.php?hId=<?php echo $row->caseHearingId; ?>&cId=<?php echo $_GET[cId];?>">Edit</a></td>
                                            <td><a href="ManageCaseHearing.php?cId=<?php echo $_GET[cId];?>&hrid=<?php
                                            echo $row->caseHearingId;?>" onclick="return abc()">Delete
                                                    
                                                
                                            </a></td>
                                            
                                            <td></td>
                                        </tr>
                                        <?php
                                        
                                        
                                        
                                         }
                                         
                                         if(isset($_GET['hrid']))
                                         {
                                             
                                             
                                            $delquery="delete from tblCaseHearing where caseHearingId=$_GET[hrid]";
                                            $delresult=  mysql_query($delquery,$con);
                                           if($_SESSION['usertype']=='admin' || $_SESSION['usertype']=='Admin')
            {
                                header("location:".baseurl()."admin/ManageCaseHearing.php?cId=$_GET[cId]");
            }
            else{
                header("location:".baseurl()."operator/ManageCaseHearing.php");
                }


                                         }
                                         
                                         
                                         ?>
                                        
                                        
                                    </table>
                                    <fieldset>
                                        <legend>Manage Hearing Information</legend>
                                        <table>
                                            <tr>
                                                <td><label style="font-weight: bold">Case</label></td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            
                                               <td><?php echo $cTitle; ?></td>
                                                                                  
                                            </tr>
                                            <?php
                                            if($status=='save')
                                            {
                                            
                                            ?>
                                            <tr>
                                                <td><label style="font-weight: bold">Court
                                                    <span id="spnCourt" style="color: red"></span>

                                                    </label></td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            
                                                <td><select id="idCourt" name="txtCourt">
                                                        <option value="">[Select]</option>
                                                        <?php   
                                     $query="Select courtName from tblCourt";
                                     //die($query);
                                     $result=  mysql_query($query,$con);
                                     while($row= mysql_fetch_object($result))
                                        {
                                        ?>
                                                <option><?php echo $row->courtName?></option>
                                                <?php
                                        }
                                        ?>
                                                    </select></td>
                                                                                  
                                            </tr>
                                            <tr>
                                                <td><label style="font-weight: bold">Judge
                                                    <span id="spnJudge" style="color: red"></span>
                                                </label></td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            
                                                <td><input type="text" id="idJudge" name="txtJudge"></td>
                                                                                  
                                            </tr>
                                            
                                            <tr>
                                                <td><label style="font-weight: bold">Date
                                                    <span id="spnDate" style="color: red"></span>

                                                    </label></td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            
                                                <td><input type="text" id="idDate" name="txtDate"></td>
                                                                                  
                                            </tr>
                                            <tr>
                                                <td><label style="font-weight: bold">Detail
                                                    <span id="spnDetail" style="color: red"></span>

                                                    </label></td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            
                                                <td><textarea id="idDetail" cols="19" rows="4" name="txtDetail"></textarea></td>
                                                
                                                                                  
                                            </tr>
                                            <tr>
                                            <center>
                                                <td colspan="3">
                                            <input type="submit" name="smtSave" value="Save">
                                            <input type="reset" id="rstReset" value="Reset">
                                            </center>
                                        </td>
                                            </tr>
                                                                                 <tr>
                            <td colspan="2">
                                <div id="dvMsg" style=" color: red"></div>
                            </td>
                        </tr>
     
                                            <?php 
                                            }
                                            
                                            else{
                                            ?>
                                            <tr>
                                                <td><label style="font-weight: bold">Court
                                                      <span id="spnCourt" style="color: red"></span>

                                                    </label></td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            
                                                <td><select id="idCourt" name="txtCourt">
                                                        <option>[Select]</option>
                                                        
                                                        <?php   
                                     $query="Select courtName from tblCourt";
                                     //die($query);
                                     $result=  mysql_query($query,$con);
                                     while($row= mysql_fetch_object($result))
                                        {
                                        ?>
                                                <option <?php echo isset($row->courtName)?($row->courtName==$hearingrow->courtName?"selected=selected":" "):" "; ?>><?php echo $row->courtName?></option>
                                                <?php
                                        }
                                        ?>
                                                    </select></td>
                                                                                  
                                            </tr>
                                            <tr>
                                                <td><label style="font-weight: bold">Judge
                                                      <span id="spnJudge" style="color: red"></span>

                                                    </label></td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            
                                                <td><input type="text" id="idJudge" name="txtJudge" value="<?php echo $hearingrow->caseHearingJudge; ?>"></td>
                                                                                  
                                            </tr>
                                            
                                            <tr>
                                                <td><label style="font-weight: bold">Date
                                                      <span id="spnDate" style="color: red"></span>

                                                    </label></td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            
                                                <td><input type="text" id="idDate" name="txtDate" value="<?php echo $hearingrow->caseHearingDate; ?>"></td>
                                                                                  
                                            </tr>
                                            <tr>
                                                <td><label style="font-weight: bold">Detail
                                                      <span id="spnDetail" style="color: red"></span>
</label></td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            
                                                <td><textarea id="idDetail" cols="19" rows="4" name="txtDetail"><?php echo $hearingrow->caseHearingDetails;?></textarea></td>
                                                
                                                                                  
                                            </tr>
                                            <tr>
                                            <center>
                                                <td colspan="3">
                                            <input type="submit" name="smtUpdate" value="Update">
                                            <input type="reset" id="rstReset" value="Reset">
                                            </center>
                                        </td>
                                            </tr>
                                                                                 <tr>
                            <td colspan="2">
                                <div id="dvMsg" style=" color: red"></div>
                            </td>
                        </tr>
     
                                            <?php 
                                            }
                                            ?>
                                        </table>
                                    </fieldset>
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
