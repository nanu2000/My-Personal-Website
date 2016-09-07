<?php
      
include('../global.php');

startContent("../Styling/GamePageStyle.css");
include('../Logo.php');

startContainerStyle();

include('../NavBar.php');
displayNavbar(NAV_OPTIONS::HOME, "../");

contentContainer('<center><br><b><h2> My Current Project </h2></b><br></center>');

contentContainer
('
    <div class="GamePageDescription">
    <br>
    <p> 
    You can follow my 
    <a class ="TextLink" href="../'.$frontBlogPage.'">blog</a> 
    (which will have weekly/monthly posts starting 12/30/15)
    for more information regarding the developement of this project.
    </p>
    <br>
    </div>
');
          
      
endContainerStyle();
endContent();

?>