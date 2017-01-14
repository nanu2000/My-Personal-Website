<?php
include('Global.php');

startContentType(PAGE_CONTENT_TYPE::DEFAULT_PAGE, NAV_OPTIONS::CONTACT_NAV_ID, '', array("Styling/ContactPageStyle.min.css"));
?>

<div class="non_flex_bg">
<div class = "text_center" id ="contact_page_title">Contact</div>
<p class = "contact_page_text">The best way to contact me is through email, but if you message me on Youtube or any other social media outlet I am still likey to answer, just not at a reasonable time.</p>
<p class = "contact_page_text"><b>Name</b>: Richie Sikra
<br>
<b>Email</b>: richie@devrichie.com</p>
</div>

<?php
endDefaultContent();
?>