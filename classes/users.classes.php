<?php

class users
{
  protected $db = null;

  public function __construct($db)
  {
    $this->db = $db;
  }

  public function registerUser($email, $password)
  {
    $encryptedPass = password_hash($password, PASSWORD_DEFAULT);

    // INSERT DB
    $query = "INSERT INTO users (user_email, user_password) VALUES (:email, :password)";
    $pdo = $this->db->prepare($query);
    $pdo->bindParam(':email', $email);
    $pdo->bindParam(':password', $encryptedPass);
    $pdo->execute();

    return $this->db->lastInsertId();
  }
}