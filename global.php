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
        ), array(), '../'
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
        ), array(), '../'
    );
}



function contentContainer($content)
{
    echo('<div class="nonFlexBG">' .$content. '</div>' );
}

function startBlogPost($title, $subtitle)
{
?>


<div class="nonFlexBG">
<div class = "BlogHeader">
<div class ="BlogTitle">
<?php echo $title ?>
</div>
<div class ="BlogSubTitle">
<?php echo $subtitle ?>
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
function startContainerStyle()
{
    echo('<div class = "ContainerStyling">');    
}

function endContainerStyle()
{
    echo('</div>');
}

function startContent($styleSheets, $scripts, $prefix = '')
{
    array_push($styleSheets,"https://fonts.googleapis.com/css?family=Passion+One:700");
    array_push($styleSheets, "https://fonts.googleapis.com/css?family=Raleway:500");
    array_push($scripts, $prefix . "Javascript/Global.js" );
    
    
    
    global $pageTitle;
    
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<link rel = "shortcut icon" href = "http://www.devrichie.com/favicon.ico" type="image/x-icon" >
    

<?php
    
    for($i = 0; $i < count($scripts); $i++)
    {
        echo('<script src="'.$scripts[$i].'"></script>');
    }
    
    for($i = 0; $i < count($styleSheets); $i++)
    {
        echo('<link rel="stylesheet" href="'.$styleSheets[$i].'">');
    }
   
?>
    


    <title><?php echo $pageTitle ?></title>
    </head>
    <body>
    <script>setDefaultBackgroundColor();</script>
    <div class ="MainBorder">
    
        
        
        
<?php
    
}

function endContent()
{
?>
        
        
</div>
</body>
</html>

    
<?php
}
?>