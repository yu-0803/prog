<?php
session_start();
//POSTデータ取得
$name    = $_POST['name'];
$address = $_POST['address'];
$mail    = $_POST['mail'];
$tel     = $_POST['tel'];
$sel     = $_POST['sel'];
$naiyou  = $_POST['naiyou'];



//2. DB接続します
include("funcs.php");
$pdo = dbcon();

if(isset($name)){

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO f_db_con(name,address,mail,tel,sel,naiyou,indate)VALUES(:name,:address,:mail,:tel,:sel,:naiyou,sysdate())");
$stmt->bindValue(':name', $name,        PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':address', $address,  PDO::PARAM_STR);  
$stmt->bindValue(':mail', $mail,        PDO::PARAM_STR);  
$stmt->bindValue(':tel', $tel,          PDO::PARAM_STR);
$stmt->bindValue(':sel', $sel,          PDO::PARAM_STR);   
$stmt->bindValue(':naiyou', $naiyou,    PDO::PARAM_STR); 
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQLerror:".$error[2]);
}
}




?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $mail    = $_POST['mail'];
    $sel     = $_POST['sel'];
    $naiyou  = $_POST['naiyou'];
    $headers = "From: info.ftech@gmail.com";
    
    if(isset($_POST['send'])) {
    if(mb_send_mail($mail, $sel,$naiyou, $headers)){
        echo "メールを送信しました";
    } else {
        echo "メールの送信に失敗しました";
    }
  }
  ?>
</body>
</html>