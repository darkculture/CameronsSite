
<?php
$sender = $_POST['email'];
// sets the envelope "From" address on a Windows server
ini_set('sendmail_from', $sender);

// one recipient
$to = 'cameron@hotmail.com';
// multiple recipients with all email adresses visivle
// $to = 'bruce.dauge@cptc.edu, dreg_01@live.com';
// $to = array('bruce.dauge@cptc.edu, dreg_01@live.com');

for($i=0; $i<count; $i++):
	mail($to[$i], $subject, $message, $headers, "-f $sender -r $sender");
endfor;

$subject = 'New Client Information Request';
$message = 'Please send me information about getting personal training help.';

$headers = 	'From: '.$sender.PHP_EOL.
			'Reply: '.$sender.PHP_EOL.
			'X-Mailer: PHP/'.phpversion().PHP_EOL.
			'Date: '.date("D, d M Y H:i:s O");

// sets the envelope "From" address on a Linix server
// mail($to, $subject, $message, $headers, "-f $sender -r $sender");

?>
