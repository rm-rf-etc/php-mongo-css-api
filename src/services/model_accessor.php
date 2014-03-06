<?php

/**
 * Intended to allow general access to models, flexibly updating
 * or inserting as requested.
 */
class ModelAccessor {

  private $collection_name = null;
  private $mongo = null;
  private $db = null;
  private $collection = null;

  public $data = null;

  /**
   */
  function __construct($params){

    $this->mongo = new MongoClient();
    $this->db = $this->mongo->{DB_NAME};

    $this->update($params);
  }

  /**
   */
  function update($params){

    if (isset($params['collection'])) {
      $collection = $params['collection'];
      $this->collection_name = $collection;
      $this->collection = $this->db->{$collection};
    }
    
    if (isset($params['_id']) AND $this->collection_name) {
      $id = (integer)$params['_id'];
      $this->data = $this->collection->findOne(['_id'=>$id]);
    }
    if (isset($params['_id']) AND isset($params['upsert'])) {
      $id = (integer)$params['_id'];
      $this->collection->update( ['_id'=>$id], ['$set'=>$params['upsert']], ['upsert'=>true] );
    }
  }

}

