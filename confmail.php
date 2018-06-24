<?php session_start();
include("includes/connect.php");
	$datetime=date("F j, Y, g:i a");
	$storeownerid=$_SESSION['store_id'];
	$client_id   = $_REQUEST['client_id'] ;   
	$to="";
	if($_REQUEST['to']=="all")
	{
		$query2AllEmail="select DISTINCT(email),id from clients as clnt,items as itm where itm.client_id=clnt.id and clnt.mailing_list='1' and  itm.Store_id='$_SESSION[store_id]'";
		$result2AllEmail=mysql_query($query2AllEmail) or die(mysql_error());
		$te=mysql_num_rows($result2AllEmail);
		$i=0;
		while($row2AllEmail=mysql_fetch_array($result2AllEmail))
		{ $i++;
			if($i==$te)
			{
				$to.=$row2AllEmail['email'];
			}
			else
			{
				$to.=$row2AllEmail['email'].",";
			}
		}
	}
	else
	{
	$client_sql  = "select store_name,s_email,first_name,last_name,email FROM store_owner_information as soi, clients as cnt WHERE
					soi.clint_id=cnt.id and soi.store_id='$storeownerid'";
	$client_result = mysql_query($client_sql);
	$client_result_row = mysql_fetch_array($client_result);
	$to=$client_result_row['email'];
	}
	$query4StoreName="select store_name from store_owner_information where store_id='$storeownerid'";
	$result4StoreName=mysql_query($query4StoreName);
	$row4StoreName=mysql_fetch_array($result4StoreName);
	//echo $to;
	
	if(isset($_POST["Sendtoall"]))
	{
	$message = mysql_real_escape_string($_POST['message']);
	$query="insert into email_request set
				store_name='$row4StoreName[store_name]',
				store_owner_id='$storeownerid',
				client_first_name='to all',
				client_last_name='',
				client_id='$to',
				from_val='$_REQUEST[from]',
				subject='$_REQUEST[txtsubject]',
				message='$message',
				datetime='$datetime'";
	$result=mysql_query($query) or die(mysql_error());
	$mes = 1;
	}

?>

<script language="JavaScript">
function chkin()
{
	
	if(document.frmchngpass.from.value=="")
		{
			alert(" 'From' field cannot be blank.");
            document.frmchngpass.from.focus();
			return false;
		}
	if(document.frmchngpass.txtsubject.value=="")
		{
			alert(" 'Subject' field cannot be blank.");
            document.frmchngpass.txtsubject.focus();
			return false;
		}
	
	
	return true;
}

</script>
<link href="style_main/style.css" rel="stylesheet" type="text/css" />

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" height=500>
<tr height="10">
	   <td align="right">
	   </td>
	</tr>
<tr> 
    	<td valign="top" align="center">
    		<table width="90%" border="0" cellspacing="0" cellpadding="1">
				<tr>
					<td width="100%" valign="middle" >
					<form name="frmchngpass" method="post" action="" onSubmit="return chkin();" enctype="multipart/form-data">
					  <INPUT TYPE="hidden" name="email" value="<?=$client_result_row['email']?>">
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					<div id="system_message">
					  <p></p>
					</div>
                      <tr> 
                        <td>
						 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                           
                            <tr> 
                              <td> <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php
 if($mes=='1')
   {
   ?>
  <tr>
    <td align="left" class="ErrorText">Your e-mail is pending the approval of the site administrator.</td>
  <?php
}?></tr>
</table>
                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="left" class="txt4" ><img src="images/spacer.gif" width="10" height="5"/> </td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="txt4" ><p>This email form is to Only Promote Your store at  Nicheclips.com. Please do not use any external links, emails or any links to photos or videos when using this form. All emails will be validated by admin before being sent.</p>
                                    <p><strong>Send Message to Your Mailing List </strong></p></td>
                                  </tr>
                                  <tr> 
                                    <td width="95%" align="left" class="txt4" ><img src="images/spacer.gif" width="10" height="10"/> </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0" cellpadding="1" cellspacing="0" class="tborder">
                            <tr>
                              <td bgcolor="#999999">
							    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#565656" class="tbg">
                               
								  <tr>
								    <td height="19" colspan="3" align="left" background="images/HdrBKG.gif" class="txt4">&nbsp;<span class="ErrorText">Note:</span> All bulk e-mailing will now require approval from site administrator before being sent. </td>
							    </tr>
								  <tr>
								    <td colspan="3" align="left" bgcolor="#999999"><img src="images/spacer.gif" width="1" height="1" /></td>
							      </tr>
								  <tr>
								    <td colspan="3" align="left" class="txt4"><img src="images/spacer.gif" width="10" height="10"/></td>
							    </tr>
								  <tr>
								    <td colspan="3" align="left" class="txt4"><strong><font color="red">*</font></strong> <span class="DescTxt">Fields are required. </span></td>
							    </tr>
								  <tr>
								    <td width="6%" align="left" class="txt4">&nbsp;</td> 
                                    <td width="13%" height="22" align="left" class="txt4"><strong>From:<font color="red">*</font></strong></td>
                                    <td width="81%" class="tdrow2" align="left"> <input name="from" type="text" value="<? echo $row4StoreName['store_name'];?>" class="input_field" size="55" >                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="topic">&nbsp;</td> 
                                    <td height="22" align="left" class="topic"><span class="txt4"><strong>Subject:</strong></span><font color="red">*</font></td>
                                    <td class="tdrow2" align="left"> <input name="txtsubject" type="text" value="" class="input_field" size="55" >                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top" class="topic">&nbsp;</td> 
                                    <td align="left" valign="top" class="topic"><span class="txt4"><strong>Message:</strong></span></td>
                                    <td align="left" class="tdrow2"><textarea name="message" cols="50" rows="5" class="input_field"></textarea>                                      </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" class="tdrow1">&nbsp;</td>
                                  </tr>
                                  <tr> 
                                    <td colspan="3" class="tdrow1"><div align="center">
                                        <input <?php if($_REQUEST['to']=="all") { ?>name="Sendtoall" <?php }else { ?>name="Send" <?php } ?> type="submit" class="input_btn" value="Send">&nbsp;
										<input name="btnreset" type="reset" class="input_btn" value="Reset">
								     </div></td>
                                  </tr>
								  <tr align="center"> 
                                    <td height="10" colspan="3" align="left"><img src="images/spacer.gif" width="10" height="5"/>                                 </td>
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

