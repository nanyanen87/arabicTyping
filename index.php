<?php



  //"/"ならトップページを返す
  if($_SERVER['REQUEST_URI']=="/"){
    // require_once __DIR__."/../views/signUp.php";
    require_once __DIR__."/../views/index.html";
    // require_once __DIR__."/../views/top.php";
  }
  
$pathAndQuery = explode('?',$_SERVER['REQUEST_URI']);
$pathArray = explode('/', $pathAndQuery[0]);

// var_dump($_SERVER['REQUEST_URI']);

$queryParameters = $pathAndQuery[1];

$call = array();
foreach ($pathArray as $value) {
  if ($value !== "") {
      $call[] = $value;
  }
}

var_dump($call);

if($call[0]==="routes"){
  //文字の整形
  $fileName = ucwords($call[1])."Controller.php";
  // var_dump($fileName);
  //ファイルの存在確認と実行
  if (file_exists(__DIR__."/../routes/".$fileName)){
    include(__DIR__."/../routes/".$fileName);
  } else {
    echo "そんなファイルはありません";
    // include('./views/error.php');
  }
}elseif($call[0]==="views"){
  $fileName = ucwords($call[1]).".php";
  if (file_exists(__DIR__.'/../views/'.$fileName)) {
    include(__DIR__.'/../views/'.$fileName);
  } else {
    echo "そんなファイルはありません";
    // include('./views/error.php');
  }
}elseif($call[0]==="src"){
  $fileName = $call[1]+"/"+$call[2];
  if (file_exists(__DIR__."/../src/".$fileName)) {
    include(__DIR__."/../src/".$fileName);
  } else {
    echo "そんなファイルはありません";
    // include('./views/error.php');
  }
}


//大きなプロジェクトになると、モデルの中に様々なメソッドがあるのでまずはモデルをインスタンス化し、その中のメソッドを使う
// if (file_exists('./models/'.$call.'.php')) {

//   include('./models/'.$call.'.php');
//   //$call名のクラスをインスタンス化します
//   $class = new $call();
//   //modelのindexメソッドを呼ぶ仕様です
//   $ret = $class->index($pathArray);
//   //配列キーが設定されている配列なら展開します
//   if (!is_null($ret)) {
//     if(is_array($ret)){
//       extract($ret);
//     }
//   }
// }







