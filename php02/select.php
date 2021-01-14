<?php
//1.  DB接続します
include("funcs.php");
$pdo = dbcon();
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM f_db_con ORDER BY id DESC");
$status = $stmt->execute();



//
?>
<style>
table{
  width: 100%;
  border-spacing: 0;
}

table th{
  border-bottom: solid 2px #fb5144;
  padding: 10px 0;
}

table td{
  border-bottom: solid 2px #ddd;
  text-align: center;
  padding: 10px 0;
}
p{
  text-align: center;
  font-size: 20px;
}
</style>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    <p>データ一覧</p>
    <?php
    echo "<table border='3'>\n";
    echo "\t<tr><th>id</th><th>名前</th><th>住所</th><th>mail</th><th>tel</th><th>概要</th><th>内容</th><th>日時</th></tr>\n";
    if($status==false) {
      //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError".$error[2]);
  
  }else{
    while( $result = $stmt->fetch( PDO::FETCH_ASSOC ) ){
      echo "\t<tr>\n";
      echo "\t\t<td>{$result['id']}</td>\n";
      echo "\t\t<td>{$result['name']}</td>\n";
      echo "\t\t<td>{$result['address']}</td>\n";
      echo "\t\t<td>{$result['mail']}</td>\n";
      echo "\t\t<td>{$result['tel']}</td>\n";
      echo "\t\t<td>{$result['sel']}</td>\n";
      echo "\t\t<td>{$result['naiyou']}</td>\n";
      echo "\t\t<td>{$result['indate']}</td>\n";
      echo "\t</tr>\n";
  }
}
    echo "</table>\n";
    
    ?>
  </div>
</div>
</body>
</html>