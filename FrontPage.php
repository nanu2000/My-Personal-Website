<?php
include('global.php');
include('Logo.php');
include('NavBar.php');
include('FlexPortfolio.php');


startContent(array("Styling/FrontPageStyle.css"), array(), array());

outputLogo();
startContainerStyle();
displayNavbar(NAV_OPTIONS::HOME, "");

echoPortfolio();

endContainerStyle();
endContent();

?>