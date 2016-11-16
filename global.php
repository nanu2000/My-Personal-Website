<?php
$pageTitle              = "★-Richie Sikra-★";
$frontBlogPage          = "Blog/November2016.php";


function startBlogContent()
{
    startContent
    (
        array
        (
            "https://fonts.googleapis.com/css?family=Lobster", 
            "../Styling/GlobalStyling.css", 
            "../Styling/BlogStyle.css"
        )
    );
}

function startProjectPageContent()
{
    startContent
    (
        array
        (
            "https://fonts.googleapis.com/css?family=Lobster", 
            "../Styling/GlobalStyling.css", 
            "../Styling/GamePageStyle.css"
        )
    );
}



function contentContainer($content)
{
    echo('<div class="nonFlexBG">' .$content. '</div>' );
}

function startBlogPost($title, $subtitle)
{
    echo
    ('
    <div class="nonFlexBG">
        <div class = "BlogHeader">
            <div class ="BlogTitle">
            '.$title.'
            </div>
            <div class ="BlogSubTitle">
            '.$subtitle.'
            </div>
        </div>
        <div class = "BlogText">
    ');
}

function endBlogPost()
{
    echo
    ('
        </div>
    </div>
    ');
}
function startContainerStyle()
{
    echo('<div class = "ContainerStyling">');    
}

function endContainerStyle()
{
    echo('</div>');
}

function startContent($styleSheets)
{
    array_push($styleSheets,"https://fonts.googleapis.com/css?family=Passion+One:700");
    array_push($styleSheets, "https://fonts.googleapis.com/css?family=Raleway:500");
    
    global $pageTitle;
    echo
    ('
    <!DOCTYPE html>
    <html>
        <head>
        
            <meta name="viewport" content="width=device-width">
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
            <link rel = "shortcut icon" href = "http://www.devrichie.com/favicon.ico" type="image/x-icon" >
    ');
    
    for($i = 0; $i < count($styleSheets); $i++)
    {
        echo ('<link rel="stylesheet" href="'.$styleSheets[$i].'">');
    }
    
    echo
    ('
            <title>'.$pageTitle.'</title>
        </head>
        <body>    
            <div class ="MainBorder">
    ');
}

function endContent()
{
    echo
    (
        '
                </div>
            </body>
        </html>'
    );    
}


?>