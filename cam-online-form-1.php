<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Information Form</title>
<link type="text/css" rel="stylesheet" media="screen" href="forms.css" />
</head>

<body>
<?php

$fnameErr = $lnameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $lname = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $nameErr = "First name is required";
  } else {
    $name = input($_POST["fname"]);
  }
  
  if (empty($_POST["lname"])) {
    $nameErr = "Last name is required";
  } else {
    $name = input($_POST["lname"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = input($_POST["email"]);
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "Phone number is required";
  } else {
    $website = input($_POST["phone"]);
  }
}

function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<div class="main">
	<p><span class="error">* Required Field.</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
            <label for="fname">First Name</label>
            <input type="text" name="fname" size="20" tabindex="" />
            <span class="error">* <?php echo $fnameErr;?></span>
            <br />
            <label for="lname">Last Name</label>
            <input type="text" name="lname" size="20" tabindex="" />
            <span class="error">* <?php echo $lnameErr;?></span>
            <br />
            <label for="initial">Middle Initial</label>
            <input type="text" name="initial" size="1" tabindex="" />
            <br />
            <label for="address">Address</label>
            <input type="text" name="address" size="50" tabindex="" />
            <br />
            <label for="city">City</label>
            <input type="text" name="city" size="20" tabindex="" />
            <br />
            <label for="state">State</label>
            <select id="state" name="state" ><br />
            	<option value=""></option>
            </select>
            <br />
            <label for="zipcode">Zip Code</label>
            <input type="text" name="zipcode" size="10" tabindex="" />
            <br />
            <label for="phone">Phone Number</label>
            <input type="phone" name="phone" size="10" tabindex="" />
            <span class="error">* <?php echo $phoneErr;?></span>
            <br />
            <label for="email">Email Address</label>
            <input type="email" name="email" size="30" tabindex="" />
            <span class="error">* <?php echo $emailErr;?></span>
            <br />
            <label for="height">Height in Inches</label>
            <input type="text" name="height" size="5" tabindex="" />
            <br />
            <label for="weight">Weight in Pounds</label>
            <input type="text" name="weight" size="5" tabindex="" />
            <br />
            <label for="age">Age</label>
            <input type="text" name="age" size="2" tabindex="" />
            <br />
            <label for="sex">Sexual Orientation</label><br />
            <input type="radio" name="sex" value="male" tabindex="" /> Male<br />
            <input type="radio" name="sex" value="female" tabindex="" /> Female<br />
            <input type="radio" name="sex" value="other" tabindex="" /> Other
            <br />
            <label for="e-contact">Emergency Contact</label>
            <input type="text" name="e-contact" size="30" tabindex="" />
            <br />
            <label for="e-contact-number">Emergency Contact Number</label>
            <input type="phone" name="e-contact-number" size="10" tabindex="" />
        </fieldset>
    </form>
</div>
</body>
</html>
