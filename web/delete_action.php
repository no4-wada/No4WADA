   <!DOCTYPE html>
   <html lang="ja">

   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="/style.css" type="text/css">
     <title>TodoList</title>
   </head>

   <body>
     <?php
      //connect.phpの読み込み
      require_once("connect.php");
      $pdo_connect = new Connection();
      $PDO = $pdo_connect->Connecter();
      $Id = $_GET['Id'];
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
     <a href="todo_list_page.php"><span class="btn_a">TodoListへ戻る</span></a>
   </body>

   </html>