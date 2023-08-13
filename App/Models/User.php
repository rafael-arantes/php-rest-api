<?php

  namespace App\Models;

use PDO;

  class User
  {
    private  static $table = "users";

    public static function select(int $id) {
      $connPDO = new PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

      $sql = 'SELECT * FROM '.self::$table . ' WHERE id = :id';
      // echo $sql;
      // die();
      $stmt = $connPDO->prepare($sql);
      $stmt->bindValue(":id", $id);
      $stmt->execute();

      if($stmt->rowCount() > 0) {
        return $stmt->fetch(\PDO::FETCH_ASSOC);
      } else {
        throw new \Exception("Nenhum usuário encontrado");
        
      }
    }

    public static function selectAll() {
      $connPDO = new PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

      $sql = 'SELECT * FROM '.self::$table;
      // echo $sql;
      // die();
      $stmt = $connPDO->prepare($sql);
      $stmt->execute();

      if($stmt->rowCount() > 0) {
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
      } else {
        throw new \Exception("Nenhum usuário encontrado");
        
      }
    }
  }

