<?php
include('global.php');
include('Logo.php');
include('NavBar.php');


startContent(array("Styling/ContactPageStyle.css"), array(), array());
outputLogo();
startContainerStyle();
displayNavbar(NAV_OPTIONS::CONTACT, "");

echo
(
'
<div class="nonFlexBG"">
<div class = "textCenter" id ="ContactPageTitle">Contact</div>
</div>
<div class="nonFlexBG"">
<p class = "textCenter ContactPageText">The best way to contact me is through email, but if you message me on Youtube or any other social media outlet I am still likey to answer, just not at a reasonable time.</p>
</div>
<div class="nonFlexBG"">
<p class = "textCenter ContactPageText">Name: Richie Sikra
<br>
Email: richie@devrichie.com</p>
</div>


');

endContainerStyle();
endContent();

?>