<?php include "../include/header.php"; ?>
<?php include "checksession.php";?>

<?php //content start here ?>
  <div id="section" style="border: 1px solid #ccc; background-color: #f0f0f0; min-height: 400px; _height: 400px;">
            <div style="margin: 12px;">
                <?php //content start here ?>
<table style="margin: 0 auto;">
    <tr>
        <td>
            <label style="color: Maroon; font-size: 24px; text-decoration: underline; font-weight: bold; text-align: center">Manage Clients</label>
            <form id="frmManageUsers" method="post">
            <table>
                <tr>
                    <td>
                        <fieldset>
                            <legend>Manage Clients</legend>
                             <table>
                                <tr>
                                    <td colspan="2"> <input type="button" id="btnADD" value="Add New Client" onclick="window.location='addclient.php'" > &nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td colspan="3"  ><label>userName</label> <input type="text" name="txtuserName">
                                    <input type="submit" value="search" name="smtSearch"></td>
                        
                                  </tr>
                                <tr>
                                    <td> <?php   
                                     $query="Select clientId,clientName,clientAddress,clientEmail,clientMobile from tblClient";
                                        if(isset($_POST['smtSearch']))
                                        {
                                            $query .=" where clientName like'%$_POST[txtuserName]%'";
                                            // die($query);
                                        }
                                        $result=  mysql_query($query,$con) or die(mysql_error($con));
                                    
                                        $r1=  mysql_num_rows($result);
                                        echo $r1." Record(s) Found";
                                    
                                    ?></td>
                                </tr>                    
                                <table border="1" width="500">
                                    <tr>
                                        <th> <label>Client Name</label></th>
                                        <th><label>Address</label></th>
                                        <th> <label>Email</label></th>   
                                        <th><label>Mobile</label></th>
                                        <th><label>Edit</label></th>
                                    </tr>
                                    <tr>
                                        <?php
                                           while($row= mysql_fetch_object($result))
                                        {
                                           ?>
                    
                    <td><?php echo $row->clientName  ?></td>
                    <td><?php echo $row->clientAddress  ?></td>
                    <td><?php echo $row->clientEmail  ?></td>
                    <td><?php echo $row->clientMobile  ?></td>
                    <td><a href="editclient.php?eId=<?php echo $row->clientId;  ?>">Edit</a></td>
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