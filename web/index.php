<?php

// pdo接続、関数ファイルの読み込み
require_once("private/ToDoListDao.php");
require_once("private/functions.php");

#  <!-- クエリの実行 (Mysqlへの接続)-->
$toDoListDao = new toDoListDao();
$toDoList = $toDoListDao->findAll($sql);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/style.css" type="text/css">
  <title>ToDoList</title>
</head>

<body>
  <p>
    <a class="title">ToDoList</a>
  </p>
  <a href="add.php">
    <span class="btn_add btn_radius btn_cubic">
      追加
    </span>
  </a>
  <br>

  <!--テーブルの作成-->
  <table class="todo_list">
    <thead>
      <tr>
        <th width="150px">番号</th>
        <th width="300px">タイトル</th>
        <th width="800px">内容</th>
        <th width="300px">作成日</th>
        <th width="300px">更新日</th>
        <th width="150px"></th>
      </tr>
    </thead>
    <?php
    # <!-- テーブルデータ導入処理(エスケープ処理含む) -->
    foreach ($toDoList as $todo) {
    ?>
      <tbody>
        <tr>
          <td>
            <?php echo $todo["id"] ?>
          </td>
          <td>
            <?php echo escape($todo["title"]) ?>
          </td>
          <td>
            <div class="left"><?php echo escape($todo["content"]) ?></div>
          </td>
          <td>
            <?php echo $todo["created"] ?>
          </td>
          <td>
            <?php echo $todo["updated"] ?>
          </td>
          <td>
            <div class="btn_wrp">
              <a href="edit.php?id=<?php echo $todo['id']; ?>"><span class="btn_not_upd btn_a">編集</span></a>
              <br>
              <a href="delete.php?id=<?php echo $todo['id']; ?>"><span class="btn_del btn_a">削除</span></a>
            </div>
          </td>
        </tr>
      </tbody>
      </thead>
    <?php
    }
    ?>
  </table>
</body>

</html>