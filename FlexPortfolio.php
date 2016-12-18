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
        "Images/LightShowBanner.png", "Light Show Graphics Engine", 
        "/ProjectPages/LightShowPage.php", 
        "rgb(0,30,90)", 
        "LightShow is a custom handmade Game/Graphics Framework that I created with OpenGL and C++.<br>The code for this project is viewable on my GitHub account. :)", 
        "flexItemBig", 
        "bigTextBg"
    );
    
    $flexItems .=
    desktopFlexHeader("Games That I Have Developed");
    
    $flexItems .=
    createFlexItem
    (
        "Images/StarDiveWebBanner.png", "Link to StarDive game page", 
        "/ProjectPages/StardivePage.php", 
        "rgb(50,20,100)", 
        "Stardive is my favorite out of all the games I have made..<br>So far.", 
        "flexItemNormal", 
        "smallTextBg"
    );
    
    $flexItems .=
    createFlexItem
    (
        "Images/lolo.png", "Link to adventures of lolo game page", 
        "ProjectPages/LoloGamePage.php", 
        "rgb(80,5,0)", 
        "LoLo is a game that I made for the NES Box art jam in 2015!", 
        "flexItemNormal", 
        "smallTextBg"
    );
    
    $flexItems .=
    createFlexItem
    (
        "Images/AeroFlightBanner.png", "Link to Aeroflight game page", 
        "ProjectPages/AeroFlightPage.php", 
        "rgb(0,45,90)", 
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
        "rgb(0,70,0)", 
        "My blog contains consistent updates regarding the current project I'm developing.", 
        "flexItemMed", 
        "bigTextBg"
    );           
       
    $flexItems .=
    createFlexItem
    (
        "Images/MediumPortfolio.png", "Link to Customer Submit Form Page", 
        "ProjectPages/CustomerSubmitFormPage.php", 
        "rgb(60,60,60)", 
        "A Customer submission form made in PHP!<br>The code for this project is viewable on my github. :)", 
        "flexItemMed", 
        "bigTextBg"
    );
    
    echo createFlexPageFromStringOfItems($flexItems);

}
?>