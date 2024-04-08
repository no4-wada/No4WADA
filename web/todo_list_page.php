<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/style.css" type="text/css">
  <title>ToDoList</title>
</head>

<body>
  <p>ToDoList</p>
  <button class="btn_add" onclick="location.href='add.php'">追加</button>
  <br>
  <?php
  // PDO接続、関数ファイルの読み込み
  require_once("connect.php");
  require_once("security.php");

  #<!-- DBへ接続-->
  try {
    #  <!-- クエリの実行 (Mysqlへの接続)-->
    $Query = "SELECT * FROM TodoList";
    $Stmt = $PDO->query($Query);
  } catch (PDOException $e) {
    print("データベースの接続に失敗しました" . $e->getMessage());
    die();
  }
  ?>
  <!--テーブルの作成-->
  <table class="todo-list">
    <thead>
      <tr>
        <th width="100px">番号</th>
        <th width="150px">タイトル</th>
        <th width="500px">内容</th>
        <th width="250px">作成日</th>
        <th width="250px">更新日</th>
        <th width="150px"></th>
      </tr>
    </thead>
    <?php
    # <!-- テーブルデータ導入処理(エスケープ処理含む) -->
    while ($Row = $Stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
      <tbody>
        <tr>
          <td>
            <?php echo $Row["Id"] ?>
          </td>
          <td>
            <?php echo escape($Row["Title"]) ?>
          </td>
          <td>
            <div class="left"><?php echo escape($Row["Text"]) ?></div>
          </td>
          <td>
            <?php echo $Row["Created"] ?></div>
          </td>
          <td>
            <div class="center"><?php echo $Row["Updated"] ?></div>
          </td>
          <td>
            <div class="btn-wrp">
              <a href="edit.php?Id=<?php echo $Row['Id']; ?>"><span class="btn_not_upd">編集</span></a>
              <br>
              <a href="delete.php?Id=<?php echo $Row['Id']; ?>"><span class="btn_del">削除</span></a>
            </div>
          </td>
        </tr>
      </tbody>

    <?php
    }
    #<!-- 接続を閉じる -->
    $Dbh = null;
    ?>
  </table>
</body>

</html>