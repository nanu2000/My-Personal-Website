<?php
require_once('Global.php');
include('Logo.php');
include('NavBar.php');
include('FlexPortfolio.php');


startContent(array("Styling/FrontPageStyle.css"), array(), array());

outputLogo();
startContainerStyle();
displayNavbar(NAV_OPTIONS::HOME_NAV_ID, "");

echoPortfolio();

endContainerStyle();
endContent();

?>