
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
  <h1 class="title">Sign Up</h1>
  <form action="register.php" method="post">
    <div class="form-top">
    <label for="name">ログインネーム</label>
    <input type="text" name="name" required>
    <label for="email">E-mail</label>
    <input type="email" name="email" required>
    <label for="password">パスワード</label>
    <input type="password" name="password" required>
    </div>
    <div class="form-bottom">
    <button type="submit">登録</button>
    <p>※パスワードは半角英数字をそれぞれ１文字以上含んだ、８文字以上で設定してください。</p>
    <a href="index.php">トップページへ</a>
    </div>
  </form>

  
  </div>
</body>
</html>