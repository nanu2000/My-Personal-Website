<?php
include('Options.php');
include('NavBar.php');


class PAGE_CONTENT_TYPE
{
    const BLOG_PAGE     = 1;
    const PROJECT_PAGE  = 2;
    const DEFAULT_PAGE  = 3;
    
}

function startContentType($contentType, $navbarID, $prefix = '', $styleSheets = array(), $scripts = array(), $noScripts = array(), $pageTitle = '-Richie Sikra-')
{
    /*every page will have these files*/
    array_push($styleSheets, $prefix . "Styling/GlobalStyling.min.css"   );
    array_push($noScripts,   $prefix . "Styling/GlobalNoScript.min.css"  );
    
    switch($contentType)
    {
        case PAGE_CONTENT_TYPE::BLOG_PAGE:
            
            array_push($styleSheets, $prefix .  "Styling/BlogStyle.min.css");      
            
        break;
    
        case PAGE_CONTENT_TYPE::PROJECT_PAGE:
            
            array_push($styleSheets, $prefix .  "Styling/GamePageStyle.min.css");            
            
        break;
    }
    
   
    startDefaultContent ($styleSheets, $scripts, $noScripts, $prefix, $pageTitle);     
    displayNavbar       ($navbarID, $prefix);

}

function startContentContainer()
{
    echo('<div class="generic_content_wrapper">');
}
function startContentContainerHideSmallScreen()
{
    echo('<div class="generic_content_wrapper hide_mobile">');
}
function endContentContainer()
{
    echo('</div>');
}

function startBlogPost($title, $subtitle)
{
?>
    <div class="generic_content_wrapper">
    <div class = "text_center generic_header_wrapper">
    <div class ="generic_header_title">

    <?php echo($title); ?>

    </div>
    <div class ="generic_header_subtitle">

    <?php echo($subtitle); ?>

    </div>
    </div>
    <div class = "generic_page_text">
    
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

function startDefaultContent($styleSheets, $scripts, $noScripts, $prefix = '', $pageTitle = 'Richie Sikra')
{
    outputHeader($styleSheets, $scripts, $noScripts, $prefix, $pageTitle);

    echo('<body><div id = "main_content_wrapper">');   
    
    outputLogo();

}

function endDefaultContent($prefix = '', $scripts = array())
{
    
    array_push($scripts,    $prefix . "Javascript/Global.min.js");
    
    startContentContainer();
?>

    <div class ="text_center" id="copyright_footer">
    Copyright 2015-<?php echo date("Y")?> Richard Sikra
    </div>

<?php

    endContentContainer();
    
?>
    </div>
    <?php outputScripts($scripts); ?>
    </body>
    </html>
    
<?php

}

function outputHeader($styleSheets, $scripts, $noScripts, $prefix = '', $pageTitle = 'Richie Sikra')
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
    startContentContainer();
    
?>
    <div class = "text_center generic_header_wrapper ">
    <div id ="richie_text">Richie Sikra</div>  
    <div id = "richie_text_subtitle">Developer | Designer | Creator</div>
    </div>
<?php

    endContentContainer(); 
}

class Content
{
    private $content;
    
    function startContentContainer  (){}
    function endContentContainer    (){}
    
    function __construct($content)
    {
        $this->content = $content;
    }
    
    function display()
    {
        $this->startContentContainer();
        
        call_user_func($this->content);
        
        $this->endContentContainer();
    }
}

class GenericContent extends Content
{
    function startContentContainer()
    {
        echo('<div class="generic_content_wrapper">');
    }
    
    function endContentContainer()
    {
        echo('</div>');
    }
}

class Page
{
    
    private $relativePath;
    private $content = array();

    function __construct($relPath = '')
    {
        $this->relativePath = $relPath;
    }

    function addContent($contentItem)
    {
        array_push($this->content, $contentItem);
    }
    
    function showContent()
    {
        for($i = 0; $i < count($this->content); $i++)
        {
            $this->content[$i]->display();
        }
    }

    function startContent()
    {
        $this->startContentType
        (
            PAGE_CONTENT_TYPE::DEFAULT_PAGE, NAV_OPTIONS::HOME_NAV_ID, 
            '', 
            array("Styling/FrontPageStyle.min.css"), 
            array(), 
            array("Styling/FrontPageNoScript.min.css")
        );
    }
    
    function endContent()
    {
        $this->endDefaultContent('', array("Javascript/FrontPage.min.js"));
    }

    function displayPage()
    {
        $this->startContent();
        $this->showContent();
        $this->endContent();
    }


    function startContentType($contentType, $navbarID, $prefix = '', $styleSheets = array(), $scripts = array(), $noScripts = array(), $pageTitle = '-Richie Sikra-')
    {
        /*every page will have these files*/
        array_push($styleSheets, $prefix . "Styling/GlobalStyling.min.css"   );
        array_push($noScripts,   $prefix . "Styling/GlobalNoScript.min.css"  );

        switch($contentType)
        {
            case PAGE_CONTENT_TYPE::BLOG_PAGE:

                array_push($styleSheets, $prefix .  "Styling/BlogStyle.min.css");      

            break;

            case PAGE_CONTENT_TYPE::PROJECT_PAGE:

                array_push($styleSheets, $prefix .  "Styling/GamePageStyle.min.css");            

            break;
        }


        $this->startDefaultContent ($styleSheets, $scripts, $noScripts, $prefix, $pageTitle);     
        displayNavbar       ($navbarID, $prefix);

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
        $this->outputStylesheets   ($styleSheets);
        $this->outputNoScripts     ($noScripts);
        $this->outputScripts       ($scripts);
    }

    function startDefaultContent($styleSheets, $scripts, $noScripts, $prefix = '', $pageTitle = 'Richie Sikra')
    {
        $this->outputHeader($styleSheets, $scripts, $noScripts, $prefix, $pageTitle);

        echo('<body><div id = "main_content_wrapper">');   
            
        $this->outputLogo();

    }

    function endDefaultContent($prefix = '', $scripts = array())
    {

        array_push($scripts,    $prefix . "Javascript/Global.min.js");

        startContentContainer();
    ?>

        <div class ="text_center" id="copyright_footer">
        Copyright 2015-<?php echo date("Y")?> Richard Sikra
        </div>

    <?php

        endContentContainer();

    ?>
        </div>
        <?php $this->outputScripts($scripts); ?>
        </body>
        </html>

    <?php

    }

    function outputHeader($styleSheets, $scripts, $noScripts, $prefix = '', $pageTitle = 'Richie Sikra')
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <link rel = "shortcut icon" href = "<?php echo($prefix)?>Images/Favicon.ico" type="image/x-icon">
        <?php $this->outputExternalFileIncludes($styleSheets, $noScripts, $scripts); ?>
        <title><?php echo($pageTitle); ?></title>
        </head>
        <?php
    }

    function outputLogo()
    {
        startContentContainer();

    ?>
        <div class = "text_center generic_header_wrapper ">
        <div id ="richie_text">Richie Sikra</div>  
        <div id = "richie_text_subtitle">Developer | Designer | Creator</div>
        </div>
    <?php

        endContentContainer(); 
    }

}
















?>

    
    
    
    
    