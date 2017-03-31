<?php 

function createFlexItem($image, $imgAlt, $link, $color, $text)
{
    return 
    '<li class="flex_item">
    <a href ="'.$link.'">
    <div class ="flex_item_description" style = "background-color:'.$color.';">
    <div class="text_center flex_text_wrapper">
    <span class="wrapper_description_text">
    '.$text.'
    </span>
    </div>
    </div>
    <img class = "flex_bg" src ="'.$image.'" alt="'.$imgAlt.'"/>
    </a>
    </li>';
}

function createFlexPageFromStringOfItems($items)
{
    ?>

    <ul id="flex_item_container">  
        
        <li><div id = "carousel_left"></div></li>
        <li><div id = "carousel_right"></div></li>
        
        <?php echo($items); ?>
        
    </ul>

    <?php
}


function echoPortfolio()
{
    
    
    $flexItems = "";
    
    
    //$flexItems .=
    //desktopFlexHeader("Games That I Have Developed");
         
    $flexItems .=
    createFlexItem
    (
        "Images/LightShowBanner.png", "Lightshow Graphics Engine", 
        "ProjectPages/LightShowPage.php", 
        "#0C216E", //Complimentary to 07133E(navbar Color)
        "Lightshow is a custom handmade game/graphics framework that I created with OpenGL and C++."
    );
    
    
    $flexItems .=
    createFlexItem
    (
        "Images/StarDiveWebBanner.png", "Link to StarDive game page", 
        "ProjectPages/StarDivePage.php", 
        "#490261",  //Analogous to 02134A(darker lightshow Color)
        "Stardive is my favorite out of all the games I have made..<br>So far."
    );
    
    $flexItems .=
    createFlexItem
    (
        "Images/lolo.png", "Link to adventures of lolo game page", 
        "ProjectPages/LoloGamePage.php", 
        "#570A01", //Analogous to 02134A(darker lightshow Color)
        "LoLo is a game that I made for the NES Box art jam in 2015!"
    );
    
    $flexItems .=
    createFlexItem
    (
        "Images/AeroFlightBanner.png", "Link to Aeroflight game page", 
        "ProjectPages/AeroFlightPage.php", 
        "#02614D", //Analogous to 02134A(darker lightshow Color)
        "Aeroflight is the first game that I have published."
    ); 
    
   // $flexItems .=
    //desktopFlexHeader("Miscellaneous Projects");

    $flexItems .=
    createFlexItem
    (
        "Images/BlogBanner.png", "Link to Coming Blog Page", 
        "ProjectPages/ComingSoonPage.php",
        "#1D358A", //Complimentary to 07133E(navbar Color)
        "My blog contains consistent updates regarding the current project I'm developing."
    );           
       
    $flexItems .=
    createFlexItem
    (
        "Images/PhpProjBanner.png", "Link to Customer Submit Form Page", 
        "ProjectPages/CustomerSubmitFormPage.php", 
        "#656565", 
        "A Customer submission form made in PHP!"
    );
    echo createFlexPageFromStringOfItems($flexItems);

}
?>