<?php
require '../../vendor/autoload.php';

require_once '../config/config.php';
require_once '../core/Database.php';
require_once '../core/FrontController.php';
require_once '../core/Controller.php';

session_start();
new FrontController();
