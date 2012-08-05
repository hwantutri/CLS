<?php
session_start();
include_once 'class_login.php';
logout();
header( 'Location: http://www.yoursite.com/new_page.html' ) ;
?>