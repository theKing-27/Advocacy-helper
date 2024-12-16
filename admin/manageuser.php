<?php include "../include/header.php"; ?>
<?php include "checksession.php";?>

<?php 

if(isset($_GET['uid']))
{
    $query="update tbluser set usrStatus=if(usrStatus='active','inactive','active')where usrId='$_GET[uid]'";
    $result=  mysql_query($query,$con) or die(mysql_error($con));
    header("location:manageuser.php");
}
?>
  <div id="section" style="border: 1px solid #ccc; background-color: #f0f0f0; min-height: 400px; _height: 400px;">
            <div style="margin: 12px;">
                <?php //content start here ?>
<table style="margin: 0 auto;">
    <tr>
        <td>
            <label style="color: Maroon; font-size: 24px; text-decoration: underline; font-weight: bold; text-align: center" >Manage User</label>
             <form id="frmManageuser" method="post">
            <table >
                
                <tr>
                    <td colspan="4"> <input type="button" id="btnADD" value="Add New user" onclick="window.location='adduser.php'" > &nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="3"  ><label>userName</label> <input type="text" name="txtuserName">
                        <input type="submit" value="search" name="smtSearch"></td>
                        
                </tr>
                <tr>
                    <td>
                        <?php
                    $query="Select usrId,usrName,usrDOB,usrGender,usrEmail,usrMobile,usrType,usrStatus from tbluser";
                    if(isset($_POST['smtSearch']))
                    {
                        $query .=" where usrName like'%$_POST[txtuserName]%'";
                      // die($query);
                    }
                    $result=  mysql_query($query,$con) or die(mysql_error($con));
                    
                                        $r1=  mysql_num_rows($result);
                                        echo $r1." Record(s) Found";
    
    ?>
                    </td>
                </tr>
                
            </table>
            <table border="1" width="500">
                
                <tr>
                    <th><label>User Id</label></th>
                    <th><label>Name</label></th>
                    <th><label>DOB</label></th>
                    <th><label>Gender</label></th>
                    <th><label>Email</label></th>
                    <th><label>Mobile</label></th>
                    <th><label>User Type</label></th>
                    
                    <th><label>Status</label></th>
                    <th><label> &nbsp;</label></th>
                    
                    
                </tr>
                <tr>
      <?php              
        while($row= mysql_fetch_object($result))
        {
                    ?>
                    
                    <td><?php echo $row->usrId  ?></td>
                    <td><?php echo $row->usrName  ?></td>
                    <td><?php echo $row->usrDOB  ?></td>
                    <td><?php echo $row->usrGender  ?></td>
                    <td><?php echo $row->usrEmail  ?></td>
                    
                    <td><?php echo $row->usrMobile  ?></td>
                    <td><?php echo $row->usrType  ?></td>
                    <td><?php echo $row->usrStatus  ?><a href="manageuser.php?uid=<?php echo $row->usrId; ?>">Change</a></td>
                    
                    <td><a href="edituser.php?eId=<?php echo $row->usrId;  ?>">Edit</a></td>
                </tr>
                <tr>
                    <?php
        }
        ?>
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
