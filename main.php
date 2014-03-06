<?php

define('DB_NAME', 'test'); // loaded from config file...

require_once(__DIR__ . '/zaphpa.lib.php');

foreach (glob(__DIR__ . '/src/controllers/*.php') as $filename) { include $filename; }
foreach (glob(__DIR__ . '/src/services/*.php') as $filename) { include $filename; }

require_once('src/routes.php');

