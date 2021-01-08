<?php

function h($s)
{
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();
//ログイン済みの場合
if (isset($_SESSION['EMAIL'])) {
  echo 'ようこそ' .  h($_SESSION['NAME']) . "さん<br>";
  echo "<a href='mypage.php'>マイページに戻る</a>";
  exit;
}

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
    <h1 class="title">Login</h1>
    <form action="login.php" method="post">
      <div class="form-top">
      <label for="email">E-mail</label>
      <input type="email" name="email" required>
      <label for="password">パスワード（8文字以上）</label>
      <input type="password" name="password" required>
      </div>
      <div class="form-bottom">
      <button type="submit">ログイン</button>
      <a href="signUp.php" target="_blank">初めての方はこちら</a>
      </div>
    </form>
  </div>
</body>

</html>