<?php ini_set("display_errors",1);
session_start();
/***********************************************************
DoDirectPaymentReceipt.php

Submits a credit card transaction to PayPal using a
DoDirectPayment request.

The code collects transaction parameters from the form
displayed by DoDirectPayment.php then constructs and sends
the DoDirectPayment request string to the PayPal server.
The paymentType variable becomes the PAYMENTACTION parameter
of the request string.

After the PayPal server returns the response, the code
displays the API request and response in the browser.
If the response from PayPal was a success, it displays the
response parameters. If the response was an error, it
displays the errors.

Called by DoDirectPayment.php.

Calls CallerService.php and APIError.php.

***********************************************************/

require_once 'Paypal.php';

$paypal = New Paypal();
/**
 * Get required parameters from the web form for the request
 */

 echo $_POST['firstName'];
 echo "<br>";
 echo $_POST['lastName'];
 echo "<br>";
 echo $_POST['creditCardType'];
 echo "<br>";
 echo $_POST['creditCardNumber'];
 echo "<br>";
 echo $_POST['expdate_month'];
 echo "<br>";
 echo $_POST['expdate_year'];
 echo "<br>";
 echo $_POST['cvv2Number'];
 echo "<br>";
 echo $_POST['address1'];
 echo "<br>";
 echo $_POST['address2'];
 echo "<br>";
 echo $_POST['city'];
 echo "<br>";
 echo $_POST['state'];
 echo "<br>";
 echo $_POST['zip'];
 echo "<br>";
 echo $_POST['amount'];
 echo "<br>";
 echo $_POST['country'];
 echo "<br>";
 
$paypal->custName1 =urlencode($_POST['firstName']);
$paypal->custName2 =urlencode($_POST['lastName']);
$paypal->cardType =urlencode($_POST['creditCardType']);
$paypal->cardNumber = urlencode($_POST['creditCardNumber']);

// Month must be padded with leading zero
$paypal->expDate = str_pad(urlencode($_POST['expdate_month']), 2, '0', STR_PAD_LEFT).urlencode($_POST['expdate_year']);
$paypal->cvdValue = urlencode($_POST['cvv2Number']);
$paypal->streetAddr = urlencode($_POST['address1'].' '.urlencode($_POST['address2']));
$paypal->city = urlencode($_POST['city']);
$paypal->state =urlencode($_POST['state']);
$paypal->zip = urlencode($_POST['zip']);
$paypal->amount = urlencode($_POST['amount']);
$paypal->country=urlencode($_POST['country']);


/* Make the API call to PayPal, using API signature.
   The API response is stored in an associative array called $resArray */

$resArray=$paypal->submit("Authorization");

/* Display the API response back to the browser.
   If the response from PayPal was a success, display the response parameters'
   If the response was an error, display the errors received using APIError.php.
   */

$ack = strtoupper($resArray["ACK"]);

if($ack!="SUCCESS")  {
    $_SESSION['reshash']=$resArray;
	$location = "APIError.php";
		 header("Location: $location");
   }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>PayPal NVP Web Samples Using PHP - DoDirectPayment Receipt</title>
    <link href="file:///C|/Documents%20and%20Settings/vsworx/Desktop/sdk.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <center>
    <table class="api">
        <tr>
            <td colspan="2" class="header">
                DoDirectPayment
            </td>
        </tr>
        <tr>
            <td colspan="2" class="header">
               Transaction Completed Succesfully.
            </td>
        </tr>
        <tr>
            <td class="field">
                Transaction ID:</td>
            <td><?=$resArray['TRANSACTIONID'] ?></td>
        </tr>
        <tr>
            <td class="field">
                Amount:</td>
            <td><?=$currencyCode?> <?=$resArray['AMT'] ?></td>
        </tr>
        <tr>
            <td class="field">
                AVS:</td>
            <td><?=$resArray['AVSCODE'] ?></td>
        </tr>
        <tr>
            <td class="field">
                CVV2:</td>
            <td><?=$resArray['CVV2MATCH'] ?></td>
        </tr>
    </table>
    </center>
    <a class="home" id="CallsLink" href="../index.php">Home</a>
</body>




