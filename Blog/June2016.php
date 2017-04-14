<?php
include('../Pages/BlogPage.php');

$blogPageInfo = new PageInfo
(
    NAV_OPTIONS::BLOG_NAV_ID,
    '../',
    array('../Styling/BlogStyle.min.css')
);

$blogPage       = new BlogPage($blogPageInfo); 

$blogContent    = new BlogContent(function()
{
?>

<p>
The current state of my game's development would best be described as the decision making, drafting, and planning phase. The content embedded inside of the game so far is nothing more than a template, but that template will be the foundation of my game so it is something that I must spend time working really hard to polish and prepare. 
</p>
<p>
So far the template for this project is currently composed of a character controller along with a simple animation controller.
I am planning to expand this template a lot more than I currently have. A few of my future plans will include enemy AI for three different humanoid characters in the game, hand to hand combat capabilities along with weapon combat, a simple GUI (graphical user interface), and last but not least some level mechanics (moving floor, lava, ???).
</p>
<p>
My so called template will be built as a prototype. If the prototype is not fun to a large quantity of testers, then the template will be revised to suit the needs of the prototype.
The template will only include the most basic and important components that will be used in the final product.
<p>
furthermore, here is a video that I have created to show off the newest additions to the game. There is still a lot to do, but I definitely think that I am on the right path to a great game.
</p>

<div class="text_center video_wrapper">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/QcjZ9rkDvV8" frameborder="0" allowfullscreen></iframe>   
</div> 
<p>
Thank you very much for reading, hopefully I will get another blog post out sooner next time :)
<br>
-Richie
</p>     

<?php    
});


$blogContent->giveBlogInformation("June 17th, 2016", "-Before the Prototype-");

$blogPage->addContent($blogContent);

$blogPage->displayPage();


?>
