<?php
include "../setting/config.php";

app_session_start();
$_SESSION = array();
session_destroy();

app_redirect('../index.php');
