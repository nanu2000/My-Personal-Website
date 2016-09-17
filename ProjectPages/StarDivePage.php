<?php
include('../global.php');
include('../Logo.php');
include('../NavBar.php');

startContent(array("../Styling/GlobalStyling.css", "../Styling/GamePageStyle.css"));
outputLogo();

startContainerStyle();

displayNavbar(NAV_OPTIONS::NOT_DEFINED, "../");

contentContainer('<img src = "GamePageImages/StarDiveBigBanner.png" class ="GamePageBanner" />');


contentContainer
('
<div class="AppStoreImages">                              
<a href="https://play.google.com/store/apps/details?id=com.AlphaCollab.StarDive&hl=en">
<img width="64px" alt="Android app store" src = "GamePageImages/AndroidAppStore.png"/>
</a> 
<a href="https://itunes.apple.com/us/app/stardive/id991590335?mt=8">
<img width="64px" alt="Itunes app store"  src = "GamePageImages/ItunesAppStore.png"/>
</a>
</div>
');

contentContainer
('
<div class="GamePageDescription">
<b><h2>About StarDive</h2></b>
<br><p>StarDive was my first game that I created <b>completely by myself.</b> It took a total of <b>3 months</b> to complete. To me this game is a lot better than my very first game <a class ="TextLink" href= "AeroFlightPage.html">Aeroflight</a>, the developement process went very well because I planned everthing out 100% and made a prototype to make sure everything would work properly and be fun.</p><p>When I started this game, I actually knew how to program and establish a great workflow, so as an end result I was able to create a great game, probably my favorite game I have created so far. (As of 12/27/15)</p>
<br>
<h3>The description on the IOS app store</h3><br>
<p>
Encounter and destroy multiple different asteroids with numerous effects, Get paid by the government for eliminating the asteroids and use your money wisely to devise a strategy by building a powerful turret strong enough to erase the asteroids from existence.
</p>
<p>
Tap to shoot; hold for automatic. Don\'t get hit by the asteroids, and most of all, save the world from catastrophe. 
</p><p>
Hope you enjoy playing a completely free game. Free of ads, and free of In app purchases.
By playing this game you are supporting my hobby and my future.
</p>
</div>
');        
      
endContainerStyle();
endContent();

?>