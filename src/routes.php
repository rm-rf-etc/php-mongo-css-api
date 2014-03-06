<?php

$router = new Zaphpa_Router();
$router->attach('ZaphpaAutoDocumentator', '/apidocs'); //auto-docs middleware
$router->addRoute(array(
  'path'  => '/{collection}/{id}',
  'get'   => array('StyleCtrl', 'get'),
  'post'  => array('StyleCtrl', 'post'),
  'delete'  => array('StyleCtrl', 'delete'),
));


$router->addRoute(array(
  'path' => '/home',
  'get'  => staticPage('home'),
));
$router->route();

