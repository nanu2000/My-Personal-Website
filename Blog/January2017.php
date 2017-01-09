<?php
include('../global.php');
include('../Logo.php');
include('../NavBar.php');

startBlogContent();
outputLogo();
startContainerStyle();
displayNavbar(NAV_OPTIONS::BLOG, "../");


include ('blogNavbar.php');


startBlogPost( "January 8th" , "A New Year?");

?>

test




<?php


endBlogPost();




endContainerStyle();
endContent();

?>