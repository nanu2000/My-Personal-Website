<?php

class NAV_OPTIONS
{
    /*The URL containing the most recent blog post.*/
    const NEWEST_BLOG_POST_URL  = "Blog/January2017.php";
    
    /************************************************************************************************************
     * Nav ID's are used for every page when displaying the nav bar.
     * To output the navbar PHP, you will need to use the displayNavbar function declared in NavBar.php and
     * supply the current page's navagation ID. The navagation ID it used to highlight the current page on the navbar.
     ************************************************************************************************************/
    
    const HOME_NAV_ID          = 0;
    const CONTACT_NAV_ID       = 1;
    const BLOG_NAV_ID          = 2;             
    const ITCH_NAV_ID          = 3;            
    const NOT_DEFINED_NAV_ID   = -1;
    
    /************************************************************************************************************
     * To Add a new item to the nav bar, add into one of the arrays with the format : NAV_ID => array(PATH, NAME)
     ************************************************************************************************************/
    
    const NAV_ITEMS = array
    (
       self::HOME_NAV_ID     => array('FrontPage.php',             'Home'),
       self::BLOG_NAV_ID     => array('Blog/FrontPage.php',        'Blog'),
       self::CONTACT_NAV_ID  => array('Contact.php',               'Contact')
    );
    
    const MORE_NAV_ITEMS = array
    (
      self::ITCH_NAV_ID         => array('!https://-nanu-.itch.io/','Itch.io'),
      self::NOT_DEFINED_NAV_ID  => array('ChangeLog.txt',   'Change Log')
    );
    
    /************************************************************************************************************/
    
    
}


?>