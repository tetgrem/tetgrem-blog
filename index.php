<?php

session_start();

require_once  __DIR__ . "/vendor/autoload.php";

require_once __DIR__ . '/router/router.php';

\App\Services\DB_connect::db_connect();