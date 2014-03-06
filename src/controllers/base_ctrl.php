<?php

class BaseController {

  public $req;
  public $res;
  public $id;
  public $collection;

  function with($req, $res){
    $this->req = $req;
    $this->res = $res;
    $this->id = $req->params['id'];
    $this->collection = $req->params['collection'];
    // die( var_dump($req->data) );
  }

  function id(){ return $this->id; }
  function collection(){ return $this->collection; }
  function req_data(){ return $this->req->data; }
  
  function end($code, $msg, $format){
    $this->res->setFormat('text');
    $this->res->add($msg);
    $this->res->send($code);
  }
}
