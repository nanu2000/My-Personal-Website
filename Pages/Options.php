<?php

class NAV_OPTIONS
{
    
    /*Relative Paths are used for Blog_Nav_Items*/
    const BLOG_NAV_ITEMS = array
    (
       array('December2015.php',    'December 2015 | '  ),
       array('January2016.php',     'January 2016 | '   ),
       array('February2016.php',    'February 2016 | '  ),
       array('April2016.php',       'April 2016 | '     ),
       array('June2016.php',        'June 2016 | '      ),
       array('September2016.php',   'September 2016 | ' ),
       array('November2016.php',    'November 2016 | '  ),
       array('January2017.php',     'January 2017'      )
    );
    
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
       self::CONTACT_NAV_ID  => array('Contact.php',               'Contact')
    );
    
    const MORE_NAV_ITEMS = array
    (
      self::ITCH_NAV_ID         => array('!https://-nanu-.itch.io/', 'Itch.io'),     //Add ! in front of external URLs
      self::NOT_DEFINED_NAV_ID  => array('ChangeLog.txt',            'Change Log')
    );
    
    /************************************************************************************************************/
    
}


?>