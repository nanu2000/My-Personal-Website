<?php
include('../Global.php');

$blogPageInfo = new PageInfo
(
    NAV_OPTIONS::BLOG_NAV_ID,
    '../',
    array('../Styling/BlogStyle.min.css')
);

$blogPage       = new BlogPage($blogPageInfo); 

$blogContent    = new BlogContent(function()
{
?>
content
<?php    
});


$blogContent->giveBlogInformation( "title", "subtitle");

$blogPage->addContent($blogContent);

$blogPage->displayPage();


?>