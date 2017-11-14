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
        
        
        <div style="
            font-size: 1.6rem;
            margin-bottom: 20px;
            font-weight: 700;
            "><p>Hi, I'm Richie,</p></div>
                <p>
                    A programmer 
                    with a passion for 
                    <b>art</b>,
                    <b>graphics</b>,
                    and 
                    <b>design</b>.
                </p>
            <p>
                Throughout my career I've successfully 
                developed and published three games, 
                multiple web apps, and numerous tools
                that I use to help improve my productivity
                and development time.
            </p>
            <p>Currently I am not accepting any requests for work, as I have been booked recently.</p>
            <p>The majority
                of my projects are open source and hosted
                on <a href="https://github.com/nanu2000">my github account</a>,
                where I post daily commits for my newest
                projects. 
                
            </p>
            <p>
                Additionally, any recently
                published projects will be added to the
                carousel and list below.
            </p>

    </div>

<?php
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





//Get carousel item array from the carousel item json file
$carouselItems = json_decode(file_get_contents("CarouselItems.json"), true)['carouselItems'];








/*Add the carousel to the page*/
$frontPage->addContent(new Content(function() use ($carouselItems)
{

    /********************************************************************
     * Reads CarouselItems from json file and outputs all items as a UL.*
     ********************************************************************/
    
    ?>
    <div class="generic_content_wrapper">
        
        <div class = "generic_header_wrapper">
            <div class ="text_center generic_title_m">My Projects</div>
        </div>
        <div class="carousel_list_complete">
        
    
            <?php

    //output each item inside of the item_container UL
    foreach ($carouselItems as $value)
    {
        ?>
        <div class="carousel_list">
            
            <div class="item image">
                <img src="<?php echo($value["imageURL"]);?>" alt="<?php echo($value["imageAlt"]); ?>">
            </div>
            
            <div class="item description" style = "border-right: solid <?php echo($value["carouselItemColor"]); ?> 6px;">
                
                <div class="text">
                    <?php echo($value["carouselItemDescription"]); ?>
                </div>
                <div class ="view_more">
                    
                    <span class = "languages">
                        
                        <?php
                        if(array_key_exists("languages", $value)){
                            
                            echo($value["languages"]);
                            
                        }
                        ?>
                        
                    </span>
                    
                    <span class = "links">
                        <a href="<?php echo($value["projectURL"]); ?>">View</a>

                        <?php

                        if(array_key_exists("projectGithubURL", $value)){
                            ?> | <a href="<?php echo($value["projectGithubURL"]); ?>">Github</a><?php
                        }

                        ?>
                    </span>
                    
                </div>
                
            </div>
            
        </div><?php
    }

    ?></div></div><?php
    
}));



/*Add the carousel to the page*/
$frontPage->addContent(new Content(function() use ($carouselItems)
{

    /********************************************************************
     * Reads CarouselItems from json file and outputs all items as a UL.*
     ********************************************************************/
    
    ?><ul id="portfolio_item_container"><?php


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