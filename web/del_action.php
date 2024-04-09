   <!DOCTYPE html>
   <html lang="ja">

   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="/style.css" type="text/css">
     <title>TodoList</title>
   </head>

   <body>
     <?php
      //functions.phpの読み込み
      require_once("functions.php");
      //connect.phpの読み込み
      require_once("connect.php");

      $Id = $_GET['Id'];
      $arr_ini = parse_ini_file("test.ini", true);
      $Dsn      = $arr_ini["Login"]["DSN"];
      $User     = $arr_ini["Login"]["User"];
      $Password = $arr_ini["Login"]["Password"];
      try {
        // SQL文をセット(該当idのカラムを削除する)
        $Stmt = $PDO->prepare('DELETE FROM TodoList WHERE Id = :Id');

        // 値をセット
        $Stmt->bindValue(':Id', $Id);

        // SQL実行
        $Stmt->execute();
      ?>
       <p>削除しました</p>
     <?php
      } catch (PDOException $e) {

        // エラー発生
        echo $e->getMessage();
      } finally {

        // DB接続を閉じる
        $PDO = null;
      }
      ?>
     <button onclick="location.href='index.php'">TodoListへ戻る</button>
   </body>

   </html>