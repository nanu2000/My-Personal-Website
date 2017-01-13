<?php
include('Options.php');
include('NavBar.php');


class PAGE_CONTENT_TYPE
{
    const BLOG_PAGE     = 1;
    const PROJECT_PAGE  = 2;
    const DEFAULT_PAGE  = 3;
    
}

function startContentType($contentType, $navbarID, $prefix = '', $styleSheets = array(), $scripts = array(), $noScripts = array(), $pageTitle = '★-Richie Sikra-★')
{
    /*every page will have these files*/
    array_push($styleSheets, $prefix . "Styling/GlobalStyling.min.css"   );
    array_push($noScripts,   $prefix . "Styling/GlobalNoScript.min.css"  );
    
    switch($contentType)
    {
        case PAGE_CONTENT_TYPE::BLOG_PAGE:
            
            array_push($styleSheets, "../Styling/BlogStyle.min.css");      
            
        break;
    
        case PAGE_CONTENT_TYPE::PROJECT_PAGE:
            
            array_push($styleSheets, "../Styling/GamePageStyle.min.css");            
            
        break;
    }
    
   
    startDefaultContent ($styleSheets, $scripts, $noScripts, $prefix, $pageTitle);     
    displayNavbar       ($navbarID, $prefix);

}

function startContentContainer()
{
    echo('<div class="non_flex_bg">');
}
function startContentContainerHideSmallScreen()
{
    echo('<div class="non_flex_bg hide_mobile">');
}
function endContentContainer()
{
    echo('</div>');
}

function startBlogPost($title, $subtitle)
{
?>
    <div class="non_flex_bg">
    <div class = "BlogHeader">
    <div class ="BlogTitle">

    <?php echo($title); ?>

    </div>
    <div class ="BlogSubTitle">

    <?php echo($subtitle); ?>

    </div>
    </div>
    <div class = "BlogText">
    
<?php
}

function endBlogPost()
{
?>
    </div>
    </div>
<?php
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



function startDefaultContent($styleSheets, $scripts, $noScripts, $prefix = '', $pageTitle = '★-Richie Sikra-★')
{
    outputHeader($styleSheets, $scripts, $noScripts, $prefix, $pageTitle);

    echo('<body><div class ="main_border">');
        
    outputLogo();

    echo('<div class = "container_styling">');   
}

function endDefaultContent($prefix = '', $scripts = array())
{
    
    array_push($scripts,    $prefix . "Javascript/Global.min.js");
    
?>
    </div>
    </div>
    <?php outputScripts($scripts); ?>
    </body>
    </html>
    
<?php

}

function outputHeader($styleSheets, $scripts, $noScripts, $prefix = '', $pageTitle = '★-Richie Sikra-★')
{
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
    
    <?php
}

function outputLogo()
{
?>

    <div id = "richie_text_wrapper">
    <div id ="richie_text">Richie Sikra</div>  
    <span id = "richie_text_subtitle">Developer | Designer | Creator</span>
    </div>

<?php
}
?>