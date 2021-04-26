<?php

  function listTableForeignKeys($table){
     $conn = Schema::getConnection()->getDoctrineSchemaManager();
     return array_map(function($key){
       return $key->getName();
     }, $conn->listTableForeignKeys($table));
  }

 ?>
