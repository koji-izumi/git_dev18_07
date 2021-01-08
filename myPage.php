<?php

function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();
//ログイン済みの場合
if (isset($_SESSION['EMAIL'])) {
  $name = h($_SESSION['NAME']);
}

//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_chat_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE user_id = :userID order by id DESC");
$stmt->bindValue(':userID', $_SESSION['ID'], PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
$bm_ISBN=Array();
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($bm_ISBN,h($result['ISBN']));
  }
  $js_bm_ISBN = json_encode($bm_ISBN);

}


?>
<script type="text/javascript">
let js_bm_ISBN = <?= $js_bm_ISBN; ?>
</script>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmark</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/myPage.js?123"></script>
    <link rel="stylesheet" href="css/style_mypage.css">
</head>
<body>
  <div class="header">
  <?= '<p>ようこそ '.$name.'さん</p>' ?>
  <form action="search.php" method="post" class="search" target="_blank">
    <input type="text" class="input" placeholder="書籍を検索" name="word">
    <button class="button" type="submit">検索</button>
  </form>
  <a href="logout.php">ログアウト</a>
  </div>
  <div class="main">
    <div class="main-top">
      <h1>ブックマークした書籍</h1>
    </div>
    <div class="main-bm"></div>
  </div>
</body>
</html>