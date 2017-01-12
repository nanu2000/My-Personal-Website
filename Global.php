<?php
include('Options.php');


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

function startContentContainer()
{
    echo('<div class="nonFlexBG">');
}
function startContentContainerHideSmallScreen()
{
    echo('<div class="nonFlexBG HideMobile">');
}
function endContentContainer()
{
    echo('</div>');
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

function outputStylesheets($styleSheets)
{
    for($i = 0; $i < count($styleSheets); $i++)
    {
        echo('<link rel="stylesheet" href="'.$styleSheets[$i].'">');
    }
}
function outputScripts($scripts)
{
    for($i = 0; $i < count($scripts); $i++)
    {
        echo('<script src="'.$scripts[$i].'"></script>');
    }
}
function outputNoScripts($noScripts)
{
    echo("<noscript>");
    
    for($i = 0; $i < count($noScripts); $i++)
    {
        echo('<link rel="stylesheet" href="'.$noScripts[$i].'">');
    }
    
    echo("</noscript>");
}

function outputExternalFileIncludes($styleSheets, $noScripts, $scripts)
{
    outputStylesheets   ($styleSheets);
    outputNoScripts     ($noScripts);
    outputScripts       ($scripts);
}

function startContent($styleSheets, $scripts, $noScripts, $prefix = '', $pageTitle = '★-Richie Sikra-★')
{
    array_push($styleSheets,$prefix . "Styling/GlobalStyling.css"   );
    array_push($noScripts,  $prefix . "Styling/GlobalNoScript.css"  );

?>

    <!DOCTYPE html>
    <html>
    <head>
    <meta name="viewport" content="width=device-width">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <link rel = "shortcut icon" href = "<?php echo($prefix)?>Images/Favicon.ico" type="image/x-icon">
    
    <?php outputExternalFileIncludes($styleSheets, $noScripts, $scripts); ?>
    
    <title><?php echo($pageTitle); ?></title>
    
    </head>
    <body>
    <div class ="MainBorder">
    
        
<?php

}

function endContent($scripts = array(), $prefix = '')
{
    
    array_push($scripts,    $prefix . "Javascript/Global.js");
    
?>
        
    </div>
    <?php outputScripts($scripts); ?>
    </body>
    </html>
    
<?php

}

?>