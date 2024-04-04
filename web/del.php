<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css" type="text/css">
    <title>TodoList</title>
</head>
 
<body>
<?php
    $id = $_GET['Id'];
    try {
      // DB接続
        $pdo = new PDO(
            // ホスト名、データベース名
            'mysql:host=host.docker.interminal;dbname=TodoListSystem;',
            // ユーザー名
            'root',
            // パスワード
            '',
            // レコード列名をキーとして取得させる
            [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
   
        // SQL文をセット
        $stmt = $pdo->prepare('DELETE FROM TodoList WHERE id = :Id');
   
        // 値をセット
        $stmt->bindValue(':Id', $id);
   
        // SQL実行
        $stmt->execute();
        echo '<p>削除しました</p>';
?>
        <!-- リストへ戻るボタン -->
        <div class="btn-back"><button onclick="location.href='index.php'" >TodoListへ戻る</button></div>
        <?php
    } catch (PDOException $e) {
        // エラー発生
        echo $e->getMessage();

    } finally {
      // DB接続を閉じる
        $pdo = null;
    }
        ?>
</body>
 
</html>