<?php

function staticPage($filename){

  $page_contents = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/src/views/' . $filename . '.html');

  return function($req, $res) use ($page_contents){
    $res->setFormat('text/html');
    $res->add($page_contents);
    $res->send(200);
  };
}
