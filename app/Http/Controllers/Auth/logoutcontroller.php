<?php
session_start();
session_destroy();
require_once "../../../../config/config.php";
$_SESSION['id'] = "";
$_SESSION['username'] = "";
$_SESSION['is_logged_in'] = false;
header('location: '.$base_url.'./index.php');