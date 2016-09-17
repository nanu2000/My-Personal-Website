<?php

$pageTitle              = "★-Richie Sikra-★";
$frontBlogPage          = "Blog/June2016.php";


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


function contentContainer($content)
{
    echo('<div class="nonFlexBG">' .$content. '</div>' );
}

function startBlogPost($title, $subtitle)
{
    echo
    ('
    <div class="nonFlexBG">
        <div class ="BlogTitle">
        '.$title.'
        </div>
        <div class ="BlogSubTitle">
        '.$subtitle.'
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
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
        <head>
            <meta name="viewport" content="width=device-width">
            <meta http-equiv="content-type" content="text/html; charset=utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
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