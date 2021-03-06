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
("GamePageImages/LightShowBanner.png", 
"project page banner");

$projectPage->addAppStoreImage  
("GamePageImages/GithubImage.png", 
"https://github.com/nanu2000/Light-Show-Engine", 
"Light Show Engine Github Page");

$projectPageContent    = new GenericContent(function()
{
?>



<div class = "text_center generic_header_wrapper generic_header_title">About the Lightshow Framework</div>  
<div class="generic_page_text">

<p>
The creation of this framework was started on the <b>23rd of December 2015</b>. The development came to a complete stop in <b>May, 2016</b> (~5 total months of development).
The development of this project was halted due to the fact that I wanted to focus on creating a game, and not a framework. 
</p>

<p>
In short form: the Lightshow framework has been completed,
but the game being made from/with this framework has not been completed.
</p>

<p>
<b>Here is a list of some of the frameworks current features :</b>
</p>

<ol class = "feature_list">
<li>3D skeletal animation with a custom binary exporter that reads .dae and .obj file types and exports my own custom binary file. (written in little endianness)</li>
<li>Directional shadow mapping</li>
<li>Runtime GLSL modifications</li>
<li>Implementation of Bullet Physics (with debug draw)</li>
<li>Audio and music support</li>
<li>Text rendering and custom binary file importer and exporter (with byte order swapping for big endian systems)</li>
<li>Phong shading</li>
<li>Point lights</li>
<li>Diffuse shading</li>
<li>Directional lights</li>
<li>Omnidirectional shadow mapping</li>
<li>Particle systems with instanced rendering</li>
</ol>

<p>
Make sure to check out my <a class ="TextLink" href="../<?php echo(NAV_OPTIONS::NEWEST_BLOG_POST_URL);?>">blog</a>  for more information regarding the game that I'm going to create with this framework.
</p>

</div>

<?php

});


$projectPage->addContent($projectPageContent);
$projectPage->displayPage();

?>