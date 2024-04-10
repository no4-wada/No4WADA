<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/style.css" type="text/css">
  <title>TodoList(追加)</title>
</head>

<body>

  <!-- 内容入力　-->
  <h2>ToDoList</h2>
  <form method="post" action="add_send.php">
    <div>
      <h2>タイトル</h2>
    </div>
    <input type="text" name="Title" required="required">
    <div>
      <h2> 内容</h2>
    </div>
    <textarea name="Text" cols="30" rows="5" required="required"></textarea>
    <br>
    <input type="submit" value="追加">
  </form>
  <button onclick="location.href='todo_list_page.php'">TodoListへ戻る</button>

</body>

</html>