<?php
include('../Global.php');

startContentType(PAGE_CONTENT_TYPE::PROJECT_PAGE, NAV_OPTIONS::NOT_DEFINED_NAV_ID, '../');


startContentContainer();

?>

<div class="app_store_images">                              
<a href="https://github.com/nanu2000/Customer-Support-Form">
<img width="64" alt="Android app store" src = "GamePageImages/GithubImage.png"/>
</a>
</div>

<?php
endContentContainer();
startContentContainer();
?>

<div class = "text_center generic_header_wrapper generic_header_title">About The Customer Support Form</div>
<div class="generic_page_text generic_page_text_end">
<p>
This project was my first official project I have ever completed using PHP. This project is meant for a customer service department. The employees would recieve phone calls, 
complaints and other forms of input, and then fill out the form for what product they where talking about, and if the input from the customer was good or bad.
</p>
<p>
The input that is received by the employee will then be submitted to a database. The employee/manager/other can then view all of the previous submissions and see which items have gotten negative reviews, or 
reports of damaged parts.
</p>
</div>


<?php
endContentContainer();  
endDefaultContent('../');
?>