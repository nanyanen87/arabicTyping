<?php

function name($email){
  return htmlspecialchars($email, ENT_QUOTES, 'utf-8');
}

session_start();
//ログイン済みの場合
if (isset($_SESSION['EMAIL'])) {
  echo 'ようこそ' .  name($_SESSION['EMAIL']) . "さん<br>";
  echo "<a href='/routes/logout'>ログアウトはこちら。</a>";
  exit;
}

 ?>

<!DOCTYPE html>
<html lang="ja">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <title>Login</title>
   <!-- Google icon font -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <!-- <link rel="stylesheet" href="/../src/css/signUp.css"> -->
 </head>
 <body>
  </form>
   <h6>ようこそ、ログインしてください。</h6>
   <form  action="/routes/login" method="post">
     <label for="email">email</label>
     <input type="email" name="email">
     <label for="password">password</label>
     <input type="password" name="password">
     <button type="submit">Sign In!</button>
   </form>
   <h6>初めての方はこちら</h6>
   <form action="/routes/signUp" method="post">
     <label for="email">email</label>
     <input type="email" name="email">email
     <label for="password">password</label>
     <input type="password" name="password">
     <button type="submit">Sign Up!</button>
     <p>※パスワードは半角英数字をそれぞれ１文字以上含んだ、８文字以上で設定してください。</p>
   </form>
   <!-- Materialize JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 </body>
</html>