<?php

class NAV_OPTIONS
{
    const HOME          = 0;
    const CONTACT       = 1;
    const BLOG          = 2;             
    const ITCH          = 3;           
    
    const HOME_NAME     = 'Home';
    const ITCH_NAME     = 'Itch.io';
    const CONTACT_NAME  = 'Contact';
    const BLOG_NAME     = 'Blog';
    
    const HOME_STR      = 'FrontPage.php';
    const ITCH_STR      = 'http://-nanu-.itch.io/';
    const CONTACT_STR   = "Contact.php";
}

function displayNavbar($option, $path)
{
    
    global $frontBlogPage; // From global.php
    
    $navItems = array
    (
       NAV_OPTIONS::HOME    => array($path  .NAV_OPTIONS::HOME_STR,     NAV_OPTIONS::HOME_NAME),
       NAV_OPTIONS::ITCH    => array(NAV_OPTIONS::ITCH_STR,             NAV_OPTIONS::ITCH_NAME),
       NAV_OPTIONS::BLOG    => array($path . $frontBlogPage,            NAV_OPTIONS::BLOG_NAME),
       NAV_OPTIONS::CONTACT => array($path . NAV_OPTIONS::CONTACT_STR,  NAV_OPTIONS::CONTACT_NAME),
    );
    
    
    $navStr = '';
    
    foreach ($navItems as $key => $value) 
    {
        if($key == $option)
        {
            $navStr .= 
            '<li>
                <a class= "active" href="'.$value[0].'">'.$value[1].'</a>
            </li>';
        }
        else
        {
            
            $navStr .= 
            '<li>
                <a href="'.$value[0].'">'.$value[1].'</a>
            </li>';
                
        }
    }
    
    
    echo
    (
    '
        <div class="navBar">
            <ul>
                <div class="navBarItemsPositioning">
                   '.$navStr.'
                </div>
                
                <div class ="navBarIconGroup">
                    <a href="https://twitter.com/AlphaCollab">
                      <img  class = "navBarIcon" src = "'.$path.'Images/twitterIcon.png"/>
                    </a>

                    <a href="https://www.youtube.com/channel/UCLhTqg04xF9MtMbZfFTRsYw">
                      <img class = "navBarIcon" src = "'.$path.'Images/youtubeIcon.png"/>
                    </a>    
                    
                    <a href="https://github.com/nanu2000">
                      <img class = "navBarIcon" src = "'.$path.'Images/GithubIcon.png"/>
                    </a>    

                    <!--<a href="ErrorPage.html">
                      <img class = "navBarIcon" src = "'.$path.'Images/FB_ICO.png"/>
                    </a> -->
                </div>
                
            </ul>
        </div>
    '
    );
}



?>