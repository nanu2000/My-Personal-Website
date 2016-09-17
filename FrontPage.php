<?php
include('global.php');
include('Logo.php');
include('NavBar.php');


startContent(array("Styling/GlobalStyling.css", "Styling/FrontPageStyle.css"));

outputLogo();
startContainerStyle();
displayNavbar(NAV_OPTIONS::HOME, "");

include('FlexPortfolio.php');

endContainerStyle();
endContent();

?>