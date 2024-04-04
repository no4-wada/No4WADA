<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css" type="text/css">
    <title>TodoList</title>
</head>

<body>
    <?php
    $Id = $_GET['Id'];
    try {
        // DB接続
        $PDO = new PDO(
            // ホスト名、データベース名
            'mysql:host=host.docker.internal;dbname=TodoListSystem;',
            // ユーザー名
            'root',
            // パスワード
            '',
            // レコード列名をキーとして取得させる
            [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );

        // SQL文をセット
        $Stmt = $PDO->prepare('DELETE FROM TodoList WHERE id = :Id');

        // 値をセット
        $Stmt->bindValue(':Id', $id);

        // SQL実行
        $Stmt->execute();
        echo '<p>削除しました</p>';
    } catch (PDOException $e) {
        // エラー発生
        echo $e->getMessage();
    } finally {
        // DB接続を閉じる
        $PDO = null;
    }
    ?>
    <!-- リストへ戻るボタン -->
    <div class="btn-back"><button onclick="location.href='index.php'">TodoListへ戻る</button></div>

</body>

</html>