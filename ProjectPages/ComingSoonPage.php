<?php
      
include('../global.php');
include('../Logo.php');
include('../NavBar.php');

startProjectPageContent();
outputLogo();

startContainerStyle();

displayNavbar(NAV_OPTIONS::NOT_DEFINED, "../");


contentContainer
('
    <div class = "textCenter ProjectPageTitle"> My Current Project </div>
    <div class="GamePageDescription textCenter">
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