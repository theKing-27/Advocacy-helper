<?php include "../include/header.php"; ?>
<?php include "checksession.php";?>

<?php 

?>
  <div id="section" style="border: 1px solid #ccc; background-color: #f0f0f0; min-height: 400px; _height: 400px;">
            <div style="margin: 12px;">
                <?php //content start here ?>
<table style="margin: 0 auto;">
    <tr>
        <td>
            <label style="color: Maroon; font-size: 24px; text-decoration: underline; font-weight: bold; text-align: center">Manage Cases</label>
             <form id="frmManagecases" method="post">
            <table>
                <tr>
                    <td>
                        <fieldset>
                            <legend>Manage Cases</legend>
                             <table>
                                <tr>
                                    <td colspan="2" ><label style="font-weight: bold" >Case Title</label>
                                        <input type="text" name="txtCaseTitle">   
                                
                                
                                       <td colspan="2" ><label style="font-weight: bold">Case Type</label> 
                                        <input type="text" name="txtCaseType"> 
                                        <input type="submit" value="search" name="smtSearch"></td>
                                </tr>
                                    
                                <tr>
                                    <td colspan="6"> <input type="button" id="btnADD" value="Add New Case" onclick="window.location='addcase.php'" ></td>
                                    
                        
                                  </tr>
                            
                            
                                <tr>
                                    <td> <?php   
                                     $query="Select a.caseId,a.caseNumber,a.caseTitle,b.clientName,a.caseStatus,a.caseType from tblcase a, tblclient b where a.clientId=b.clientId";
                                        if(isset($_POST['smtSearch']))
                                        {
                                            $query .=" and a.caseTitle like '%$_POST[txtCaseTitle]%' and a.caseType like '%$_POST[txtCaseType]%'";
                                            //die($query);
                                        }
                                        $result=  mysql_query($query,$con) or die(mysql_error($con));
                                    //die($query);
                                        $r1=  mysql_num_rows($result);
                                        echo $r1." Record(s) Found";
                                    
                                    ?></td>
                                </tr>                    
                                 </table>
                                <table border="1" width="500">
                                    <tr>
                                        <th> <label>Case ID</label></th>
                                        <th><label>Case Number</label></th>
                                        <th> <label>Case Title</label></th>   
                                        <th><label>Client</label></th>
                                        <th><label>Edit</label></th>
                                        <th><label>Hearing</label></th>
                                    </tr>
                                    <tr>
                                        <?php
                                           while($row= mysql_fetch_object($result))
                                        {
                                           ?>
                    
                    <td><?php echo $row->caseId  ?></td>
                    <td><?php echo $row->caseNumber  ?></td>
                    <td><?php echo $row->caseTitle  ?></td>
                    <td><?php echo $row->clientName  ?></td>
                    <td><a href="editcase.php?eId=<?php echo $row->caseId;  ?>">Edit</a></td>
                    <td><a href="ManageCaseHearing.php?cId=<?php echo $row->caseId?>">Hearing</a></td>
                    
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
