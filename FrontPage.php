<?php
include('Global.php');
include('FlexPortfolio.php');

startContentType(PAGE_CONTENT_TYPE::DEFAULT_PAGE, NAV_OPTIONS::HOME_NAV_ID, '', array("Styling/FrontPageStyle.min.css"));

startContentContainer();
?>


<div class = "text_center generic_header_wrapper generic_header_title">Welcome!</div>

<?php
endContentContainer(); 
startContentContainer();
?>

<div class ="front_page_text">
    
<p class = "text_center generic_page_text">
    <b>The text below is meant to test the layout of this page. It is temporary and will be replaced soon.</b>
</p>

<p  class = "generic_page_text">
    Lorem ipsum dolor sit amet, <b>consectetur</b> adipiscing elit. Aliquam lorem orci, maximus sed arcu et, ornare feugiat nisi. Nulla aliquam tortor a porttitor condimentum. Integer scelerisque nunc semper urna feugiat mattis. Fusce id lobortis libero, sollicitudin imperdiet sem. Cum sociis natoque penatibus et <b>magnis dis parturient montes</b>, nascetur ridiculus mus. Nunc libero justo, ultrices et nibh a, placerat ultrices ante. Proin elementum feugiat placerat. Nam sit amet nisl purus. Aliquam sed nisl id metus ultricies gravida. Morbi augue nibh, placerat eu eros eget, lobortis gravida felis. Integer faucibus dui non ex ultrices, in <b>consectetur leo varius.</b> Proin sit amet tellus et elit commodo condimentum. Fusce ac est ornare, semper nisl eget, lacinia sapien. Proin sed aliquam lectus, sed imperdiet ligula. Integer dictum aliquet metus.
</p>

<p class = "generic_page_text">
    Lorem ipsum dolor sit amet, <b>consectetur</b> adipiscing elit. Aliquam lorem orci, maximus sed arcu et, ornare feugiat nisi. Nulla aliquam tortor a porttitor condimentum. Integer scelerisque nunc semper urna feugiat mattis. Fusce id lobortis libero, sollicitudin imperdiet sem. Cum sociis natoque penatibus et <b>magnis dis parturient montes</b>, nascetur ridiculus mus. Nunc libero justo, ultrices et nibh a, placerat ultrices ante. Proin elementum feugiat placerat. Nam sit amet nisl purus. Aliquam sed nisl id metus ultricies gravida. Morbi augue nibh, placerat eu eros eget, lobortis gravida felis. Integer faucibus dui non ex ultrices, in <b>consectetur leo varius.</b> Proin sit amet tellus et elit commodo condimentum. Fusce ac est ornare, semper nisl eget, lacinia sapien. Proin sed aliquam lectus, sed imperdiet ligula. Integer dictum aliquet metus.
</p>

</div>


<?php
endContentContainer();
echoPortfolio();
endDefaultContent();
?>