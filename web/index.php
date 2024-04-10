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
    //エスケープ処理の関数
    function change($s)
    {
        return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
    }
    #Mysqlへの接続
    $Dsn      = 'mysql:dbname=TodoListSystem;host=host.docker.internal';
    $User     = 'root';
    $Password = '';

    #<!-- DBへ接続-->
    try {
        $Dbh = new PDO($Dsn, $User, $Password);

        #  <!-- クエリの実行 (Mysqlへの接続)-->
        $Query = "SELECT * FROM TodoList";
        $Stmt = $Dbh->query($Query);
    } catch (PDOException $e) {
        print("データベースの接続に失敗しました" . $e->getMessage());
        die();
    }
    ?>
    <!--テーブルの作成-->
    <table>
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
                        <?php echo change($Row["Title"]) ?>
                    </td>
                    <td>
                        <div class="left"><?php echo change($Row["Text"]) ?></div>
                    </td>
                    <td>
                        <?php echo $Row["Created"] ?>
                    </td>
                    <td>
                        <?php echo $Row["Updated"] ?>
                    </td>
                    <td>
                        <div class="btn_wrp"><a href="update.php?Id=<?php echo $Row['Id']; ?>"><button id="btn_upd">編集</button></a>
                            <br>
                            <a href="del.php?Id=<?php echo $Row['Id']; ?>"><button id="btn_del">削除</button></a>
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