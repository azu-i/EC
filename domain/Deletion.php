<?php
 class Deletion
 {
   private $id;
   private $pdo;

   public function __construct($id, $pdo)
   {
    $this->id = $id;
    $this->pdo = $pdo;  
   }

   public function delete()
   {
      $st = $this->pdo->query("DELETE FROM goods WHERE id={$this->id}");
      return $st;
   }
 }
?>