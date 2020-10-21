<?php
require_once(__DIR__.'/../data/config.php');
// use data;

session_start();
//POSTのvalidate
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  echo '入力された値が不正です。';
  return false;
}
//DB内でPOSTされたメールアドレスを検索
try {
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  $statement = $pdo->prepare('select * from userDeta where email = ?');
  $statement->execute([$_POST['email']]);
  $row = $statement->fetch(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
//emailがDB内に存在しているか確認
if (!isset($row['email'])) {
  echo 'メールアドレス又はパスワードが間違っています。';
  // return false;
  require_once __DIR__."/../views/signUp.php";
}
//パスワード確認後sessionにメールアドレスを渡す
if (password_verify($_POST['password'], $row['password'])) {
  session_regenerate_id(true); //session_idを新しく生成し、置き換える
  $_SESSION['EMAIL'] = $row['email'];
  echo 'ログインしました';
  include __DIR__."/../views/index.html";
} else {
  echo 'メールアドレス又はパスワードが間違っています。';
  // return false;
  require_once __DIR__."/../views/signUp.php";
}