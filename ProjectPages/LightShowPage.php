<?php
include('../global.php');
include('../Logo.php');
include('../NavBar.php');

startProjectPageContent();
outputLogo();

startContainerStyle();

displayNavbar(NAV_OPTIONS::NOT_DEFINED, "../");

contentContainer('<img src = "GamePageImages/LightShowBanner.png" class ="GamePageBanner" />');

contentContainer
(' 
    <div class="AppStoreImages">                              
    <a href="https://github.com/nanu2000/Light-Show-Engine">
        <img width="64px" alt="Android app store" src = "GamePageImages/GithubImage.png"/>
    </a>
    </div>
');

contentContainer
('test
');
                
      
endContainerStyle();
endContent();
?>