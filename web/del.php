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
    ?>
    <p>本当に削除してよろしいですか？</p>

    <form action="del_action.php?Id=<?php echo $Id; ?>" method="post">

        <!-- 削除番号指定 -->
        削除する番号：<input type="text" name="Id" value=<?= $Id ?>>
        <br>

        <!-- 削除　-->
        <input type="submit" name="remove" value="削除">
    </form>

    <!-- リストへ戻るボタン -->
    <div class="btn_back">
        <a href="index.php"><button name="btn_not_remove">いいえ</button></a>
    </div>
</body>

</html>