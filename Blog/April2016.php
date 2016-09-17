<?php
include('../global.php');
include('../Logo.php');
include('../NavBar.php');

startBlogContent();

outputLogo();
startContainerStyle();
displayNavbar(NAV_OPTIONS::BLOG, "../");


include ('blogNavbar.php');


startBlogPost( "April 8th 2016", "Hidden Progress");


echo
('
<p>
Today I realized that I haven\'t posted at all during March. I would first like to declare that my absense of posts was not an accident. I have worked very hard over the past month, and I am finally ready to announce the completion of my engine (as far as preperation for my next game goes). In short form: I am now ready to create my next game.
</p>

<center>
<p>
Here is a video showing off what I have implemented so far.
</p>

<div class="VideoWrapper">
<iframe width="560" height="315" src="https://www.youtube.com/embed/QvlZNNJJk0s?list=PLjHGIYMiOFmVr-xtssDJnLLw612cipUou" frameborder="0" allowfullscreen></iframe>      
</div>
</center>
<p>
Here is a current list of features that I have implemented. (I may have missed a few things)
</p>
<ol>
<li>Omnidirectional Shadow Mapping</li>
<li>Directional Shadow Mapping</li>
<li>Runtime shader modification</li>
<li>Collision and physics</li>
<li>Sounds And Music</li>
<li>Phong Shading</li>
<li>Multiple light support</li>
<li>Image Loading</li>
<li>Text rendering (With binary file exporter for text map)</li>
<li>Input Handling</li>
<li>Skeletal Animation (With custom binary exporter)</li>
</ol>
<p>
Thanks for the support! The next post will be about the game thats going to be created from this engine.</br>
<br>
-Richie
</p>     
');

endBlogPost();
endContainerStyle();
endContent();

?>
                               