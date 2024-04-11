 <!DOCTYPE html>
 <html lang="ja">

 <head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="/style.css" type="text/css">
   <title>TodoList</title>
 </head>

 <body>
   <?php
    // PDO接続、関数ファイルの読み込み
    $Id = $_GET['Id'];
    require_once("connect.php");
    require_once("security.php");
    try {

      // Idで選択したカラムを持ってくる
      $Stmt = $PDO->prepare('SELECT * FROM TodoList WHERE Id = :Id');

      // 「:id」に対して値をセット
      $Stmt->bindValue(':Id', $Id);

      // SQL実行
      $Stmt->execute();
      foreach ($Stmt as $row) {
        //var_dump($row);
      }
    } catch (PDOException $e) {
      // エラー発生
      echo $e->getMessage();
    } finally {
      // DBを閉じる
      $PDO = null;
    }
    $Title = $row['Title'];
    $Text = $row['Text'];
    ?>
   <p>本当に削除してよろしいですか？</p>

   <form action="delete_action.php?Id=<?php echo $Id; ?>" method="post">
     <p> タイトル: <?php echo escape($Title); ?></p>
     <p> 内容: <?php echo escape($Text); ?></p>
     <br>
     <!-- 削除　-->
     <input type="submit" name="remove" value="削除" class="btn_submit">
   </form>

   <!-- リストへ戻るボタン -->
   <button class="btn_back" onclick="location.href='todo_list_page.php'">いいえ</button>
 </body>

 </html>