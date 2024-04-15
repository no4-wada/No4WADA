<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/style.css" type="text/css">
  <title>TodoList(追加)</title>
</head>

<body>

  <!-- 内容入力　-->
  <p><a class="title">ToDoList</a></p>
  <form method="post" action="add_send.php">
    <div>
      <p>タイトル</p>
    </div>
    <input type="text" name="title" required="required">
    <div>
      <p>内容</p>
    </div>
    <textarea name="content" cols="30" rows="5" required="required"></textarea>
    <br>
    <input type="submit" value="追加" class="btn_submit">
  </form>
  <a href="index.php"><span class="btn_a">TodoListへ戻る</span></a>

</body>

</html>