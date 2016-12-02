<?php
include('global.php');
include('Logo.php');
include('NavBar.php');


startContent(array("Styling/GlobalStyling.css"), array());
outputLogo();
startContainerStyle();
displayNavbar(NAV_OPTIONS::CONTACT, "");

echo
(
'
    <div class="nonFlexBG"">
        <center>
           <p style = "font-family: '."'Raleway/'".', sans-serif;padding:10px;">The best way to contact me is through email; but if you message me on twitter or youtube I am still likey to answer, just not at a reasonable time.</p>
                   </center>
   </div>
    <div class="nonFlexBG">
        <center>
             <p style = "font-family: '."'Raleway/'".', sans-serif;padding:10px;">Email: richiesikra@gmail.com</p>
        </center>
   </div>


');

endContainerStyle();
endContent();

?>