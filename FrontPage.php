<?php
include('Pages/GenericPage.php');

$frontPageInfo = new PageInfo
(
    NAV_OPTIONS::HOME_NAV_ID,
    '',
    array('Styling/FrontPageStyle.min.css'),
    array('Javascript/FrontPage.min.js'),
    array('Styling/FrontPageNoScript.min.css')
);

/*create the page*/
$frontPage = new GenericPage($frontPageInfo); 

/*Add the main content to the page*/
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

/*Add a header for the carousel to the page*/
$frontPage->addContent(new GenericContent(function()
{
    echo'<div class ="text_center generic_title_m">My Projects</div>';
}));

/********************************************************************
 * outputs a single carousel list item **Needs to be wrapped in UL***
 ********************************************************************/
function outputCarouselListItem($item)
{
    ?><li class="portfolio_item">
        <a href ="<?php echo($item["projectURL"]); ?>">
        <div class ="portfolio_item_content_wrapper" style = "background-color:<?php echo($item["carouselItemColor"]); ?>">
        <div class="text_center portfolio_item_text_wrapper">
        <span class="portfolio_item_text">
        <?php echo($item["carouselItemDescription"]); ?>
        </span>
        </div>
        </div>
        <img class = "portfolio_item_bg" src ="<?php echo($item["imageURL"]);?>" alt="<?php echo($item["imageAlt"]); ?>"/>
        </a>
    </li><?php
}

/*Add the carousel to the page*/
$frontPage->addContent(new Content(function()
{

    /********************************************************************
     * Reads CarouselItems from json file and outputs all items as a UL.*
     ********************************************************************/
    
    ?><ul id="portfolio_item_container"><?php

    //Get carousel item array from the carousel item json file
    $carouselItems = json_decode(file_get_contents("CarouselItems.json"), true)['carouselItems'];

    //output each item inside of the item_container UL
    foreach ($carouselItems as $value)
    {
        outputCarouselListItem($value);   
    }

    ?></ul><?php

}));


/*Display the page*/
$frontPage->displayPage();


?>