<?php
include('Global.php');
include('FlexPortfolio.php');

startContentType(PAGE_CONTENT_TYPE::DEFAULT_PAGE, NAV_OPTIONS::HOME_NAV_ID, '', array("Styling/FrontPageStyle.min.css"));

echoPortfolio();

endDefaultContent();
?>