<?php
include('../Global.php');

startContentType(PAGE_CONTENT_TYPE::PROJECT_PAGE, NAV_OPTIONS::NOT_DEFINED_NAV_ID, '../');

startContentContainer();
?>

<div class = "text_center generic_header_wrapper generic_header_title"> 
My Current Project 
</div>
<div class="project_page_description">
<p> 
You can follow my <a class ="TextLink" href="../<?php echo(NAV_OPTIONS::NEWEST_BLOG_POST_URL);?>">blog</a> (which will have weekly/monthly posts starting 12/30/15)
for more information regarding the development of this project.
</p>
</div>


<?php
endContentContainer();
endDefaultContent('../');
?>