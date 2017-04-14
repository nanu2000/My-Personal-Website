<?php
include('../Pages/BlogPage.php');

$blogPageInfo = new PageInfo
(
    NAV_OPTIONS::BLOG_NAV_ID,
    '../',
    array('../Styling/BlogStyle.min.css')
);

$blogPage       = new BlogPage($blogPageInfo); 


$firstPost    = new BlogContent(function()
{
?>
<p>
In the last week, I have successfully implemented <a href="http://www.bulletphysics.org" class = "TextLink">Bullet Physics!</a>
I created a simple wrapper that accepts a shape on initialization, and will create a collidable object according to whatever shape you specify! Along with that, I made sure to add on triangle mesh capabilities! (Triangle mesh and convex hull) 
</p>

<p>
So far everything was pretty straight forward and easy to implement. I had it up and running in two days!
</p>

<p>
One of the features that I really <b><u>needed</u></b> was a debug drawing system. I did NOT want to deal with invisible collision shapes, and objects not colliding properly because of it.
</p>

<p>
Luckily, bullet physics is very nice and does pretty much all of that for you! The only thing you have to do to implement debug drawing, is specify how to draw a single line in space. After that, bullet takes care of the rest.
</p>

<p>
I made a short little demonstration of everything up and running.
</p>

<div class="text_center video_wrapper">
<iframe width="560" height="315" src="https://www.youtube.com/embed/fm1RG-u-rPQ" frameborder="0" allowfullscreen></iframe> 
</div>   

<p>
Everything is starting to come together, and I can definitely see all of the progress I have made in the past two (almost three) months.
It's really an exiting process, and I believe that I will be able to start working on the actual game in about a month or so (that's my plan!) 
</p>

<p>
Stay tuned!
<br>
-Richie
</p>
<?php    
});


$secondPost    = new BlogContent(function()
{
?>
<p>
After completing the animation IO engine tool, I decided to clean it up a bit. I cleaned up all of the code and seperated the tool into multiple classes and functions. After I finished that, I modified my input system by adding on a function called "keyPressedOnce" that returns true if a key has been pressed once, but if the key is held it will return false.
</p>
<p>
Anyway, the title says, "Upcoming events" and not "Previous events", so I shall explain what I need to accomplish next.
</p>
<p>
So first off, I want to be able to create a simple game as soon as possible. Because of that, I will jump ahead and start implementing collision. Once I am done implementing collision into the engine, I shall add orthographic view so I can then start working on the gui system. The main big hurdle in creating a gui system is the text rendering; I will be using bitmap rendering as a solution for that, but I have thought of using freetype instead.
</p>
<p>
After those main tasks are complete, I will be able to make a game, but I still will hold back from that until I have implemented a few more things.
</p>
<p>
<ol class = "feature_list">
<li>Lighting (flat shading, phong shading, normal maps, specular maps, Shadow mapping, bloom, and maybe more)</li>
<li>multiple shaders (just to test out different things)</li>
<li>particles</li>
</ol>
<p>
Finally, once I am finished with all of that, I will start designing the engine architecture. Right now, I am used to using an entity component design, so that is just what I will create. Since that is the final task to complete regarding engine development, I will then work on planning out the game.
</p>
<p>
Overall, I have a few things I need before I can start working on the game, but once they are complete I shall have a good template for the next game in question.</p>

<?php
});



$firstPost->giveBlogInformation("February 25th, 2016", "Physics Physics Physics!");
$secondPost->giveBlogInformation("February 18th 2016", "Upcoming events");

$blogPage->addContent($firstPost);
$blogPage->addContent($secondPost);

$blogPage->displayPage();


?>