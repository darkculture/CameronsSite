
<?php
include('include/header.php');
$page_title = "Client Agreement Form";

$checked = 'checked';
$ok = true;
$name_regx = '/^[a-zA-Z ]*$/';

// remove unwanteed characters
function input($data) {
  $data = trim($data); // trim white space
  $data = stripslashes($data); // remove slashes
  $data = htmlspecialchars($data); // remove special characters
  return $data;
}

// cycle through each $_POST
foreach($_POST as $key => $value):
	$value = input($value); // cycle through $value
	$_POST[$key] = $value; // put valus into the $_POST array for use in sticky form
endforeach;

if($_SERVER['REQUEST_METHOD'] == 'POST'):

	if (empty($_POST['first_name'])):
		$ok = FALSE;
    	$first_name_msg = '<span class="error">First name is required</span>';
  	else:
		if(!preg_match($name_regx, $_POST['first_name'])):
			$first_name_msg = 'Use letters only';
		endif;
    endif;

	if (empty($_POST['last_name'])):
		$ok = FALSE;
    	$last_name_msg = '<span class="error">Last name is required</span>';
  	else:
		if(!preg_match($name_regx, $_POST['last_name'])):
			$last_name_msg = 'Use letters only';
		endif;
    endif;
	
	if(empty($_POST['date'])):
		$date_msg = '<span class="error">Please enter a date</span>';
		$ok = false;
	else:
		$dateplode = explode("-", $_POST['date']);
		if(!checkdate($dateplode[1] , $dateplode[2] , $dateplode[0])):
			$date_msg = 'Please enter a valid date';
		endif;
	endif;
	
	if(!isset($_POST['signature'])):
		$agreed = 'No';
		$sig_msg = '<span class="error">Terms met: '.$agreed.'</span>';
		$ok = false;
	else:
		$agreed = 'Yes';
		$ok = true;
	endif;
endif;
?>
	<link type="text/css" rel="stylesheet" media="screen" href="forms.css" />
    <div class="main">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="client-form" >
        <h1>CLIENT AGREEMENT</h1>
            <p>I certify that the answers to the questions outlined on the PAR-Q and the General and Medical Questionnaire are true and complete to the best of my knowledge. I understand and agree that it is my responsibility to inform my personal trainer of any conditions or changes in my health, now and ongoing, which might affect my ability to exercise safely and with minimal risk of injury.</p>
            	<br />
            <p>I understand that I am not obligated to perform nor participate in any activity that I do not wish to, and that it is my right to refuse such participation at any time during my training sessions. I understand that should I feel lightheaded, faint, dizzy, nauseated, or experience pain or discomfort, I am to stop the activity and inform my personal trainer.</p>
            	<br />
            <p>I understand the results of any fitness program cannot be guaranteed and my progress depends on my effort and cooperation in and outside of the sessions.</p>
            	<br />
            <p>I understand that all personal training rates are based on <span>25-minute sessions</span>, and should I arrive late there is no guarantee I will receive the full session with my trainer. Clients arriving later than 15 minutes of scheduled session time will forfeit the session, and be charged for the session.</p>
            	<br />
            <p>I understand that all personal training sessions are non-transferable. I also understand that <span>10-session training packages must be fully redeemed within 60 days of purchase</span>.</p>
            	<br />
            <p>I understand that if I do not complete all personal training sessions that I have purchased by the end of the time periods above that I forfeit all remaining and unused sessions and will not be reimbursed any portion of their cost. I also understand that in case I am unable to continue with my personal training due to relocation or health issues, I will be reimbursed 50% of the cost of any and all remaining unused personal training sessions.</p>
            	<br />
            <p>I understand that all personal training is operated on a scheduled appointment basis, and thus <span>requires that I provide 24 hours notice when canceling an appointment</span>. Should I cancel with LESS than 24 hours notice, I will be charged in full for that session.</p>
            	<br />
            <p>I understand that the usage of any nutritional supplements is done under my own will and has not been prescribed by my personal trainer.</p>
            	<br />
            <p>I have read this Release and Terms of Agreement and I understand all of its terms. I sign it voluntarily and with full knowledge of its significance.</p>
            	<br />
                <label for="first_name">First Name: </label>
                <input class="<?php if(!empty($first_name_msg)): echo pink; else: echo white; endif; ?>"
                type="text" name="first_name" value="<?php if(!empty($_POST['first_name'])): echo $_POST['first_name']; endif; ?>" />
                	<br />
                    <?php if(!empty($first_name_msg)): echo $first_name_msg; endif; ?>
                    
                <label for="last_name">Last Name: </label>
                <input class="<?php if(!empty($last_name_msg)): echo pink; else: echo white; endif; ?>"
                type="text" name="last_name" value="<?php if(!empty($_POST['last_name'])): echo $_POST['last_name']; endif; ?>" />
                	<br />
                    <?php if(!empty($last_name_msg)): echo $last_name_msg; endif; ?>
                    
                <label for="date">Date: </label> <!-- Need to talk to bruce about validating this type of input -->
                <input class="<?php if(!empty($date_msg)): echo pink; else: echo white; endif; ?>"
                type="date" name="date" value="<?php if(!empty($_POST['date'])): echo $_POST['date']; endif; ?>" />
                	<br />
                    <?php if(!empty($date_msg)): echo $date_msg; endif; ?>
                    
                <label for="signature">Digital Signature: </label>
                <input type="checkbox" name="signature" checked="<?php if(empty($sig_msg)): echo $checked; endif; ?>" />
    				<?php if(!empty($sig_msg)): echo $sig_msg; endif; ?>
                <br />
                
                <input type="submit" value="Submit">
                <br />
                <br />
            <p>By checking the box you have read and agree to all the terms and conditions outlined in the above contract.</p>
        </form>
    </div>
<?php

//echo '<pre>';
//print_r($GLOBALS);
//echo '</pre>';

include('include/footer.php');
?>