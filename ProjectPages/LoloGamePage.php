<?php
include('../Global.php');

startContentType(PAGE_CONTENT_TYPE::PROJECT_PAGE, NAV_OPTIONS::NOT_DEFINED_NAV_ID, '../');


startContentContainerHideSmallScreen();

?>

<img src = "GamePageImages/lolobigBanner.png" class ="project_page_banner" />


<?php
endContentContainer();
startContentContainer();
?>

<div class="app_store_images">
<div class="itch_io_wrapper">
<iframe src="https://itch.io/embed/45347" width="552" height="167" frameborder="0"></iframe>
</div>
</div>

<?php
endContentContainer();
startContentContainer();
?>

<div class = "text_center generic_header_wrapper generic_header_title">About The Adventures Lolo Recreated</div>
<div class="generic_page_text generic_page_text_end">
<p>This game was created and entered in the <a class = "TextLink" href="http://itch.io/jam/nes-box-art-jam">box art game jam of 2015</a>, it was submitted with 3 hours and 24 minutes before the deadline. This game was created in about one month with a few limitations such as only using 16 by 16 tiles with only 4 colors max on each tile (alpha, black and white count as colors too!). Overall I had a really fun time making this, and it was also my first game I have created using <b>my own engine.</b> I did a lot of planning for this game to be created, and used graph paper to rough draft all of the levels before they where implemented! This game was the first game I have ever entered in a game jam, and I think it turned out to be quite a success! :D</p>
<h3>The description on itch.io</h3>
<p>
This was created for the NES box art jam, I decided to use the box art from 'Adventures Of Lolo' to create this game. I have not played that game before, so I thought it would be fun!
It was my first game jam, and I have learned a lot from it. I still wish I could add on a little bit more to this game, but I think it is in a very complete form.</p><p>
It is based around the old style games, I only used 16 by 16 tiles, and used only 4 colors on each tile (even transparency counts as a color!) I also made sure to use the nes color pallet :D
I also only used 8 bit sound effects, and played around with SDL_Mixer, and made it only play low quality sounds as output. (No matter what audio file I use).
I created the game as a platformer, because when I was looking at the box art, I sort of felt that this is that type of game. I am not sure if I was correct or not, but that's the whole point of the box art jam, isn't it?
Anyway, there are a few things I would have added if I had more time like more levels, more art, more enemies and more characters, but no matter what, I feel like I have added enough to make this game pretty awesome.</p><p>I have used my own engine for this game, it runs with OpenGL, Box2D, SDL, SDL_mixer, and my own font rendering library
It was a lot of work and dedication, and I really had a great time making it, so I hope everyone who plays it will enjoy it as much as I have! 
</p>
</div>

<?php
endContentContainer();
endDefaultContent('../');
?>