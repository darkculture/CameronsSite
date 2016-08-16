
<?php
include('include/header.php');

$ok = FALSE;

function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'):
	if (empty($_POST['first_name'])):
		$ok = FALSE;
    	$first_name_msg = "First name is required";
  	else:
    	$name = $_POST['first_name'];
    endif;
  
  	if (empty($_POST['last_name'])):
		$ok = FALSE;
    	$lasst_name_msg = "Last name is required";
    else:
    	$name = $_POST['last_name'];
    endif;
  
  	if(empty($_POST['date'])):
		$ok = FALSE;
    	$date_msg = "Date is required";
	else:
		$date = $_POST['date'];
 	endif;
	
	if (empty($_POST['height'])):
		$ok = FALSE;
    	$height_msg = "Height is required";
    else:
    	$height = $_POST['height'];
    endif;
	
	if (empty($_POST['weight'])):
		$ok = FALSE;
    	$weight_msg = "Weight is required";
    else:
    	$weight = $_POST['weight'];
    endif;
	
	if (empty($_POST['age'])):
		$ok = FALSE;
    	$age_msg = "Age is required";
    else:
    	$age = $_POST['age'];
    endif;
endif;

?>
	<link type="text/css" rel="stylesheet" media="screen" href="forms.css" />
    <div class="main">
        <form action="nasm-form.php" method="post" id="f">
            <label for="first_name">First Name: </label>
            <input class="<?php if(!empty($first_name_msg)): echo pink; else: echo white; endif; ?>" type="text" name="first_name" value="<?php echo $_POST['first_name']; ?>" />
            	<br />
                <?php if(!empty($first_name_msg)): echo $first_name_msg; endif; ?>
            
            <label for="last_name">Last Name: </label>
            <input class="<?php if(!empty($lasst_name_msg)): echo pink; else: echo white; endif; ?>" type="text" name="last_name" value="<?php echo $_POST['last_name']; ?>" />
            	<br />
                <?php if(!empty($lasst_name_msg)): echo $lasst_name_msg; endif; ?>
                
            <label for="date">Date: </label>
            <input class="<?php if(!isset($date_msg)): echo pink; else: echo white; endif; ?>" type="date" name="date" value="<?php echo $_POST['date']; ?>" />
            	<br />
                <?php if(!empty($date_msg)): echo $date_msg; endif; ?>
                
            <label for="height">Height: </label>
            <input class="<?php if(!empty($height_msg)): echo pink; else: echo white; endif; ?>" type="text" name="height" value="<?php echo $_POST['height']; ?>" />
            	<br />
                <?php if(!empty($height_msg)): echo $height_msg; endif; ?>
                
            <label for="weight">Weight: </label>
            <input class="<?php if(!empty($weight_msg)): echo pink; else: echo white; endif; ?>" type="text" name="weight" value="<?php echo $_POST['weight']; ?>" />
            	<br />
                <?php if(!empty($weight_msg)): echo $weight_msg; endif; ?>
                
            <label for="age">Age: </label>
            <input class="<?php if(!empty($age_msg)): echo pink; else: echo white; endif; ?>" type="text" name="age" value="<?php echo $_POST['age']; ?>" />
            	<br />
                <?php if(!empty($age_msg)): echo $age_msg; endif; ?>
            
            
            
            <label for="phys-name">Physicians Name: </label>
            <input type="text" name="phys-name" />
            	<br />
                <?php if(!empty($phys_name_msg)): echo $phys_name_msg; endif; ?>
                
            <label for="phone">Phone: </label>
            <input type="text" name="phone" />
            	<br />
                <?php if(!empty($phone_msg)): echo $phone_msg; endif; ?>
                
        		<br />
                
                
        <h4>PHYSICAL ACTIVITY READINESS QUESTIONNAIRE (PAR-Q)</h4>
        	<br />
        
        <p>1 Has your doctor ever said that you have a heart condition and that you should
        only perform physical activity recommended by a doctor?</p>
        	<br />
        	<input type="radio" name="1" value="yes" /> Yes
            <input type="radio" name="1" value="no" /> No
            	<br />
                	<br />
        <p>2 Do you feel pain in your chest when you perform physical activity?</p>
        	<br />
        	<input type="radio" name="2" value="yes" /> Yes
            <input type="radio" name="2" value="no" /> No
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
        	<input type="text" name="occupation" />
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
        	<input type="text" name="yes-explain" size="75" />
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
        	<input type="text" name="yes-explain" size="75" />
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
        	<input type="text" name="yes-explain" size="75" />
        		<br />
                	<br />
         <p id="q-type">Medical Questions</p>
        <p>8. Have you ever had any pain or injuries (ankle, knee, hip, back, shoulder, etc.)?</p>
        	<br />
        	<input type="radio" name="14" value="yes" /> Yes
            <input type="radio" name="14" value="no" /> No
            	<br />
        <p>(If yes, please explain.)</p>
        	<input type="text" name="yes-explain" size="75" />
        		<br />
                	<br />
        <p>9. Have you ever had any surgeries?</p>
        	<br />
        	<input type="radio" name="15" value="yes" /> Yes
            <input type="radio" name="15" value="no" /> No
            	<br />
                	<br />
        <p>(If yes, please explain.)</p>
        	<input type="text" name="yes-explain" size="75" />
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
        	<input type="text" name="yes-explain" size="75" />
        		<br />
                	<br />
        <p>11. Are you currently taking any medication?</p>
        	<input type="radio" name="17" value="yes" /> Yes
            <input type="radio" name="17" value="no" /> No
            	<br />
                	<br />
        <p>(If yes, please explain.)</p>
        	<input type="text" name="yes-explain" size="75" />
        		<br />
                	<br />
        <input type="submit" name="submit" value="Submit Form" />
        </form>
    </div>

<?php
include('include/footer.php');
?>