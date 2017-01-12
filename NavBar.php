<?php
require_once 'Options.php';

function displayNavbar($option, $path)
{

    global $frontBlogPage; // From global.php
    
    $navItems = array
    (
       NAV_OPTIONS::HOME     => array($path  .NAV_OPTIONS::HOME_STR,     NAV_OPTIONS::HOME_NAME),
       NAV_OPTIONS::BLOG     => array($path . NAV_OPTIONS::BLOG_STR,     NAV_OPTIONS::BLOG_NAME),
       NAV_OPTIONS::CONTACT  => array($path . NAV_OPTIONS::CONTACT_STR,  NAV_OPTIONS::CONTACT_NAME)
    );
    
    $moreNavItems = array
    (
      NAV_OPTIONS::ITCH         => array(NAV_OPTIONS::ITCH_STR,                 NAV_OPTIONS::ITCH_NAME),
      NAV_OPTIONS::NOT_DEFINED  => array($path . NAV_OPTIONS::CHANGE_LOG_STR,   NAV_OPTIONS::CHANGE_LOG_NAME)
    );
    

    $navStr = '';
    
    foreach ($navItems as $key => $value) 
    {
        if($key == $option)
        {
            $navStr .= '<li class = "text_link"><a class = "active_nav_text_link noselect" href="'.$value[0].'">'.$value[1].'</a></li>';
        }
        else
        {
            
            $navStr .= '<li class = "text_link"><a class = "noselect" href="'.$value[0].'">'.$value[1].'</a></li>';
                
        }
    }
    
    
    $moreNavStr = '';
    
    
    foreach ($moreNavItems as $key => $value) 
    {
        $moreNavStr .= '<li class = "text_link"><a class = "noselect" href="'.$value[0].'">'.$value[1].'</a></li>';
    }
    
    echo
    (
        '
        <div id = "nav_bar">
        <ul class = "navbar_text_links">
           

        '.$navStr.'<li class = "text_link" id = "show_navbar" tabindex="0"><a class = "noselect">More</a></li> 
        

        <li id = "navbar_more">
        <ul>
        '.$moreNavStr.'
        </ul>
        </li>

        </ul>
        <ul class = "navbar_icon_links">
        <li>
        <a href="https://twitter.com/AlphaCollab" >
        <img src = "'.$path.'Images/TwitterIcon.png"/>
        </a>  
        </li>
        <li>
        <a href="https://www.youtube.com/channel/UCLhTqg04xF9MtMbZfFTRsYw">
        <img src = "'.$path.'Images/YoutubeIcon.png"/>
        </a>    
        </li>
        <li>
        <a href="https://github.com/nanu2000">
        <img src = "'.$path.'Images/GithubIcon.png"/>
        </a>   
        </li>  
        </ul>
        </div>
        '
    );
}



?>