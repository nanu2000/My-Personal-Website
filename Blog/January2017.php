<?php
include('../global.php');
include('../Logo.php');
include('../NavBar.php');

startBlogContent();
outputLogo();
startContainerStyle();
displayNavbar(NAV_OPTIONS::BLOG, "../");


include ('blogNavbar.php');


startBlogPost( "January 9th" , "A New Year? + Caught in the Moment");

?>


<p>
A lot has happened, but do I even need to say that? It's been two months since my last blog post. Of course a lot has happened!
</p>
<ol>
    <li>test</li>
</ol>


<?php


endBlogPost();




endContainerStyle();
endContent();

?>