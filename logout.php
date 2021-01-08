<?php
session_start();
$output = '';
if (isset($_SESSION["EMAIL"])) {
  $output = 'ログアウトしました。';
} else {
  $output = 'セッションがタイムアウトしました。';
}
//セッション変数のクリア
$_SESSION = array();
//セッションクッキーも削除
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
//セッションクリア
@session_destroy();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookmark</title>
  <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
<div class="form">
  <h1 class="title">Logout</h1>
  <form>
    <div class="form-bottom">
    <?= '<p class="message">'.$output.'</p>';?>
    </div>
    <a href="index.php">トップページへ</a>
  </form>
  </div>
</body>
</html>