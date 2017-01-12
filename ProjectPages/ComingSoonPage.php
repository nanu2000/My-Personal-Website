<?php
require_once('../Global.php');
include('../Logo.php');
include('../NavBar.php');

startProjectPageContent();

outputLogo();

startContainerStyle();

displayNavbar(NAV_OPTIONS::NOT_DEFINED_NAV_ID, "../");

startContentContainer();
?>

<div class = "textCenter ProjectPageTitle"> 
My Current Project 
</div>
<div class="GamePageDescription">
<p> 
You can follow my <a class ="TextLink" href="../<?php echo(NAV_OPTIONS::NEWEST_BLOG_POST_URL)?>.">blog</a> (which will have weekly/monthly posts starting 12/30/15)
for more information regarding the development of this project.
</p>
</div>


<?php
endContentContainer();
endContainerStyle();
endProjectPageContent();
?>