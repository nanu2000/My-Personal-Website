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
    desktopFlexHeader("Hover over or click on some of the images below for more information");
    
    $flexItems .=
    createFlexItem
    (
        "Images/LightShowBanner.png", "Light Show Graphics Engine", 
        "/ProjectPages/LightShowPage.php", 
        "rgb(0,30,90)", 
        "My custom handmade Game/Graphics Framework created with OpenGL and C++", 
        "flexItemBig", 
        "bigTextBg"
    );
    
    $flexItems .=
    desktopFlexHeader("Check out the games that I have developed!");
    
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
        "I made this game for the NES Box art jam in 2015!", 
        "flexItemNormal", 
        "smallTextBg"
    );
    
    $flexItems .=
    createFlexItem
    (
        "Images/AeroFlightBanner.png", "Link to Aeroflight game page", 
        "ProjectPages/AeroFlightPage.php", 
        "rgb(0,45,90)", 
        "This the first game that I\'ve programmed! <br>Why not check it out?", 
        "flexItemNormal", 
        "smallTextBg"
    ); 
    
    $flexItems .=
    desktopFlexHeader(" Miscellaneous Projects");

    $flexItems .=
    createFlexItem
    (
        "Images/NextProjectMedium.png", "Link to Coming Blog Page", 
        "ProjectPages/ComingSoonPage.php", 
        "rgb(0,70,0)", 
        "Read about the current project I\'m working on in my blog!", 
        "flexItemMed", 
        "bigTextBg"
    );           
       
    $flexItems .=
    createFlexItem
    (
        "Images/MediumPortfolio.png", "Link to Customer Submit Form Page", 
        "ProjectPages/CustomerSubmitFormPage.php", 
        "rgb(60,60,60)", 
        "This project was made in PHP!<br>The code for this project is viewable on my github :)", 
        "flexItemMed", 
        "bigTextBg"
    );
    
    echo createFlexPageFromStringOfItems($flexItems);

}
?>