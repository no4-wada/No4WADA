<?php
$arr_ini = parse_ini_file("test.ini", true);
$Dsn = $arr_ini["Login"]["DSN"];
$User = $arr_ini["Login"]["User"];
$Password = $arr_ini["Login"]["Password"];
//接続
try {
  $PDO = new PDO(

    $Dsn,

    $User,

    $Password,

    // レコード列名をキーとして取得させる
    [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
  );
} catch (PDOException $e) {
  // エラー発生
  echo $e->getMessage();
  die();
}
