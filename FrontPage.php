<?php
include('Pages/GenericPage.php');

$frontPageInfo = new PageInfo
(
    NAV_OPTIONS::HOME_NAV_ID,
    '',
    array('Styling/FrontPageStyle.min.css'),
    array(),
    array('Styling/FrontPageNoScript.min.css')
);

/*create the page*/
$frontPage = new GenericPage($frontPageInfo); 

/*Add the main content to the page*/
$frontPage->addContent(new GenericContent(function()
{
?>

    <div class="generic_page_text fade_in speed_4 fading_in">
        
        
        <div class="fade_in speed_5 fading_in" style="
            font-size: 1.6rem;
            margin-bottom: 20px;
            font-weight: 700;
            ">
            <p>Hi, I'm Richie,</p>
        </div>
       
        <p class="fade_in speed_6 fading_in">
            Throughout my career I've successfully 
            developed and published three games, 
            multiple web apps, and numerous tools
            that I use to help improve my productivity
            and development time.
        </p>
        <p class="fade_in speed_7 fading_in">
            The majority
            of my projects are open source and hosted
            on <a href="https://github.com/nanu2000">my GitHub account</a>.
        </p> 
        
        
        <p class="fade_in speed_7 fading_in">
            Additionally, any recently
            published projects will be added to the
            list below.
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
            <img class      ="portfolio_item_bg"  
                 src        ="<?= $item['imageURL'] ?? '';  ?>"
                 alt        ="<?= $item["imageAlt"];        ?>"/>
            
            <div class="img_loading_text">Loading Gif</div>
            
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
        
        <div class = "generic_header_wrapper fade_in speed_6">
            <div class ="text_center generic_title_m">Projects</div>
        </div>
        <div class="carousel_list_complete">
        
    
            <?php

    //output each item inside of the item_container UL
    foreach ($carouselItems as $value)
    {
        if(array_key_exists('active', $value) && $value['active'] === false)
        {
            continue;
        }
                
        $classes = (array)$value['listClasses'] ?? array();
        
        ?>
        <div class="carousel_list <?= $classes['list'] ?? '' ?>">
            
            <div class="item image <?= $classes['image'] ?? '' ?>">
                    
                <?php 
                
                if($value['lazyImageURL'] == '')
                {
                    ?>
                    <img src ="<?= $value['imageURL'] ?? ''; ?>" 
                         alt ="<?= $value["imageAlt"]; ?>">
                    <?php
                }
                else
                {
                    ?>
                    <div class      ="lazy_load_image" 
                         data-src   ="<?= $value['lazyImageURL']; ?>">

                        <img class = "img" src ="<?= $value['imageURL'] ?? ''; ?>" 
                             alt ="<?= $value["imageAlt"]; ?>">

                        <div class="loading_text"><div class="loader_shape"></div><div class="loader"></div></div>
                        
                    </div>
                    <?php
                }

                ?>
                
            </div>
            
            <div class="item description" style = "border-right: solid <?php echo($value["carouselItemColor"]); ?> 6px;">
                
                <div class="text <?= $classes['text'] ?? '' ?>">
                    <?php echo($value["carouselItemDescription"]); ?>
                </div>
                <div class ="view_more <?= $classes['links'] ?? '' ?>">
                    
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


/*Display the page*/
$frontPage->displayPage();