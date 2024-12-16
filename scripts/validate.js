/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function validateLogin()
{
    var a= document.forms['frmLogin']['txtUID'].value;
    var b= document.forms['frmLogin']['txtPassword'].value;
    
    
    var msg=" ",f=0;
    if(a==""|| a==null)
    {
        document.getElementById("spnUId").innerHTML="*";
        msg=msg+"UId is Required <br>" ; 
        f=1;
    }
    else
    {
        document.getElementById("spnUId").innerHTML=" ";
    }
    
    if(b==""|| b==null)
    {
        document.getElementById("spnPass").innerHTML="*";
        msg=msg+"Password is Required";
        f=1;
    }
    else
    {
        document.getElementById("spnPass").innerHTML=" ";
    }
    
    document.getElementById("dvMsg").innerHTML=msg;
    return parseInt(f)== 0 ? true:false;
}