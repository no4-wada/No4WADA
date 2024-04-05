<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css" type="text/css">
    <title>ToDoList</title>
</head>

<body>
    <p>ToDoList</p>
    <div class="btn-wrp">
        <button class="btn_add" onclick="location.href='add.php'">追加</button>
    </div>
    <br>
    <br>
    <?php
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
    <table bgcolor="#a9a9a9" cellspacing="2px" style="font-size:18px;">
        <tr bgcolor="#D3D3D3" style="height:36px;" align="center">
            <th width="100px">番号</th>
            <th width="150px">タイトル</th>
            <th width="500px">内容</th>
            <th width="250px">作成日</th>
            <th width="250px">更新日</th>
            <th width="150px"></th>
        </tr>
        <?php
        # <!-- 表示処理 -->
        while ($Row = $Stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr bgcolor="white" style="height:36px;" align="center">
                <td align="center"><?php echo $Row["Id"] ?></td>
                <td align="center"><?php echo $Row["Title"] ?></td>
                <td align="center"><?php echo $Row["Text"] ?></td>
                <td><?php echo $Row["Created"] ?></td>
                <td><?php echo $Row["Updated"] ?></td>
                <td>
                    <div class="btn-wrp"><button id="btn_upd" onclick="location.href='update.php?Id=<?php echo $Row['Id']; ?>'">編集</button>
                        <br> <a href="del.php?Id=<?php echo $Row['Id']; ?>"><button id="btn_del">削除</button></a>
                    </div>
                </td>
            </tr>

        <?php
        }
        #<!-- 接続を閉じる -->
        $Dbh = null;
        ?>
    </table>
</body>

</html>