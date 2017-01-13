<?php
include('../Global.php');
include ('blogNavbar.php');



startBlogContent();

startContainerStyle();
displayNavbar(NAV_OPTIONS::BLOG_NAV_ID, "../");


outputBlogNavbar();


startBlogPost( "January 29th, 2016", "A Bug" );

?>

<p>
I was planning on starting the binary exporter mentioned on last weeks post, but I ran into a bug.
Pretty much, for certain complex models (with big bone hierarchies) they would not animate exactly properly. As an example, the whole model would be folded in half or something alike.

I figured it was a missing bone, I was right.. But, it wasn't all that simple to fix, because when looking at Assimps "aiMesh::mNumBones", the number would be one or two bones short. 
To resolve the bug, it turns out that I also need to check the aiNodes for transformations, and treat them like bones without weight.
</p>
<p>
Here is an example of the bug.
</p>
<img class="SmallBlogImage"  src ="January2016Content/boneGlitch.png" />
<br style = "clear: both;">
<p>
I spent a good week (2-8 hours a day) Banging my head against the wall and thinking about ditching skeletal animation,
but even after that I cant say that I'm mad, because I feel like I really understand how skeletal animation works and how Assimp is set up as a library, 
and thats just one of the many perks I will receive from creating my own engine, and overall creating my own game.
</p>
<p>
Next week, I plan on adding to the animation system before I create the engine tool. 
I would like to have some modifier functions to change bones individually (scale, rotate, translate),
a function to hide or show a mesh in a scene, and then do some cleaning of the existing code.
</p>
<p>
Lets make this a productive week :D
</p>

<?php

endBlogPost();

startBlogPost( "January 20th 2016", "Skeletal Animation" );

?>

<div class ="text_center">
<p>
Remember that chest from January 7th? Well I was able to successfully load the model as a dae file into my engine, and animate it! 
</p>
<div class="video_wrapper">
<iframe width="560" height="315" src="https://www.youtube.com/embed/EFEfGPTyBBY" frameborder="0" allowfullscreen></iframe>    
</div>   
</div>
<p>
The process was quite tricky, and I am still not close to being finished with it. I plan on creating my own engine tool that takes a 3d model, 
and exports it into a binary file that can then quickly be loaded.
There are a few reasons I want to do that.
</p>

<ol>
<li>Decrease in load times.</li>

<li>Binary files are TINY! (100kb turns into 1kb.)</li>

<li>I don't have to include assimp in my game at all, the engine tool will use assimp, but then export a binary file that doesn't
include any information that you need assimp for.</li>
</ol>

<p>
I think thats about it, but you can probably understand why it would be worth it, especially for a big project that could have numerous 3d models.
I was thinking of creating a library that does exactly what I just said, it would probably be worth throwing together something like that, 
then making it open source, the only problem is I would want to decouple openGL from the library and GLM also, and that could take up some valuable time.
Anyways, for next week, I plan on touching up my skeletal animation and creating the binary exporter.</p>
<p> 
See you then!
</p>

<?php

endBlogPost();

startBlogPost( "January 7th 2016", "3D rendering and cleaning up some code!" );

?>

<p>
So for the past week I have erased my old rendering code from my 2D engine, and started working on my new rendering code for my 3D engine :D
To elaborate on that, I have implemented GLSL shaders, changed from orthographic view to perspective view, added the <a class ="TextLink" href = "http://glm.g-truc.net/0.9.7/index.html">openGL math library</a> for matrix math and vector math, and made a simple textured cube class to demonstrate that everything works!
</p>

<h5 class = "text_center">A few textured cubes being rendered</h5>

<br>

<img class="BigBlogImage" src ="January2016Content/EngineCube.png" />

<div class ="text_center">
<p>
To continue, I also created a chest using <a class ="TextLink" href ="https://www.youtube.com/watch?v=OKfGY5F1Bew&index=8&list=PLizxTnSpS5virtpCWlwwhSmYAj7norvLo">this tutorial</a> for testing out animations and mesh loading once I implement them.
</p>
<h5>The chest model in the <a class ="TextLink" href ="http://www.open3mod.com/">open 3D model viewer</a></h5>
</div>

<img class="BigBlogImage" src ="January2016Content/ChestModel.png" />
<p>
Needless to say, I feel like so far I have accomplished a good amount of tasks for this week, 
and I am very excited to continue working on this engine. It looks like it's
coming together really well and is nicely built so far. For next weeks post I plan on making a short video showing off the engine a little bit, so stay tuned!
</p>

<?php

endBlogPost();

startBlogPost( "January 1st 2016", "A Fresh New Beginning" );

?>
    
<p>
On <a class ="TextLink" href ="December2015.html">December 30th (2015)</a>, I mentioned using the
<a class ="TextLink" href="http://gameprogrammingpatterns.com/service-locator.html">service locator pattern</a>
for my audio system, and one of the reasons I am using a service locator instead of dependency injection is so I don't clutter my code. 
If I was creating a smaller game, then I would want to use dependency injection because it is cleaner in that scope. But since I am going to be writing a game that is 
bigger in size than my previous games I want everything to be kept as clean as possible, and I want to have the capability of everything being easily decoupled if need be.
</p>

<p>One of the more vital reasons I have is I also want everything I create now(for the engine) usable with any game that I might want to create with the engine. 
If I use dependency injection, then I would have to couple the engine with the individual game I would be working with. For that reason, some people would say it's 
laziness (which I do not agree with), but I would describe it as <b>reusability</b> which is very important to me because as a standalone indie developer, I 
<b>DO NOT</b> like wasting any time.                                        
</p>
<p>
The best thing about the method I chose is that when I actually start programming the game, I can use dependency injection if I want to. I am not limiting myself by using the service locator. All I would do is just use the audio class like normal (using dependency injection when needed) and never worry about the service locator and just remove it.
</p>
<h4 class = "text_center">On another note...</h4>
<p>
I am planning on adding more images and possibly videos(?) in the future, it's probably a little bit boring to just be reading text and I want to be as entertaining and informative as possible, so the best I can do is promise to add some more content other than text in the future. Please stay tuned :)
</p>

<?php
endBlogPost();
;
endBlogContent();
?>