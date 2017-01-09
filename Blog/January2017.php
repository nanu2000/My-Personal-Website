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

<ol class = "FeatureList">
    <li>Added a <a href = "../changelog.txt">change log</a> to this website</li>
    <li>Added a more button to this website's navigation bar</li>
    <li><b>Decided to add Javascript!</b>
        <ol class = "FeatureList">
            <li>The 'More' buttons functionality utilizes JS</li>
            <li>Background color changes</li>
            <li>Custom .flexItem textBG color defined with data-hovercolor</li>
            <li>Custom background color on .flexItem hover based on data-hovercolor</li>
        </ol>
    </li>
    <li><b>Moved this website to a digital ocean droplet running <a href = "https://en.wikipedia.org/wiki/LAMP_(software_bundle)">LAMP!</a></b></li>
    <li>Got $50 Digital Ocean Credit because I'm a student! (<a href = "https://education.github.com/pack">Github student pack)</a></li>
    <li>Added the Lightshow Framework to the front page</li>
    <li>Started another semester of college .-.</li>
    <li><b>Improved my backup</b>
        <ol class = "FeatureList">
            <li>Utilizing GIT for version control</li>
            <li>Automated backup to home server</li>
            <li>Automated backup to Google Docs (non private data)</li>
            
        </ol>
    </li>
    <li>Got a personal home server</li>
    <li>Setup a professional email address (richie@devrichie.com)</li>
    <li>Got a little sidetracked while working on this website...
    <li>And finally : it's 2017! (or it's been 2017 for 9 days)</li>
</ol>
<p><b>And on top of all of that, this whole site can function 100% without javascript enabled! (yes, even the more button)</b></p>
<p>There's a lot on that list, but you may notice that there are some things that I planned to do that never got done.. I'm caught in the moment. Whenever I add new content to my website,
I always see something new that could be added or revised and I end up spending more time then I originally planned.</p>
<p>I have been doing a lot, but I think I need to switch up my priority list (or at least focus on it more).</p>
<p>
    <b>My Solution</b>
    <br>
    I have decided that instead of starting anything new, I'm going to finish everything I have already started. The sooner I can do that, the sooner I will be able to start my next big project.
</p>
<p>Here's a list of some of the things that I need to do:</p>
<ol class = "FeatureList">
    <li>Clean the code for this website</li>
    <li>Get a complete working prototype of my <a href="https://www.youtube.com/watch?v=cjxDBaDKaFY">GPS Application</a></li>
    <li>Publish my GPS application. (As secure and basic as it can be.) I need to publish another app, I'm not paying the apple developer fee for nothing.</li>
    <li>Focus on getting a degree and improving my education</li>
</ol>
<p>The first thing on that list is pretty important, and possibly even a bigger task than one might expect. I love clean code, but potential employers may like it even better.
If my own website's code isn't clean, then that would be a little sad.
</p>

<p>The second and third item on that list are both pretty important. I started the GPS project in May of 2016 (?) and I will finish it this year, even if it is in it's most basic form when I release it. (I can always
    make it better in the future :) )</p>

<p>Now the last item on that list may be unexpected, but it is definitely ranked as one of (if not) the highest on my priority list. I want the security and privilege of having a Computer
Science degree.</p>

<p>This whole post should give you a reasonable idea on where I am right now and what I plan on doing before I start the development on my next game. It may be awhile, but please be patient :)</p>

<p>
-Richie
</p>

<?php
endBlogPost();
endContainerStyle();
endContent();
?>