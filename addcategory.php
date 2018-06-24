<?php
session_start();
$storeid=$_SESSION['store_id'];
include("includes/connect.php");
//include("../includes/function.php");
$category_name         = "";
$category_desc         = "";
$category_id           = "";
$action                = "";
$value                 = 'Save';
$msg				   = "";
if(isset($_REQUEST['value']) && $_REQUEST['value']=='edit'){
	$category_id = $_REQUEST['category_id'];
	$sel_sql = "SELECT * FROM category WHERE id= $category_id and store_id='$storeid'";
	$sel_result=mysql_query($sel_sql);
	if(mysql_num_rows($sel_result)>0)
	{
       $rs_offer=mysql_fetch_array($sel_result);
		
		$category_name = $rs_offer['categoryname'];
		$category_desc = $rs_offer['description'];
		$category_id   = $rs_offer['id'];
		$store_id      = $rs_offer['store_id'];
		$action        = 'update';
		$value         = 'update';
	}
	
}
if(isset($_POST["btnsub"]) && $_POST["action"]=='')
{
		$category_name = $_POST["txtCategoryName"];
		$category_desc = $_POST["txtCategoryDesc"];
		
		 $sql_1="INSERT INTO category (categoryname,description,store_id ) VALUES ('$category_name','$category_desc','$storeid')";
		$result_1=mysql_query($sql_1);
		$msg="Category has been saved";
		
 }
	if(isset($_POST["btnsub"]) && $_POST["action"]!='')
   {
		$category_name = $_POST["txtCategoryName"];
		$category_desc = $_POST["txtCategoryDesc"];
		$category_id   = $_POST["category_id"];

		$sql_update="UPDATE category SET categoryname='$category_name',description ='$category_desc' WHERE id = $category_id and store_id='$storeid'";
		$result_update=mysql_query($sql_update);
		
		$msg="Category has been updated";
		

}
?>

<script language="JavaScript">
function chkin()
{
	
	if(document.frmchngpass.txtCategoryName.value=="")
		{
			alert(" Category Name cannot be Blank");
            document.frmchngpass.txtCategoryName.focus();
			return false;
		}
	
	
	return true;
}

</script>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr> 
    	<td valign="top">
    		<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="90%" valign="middle" height="300">
					<form name="frmchngpass" method="post" action="" onSubmit="return chkin();" enctype="multipart/form-data">          
					<INPUT TYPE="hidden" name="action" value="<?=$action?>">
					<INPUT TYPE="hidden" name="category_id" value="<?=$category_id?>">
					
					<br>
                    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr> 
                        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
						   
                            <tr> 
                              <td align="center">&nbsp;</td>
                            </tr>
                            <tr> 
                              <td> 
                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr> 
                                    <td width="17"></td>
                                    <td width="95%" class="head" align=""> 
									<?php echo $msg; ?>
								    </td>
                                    <td width="17"></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0" cellpadding="1" cellspacing="0" class="tborder">
                            <tr>
                              <td>
							  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="tbg">
                                  <tr align="center"> 
                                    <td height="26" colspan="3" class="mandatory" align="right">                                    </td>
                                  </tr>
                                  <tr> 
                                    <td width="34%" align="right" newrap><span  class="topic">Category Name:</span><font color="red">*</font></td>
                                    <td width="4%" newrap>&nbsp;</td>
                                    <td width="62%" class="tdrow2"> <input name="txtCategoryName" type="text" value="<?=$category_name?>" class="input_field" size="25" >                                    </td>
                                  </tr>
                                  <tr> 
                                    <td align="right" valign="top" nowrap class=""><span  class="topic">Category Description:</span><font color="red">*</font></td>
                                    <td nowrap class="" valign="top">&nbsp;</td>
                                    <td class="tdrow2"> <TEXTAREA NAME="txtCategoryDesc" ROWS="4" COLS="35" class="input_field"><?=$category_desc?> </TEXTAREA>                                    </td>
                                  </tr>
								 
                                  
                                  <tr>
                                    <td colspan="3" class="tdrow1">&nbsp;</td>
                                  </tr>
                                  <tr> 
                                    <td colspan="3" class="tdrow1"><div align="center">
                                        <input name="btnsub" type="submit" class="input_btn" value="<?=$value?>">
										<input name="btnreset" type="reset" class="input_btn" value="Reset">
								     </div><BR><BR></td>
                                  </tr>
                                </table></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
				 </form>
					</td>
				</tr>
      	</table>
	  </td>
  </tr>
</table>

