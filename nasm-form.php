
<?php
$title = "NASM Questionnaire Form";
include('include/header.php');

// define regx
$ok = FALSE;
$phone_regx = '/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i';
// $email_regx = 'if (!filter_var($email, FILTER_VALIDATE_EMAIL)):';
$name_regx = '/^[a-zA-Z ]*$/';
// $zip_regx = '/(^\d{5}(-\d{4})?$/';
// $site_regx = '/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i';

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

// start validation
if($_SERVER['REQUEST_METHOD'] == 'POST'):
	if (empty($_POST['first_name'])):
		$ok = FALSE;
    	$first_name_msg = '<span class="error">First name is required</span>';
  	else:
		if(!preg_match($name_regx, $_POST['first_name'])):
			$name_msg = '<span class="error">Use letters only</span>';
		endif;
    endif;
  
  	if (empty($_POST['last_name'])):
		$ok = FALSE;
    	$last_name_msg = '<span class="error">Last name is required</span>';
    else:
		if(!preg_match($name_regx, $_POST['last_name'])):
			$name_msg = '<span class="error">Use letters only</span>';
		endif;
    endif;
  
  	if(empty($_POST['date'])):
		$date_msg = '<span class="error">Please enter a date</span>';
		$ok = false;
	else:
		$dateplode = explode("-", $_POST['date']);
		if(!checkdate($dateplode[1] , $dateplode[2] , $dateplode[0])):
			$date_msg = '<span class="error">Please enter a valid date</span>';
		endif;
	endif;
	
	if (empty($_POST['height'])):
		$ok = FALSE;
    	$height_msg = '<span class="error">Height is required</span>';
    else:
    	$height = $_POST['height'];
    endif;
	
	if (empty($_POST['weight'])):
		$ok = FALSE;
    	$weight_msg = '<span class="error">Weight is required</span>';
    else:
    	$weight = $_POST['weight'];
    endif;
	
	if (empty($_POST['age'])):
		$ok = FALSE;
    	$age_msg = '<span class="error">Age is required</span>';
    else:
    	$age = $_POST['age'];
    endif;
	
	if (empty($_POST['last_name'])):
		$ok = FALSE;
    	$last_name_msg = '<span class="error">Last name is required</span>';
    else:
		if(!preg_match($name_regx, $_POST['last_name'])):
			$name_msg = '<span class="error">Use letters only</span>';
		endif;
    endif;
	
	if (!is_numeric($_POST['phone'])):
		$ok = FALSE;
		$phone_msg = '<span class="error">Use numbers only</span>';
	else:
		if(!preg_match($phone_regx, $_POST['phone'])):
			$phone_msg_2 = '<span class="error">Use proper format</span>';
		endif;
	endif;
endif;

?>

    <div class="main">
        <form action="nasm-form.php" method="post" id="f">
            <label for="first_name">First Name: </label>
            <input class="<?php if(!empty($first_name_msg)): echo pink; else: echo white; endif; ?>" type="text" id="first_name" name="first_name" value="<?php if(!empty($_POST['first_name'])): 
			echo $_POST['first_name']; endif; ?>" />
            	<br />
                <?php if(!empty($first_name_msg)): echo $first_name_msg; endif; ?>
            
            <label for="last_name">Last Name: </label>
            <input class="<?php if(!empty($lasst_name_msg)): echo pink; else: echo white; endif; ?>" type="text" id="last_name" name="last_name" value="<?php if(!empty($_POST['last_name'])): 
			echo $_POST['last_name']; endif; ?>" />
            	<br />
                <?php if(!empty($lasst_name_msg)): echo $lasst_name_msg; endif; ?>
                
            <label for="date">Date: </label>
            <input class="<?php if(!isset($date_msg)): echo pink; else: echo white; endif; ?>" type="date" id="date" name="date" value="<?php if(!empty($_POST['date'])): 
			echo $_POST['date']; endif; ?>" />
            	<br />
                <?php if(!empty($date_msg)): echo $date_msg; endif; ?>
                
            <label for="height">Height: </label>
            <input class="<?php if(!empty($height_msg)): echo pink; else: echo white; endif; ?>" type="text" id="height" name="height" value="<?php if(!empty($_POST['height'])): 
			echo $_POST['height']; endif; ?>" />
            	<br />
                <?php if(!empty($height_msg)): echo $height_msg; endif; ?>
                
            <label for="weight">Weight: </label>
            <input class="<?php if(!empty($weight_msg)): echo pink; else: echo white; endif; ?>" type="text" id="weight" name="weight" value="<?php if(!empty($_POST['weight'])): 
			echo $_POST['weight']; endif; ?>" />
            	<br />
                <?php if(!empty($weight_msg)): echo $weight_msg; endif; ?>
                
            <label for="age">Age: </label>
            <input class="<?php if(!empty($age_msg)): echo pink; else: echo white; endif; ?>" type="text" id="age" name="age" value="<?php if(!empty($_POST['age'])): 
			echo $_POST['age']; endif; ?>" />
            	<br />
                <?php if(!empty($age_msg)): echo $age_msg; endif; ?>
            
            <!-- Are these required? -->
            
            <label for="phys-name">Physicians Name: </label>
            <input type="text" id="phys-name" name="phys-name" value="<?php if(!empty($_POST['phys-name'])): echo $_POST['phys-name']; endif; ?>" />
            	<br />
                <?php if(!empty($phys_name_msg)): echo $phys_name_msg; endif; ?>
                
            <label for="phone">Phone: </label>
            <input type="text" id="phone" name="phone" value="<?php if(!empty($_POST['phone'])): echo $_POST['phone']; endif; ?>" /> <p> xxx-xxx-xxxx</p>
            	<br />
                <?php if(!empty($phone_msg)): echo $phone_msg; endif; ?>
                
        		<br />
                
                
        <h4>PHYSICAL ACTIVITY READINESS QUESTIONNAIRE (PAR-Q)</h4>
        	<br />
        
        <p>1 Has your doctor ever said that you have a heart condition and that you should
        only perform physical activity recommended by a doctor?</p>
        	<br />
        	<input type="radio" name="1" value="yes" <?php if (isset($_POST['1']) && $_POST['1'] == "Yes") echo 'checked="checked"';?> /> Yes
            <input type="radio" name="1" value="no" <?php if (isset($_POST['1']) && $_POST['1'] == "No") echo 'checked="checked"';?> /> No
            	<br />
                	<br />
        <p>2 Do you feel pain in your chest when you perform physical activity?</p>
        	<br />
        	<input type="radio" name="2" value="yes" <?php if (isset($_POST['2']) && $_POST['2'] == "Yes") echo 'checked="checked"';?> /> Yes
            <input type="radio" name="2" value="no" <?php if (isset($_POST['2']) && $_POST['2'] == "No") echo 'checked="checked"';?> /> No
            	<br />
                	<br />
        <p>3 In the past month, have you had chest pain when you were not performing any
        physical activity?</p>
        	<br />
        	<input type="radio" name="3" value="yes" /> Yes
            <input type="radio" name="3" value="no" /> No
            	<br />
                	<br />
        <p>4 Do you lose your balance because of dizziness or do you ever lose
        consciousness?</p>
        	<br />
        	<input type="radio" name="4" value="yes" /> Yes
            <input type="radio" name="4" value="no" /> No
            	<br />
                	<br />
        <p>5 Do you have a bone or joint problem that could be made worse by a change in
        your physical activity?</p>
        	<br />
        	<input type="radio" name="5" value="yes" /> Yes
            <input type="radio" name="5" value="no" /> No
            	<br />
                	<br />
        <p>6 Is your doctor currently prescribing any medication for your blood pressure or
        for a heart condition?</p>
        	<br />
        	<input type="radio" name="6" value="yes" /> Yes
            <input type="radio" name="6" value="no" /> No
            	<br />
                	<br />
        <p>7 Do you know of any other reason why you should not engage in physical
        activity?</p>
        	<input type="radio" name="7" value="yes" /> Yes
            <input type="radio" name="7" value="no" /> No
            	<br />
        	<br />
        <p>If you have answered "Yes" to one or more of the above questions, consult your physician before
        engaging in physical activity. Tell your physician which questions you answered "Yes" to. After a
        medical evaluation, seek advice from your physician on what type of activity is suitable for your
        current condition.</p>
        	<br />
            	<br />
                	<br />
                    	<br />
        <h4>GENERAL & MEDICAL QUESTIONNAIRE</h4>
        	<br />
      	<p id="q-type">Occupational Questions</p>
        <p>1. What is your current occupation?</p>
        	<br />
        	<input type="text" name="occupation" value="<?php if(!empty($_POST['occupation'])): echo $_POST['occupation']; endif; ?>" />
            	<br />
                	<br />
        <p>2. Does your occupation require extended periods of sitting?</p>
        	<br />
        	<input type="radio" name="8" value="yes" /> Yes
            <input type="radio" name="8" value="no" /> No
            	<br />
                	<br />
        <p>3. Does your occupation require extended periods of repetitive movements?</p>
        	<br />
        	<input type="radio" name="9" value="yes" /> Yes
            <input type="radio" name="9" value="no" /> No
            	<br />
                	<br />
        <p>(If yes, please explain.)</p>
        	<input type="text" name="explain_1" size="75" value="<?php if(!empty($_POST['explain_1'])): echo $_POST['explain_1']; endif; ?>" />
        		<br />
                	<br />
        <p>4. Does your occupation require you to wear shoes with a heel (dress shoes)</p>
        	<br />
        	<input type="radio" name="10" value="yes" /> Yes
            <input type="radio" name="10" value="no" /> No
            	<br />
                	<br />
        <p>5. Does your occupation cause you anxiety (mental stress)?</p>
        	<br />
        	<input type="radio" name="11" value="yes" /> Yes
            <input type="radio" name="11" value="no" /> No
            	<br />
        			<br />
        <p id="q-type">Recreational Questions</p>
        <p>6. Do you partake in any recreational activities (golf, tennis, skiing, etc.)</p>
        	<br />
        	<input type="radio" name="12" value="yes" /> Yes
            <input type="radio" name="12" value="no" /> No
            	<br />
                	<br />
        <p>(If yes, please explain.)</p>
        	<input type="text" name="explain_2" size="75" value="<?php if(!empty($_POST['explain_2'])): echo $_POST['explain_2']; endif; ?>" />
        		<br />
                	<br />
        <p>7. Do you have any hobbies (reading, gardening, working on cars, exploring the Internet,
        etc.)?</p>
        	<br />
        	<input type="radio" name="13" value="yes" /> Yes
            <input type="radio" name="13" value="no" /> No
            	<br />
                	<br />
        <p>(If yes, please explain.)</p>
        	<input type="text" name="yes-explain" size="75" value="<?php if(!empty($_POST['explain_2'])): echo $_POST['explain_2']; endif; ?>" />
        		<br />
                	<br />
         <p id="q-type">Medical Questions</p>
        <p>8. Have you ever had any pain or injuries (ankle, knee, hip, back, shoulder, etc.)?</p>
        	<br />
        	<input type="radio" name="14" value="yes" /> Yes
            <input type="radio" name="14" value="no" /> No
            	<br />
        <p>(If yes, please explain.)</p>
        	<input type="text" name="yes-explain" size="75" value="<?php if(!empty($_POST['explain_2'])): echo $_POST['explain_2']; endif; ?>" />
        		<br />
                	<br />
        <p>9. Have you ever had any surgeries?</p>
        	<br />
        	<input type="radio" name="15" value="yes" /> Yes
            <input type="radio" name="15" value="no" /> No
            	<br />
                	<br />
        <p>(If yes, please explain.)</p>
        	<input type="text" name="yes-explain" size="75" value="<?php if(!empty($_POST['explain_2'])): echo $_POST['explain_2']; endif; ?>" />
        		<br />
                	<br />
        <p>10. Has a medical doctor ever diagnosed you with a chronic disease, such as
        coronary heart disease, coronary artery disease, hypertension (high blood
        pressure), high cholesterol or diabetes?</p>
        	<br />
        	<input type="radio" name="16" value="yes" /> Yes
            <input type="radio" name="16" value="no" /> No
            	<br />
                	<br />
        <p>(If yes, please explain.)</p>
        	<input type="text" name="yes-explain" size="75" value="<?php if(!empty($_POST['explain_2'])): echo $_POST['explain_2']; endif; ?>" />
        		<br />
                	<br />
        <p>11. Are you currently taking any medication?</p>
        	<input type="radio" name="17" value="yes" /> Yes
            <input type="radio" name="17" value="no" /> No
            	<br />
                	<br />
        <p>(If yes, please explain.)</p>
        	<input type="text" name="yes-explain" size="75" value="<?php if(!empty($_POST['explain_2'])): echo $_POST['explain_2']; endif; ?>" />
        		<br />
                	<br />
        <input type="submit" name="submit" value="Submit Form" />
        </form>
    </div>

<?php
include('include/footer.php');
?>