#!/usr/local/bin/php5

<?php
$EmailFrom="user@siswebsite.com";
$EmailTo="sis@uoregon.edu";
$Subject="SIS Website Contact Form Inquiry";
$Name=Trim(stripslashes($_POST['Name']));
$Email=Trim(stripslashes($_POST['Email']));
$Message=Trim(stripslashes($_POST['Message']));
// validation
$validationOK=true;
if(!$validationOK) {
print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
exit ;
}
// prepare email body text
$Body="";
$Body.="Name: ";
$Body.=$Name;
$Body.="\n";
$Body.="Email: ";
$Body.=$Email;
$Body.="\n";
$Body.="Message: ";
$Body.=$Message;
$Body.="\n";
// send email
$success=mail($EmailTo,$Subject,$Body,"From: <$EmailFrom>");
// redirect to success page
if($success) {
print "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";
} else {
print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}
?>