<?php
require_once('../Global.php');
include('../Logo.php');
include('../NavBar.php');

startBlogContent();
outputLogo();
startContainerStyle();
displayNavbar(NAV_OPTIONS::BLOG_NAV_ID, "../");


include ('blogNavbar.php');


startBlogPost( "post" , "subtitle");

?>


<?php

endBlogPost();


endContainerStyle();
endContent();

?>