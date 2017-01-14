<?php
include('../Global.php');
include ('blogNavbar.php');

startContentType(PAGE_CONTENT_TYPE::BLOG_PAGE, NAV_OPTIONS::BLOG_NAV_ID, '../');

outputBlogNavbar();




startBlogPost( "post" , "subtitle");

?>


<?php
endBlogPost();
endDefaultContent('../');
?>