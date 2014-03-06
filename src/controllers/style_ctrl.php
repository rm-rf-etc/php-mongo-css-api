<?php

class StyleCtrl extends BaseController {

  /**
   */
  function get($req, $res){
    $this->with($req, $res);

    $id = $this->id;
    $collection = $this->collection;

    $doc = new ModelAccessor([
      'collection' => $collection,
      'id' => $id,
    ]);
    
    if ($doc) {
      $this->end(200, $collection."\n".$id, 'text');
    } else {
      $this->end(500, 'error 500', 'text');
    }
  }



  /**
   * For both update and create.
   */
  function post($req, $res){
    $this->with($req, $res);
    unset($req->data['_RAW_HTTP_DATA']);

    $doc = new ModelAccessor([
      '_id' => $this->id,
      'collection' => $this->collection,
      'upsert' => $this->req->data,
    ]);

    $this->end(201, json_encode($req->data), 'json');
  }



  /**
   */
  function delete($req, $res){
    $this->with($req, $res);

    $id = $this->id;
    $collection = $this->collection;

    $doc = new ModelAccessor([
      'collection' => $collection,
      'id' => $id,
    ]);

    if ($doc) {
      $doc->remove();
      $code = 200;
      $msg = "$id deleted from $collection.";
    } else {
      $code = 404;
      $msg = "Collection or id not found.";
    }

    $this->end($code, $msg, 'text');
  }
}
