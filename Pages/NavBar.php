<?php


/* Checks for ! as first character of path. if ! exists, then remove it. else, return href with path appended before it.*/
function getPathForNavItem($href, $path)
{
    if($href[0] === '!')
    {
        return substr($href, 1);    
    }
    
    return $path . $href;            
}


/*********************************************************
Parses a navigation array and returns a string of HTML. 
A navagation array has the format for each element in it:
ID => array(PATH, NAME)
**********************************************************/
function parseNavArray($navItems, $currentSelectionID, $path)
{
    $navStr = '';
    
    foreach ($navItems as $key => $value) 
    {
        $href = getPathForNavItem($value[0], $path);
        
        if($key === $currentSelectionID && $key !== NAV_OPTIONS::NOT_DEFINED_NAV_ID)
        {
            $navStr .= '<li class = "text_link"><a class = "active_nav_text_link no_select" href="'. $href .'">'. $value[1] .'</a></li>';
        }
        else
        {
            $navStr .= '<li class = "text_link"><a class = "no_select" href="'. $href .'">'. $value[1] .'</a></li>';
        }
    }
    
    return $navStr;
}

/*Outputs HTML for navbar and highlights the selected nav item.*/
function displayNavbar($currentSelectionID, $path)
{    
    writeMarkup
    (
        parseNavArray(NAV_OPTIONS::NAV_ITEMS,         $currentSelectionID, $path),
        parseNavArray(NAV_OPTIONS::MORE_NAV_ITEMS,    $currentSelectionID, $path),
        $path
    );
}

/*outputs the HTML for the navbar.*/
function writeMarkup($navStr, $moreNavStr, $path)
{
?>

    <div id = "nav_bar">
        
    <ul class = "navbar_text_links">
        
        <?php echo($navStr)?><li class = "text_link" id = "show_navbar" tabindex="0"><a class = "no_select">More</a></li> 
        
        <li id = "navbar_more" >
        <ul>
        <?php echo($moreNavStr)?>
        </ul>
        </li>

    </ul>
        
    <ul class = "navbar_icon_links">
        <li>
        <a href="https://twitter.com/AlphaCollab" >
        <img src = "<?php echo($path);?>Images/TwitterIcon.png"/>
        </a>  
        </li>
        <li>
        <a href="https://www.youtube.com/channel/UCLhTqg04xF9MtMbZfFTRsYw">
        <img src = "<?php echo($path);?>Images/YoutubeIcon.png"/>
        </a>    
        </li>
        <li>
        <a href="https://github.com/nanu2000">
        <img src = "<?php echo($path);?>Images/GithubIcon.png"/>
        </a>   
        </li>  
    </ul>
        
    </div>

<?php
}
?>