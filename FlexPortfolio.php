<?php 


function createFlexItem($image, $imgAlt, $link, $color, $text, $size, $textBGSize)
{
    return 
    '<li class="flexItem '.$size.'" data-hovercolor="'.$color.'">
    <a href ="'.$link.'">
    <div class ="flexItemDescription">
    <div class="textBg '.$textBGSize.'">
    <div class="textCenter flexTextWrapper">
    <span class="WrapperDescriptionText">
    '.$text.'
    </span>
    <img class = "MobileLinkArrow" src = "Images/LinkArrow.png"/>
    </div>
    </div>
    </div>
    <img class = "flexBG" src ="'.$image.'" alt="'.$imgAlt.'"/>
    </a>
    </li>';
}
function desktopFlexHeader($header, $subheader = "")
{
    if($subheader !== "")
    {
        
        return
        '<li class="DesktopNotifier flexItemTextSnippet">
        <div class = "textCenter textItemHeader">
        '.$header.'
        </div>
        <div class = "textCenter textItemSmallText">
        '.$subheader.'
        </div>
        </li>';

    }
    else
    {
        return
        '<li class="DesktopNotifier flexItemTextSnippet">
        <div class = "textCenter textItemHeader">
        '.$header.'
        </div>
        </li>';
    }
}

function createFlexPageFromStringOfItems($items)
{
    return '<ul class="flexItemContainter">'. $items . '</ul>';
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
        "flexItemBig", 
        "bigTextBg"
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
        "flexItemNormal", 
        "smallTextBg"
    );
    
    $flexItems .=
    createFlexItem
    (
        "Images/lolo.png", "Link to adventures of lolo game page", 
        "ProjectPages/LoloGamePage.php", 
        "#651b16", 
        "LoLo is a game that I made for the NES Box art jam in 2015!", 
        "flexItemNormal", 
        "smallTextBg"
    );
    
    $flexItems .=
    createFlexItem
    (
        "Images/AeroFlightBanner.png", "Link to Aeroflight game page", 
        "ProjectPages/AeroFlightPage.php", 
        "#0f3684", 
        "Aeroflight is the first game that I have published.", 
        "flexItemNormal", 
        "smallTextBg"
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
        "flexItemMed", 
        "bigTextBg"
    );           
       
    $flexItems .=
    createFlexItem
    (
        "Images/MediumPortfolio.png", "Link to Customer Submit Form Page", 
        "ProjectPages/CustomerSubmitFormPage.php", 
        "#5d5d5d", 
        "A Customer submission form made in PHP!", 
        "flexItemMed", 
        "bigTextBg"
    );
    
    echo createFlexPageFromStringOfItems($flexItems);

}
?>