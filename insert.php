<?php

//1. POSTデータ取得
$name = $_POST['book_name'];
$url = $_POST['book_url'];
$comment = $_POST['comment'];

//2. DB接続します
try {
    $db_name = '0706_kadai'; //データベース名を修正
    $db_id   = 'root';
    $db_pw   = '';
    $db_host = 'localhost';
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare(
    'INSERT INTO gs_bm_table(book_name, book_url, comment, datetime)
    VALUES (:book_name, :book_url, :comment, NOW());'
);

$stmt->bindValue(':book_name', $name, PDO::PARAM_STR);
$stmt->bindValue(':book_url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
// $status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: index.php');
    exit();
}
