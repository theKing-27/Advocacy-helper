<?php include "../include/header.php"; ?>
<?php include "checksession.php";?>
<script>
            
            $(document).ready(function(){
                $(document).submit(function(){
                    var f=0,msg="";
                    var g=$("#idCourt").val();
                    
                    if(g=="")
                    {
                        msg=msg+"Court Name is required <br>";
                        $("#spnCourt").html("*");
                        f=1;
                    }
                    else
                    {
                          $("#spnCourt").html("");
                    }
                    $("#dvMsg").html(msg);
                    return parseInt(f)==0?true:false;
                });
        
    });
    
        
        </script>


<?php

$status="save";
if(isset($_GET['eId']))
{
    $status="update";
    $query="select  courtName from tblcourt where courtId='$_GET[eId]'";
    //die($query);
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    $row=mysql_fetch_object($result);
    //print_r($row);

}
if(isset($_POST['smtUpdate']))
{
    
    $query="update tblcourt set courtName='$_POST[txtCourtName]'where courtId=$_GET[eId] ;";       
    
  //die($query);
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    
//    echo mysql_affected_rows()." Records saved successfully"; 
   if($_SESSION['usertype']=='admin')
            {
                header("location:".baseurl()."admin/managecourt.php");
            }
            else{
                header("location:".baseurl()."operator/managecourt.php");
            }
            
}


if(isset($_POST['smtSave']))
{
    
    $query="insert into tblcourt(courtName) values('$_POST[txtCourtName]');";                              
    //die($query);
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    
//    echo mysql_affected_rows()." Records saved successfully"; 
   // header("location:manageEmployee.php");

if($_SESSION['usertype']=='admin' || $_SESSION['usertype']=='Admin')
            {
                header("location:".baseurl()."admin/managecourt.php");
            }
            else{
                header("location:".baseurl()."operator/managecourt.php");
            }





}

?>
  <div id="section" style="border: 1px solid #ccc; background-color: #f0f0f0; min-height: 400px; _height: 400px;">
            <div style="margin: 12px;">
                <?php //content start here ?>
<table style="margin: 0 auto;">
    <tr>
        <td>
            <label style="color: Maroon; font-size: 24px; text-decoration: underline; font-weight: bold; text-align: center">Manage Courts</label>
            
            
            <form id="frmManageCourt" method="post">
                <table>
                    <tr>
                        <td>
                            
                            <fieldset>
                                <legend>Manage Courts</legend>
                                <table>
                                    <?php if($status=="save")
                            {
                                ?>
                            
                                    <tr>
                                        <th>
                                            <label>Court Name</label>
                                <span id="spnCourt" style="color:red"></span>
 
                                        </th>
                                        <td>
                                            <input type="text" id="idCourt" name="txtCourtName">                                                                
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            
              <div id="dvMsg" style=" color: red"></div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                    <center>
                                        <input type="submit" name="smtSave" value="Save">
                                    </center>
                                    
                                        </td>
                                    </tr>
                            <?php }
                            else{ ?>
                                     <tr>
                                        <th>
                                            <label>Court Name</label>
                                                             <span id="spnCourt" style="color:red"></span>
                                        </th>
                                        <td>
                                            <input type="text" id="idCourt" name="txtCourtName" value="<?php echo isset($row->courtName)?$row->courtName:" ";?>">                                                                
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            
              <div id="dvMsg" style=" color: red"></div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                    <center>
                                        <input type="submit" name="smtUpdate" value="Update">
                                    </center>
                                    
                                        </td>
                                    </tr>
                                    <?php 
                            }
                            ?>

                                    
                                    <tr>
                                        <td colspan="2">
                        <?php
                    $query="Select courtId,courtName from tblcourt";
                    
                    $result=  mysql_query($query,$con) or die(mysql_error($con));
                    
                                        $r1=  mysql_num_rows($result);
                                        echo $r1." Record(s) Found";
    
    ?>
                    </td>
                </tr>

                                </table>
                                <table border="1" width="500">
                
                <tr>
                    <th><label>Court Id</label></th>
                    <th><label>Court Name</label></th>
                    <th><label>Edit</label></th>
                    
                    
                </tr>
                <tr>
      <?php              
        while($row= mysql_fetch_object($result))
        {
                    ?>
                    
                    <td><?php echo $row->courtId  ?></td>
                    <td><?php echo $row->courtName  ?></td>
                    <td><a href="managecourt.php?eId=<?php echo $row->courtId;  ?>">Edit</a></td>
                </tr>
                <tr>
                    <?php
        }
        ?>
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
