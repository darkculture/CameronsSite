<?php error_reporting(E_ALL); ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $title; ?></title>

	<script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script>
    	$(window).ready(function(){
			$('.flexslider').flexslider({
				animation: "slide",
				pauseOnHover: true
			});
		});
    </script>
	<link rel="stylesheet" href="flexslider.css" type="text/css">
	<link type="text/css" rel="stylesheet" media="screen" href="style.css" />
    
</head>

<body>
	<div class="wrap">
    	<div class="header">
        	<h1>Cameron's Physical Training Page</h1>
        </div>
        
        <!--Navigation-->
        
        <div class="nav-bar">
        	<ul>
            	<li><a href="index.php" title="Cameron's phisical training home page" >Home</a></li>
                <li><a href="testimonials.php" title="Testimonials to Cameron's phisical training" >Testimonials</a></li>
                <li><a href="about.php" title="About Cameron in his own words" >About</a></li>
            </ul>
        </div>