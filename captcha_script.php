<!DOCTYPE html>
<html>
<head><title>JS Captcha by Ian L. of Jafty.com</title>
<style>
body{
background-color: #430000;
}
</style>
</head>
<body>
<form name="prepaid_login_form" ACTION="newpg.html" METHOD="POST" onsubmit="return checkvalidation(this);">
<font color="#DD0000">Enter Code ></font> <span id="txtCaptchaDiv" style="background-color:#A51D22;color:#FFF;padding:5px"></span>
<input type="hidden" id="txtCaptcha" />
<input type="text" name="txtInput" id="txtInput" size="15" />
<input type="submit" value="Submit"/>
</form>


<script type="text/javascript">
function checkvalidation(theform){
var why = "";

if(theform.txtInput.value == ""){
why += "- Security code should not be empty.\n";
}
if(theform.txtInput.value != ""){
if(ValidCaptcha(theform.txtInput.value) == false){
why += "- Security code did not match.\n";
}
}
if(why != ""){
alert(why);
return false;
}
}

//Generates the captcha function
var a = Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';

var code = a + b + c + d + e;
document.getElementById("txtCaptcha").value = code;
document.getElementById("txtCaptchaDiv").innerHTML = code;

// Validate the Entered input aganist the generated security code function
function ValidCaptcha(){
var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
var str2 = removeSpaces(document.getElementById('txtInput').value);
if (str1 == str2){
return true;
}else{
return false;
}
}

// Remove the spaces from the entered and generated code
function removeSpaces(string){
return string.split(' ').join('');
}
</script>

</body>
</html>



