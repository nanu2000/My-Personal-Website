<?php
include('../Pages/ProjectPage.php');

$projectPageInfo = new PageInfo
(
    NAV_OPTIONS::NOT_DEFINED_NAV_ID,
    '../',
    array('../Styling/GamePageStyle.min.css')
);

$projectPage       = new ProjectPage($projectPageInfo); 

$projectPage->setBannerImage    
("GamePageImages/aeroflightbigBanner.png", 
"project page banner");

$projectPage->addAppStoreImage  
("GamePageImages/AmazonAppStore.png", 
"http://www.amazon.com/Richie-Sikra-AeroFlight/dp/B00VJ71HTQ", 
"Amazon app store");

$projectPage->addAppStoreImage  
("GamePageImages/AndroidAppStore.png", 
"https://play.google.com/store/apps/details?id=com.AlphaEntertaiment.glider&amp;hl=en", 
"Android app store");

$projectPage->addAppStoreImage  
("GamePageImages/ItunesAppStore.png", 
"https://itunes.apple.com/us/app/aeroflight!/id974469365?ls=1&amp;mt=8", 
"Itunes app store");

$projectPageContent    = new GenericContent(function()
{
?>

    <div class = "text_center generic_header_wrapper generic_header_title">About Aeroflight</div>
    <div class="generic_page_text">
    <p>Aeroflight was my first game, I put a lot of effort into making it and spent a grand total of <b>7 Months</b> creating it. I had some help from some of my friends <b>Patrick oliver</b> and <b>Chris Rasmussen</b> who created some of the images and helped brainstorm with the ideas.</p><p>This game was published on the IOS app store, the Android app store, and the Amazon app store. The target platform was IOS and android devices (Tablets and phones). After creating this "small" game, I realized how tough it was to create a game, but I also realized how fun it was (for me) at the same time. I am very proud of this creation, because even though it might not be the best it is my first game and to me it is a huge accomplishment</p>
    <p><b>The description on the IOS app store</b></p>
    <p>We don't want to make any of the players bored with content, so we didn't just stick to the plain and simple grasslands, desert, forest and beach.
    We have beautiful scenic mountains and waterfall landscapes, an exclusive glowing mushroom biome, a city map and scenic suburbs! and so much more.
    We also have boosts to keep you entertained! money magnet, fire resistance, a force field, and of course a speed boost!
    Multiple different gliders to choose from, bamboo, metal, obsidian, a kite, speed enhanced, and some that are unknown to man kind.
    </p><p>         
    But, with all that excitement, there are enemies to try and mess you up...
    A thief that steals your money mid-flight, annoying birds that get in the way, some fish in water, and even helicopters!
    </p><p>
    It's pretty simple to play, just tap the left and right side of the screen to move up and down!
    hit the boost located near the bottom center of the screen to boost! buy more fuel in the shop with money you collect in the air!</p>
    </div>

<?php    
});


$projectPage->addContent($projectPageContent);
$projectPage->displayPage();


?>