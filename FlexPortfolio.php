<?php 

function createFlexItem($image, $imgAlt, $link, $color, $text, $size, $text_bgSize)
{
    return 
    '<li class="flex_item '.$size.'" data-hovercolor="'.$color.'">
    <a href ="'.$link.'">
    <div class ="flex_item_description">
    <div class="text_bg '.$text_bgSize.'">
    <div class="text_center flex_text_wrapper">
    <span class="wrapper_description_text">
    '.$text.'
    </span>
    <img class = "mobile_link_arrow" src = "Images/LinkArrow.png"/>
    </div>
    </div>
    </div>
    <img class = "flex_bg" src ="'.$image.'" alt="'.$imgAlt.'"/>
    </a>
    </li>';
}

function desktopFlexHeader($header, $subheader = "")
{
    if($subheader !== "")
    {
        
        return
        '<li class="desktop_notifier flex_item_text_snippet">
        <div class = "text_center text_item_header">
        '.$header.'
        </div>
        <div class = "text_center text_item_small_text">
        '.$subheader.'
        </div>
        </li>';

    }
    else
    {
        return
        '<li class="desktop_notifier flex_item_text_snippet">
        <div class = "text_center text_item_header">
        '.$header.'
        </div>
        </li>';
    }
}

function createFlexPageFromStringOfItems($items)
{
    return '<ul class="flex_item_container">'. $items . '</ul>';
}


function echoPortfolio()
{
    
    
    $flexItems = "";
    
    $flexItems .=
    desktopFlexHeader("Hover Over or Click on Some of the Images Below for More Information");
    
    $flexItems .=
    createFlexItem
    (
        "Images/LightShowBanner.png", "Lightshow Graphics Engine", 
        "ProjectPages/LightShowPage.php", 
        "#004b94", 
        "Lightshow is a custom handmade game/graphics framework that I created with OpenGL and C++.", 
        "flex_item_big", 
        "big_text_bg"
    );
    
    $flexItems .=
    desktopFlexHeader("Games That I Have Developed");
    
    $flexItems .=
    createFlexItem
    (
        "Images/StarDiveWebBanner.png", "Link to StarDive game page", 
        "ProjectPages/StarDivePage.php", 
        "#522898", 
        "Stardive is my favorite out of all the games I have made..<br>So far.", 
        "flex_item_normal", 
        "small_text_bg"
    );
    
    $flexItems .=
    createFlexItem
    (
        "Images/lolo.png", "Link to adventures of lolo game page", 
        "ProjectPages/LoloGamePage.php", 
        "#651b16", 
        "LoLo is a game that I made for the NES Box art jam in 2015!", 
        "flex_item_normal", 
        "small_text_bg"
    );
    
    $flexItems .=
    createFlexItem
    (
        "Images/AeroFlightBanner.png", "Link to Aeroflight game page", 
        "ProjectPages/AeroFlightPage.php", 
        "#0f3684", 
        "Aeroflight is the first game that I have published.", 
        "flex_item_normal", 
        "small_text_bg"
    ); 
    
    $flexItems .=
    desktopFlexHeader("Miscellaneous Projects");

    $flexItems .=
    createFlexItem
    (
        "Images/NextProjectMedium.png", "Link to Coming Blog Page", 
        "ProjectPages/ComingSoonPage.php", 
        "#005200", 
        "My blog contains consistent updates regarding the current project I'm developing.", 
        "flex_item_med", 
        "big_text_bg"
    );           
       
    $flexItems .=
    createFlexItem
    (
        "Images/MediumPortfolio.png", "Link to Customer Submit Form Page", 
        "ProjectPages/CustomerSubmitFormPage.php", 
        "#5d5d5d", 
        "A Customer submission form made in PHP!", 
        "flex_item_med", 
        "big_text_bg"
    );
    
    echo createFlexPageFromStringOfItems($flexItems);

}
?>