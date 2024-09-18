<?php
require "../load.php";
$ObjLayouts->heading();
$ObjMenus->main_menu();
$conn->getConnection();
$ObjSignup->signup_form();
?>
