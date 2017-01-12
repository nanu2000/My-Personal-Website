<?php
require_once('Global.php');
include('Logo.php');
include('NavBar.php');


startContent(array("Styling/ContactPageStyle.min.css"), array(), array());
outputLogo();
startContainerStyle();
displayNavbar(NAV_OPTIONS::CONTACT_NAV_ID, "");

echo
(
'
<div class="nonFlexBG"">
<div class = "textCenter" id ="ContactPageTitle">Contact</div>
<p class = "ContactPageText">The best way to contact me is through email, but if you message me on Youtube or any other social media outlet I am still likey to answer, just not at a reasonable time.</p>
<p class = "ContactPageText"><b>Name</b>: Richie Sikra
<br>
<b>Email</b>: richie@devrichie.com</p>
</div>


');

endContainerStyle();
endContent();

?>