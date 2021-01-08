<?php
$searchWord ='';
$searchWord = $_POST['word'];
$json = json_encode($searchWord);
session_start();
$name =$_SESSION['NAME'];
?>
<script type="text/javascript">
let js_searchWord = <?= $json; ?>
</script>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmark</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/search.js?1234"></script>
    <link rel="stylesheet" href="css/style_mypage.css?123">
</head>
<body>
<div class="header">
  <?= '<p>ようこそ '.$name.'さん</p>' ?>
  <form action="search.php" method="post" class="search">
    <input type="text" class="input" placeholder="<?php if($searchWord==''){echo "書籍を検索";} ?>" name="word" value="<?php if($searchWord!=''){echo $searchWord;} ?>">
    <button class="button" type="submit">検索</button>
  </form>
  <a href="logout.php">ログアウト</a>
  </div>
    <div class="main"></div>
</body>
</html>