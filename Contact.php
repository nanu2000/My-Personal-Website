<?php
include('Pages/GenericPage.php');

$contactPageInfo  = new PageInfo(NAV_OPTIONS::CONTACT_NAV_ID, '');
$contactPage      = new GenericPage($contactPageInfo); 

$contactPage->addContent(new GenericContent(function()
{
?>

<div class = "text_center generic_header_wrapper generic_header_title fade_in speed_5">Contact</div>
<div class = "generic_page_text text_center">
    <span class="generic_title_m fade_in speed_6">Richie Sikra</span>
    <div class = "fade_in speed_7">
        Email : <a href="mailto:richie@devrichie.com">richie@devrichie.com</a>
            
    </div>
</div>

<?php
}));

$contactPage->displayPage();

?>