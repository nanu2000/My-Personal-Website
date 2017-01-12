<?php
require_once('../Global.php');
include('../Logo.php');
include('../NavBar.php');

startProjectPageContent();
outputLogo();

startContainerStyle();

displayNavbar(NAV_OPTIONS::NOT_DEFINED_NAV_ID, "../");

startContentContainerHideSmallScreen();

?>

<img src = "GamePageImages/StarDiveBigBanner.png" class ="GamePageBanner" />

<?php
endContentContainer();
startContentContainer();
?>

<div class="AppStoreImages">                              
<a href="https://play.google.com/store/apps/details?id=com.AlphaCollab.StarDive&hl=en">
<img width="64" alt="Android app store" src = "GamePageImages/AndroidAppStore.png"/>
</a> 
<a href="https://itunes.apple.com/us/app/stardive/id991590335?mt=8">
<img width="64" alt="Itunes app store"  src = "GamePageImages/ItunesAppStore.png"/>
</a>
</div>

<?php
endContentContainer();
startContentContainer();
?>

<div class = "ProjectPageTitle textCenter">About StarDive</div>
<div class="GamePageDescription">
<p>
StarDive was my first game that I created <b>completely by myself.</b> It took a total of <b>3 months</b> to complete. To me this game is a lot better than my very first game <a class ="TextLink" href= "AeroFlightPage.html">Aeroflight</a>, the development process went very well because I planned everything out 100% and made a prototype to make sure everything would work properly and be fun.</p>
<p>When I started this game, I actually knew how to program and establish a great work-flow, so as an end result I was able to create a great game, probably my favorite game I have created so far. (As of 12/27/15)
</p>
<h3>The description on the IOS app store</h3>
<p>
Encounter and destroy multiple different asteroids with numerous effects, Get paid by the government for eliminating the asteroids and use your money wisely to devise a strategy by building a powerful turret strong enough to erase the asteroids from existence.
</p>
<p>
Tap to shoot; hold for automatic. Don't get hit by the asteroids, and most of all, save the world from catastrophe. 
</p>
<p>
Hope you enjoy playing a completely free game. Free of ads, and free of In app purchases.
By playing this game you are supporting my hobby and my future.
</p>
</div>

<?php
endContentContainer();
endContainerStyle();
endProjectPageContent();
?>