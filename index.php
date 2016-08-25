        
        <?php
        $title = "Cameron's Personal Training Home Page";
        include('include/header.php'); 
		
		$name_regx = '/^[a-zA-Z ]*$/';
		$email_regx = 'if (!filter_var($email, FILTER_VALIDATE_EMAIL)):';
		
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
			if (empty($_POST['name'])):
				$ok = FALSE;
    			$name_msg = '<span class="error">Your name is required</span>';
  			else:
				if(!preg_match($name_regx, $_POST['name'])):
					$name_msg = '<span class="error">Use letters only</span>';
				endif;
    		endif;
			
			if (empty($_POST["email"])):
				$ok = FALSE;
    			$email_msg = "Email is required";
  			else:
    			if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)):
      			$email_msg = "Invalid email format"; 
    			endif;
  			endif;
  
		endif;
		?>
        
        <!--Main Content Goes Here-->
        
        <div class="main-content">
        	<div class="center-content">
                <div class="flex-slide-container">
                    <div class="flexslider">
                        <ul class="slides">
                            <li><img src="img/test.jpg"></li>
                            <li><img src="img/test2.jpg"></li>
                            <li><img src="img/test3.jpg"></li>
                            <li><img src="img/test4.jpg"></li>
                            <li><img src="img/test5.jpg"></li>
                            <li><img src="img/test6.jpg"></li>
                            <li><img src="img/test7.jpg"></li>
                        </ul>
                    </div><!--end flexslider div-->       
             	</div>
  				<br class="clear-float">
                <fieldset>    
                    <p id="home">Fill out this form to be contacted by me.</p>
                    <form action="contact-me.php" method="post" id="home">
                        <label for="name">Name:</label>
                            <select name="title">
                                <option value="" selected="selected"></option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms.">Ms.</option>
                            </select>
                            <input type="text" id="name" name="name" size="" value="<?php if(!empty($_POST['name'])): echo $_POST['name']; endif; ?>" />
                                <br />
                        <label for="email">Email:</label>
                            <input type="text" id="email" name="email" size="" value="<?php if(!empty($_POST['email'])): echo $_POST['email']; endif; ?>" />
                            <br />
                        <input type="submit" id="submit" name="submit" value="Submit" />
                    </form>
                </fieldset>
            </div>
        </div>
        
        <!--Footer-->
        
        <?php include('include/footer.php'); ?>
                  