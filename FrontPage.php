<?php
include('Pages/GenericPage.php');
include('FlexPortfolio.php');

$frontPageInfo = new PageInfo
(
    NAV_OPTIONS::HOME_NAV_ID,
    '',
    array('Styling/FrontPageStyle.min.css'),
    array('Javascript/FrontPage.min.js'),
    array('Styling/FrontPageNoScript.min.css')
);

$frontPage = new GenericPage($frontPageInfo); 

$frontPage->addContent(new GenericContent(function()
{
?>

    <div class ="generic_page_text">
        
        <div class = "text_center generic_title_sm" >
        The text below is meant to test the layout of this page. It is temporary and will be replaced soon.
        </div>
        
        <p>
        Lorem ipsum dolor sit amet, <b>consectetur</b> adipiscing elit. Aliquam lorem orci, maximus sed arcu et, ornare feugiat nisi. Nulla aliquam tortor a porttitor condimentum. 
        Integer scelerisque nunc semper urna feugiat mattis. Fusce id lobortis libero, sollicitudin imperdiet sem. Cum sociis natoque penatibus et <b>magnis dis parturient montes</b>,
        nascetur ridiculus mus. Nunc libero justo, ultrices et nibh a, placerat ultrices ante. Proin elementum feugiat placerat. Nam sit amet nisl purus. Aliquam sed nisl id metus 
        ultricies gravida. Morbi augue nibh, placerat eu eros eget, lobortis gravida felis. Integer faucibus dui non ex ultrices, in <b>consectetur leo varius.</b> Proin sit amet 
        tellus et elit commodo condimentum. Fusce ac est ornare, semper nisl eget, lacinia sapien. Proin sed aliquam lectus, sed imperdiet ligula. Integer dictum aliquet metus.
        </p>
        
    </div> 

<?php
}));

$frontPage->addContent(new GenericContent(function()
{
    echo'<div class ="text_center generic_title_m">My Projects</div>';
}));

$frontPage->addContent(new Content(function(){outputPortfolio();}));


$frontPage->displayPage();

?>