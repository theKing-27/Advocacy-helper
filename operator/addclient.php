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


if(isset($_POST['smtSave']))
{
    
    $query="insert into tblclient(clientName,clientAddress,clientPhone,clientMobile,clientEmail,clientComments) values('$_POST[txtClientName]','$_POST[txtAddress]','$_POST[txtPhone]','$_POST[txtMobile]','$_POST[txtEmail]','$_POST[txtComment]');";                              
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
            <label style="color: Maroon; font-size: 24px; text-decoration: underline; font-weight: bold; text-align: center">Add Client</label>
            
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
                                            
                  <span id="spnCN" style="color:red"></span></td >

                                            </label> </th>
                                        <td>
                                            <input id="idCN" type="text" name="txtClientName">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>Address
                                            
                                            
                  <span id="spnAddress" style="color:red"></span></td >

                                            </label> </th>
                                        <td>
                                            <textarea id="idAddress" name="txtAddress" cols="19" rows="4"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th >
                                            <label >Phone  
                                            
                  <span id="spnPhone" style="color:red"></span></td >

                                            </label> </th>
                                        <td>
                                            <input id="spnPhone" type="text" name="txtPhone">
                                        </td>
                                        <th >
                                            <label >Mobile
                                            
                                            
                  <span id="spnMobile" style="color:red"></span></td >

                                            </label> </th>
                                        <td>
                                            <input id="idMobile" type="text" name="txtMobile">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th >
                                            <label >Email
                                            
                  <span id="spnEmail" style="color:red"></span></td >

                                            </label> </th>
                                        <td>
                                            <input id="idEmail" type="text" name="txtEmail">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>Comment
                                            
                                            
                  <span id="spnComment" style="color:red"></span></td >

                                            </label> </th>
                                        <td>
                                            <textarea id="idComment" name="txtComment" cols="19" rows="4"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                    <center>
                                            <input type="submit" name="smtSave" value="Save">
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
