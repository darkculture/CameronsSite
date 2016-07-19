        
        <?php include '/header.php'; ?>
        
        <!-----------------------Main Content Goes Here------------------>
        
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
                    <p>Fill out this form to be contacted by me.</p>
                    <form action="index.php" method="post">
                        <p>
                        <label for="name">Name:</label>
                            <select name="title">
                                <option value="" selected="selected"></option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms.">Ms.</option>
                            </select>
                            <input type="text" name="name" size="20" value="Name goes here" />
                        </p>
                        <p> 
                        <label for="email">Email:</label>
                            <input type="text" name="email" size="20" value="Email goes here" />
                        </p>
                        <p>
                            <input type="submit" name="done" value="Contact Me!" />
                        </p>
                        <input type="submit" name="submit" value="Submit" />
                    </form>
                </fieldset>
            </div>
        </div>
        
        <!----------------------Footer---------------------------------------->
        
        <?php include '/fotter.php'; ?>
                  