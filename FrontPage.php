<?php
include('Global.php');
include('Logo.php');
include('NavBar.php');
include('FlexPortfolio.php');


startContent(array("Styling/FrontPageStyle.min.css"), array(), array());

outputLogo();
startContainerStyle();
displayNavbar(NAV_OPTIONS::HOME_NAV_ID, "");

echoPortfolio();

endContainerStyle();
endContent();

?>