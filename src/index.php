<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/src/controller/DashbordController.php");

$controller = new HomeController();
$controller->index();