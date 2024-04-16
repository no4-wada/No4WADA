 <?php

  // pdo接続、関数ファイルの読み込み
  require_once("private/ToDoListDao.php");
  require_once("private/functions.php");


  $title = $_POST['title'];
  $content = $_POST['content'];
  $created = date('Y-m-d H:i:s');

  //バリテーション処理(入力制限)
  $isValidTitle = isValidTitle($title);
  $isValidContent = isValidContent($content);

  //DB接続クラスの実行
  if ($isValidTitle && $isValidContent) {
    $toDoListDao = new ToDoListDao();
    $toDoListDao->insert($title, $content, $created);
  }

  ?>
 <!DOCTYPE html>
 <html lang="ja">

 <head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="/style.css" type="text/css">
   <title>TodoList</title>
 </head>

 <body>
   <p class="title">ToDoList</p>
   <?php
    if (!$isValidTitle) {
    ?>
     <p>タイトルが20文字を超えている、もしくは使用できない文字を含んでいます。</p>

     <a href="index.php"><span class="btn_a">TodoListへ戻る</span></a>
   <?php
      exit();
    } else if (!$isValidContent) {
    ?>
     <p> 内容が200文字を超えている、もしくは使用できない文字を含んでいます。</p>

     <a href="index.php"><span class="btn_a">TodoListへ戻る</span></a>
   <?php
      exit();
    }

    ?>

   <!--登録内容確認・メッセージ (エスケープ処理含む)-->

   <p>タイトル: <?php echo escape($title); ?></p>

   <p>内容: <?php echo escape($content); ?></p>

   <p>上記の内容をデータベースへ登録しました。</p>

   <a href="index.php"><span class="btn_a">TodoListへ戻る</span></a>

 </body>

 </html>