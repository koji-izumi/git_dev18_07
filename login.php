<?php

session_start();
$message='';
$success='';
//POSTのvalidate
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  $message= "入力された値は正しくありません。";
}

try {
    //ID:'root', Password: 'root'
    $pdo = new PDO('mysql:dbname=gs_chat_db;charset=utf8;host=localhost','root','root');
    $stmt = $pdo->prepare('select * from gs_users_table where email = ?');
    $stmt->execute([$_POST['email']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

//emailがDB内に存在しているか確認
if (!isset($row['email'])) {
    $message= 'メールアドレス又はパスワードが間違っています。';
  }
  //パスワード確認後sessionにメールアドレスを渡す
  if (password_verify($_POST['password'], $row['password'])) {
    session_regenerate_id(true); //session_idを新しく生成し、置き換える
    $_SESSION['EMAIL'] = $row['email'];
    $_SESSION['NAME'] = $row['name'];
    $_SESSION['ID']=$row['id'];
    header('Location: mypage.php');
  } else {
    $message= 'メールアドレス又はパスワードが間違っています。';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookmark</title>
  <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
<div class="form">
    <?php if($message!=''){
    echo '<h1 class="title">Error</h1>';
    }
    ?>
  <form>
    <div class="form-bottom">
    <?php if($message!=''){
    echo '<p class="message">'.$message.'</p>';
    }
    ?>
    </div>
    <?php if($message!=''){
    echo '<a href="index.php">戻る</a>';
    }
    ?>
  </form>
  </div>
</body>
</html>