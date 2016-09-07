<?php

$pageTitle              = "★-Richie Sikra-★";
$frontBlogPage          = "Blog/June2016.php";



function contentContainer($content)
{
    echo('<div class="nonFlexBG">' .$content. '</div>' );
}

function startBlogPost($title)
{
    echo
    ('
    <div class="nonFlexBG">
        <div class ="BlogTitle">
            '.$title.'
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

function startContent($styleSheetLocation)
{
    global $pageTitle;
    echo
    ('
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
        <head>
            <meta name="viewport" content="width=device-width">
            <meta http-equiv="content-type" content="text/html; charset=utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
            <link rel="stylesheet" href="'.$styleSheetLocation.'">
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