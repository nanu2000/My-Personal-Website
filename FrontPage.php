<?php
include('global.php');
include('Logo.php');
include('NavBar.php');
include('FlexPortfolio.php');


startContent(array("Styling/GlobalStyling.css", "Styling/FrontPageStyle.css"), array());

outputLogo();
startContainerStyle();
displayNavbar(NAV_OPTIONS::HOME, "");

echoPortfolio();

endContainerStyle();
endContent();

?>