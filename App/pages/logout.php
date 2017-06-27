<?php //Logout page
session_destroy();
header('LOCATION: '.$base);
?>
