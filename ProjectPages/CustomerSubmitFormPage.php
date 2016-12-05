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
<div class="AppStoreImages">
    <a href="http://devrichie.com/SubmissionProject/front.php">
        <div class = "AppItemText">Try It Out!</div>
    </a> 
</div>
');



contentContainer
('
<div class="GamePageDescription">
<span class = "ProjectPageTitle">About The Customer Support Form</span>
<p class = "NormalTextStyling">
This project was my first official project I have ever completed using PHP. This project is meant for a customer service department. The employees would recieve phone calls, 
complaints and other forms of input, and then fill out the form for what product they where talking about, and if the input from the customer was good or bad.
</p>
<p class = "NormalTextStyling">
The input that is recieved by the employee will then be submitted to a database. The employee/manager/other can then view all of the previous submissions and see which items have gotten negative reviews, or 
reports of damaged parts.
</p>
<p>
Since it is kind of fun to play around with, you can try it out <a href="http://devrichie.com/SubmissionProject/front.php">here!</a>
</p>

</div>
');        
      
endContainerStyle();
endContent();

?>