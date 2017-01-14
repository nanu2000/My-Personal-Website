<?php
include('../Global.php');
include ('blogNavbar.php');

startContentType(PAGE_CONTENT_TYPE::BLOG_PAGE, NAV_OPTIONS::BLOG_NAV_ID, '../');

outputBlogNavbar();

startBlogPost( "December 30th, 2015", "The end of the year and the start of a new blog.");

?>

<p>
The year 2015 is coming to an end, and I have completed my new years goal of creating three whole games this year.<br>
</p>
<div class ="text_center">
<a class ="TextLink" href = "../ProjectPages/AeroFlightPage.php">Aeroflight</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class ="TextLink" href = "../ProjectPages/StarDivePage.php">Stardive</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class ="TextLink" href = "../ProjectPages/LoloGamePage.php">Adventures of lolo</a><br>
</div>
<p>To continue, I have also set up this website! This is the first blog post, and there will be more to come! I am also starting my next game, and creating the engine for it right now. I took the engine that I used for lolo, and took the entity component design, and all of the game data and discarded it. I am now remodeling it to be a 3D engine with a slick new design and many more features.</p><br><p> Today I remodeled the audio interface, and added on some debugging tools to make my life easier. The next thing I want to do is wrap the audio system with the <a class ="TextLink" href="http://gameprogrammingpatterns.com/service-locator.html">Service locator pattern </a>so I can access it globally in a reasonable way.</p>
<p>For my next new year's goal, I want to create a working 3D game. I am planning for this game to be BIG. I do not want it to be as small as the games I have created, and I also don't want to have those limitations of mobile devices so I am designing this game to run on computers. As a new years goal, normally I would say, "Finish this by the end of the year", but since I want this game to be big, my goal before the end of next year is to create a playable concept, with most art, gameplay, and everything in place, but I am not expecting it to be finished, just everything set up and in place. </p><p>So that is my goal for 2016! I still do not have a full on schedule set in place, but I should be starting the development document within the next three days. I will continue to keep everyone reading this posted!</p>

<p>Here is a picture of my progress so far! Not much to show besides the debugging system that's now in place.</p>

<img class="NoFade BigBlogImage" src ="December2015Content/LightShowEngineRevision_1.png" alt ="LightShowEngineRevision_1" />

<?php
endBlogPost();
endDefaultContent('../');
?>