<?php
include('../Global.php');

$projectPageInfo = new PageInfo
(
    NAV_OPTIONS::NOT_DEFINED_NAV_ID,
    '../',
    array('../Styling/GamePageStyle.min.css')
);

$projectPage       = new ProjectPage($projectPageInfo); 

$projectPage->addAppStoreImage  
("GamePageImages/GithubImage.png", 
"https://github.com/nanu2000/Customer-Support-Form", 
"Github Page");

$projectPageContent    = new GenericContent(function()
{
?>

<div class = "text_center generic_header_wrapper generic_header_title">About The Customer Support Form</div>
<div class="generic_page_text">
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
});


$projectPage->addContent($projectPageContent);
$projectPage->displayPage();


?>