<?php
include('../global.php');
include('../Logo.php');
include('../NavBar.php');

startProjectPageContent();
outputLogo();

startContainerStyle();

displayNavbar(NAV_OPTIONS::NOT_DEFINED, "../");

contentContainer
('
<div class="AppStoreImages">                              
    <a href="https://github.com/nanu2000/Customer-Support-Form">
        <img width="64px" alt="Android app store" src = "GamePageImages/GithubImage.png"/>
    </a>
</div>
');



contentContainer
('
<div class = "ProjectPageTitle textCenter">About The Customer Support Form</div>
<div class="GamePageDescription textCenter">
<p class = "NormalTextStyling">
This project was my first official project I have ever completed using PHP. This project is meant for a customer service department. The employees would recieve phone calls, 
complaints and other forms of input, and then fill out the form for what product they where talking about, and if the input from the customer was good or bad.
</p>
<p class = "NormalTextStyling">
The input that is recieved by the employee will then be submitted to a database. The employee/manager/other can then view all of the previous submissions and see which items have gotten negative reviews, or 
reports of damaged parts.
</p>
</div>
');        
      
endContainerStyle();
endContent();

?>