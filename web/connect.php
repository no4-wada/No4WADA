<?php

use FTP\Connection as FTPConnection;

class Connection
{
  public $arr;
  public $Dsn;
  public $User;
  public $Password;
  public function __construct()
  {
    $arr = parse_ini_file("test.ini", true);
    $this->Dsn = $arr["Login"]["DSN"];
    $this->User = $arr["Login"]["User"];
    $this->Password = $arr["Login"]["Password"];
  }

  public function Connecter()
  {
    //接続
    try {
      $PDO = new PDO(

        $this->Dsn,

        $this->User,

        $this->Password,

        // レコード列名をキーとして取得させる
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
      );
      return $PDO;
    } catch (PDOException $e) {
      // エラー発生
      echo $e->getMessage();
      die();
    }
  }
}
