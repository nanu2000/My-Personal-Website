<?php
$pageTitle              = "★-Richie Sikra-★";
$frontBlogPage          = "Blog/November2016.php";


function startBlogContent()
{
    startContent
    (
        array
        (
            "../Styling/BlogStyle.css"
        ), array(), array(), '../'
    );
}

function startProjectPageContent()
{
    startContent
    (
        array
        (
            "../Styling/GamePageStyle.css"
        ), array(), array(), '../'
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

function startContent($styleSheets, $scripts, $noScripts, $prefix = '')
{
    array_push($styleSheets,$prefix . "Styling/GlobalStyling.css");
    array_push($styleSheets,$prefix . "Styling/Fonts.css");
    array_push($scripts, $prefix . "Javascript/Global.js" );
    array_push($noScripts, $prefix . "Styling/GlobalNoScript.css" );
    
    
    global $pageTitle;
    
    echo
    ('
    <!DOCTYPE html>
    <html>
    <head>
    <meta name="viewport" content="width=device-width">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <link rel = "shortcut icon" href = "'. $prefix . 'favicon.ico" type="image/x-icon" >
    ');
    for($i = 0; $i < count($styleSheets); $i++)
    {
        echo 
        ('
    <link rel="stylesheet" href="'.$styleSheets[$i].'">
        ');
    }
    
    echo("<noscript>");
    
    for($i = 0; $i < count($noScripts); $i++)
    {
        echo 
        ('
    <link rel="stylesheet" href="'.$noScripts[$i].'">
        ');
    }
    
    echo("</noscript>");
    
    for($i = 0; $i < count($scripts); $i++)
    {
        echo 
        ('
    <script src="'.$scripts[$i].'"></script>
        ');
    }
    
    
    echo
    ('
    <title>'.$pageTitle.'</title>
    </head>
    <body>
    <script>setDefaultBackgroundColor();</script>
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