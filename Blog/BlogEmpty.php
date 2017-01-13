<?php
include('../Global.php');
include ('blogNavbar.php');



startBlogContent();

startContainerStyle();
displayNavbar(NAV_OPTIONS::BLOG_NAV_ID, "../");


outputBlogNavbar();


startBlogPost( "post" , "subtitle");

?>


<?php
endBlogPost();
;
endBlogContent();
?>