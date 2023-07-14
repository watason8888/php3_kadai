<?php

//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//2. $id = $_POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更
$name = $_POST['book_name'];
$url = $_POST['book_url'];
$comment = $_POST['comment'];
// $content = $_POST['content'];
$id = $_POST['id'];
try {
    $db_name = '0706_kadai'; //データベース名
    $db_id   = 'root'; //アカウント名
    $db_pw   = ''; //パスワード：MAMPは'root'
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

//３．データ登録SQL作成

// UPDATE テーブル名 SET カラム1 = 1に保存したいもの、カラム2 = 2に保存したいもの,,,, WHERE 条件 id = 送られてきたid
// $stmt = $pdo->prepare('UPDATE gs_bm_table
//                         SET name = :book_name,
//                             url = :book_url,
//                             comment = :comment,
//                             indate = sysdate()
//                         WHERE id = :id;');
$stmt = $pdo->prepare('UPDATE gs_bm_table
            SET name = :book_name,
                book_url = :book_url,
                comment = :comment,
                indate = sysdate()
                WHERE id = :id;');
$stmt->bindValue(':book_name', $name, PDO::PARAM_STR);
$stmt->bindValue(':book_url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

// $status = $stmt->execute(); //実行

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: select.php');
    exit();
}