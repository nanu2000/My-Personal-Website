<?php
      
include('../global.php');
include('../Logo.php');
include('../NavBar.php');

startProjectPageContent();
outputLogo();

startContainerStyle();

displayNavbar(NAV_OPTIONS::NOT_DEFINED, "../");

contentContainer('<center><div class = "ProjectPageTitle" style = "padding:10px;"> My Current Project </span></center>');

contentContainer
('
    <div class="GamePageDescription">
    <p  style = "padding:10px;"> 
    You can follow my 
    <a class ="TextLink" href="../'.$frontBlogPage.'">blog</a> 
    (which will have weekly/monthly posts starting 12/30/15)
    for more information regarding the developement of this project.
    </p>
    </div>
');
          
      
endContainerStyle();
endContent();

?>