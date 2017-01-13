<?php
include('../Global.php');
include ('blogNavbar.php');



startBlogContent();

startContainerStyle();
displayNavbar(NAV_OPTIONS::BLOG_NAV_ID, "../");


outputBlogNavbar();

startBlogPost( "September 17th, 2016", "Web Development - Design theory - and my current plans" );

?>
<p>
Let's see, so the last blog post I have submitted was 2 months ago... Welp, sorry guys, but I'm not doing this for anyone but myself. If I decide I don't feel like writing, that is totally fine with me! 
To be honest though, I would love to write at least once a month. No promises, but that is what I'm aiming for at this moment.
</p><p>
Anyhow.. That title is pretty cool, right? Well those three things describe those past two months that I did not write about. I'll start off describing what I did regarding Web Development.
</p><p>
First of all, I created a pretty cool web application written in PHP, JQUERY and SQL! You can view it <a href="../ProjectPages/CustomerSubmitFormPage.php">here</a>, and even test it out. 
That project was created in about a month as a demo for a company who may or may not use it. The code is viewable on github, so you can see all of the guts and good stuff.
Here's a little more info about the web application I created; that project was the first time I have ever used PHP for a web-based program. Even considering that, the code was actually written pretty well! (At least in my opinion which may not count..)
</p><p>
Second of all, I played around with this website a bit more, and really tried to improve the look and feel of it! You may have noticed some cool new additions like multiple new fonts, some hover effects, and better mobile support!
The web-site's source code is actually on GitHub right now, and you can view it <a href="https://github.com/nanu2000/My-Personal-Website">here!</a>
Aside from the visual additions, I cleaned up the source code a lot, and made every .html page a .php page, which makes things <b>a lot</b> easier.
Whoops, I forgot to mention that you can compare the current site with the old one! the old one can still be viewed <a href="../old/Portfolio.html">here</a>
</p><p>
Finally, I changed my host from Amazon AWS to ASmallOrange. My thoughts on ASmallOrange are short and simple. Their service works great, and there has not been any problems besides my own stupidity. However, I am using shared hosting, which is not ideal, so I will probably switch my hosting yet again to a different company like Digital Ocean.
</p><p>
Okay, now that I explained what I did that revolved around my Web Development, I can finally get to the next two subjects.
</p><p>
On to the next topic; Design theory. In short form, I picked up an awesome book by <cite>Donald Norman</cite>  The book is titled Design of Everyday Things, and can be bought off of Amazon.com <a href="https://www.amazon.com/Design-Everyday-Things-Revised-Expanded/dp/0465050654/ref=pd_bxgy_14_img_2?ie=UTF8&psc=1&refRID=R2E9M7TV5S6K01WF0AFX">here</a>. It is a pretty interesting read, and while I have not finished it one-hundred percent, I can definitely recommend it. Aside from purchasing that book and reading a good amount of it, I can say proudly that I have used signifiers on the front page of my website! I am for sure incorporating a lot of the knowledge in that book into my everyday life, and it has been very helpful for me.
</p><p>
Considering my current plans, I have a good amount I need to think about before anything is completely set in stone. I have thought about my game for a while now, and have decided that I want it to be a 3D side scroller type game. I want it to have some action in it, but also a lot of skill regarding strategy. To elaborate on that, I want to make sure that to complete the game, you will have to be good at the game, but also good at strategic thinking.
That is all I am really for sure on regarding the game, and I am still in deep thought about everything else, so it may be awhile before I actually start it.
In the mean time, I have started a web app, and IOS app that runs in PHP, Swift, and SQL. I am still keeping everything low key regarding that project, so I wont say any more. You'll just have to wait and see :)
</p><p>
Anyway, I hope you enjoyed reading this! (if you did lol, it's quite a bit of text) I plan on making a youtube video sometime soon regarding the development of my current projects and I will be sure to post it here on my blog! So stay tuned,
</p>
<p>
-Richie
</p>

<?php
endBlogPost();
;
endBlogContent();
?>