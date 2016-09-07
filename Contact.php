<?php
include('global.php');

startContent("Styling/BlogStyle.css");
include('Logo.php');

startContainerStyle();

include('NavBar.php');
displayNavbar(NAV_OPTIONS::CONTACT, "");

echo
(
'
    <div class="nonFlexBG">
        <center>
            <br>
            <br>
            <br>
            You may contact me through skype or email.
            <br>
            <br>
            Email: richiesikra@gmail.com
            <br>
            <br>
            You can also contact me through Facebook, Twitter, Youtube or itch.io, but I am less likely to answer at a reasonable time.
            <br>
            <br>
            <br>
            <br>
       </center>
   </div>

');

endContainerStyle();
endContent();

?>