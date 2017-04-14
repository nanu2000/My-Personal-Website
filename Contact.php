<?php
include('Pages/GenericPage.php');

$contactPageInfo  = new PageInfo(NAV_OPTIONS::CONTACT_NAV_ID, '');
$contactPage      = new GenericPage($contactPageInfo); 

$contactPage->addContent(new GenericContent(function()
{
?>

<div class = "text_center generic_header_wrapper generic_header_title" >Contact</div>
<div class = "generic_page_text">
<p>The best way to contact me is through email, but if you message me on Youtube or any other social media outlet I am still likey to answer, just not at a reasonable time.</p>
<p><b>Name</b>: Richie Sikra
<br>
<b>Email</b>: richie@devrichie.com</p>
</div>

<?php
}));

$contactPage->displayPage();

?>