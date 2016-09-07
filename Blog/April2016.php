<?php

include('../global.php');

startContent("../Styling/BlogStyle.css");
include('../Logo.php');

startContainerStyle();

include('../NavBar.php');
displayNavbar(NAV_OPTIONS::BLOG, "../");

include ('blogNavbar.php');


startBlogPost
("
<h2>April 8th 2016</h2>
<h3>Hidden Progress</h3>
");


echo
('
<p>
Today I realized that I haven\'t posted at all during March. I would first like to declare that my absense of posts was not an accident. I have worked very hard over the past month, and I am finally ready to announce the completion of my engine (as far as preperation for my next game goes). In short form: I am now ready to create my next game.</p>
<br>
<br>
<center>
<p>
Here is a video showing off what I have implemented so far.
</p>      
<div class="VideoWrapper">
<iframe width="560" height="315" src="https://www.youtube.com/embed/QvlZNNJJk0s?list=PLjHGIYMiOFmVr-xtssDJnLLw612cipUou" frameborder="0" allowfullscreen></iframe>      
</div>                                 
</center>
<br><br>
<br>
<p>
Here is a current list of features that I have implemented. (I may have missed a few things)
</p>
                                        <p>
*Omnidirectional Shadow Mapping</br>
*Directional Shadow Mapping</br>
*Runtime shader modification</br>
*Collision and physics</br>
*Sounds And Music</br>
*Phong Shading</br>
*Multiple light support</br>
*Image Loading</br>
*Text rendering (With binary file exporter for text map)</br>
*Input Handling</br>
*Skeletal Animation (With custom binary exporter)</br>
</br>
</p>
<p>
Thanks for the support! The next post will be about the game thats going to be created from this engine.</br>
</p><p>
-Richie
</p>     
');

endBlogPost();
endContainerStyle();
endContent();

?>
                               