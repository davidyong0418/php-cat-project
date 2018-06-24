// JavaScript Document
///////////////////////////// Start General function  ////////////////////////////////////
    
function reportError(request)
{
	msg_hide();
	alert('Sorry. There was an error.');
}
function getTotalRecord(storeId,i){

for(j=1;j<=Number($F('rec'))-1;j++){
	if(j==Number(i)){
	$('a_record_'+j).style.display="block";
	//alert($F('rec')-1);

	}else{
	$('a_record_'+j).style.display="none";
	}
	}
	var url =   'ajax_totalrecord.php';
	var pars='store_id='+storeId;
	var myAjax = new Ajax.Updater(
	{success:'a_record_'+i},
	url,
	{
		method: 'get',
		parameters:pars,
		onFailure: reportError
	});
	
	
}

function getTotalRecordout(){
for(j=1;j<=Number($F('rec'))-1;j++){
	
	$('a_record_'+j).style.display="none";

	}
}