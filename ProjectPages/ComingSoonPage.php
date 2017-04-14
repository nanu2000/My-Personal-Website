<?php
include('../Pages/ProjectPage.php');

$projectPageInfo = new PageInfo
(
    NAV_OPTIONS::NOT_DEFINED_NAV_ID,
    '../',
    array('../Styling/GamePageStyle.min.css')
);

$projectPage       = new ProjectPage($projectPageInfo); 

$projectPageContent    = new GenericContent(function()
{
?>

<div class = "text_center generic_header_wrapper generic_header_title"> 
My Current Project 
</div>
<div class="generic_page_text">
<p> 
You can follow my <a class ="TextLink" href="../<?php echo(NAV_OPTIONS::NEWEST_BLOG_POST_URL);?>">blog</a> (which will have weekly/monthly posts starting 12/30/15)
for more information regarding the development of this project.
</p>
</div>

<?php    
});


$projectPage->addContent($projectPageContent);
$projectPage->displayPage();


?>
