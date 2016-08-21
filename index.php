        
        <?php
        $title = "Cameron's Personal Training Home Page";
        include('include/header.php'); ?>
        
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
                    <form action="index.php" method="post" id="home">
                        <label for="name">Name:</label>
                            <select name="title">
                                <option value="" selected="selected"></option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms.">Ms.</option>
                            </select>
                            <input type="text" name="name" size="" value="<?php if(!empty($_POST['name'])): echo $_POST['name']; endif; ?>" />
                                <br /> 
                        <label for="email">Email:</label>
                            <input type="text" name="email" size="" value="<?php if(!empty($_POST['email'])): echo $_POST['email']; endif; ?>" />
                            <br />
                        <input type="submit" name="submit" value="Submit" />
                    </form>
                </fieldset>
            </div>
        </div>
        
        <!--Footer-->
        
        <?php include('include/footer.php'); ?>
                  