<?php
include('global.php');


startContent("Styling/FrontPageStyle.css");
include('Logo.php');
startContainerStyle();

include('NavBar.php');
displayNavbar(NAV_OPTIONS::HOME, "");

include('FlexPortfolio.php');

endContainerStyle();
endContent();

?>