<?php
include('../Global.php');
include ('blogNavbar.php');



startBlogContent();

startContainerStyle();
displayNavbar(NAV_OPTIONS::BLOG_NAV_ID, "../");


outputBlogNavbar();

startBlogPost( "November 8th, 2016", "Side Projects" );
?>
<p>
Currently I am working on two side projects in addition to my main project. My main project (which is described thoroughly in previous blog posts) is still in it's idea phase.
I plan to continue programming my main project within the next few months once school settles down a little.
</p>
<p>
I'll start off with my current most visible side project, which is in fact this website.
</p>
<p>
Originally I created this website with only HTML and CSS (aside from PHP as it's backend language), not because I couldn't use JavaScript, but because I didn't need to use it.
</p>
<p>
Well now I am thinking about adding a nice little button on top of the navigation bar that will toggle JavaScript on my website. Of course, I haven't decided what the
JavaScript will do yet, but I want it to show off some of what I am capable of creating. 
I'm not really expecting any of that to be implemented anytime soon, but if I have the free time I will definitely add some cool little JS features to this site.
</p>
<p>
Additionally, I plan to add a project navbar link which contains all of the projects I have completed. Right now I have a small project that I recently completed, but I think
the project isn't big enough to be projected onto the front page of my website. The project page would solve that problem because it would contain every project regardless
of the amount of time I allocated for each one.
</p>
<p>
As I mentioned in the last paragraph, there is a project that I have recently built until completion. It took two days to complete, it is open source, and it is made with Vanilla JavaScript.
It is a simple task manager that generates text depending on what you put into the text boxes. It's a pretty nice project considering it only took two days to create.
</p>
<p>
You may view the task project <a href="http://www.devrichie.com/TaskProj/">here</a>.
</p>
<p>
On another topic, I have been working on a GPS application targeted for IOS devices! If I remember correctly, I did mention it briefly in my last blog post. The GPS Application
now has an up and running GPS map that tracks your location. Additionally, the login and registration pages have been working very well so far.
</p>
<div class ="text_center">
Here is a short demonstration that I recorded of the GPS application.
<div class="video_wrapper">
<iframe width="560" height="315" src="https://www.youtube.com/embed/cjxDBaDKaFY" frameborder="0" allowfullscreen></iframe> 
</div> 
</div>
<p>
To end this blog post, I will leave by saying that no matter what, I will complete any project that I have started. I am excited to continue working on my game, and I am eager
to complete all of my current side projects.
</p>
<p>
-Richie
</p>

<?php
endBlogPost();
;
endBlogContent();
?>