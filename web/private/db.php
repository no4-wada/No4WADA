<?php

// クラスToDoListDao
class db
{
  private $pdo;

  // iniファイルから各パラメータを取得(クラス呼び出し時に自動で実行)
  public function __construct()
  {
    $arr = parse_ini_file("config.ini", true);
    $dsn = $arr["Login"]["DSN"];
    $user = $arr["Login"]["User"];
    $password = $arr["Login"]["Password"];
    //pdo接続のセットアップ
    try {
      $this->pdo = new pdo(

        $dsn,

        $user,

        $password,

        // レコード列名をキーとして取得させる
        [pdo::ATTR_DEFAULT_FETCH_MODE => pdo::FETCH_ASSOC]
      );
    } catch (pdoException $e) {
      // エラー発生
      echo $e->getMessage();
      die();
    }
  }

  /**
   * select文の実行
   */
  public function select($sql, $params = null)
  {
    try {
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($params);
      return $stmt->fetchALL(pdo::FETCH_ASSOC);
    } catch (PDOException $e) {
      print("データベースの接続に失敗しました" . $e->getMessage());
      die();
    }
  }

  /**
   *  insert文の実行
   */
  public function insert($sql, $params)
  {
    $this->write($sql, $params);
  }



  /**
   *  delete文の実行
   */
  public function delete($sql, $params)
  {
    $this->write($sql, $params);
  }

  /**
   * update文実行
   */
  public function update($sql, $params)
  {
    // Log::debug("update:" . $sql)
    $this->write($sql, $params);
  }

  /**
   *  write文の実行
   */
  public function write($sql, $params)
  {
    try {
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($params);
    } catch (PDOException $e) {
      print("データベースの接続に失敗しました" . $e->getMessage());
      die();
    }
  }
}
