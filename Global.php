<?php
include('Options.php');
include('NavBar.php');
include ('Blog/blogNavbar.php');

class Content
{
    private $content;
    
    protected function startContentContainer(){}
    protected function endContentContainer(){}
    
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
    private $additionalClasses = "";
    
    function addAdditionalClassToContainer($class)
    {
        $this->additionalClasses .= " " . $class;
    }
    
    function startContentContainer()
    {
    ?>
        <div class="generic_content_wrapper<?php echo($this->additionalClasses); ?>">
    <?php
    }
    
    function endContentContainer()
    {
        echo('</div>');
    }
}

class BlogContent extends Content
{
    private $title      = "Blog Title";
    private $subtitle   = "Blog Subtitle";
    
    function giveBlogInformation($title, $subtitle)
    {
        $this->setTitle($title);
        $this->setSubtitle($subtitle);
    }
    
    function setTitle($title)
    {
        $this->title = $title;
    }
    
    function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }
    
    
    
    function startContentContainer()
    {
    ?>
    <div class = "generic_content_wrapper">
        
        <div class = "text_center generic_header_wrapper">
            
            <div class = "generic_header_title">
            <?php echo($this->title); ?>
            </div>
            
            <div class ="generic_header_subtitle">
                <?php echo($this->subtitle); ?>
            </div>
            
        </div>
        
        <div class = "generic_page_text">
    <?php
    }
    
    function endContentContainer()
    {
    ?>
        </div>
        </div>
    <?php
    }
}

class PageInfo
{
    
    public $relativePath;
    public $navbarSelectionID;
    public $pageTitle;
    private $styleSheets    = array();
    private $javascripts    = array();
    private $noScripts      = array();
    
    function __construct
    (
        $navbarSelectionID,
        $relativePath = '',
        $styleSheets    = array(),
        $javascripts    = array(),
        $noScripts      = array(),
        $pageTitle = "-Richie Sikra-"
    )
    {
        $this->relativePath         = $relativePath;
        $this->navbarSelectionID    = $navbarSelectionID;
        $this->pageTitle            = $pageTitle;
        $this->styleSheets          = $styleSheets;
        $this->javascripts          = $javascripts;
        $this->noScripts            = $noScripts;
    }
    
    function addToStyleSheets($item)
    {
        array_push($this->styleSheets, $item);
    }
    function addToScripts($item)
    {
        array_push($this->javascripts, $item);
    }
    function addToNoScripts($item)
    {
        array_push($this->noScripts, $item);
    }
    
    function outputStylesheets()
    {
        for($i = 0; $i < count($this->styleSheets); $i++)
        {
            echo('<link rel="stylesheet" href="'.$this->styleSheets[$i].'">');
        }
    }

    function outputScripts()
    {
        for($i = 0; $i < count($this->javascripts); $i++)
        {
            echo('<script src="'.$this->javascripts[$i].'"></script>');
        }
    }

    function outputNoScripts()
    {
        echo("<noscript>");
        for($i = 0; $i < count($this->noScripts); $i++)
        {
            echo('<link rel="stylesheet" href="'.$this->noScripts[$i].'">');
        }
        echo("</noscript>");
    }
}

class Page
{
    
    protected $pageInfo;
    protected $content        = array();
    
    function __construct($pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    function displayPage()
    {
        $this->startContent();
        $this->showContent();
        $this->endContent();
    }
    
    function addContent($contentItem)
    {
        array_push($this->content, $contentItem);
    }
    function addMultiContent($contentItems)
    {
        $this->content = array_merge($this->content, $contentItems);
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
        $this->outputHead();
        ?><body><?php
    }

    function endContent()
    {
        $this->pageInfo->outputScripts();
        ?>
        </body>
        </html>
        <?php
    }
    
    function outputHead()
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <link rel = "shortcut icon" href = "<?php echo($this->pageInfo->relativePath);?>Images/Favicon.ico" type="image/x-icon">
        <?php         
        $this->pageInfo->outputStylesheets   ();
        $this->pageInfo->outputNoScripts     ();
        ?>
        <title><?php echo($this->pageInfo->pageTitle);?></title>
        </head>
        <?php
    }

}

class GenericPage extends Page
{
    
    function startContent()
    {
        /*every page will have these files*/
        $this->pageInfo->addToStyleSheets   ($this->pageInfo->relativePath . "Styling/GlobalStyling.min.css");
        $this->pageInfo->addToNoScripts     ($this->pageInfo->relativePath . "Styling/GlobalNoScript.min.css");
        
        $this->outputHead();
        $this->startBody();
        
        $logo = new GenericContent(array($this, "outputLogo"));
        $logo->display();
        
        displayNavbar($this->pageInfo->navbarSelectionID, $this->pageInfo->relativePath);
    }

    function endContent() 
    {
        $this->pageInfo->addToScripts     ($this->pageInfo->relativePath . "Javascript/Global.min.js");
                        
        $footer = new GenericContent(array($this, "outputFooter"));
        $footer->display();
        $this->endBody();
    }
    
    function startBody()
    {
        ?>
        <body>
        <div id = "main_content_wrapper">
        <?php
    }
    
    function endBody()
    {
        ?> 
        </div>
        <?php $this->pageInfo->outputScripts(); ?>
        </body>
        </html>
        <?php
    }
    
    function outputLogo()
    {
        ?>
        <div class = "text_center generic_header_wrapper ">
        <div id ="richie_text">Richie Sikra</div>  
        <div id = "richie_text_subtitle">Developer | Designer | Creator</div>
        </div>
        <?php    
    }
    function outputFooter()
    {
        ?>
        <div class ="text_center" id="copyright_footer">
        Copyright 2015-<?php echo date("Y")?> Richard Sikra
        </div>
        <?php
    }

}

class BlogPage extends GenericPage
{
    function startContent()
    {
        //call GenericPage startContent function
        parent::startContent();
        
        $blogNavbar = new GenericContent('outputBlogNavbar');
        
        $blogNavbar->display();
        
    }
}

class ProjectPage extends GenericPage
{
    
    private $images         = array();
    private $bannerImage    = null;
    
    function addAppStoreImage($imageUrl, $link, $alt)
    {
        array_push($this->images, array($link, $alt, $imageUrl));
    }
    
    function setBannerImage($imageUrl, $alt)
    {
        $this->bannerImage = array($imageUrl, $alt);
    }
    
    function outputAppStoreImages()
    {
        ?>
        
        <div class="app_store_images">
            
            <?php 
            for($i = 0; $i < count($this->images); $i++)
            {
            ?>

                <a href = "<?php echo($this->images[$i][0]);?>">

                    <img alt = "<?php echo($this->images[$i][1]); ?>"
                         src = "<?php echo($this->images[$i][2]); ?>"/>

                </a> 

            <?php
            }                
            ?>
            
        </div>
        
        <?php
    }
    
    function outputBannerImage()
    {
        ?>
        <img alt = "<?php echo($this->bannerImage[1]); ?>" src = "<?php echo($this->bannerImage[0]); ?>" class ="project_page_banner" />
        <?php
    }
    
    
    function startContent()
    {
        //call GenericPage startContent function
        parent::startContent();
        
        
        if($this->bannerImage)
        {
            $bannerImage = new GenericContent(array($this, 'outputBannerImage'));
            $bannerImage->addAdditionalClassToContainer(' hide_mobile');
            $bannerImage->display();  
        }
        if(count($this->images) > 0)
        {
            $appStoreImages = new GenericContent(array($this, 'outputAppStoreImages'));
            $appStoreImages->display();
        }
        
    }
}


?>

    
    
    
    
    