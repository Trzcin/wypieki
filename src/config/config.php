<?php

define("APP_ROOT", dirname(__DIR__));

$hostname = getenv('SERVER_NAME');
$cleanup = explode('.', $hostname);
define("SITE_NAME", $cleanup[0]);
