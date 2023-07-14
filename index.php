<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>登録画面</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="update.php">データ登録</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend> ブックマークアプリ</legend>
                <label>書籍名：<input type="text" name="book_name"></label><br>
                <label >書籍URL：<input type="text" name="book_url"></label><br>
                <!-- <label>書籍コメント：<input type="text" name="book_comment"></label><br> -->
                <label>書籍コメント：<textarea name="comment" rows="4" cols="40"></textarea></label><br>
                <label>登録日時：<input type="date" name="datetime"></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
