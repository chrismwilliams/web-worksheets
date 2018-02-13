<?php

class todoLists {
  protected $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function getListItems($listid) {
    $query = "SELECT * FROM list_items WHERE list_id = :listid";
    $pdo = $this->db->prepare($query);
    $pdo->bindParam(':listid', $listid);
    $pdo->execute();

    return $pdo->fetchAll();
  }

  public function addItemToList($listid, $itemName) {
    $sql = "INSERT INTO list_items (item_name, list_id) VALUES (:item_name, :id)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':item_name', $itemName);
    $stmt->bindParam(':id', $listid);
    $stmt->execute();
    return $this->db->lastInsertId();
  }
}