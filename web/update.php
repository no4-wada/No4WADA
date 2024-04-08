<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css" type="text/css">
    <title>TodoList(更新)</title>
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

        // Idで選択したカラムを持ってくる
        $Stmt = $PDO->prepare('SELECT * FROM TodoList WHERE Id = :Id');

        // 「:id」に対して値をセット
        $Stmt->bindValue(':Id', $Id);

        // SQL実行
        $Stmt->execute();

        // 取得したデータを出力
        foreach ($Stmt as $row) {
            //var_dump($row);
        }
    } catch (PDOException $e) {
        // エラー発生
        echo $e->getMessage();
    } finally {
        // DBを閉じる
        $pdo = null;
    }
    $Title = $row['Title'];
    $Text = $row['Text'];

    ?>
    <p>ToDoList</p>
    <form action="update_done.php" method="post">
        <p> タイトル: <br><input type="text" class="input-area" name="Title" placeholder="title" required="required" value="<?php echo $Title; ?>"> </p>
        <p> 内容: <br><input type="text" class="input-area" name="Text" placeholder="Text" required="required" value="<?php echo $Text; ?>"> </p>
        <input type="hidden" name="Id" value="<?php echo $Id; ?>">
        <input type="submit" value="更新">
    </form>

</body>

</html>