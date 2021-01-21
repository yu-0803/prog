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
  
  sql_error($stmt);
}else{
  redirect("index.php");
}
}




?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
  *,
*:before,
*:after {
  -webkit-box-sizing: inherit;
  box-sizing: inherit;
}

html {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  font-size: 62.5%;
}

.btn,
a.btn,
button.btn {
  font-size: 1.6rem;
  font-weight: 700;
  line-height: 1.5;
  position: relative;
  display: inline-block;
  padding: 1rem 4rem;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  text-align: center;
  vertical-align: middle;
  text-decoration: none;
  letter-spacing: 0.1em;
  color: #212529;
  border-radius: 0.5rem;
}

a.btn--yellow {
  color: #000;
  background-color: #fff100;
  border-bottom: 5px solid #ccc100;
}

a.btn--yellow:hover {
  margin-top: 3px;
  color: #000;
  background: #fff20a;
  border-bottom: 2px solid #ccc100;
}
body{
  font-size: 20px;
  text-align: center;
}

  </style>

</head>
<body>
<?php
mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $name    = $_POST['name'];
    $address = $_POST['address'];
    $mail    = $_POST['mail'];
    $tel     = $_POST['tel'];
    $sel     = $_POST['sel'];
    $naiyou  = $_POST['naiyou'];
    $headers = "From: info.ftech@gmail.com";
    $mailinfo= "$address,$tel,$naiyou";

    if(isset($_POST['send'])) {
    if(mb_send_mail($mail, $sel, $mailinfo, $headers)){
      
        echo "お問い合わせありがとうございます。確認メールを送らせて頂きました。",'<br>';
        echo "担当者からご連絡させて頂きますのでしばらくお待ちください。";
    } else {
        echo "メールの送信に失敗しました";
    }
  }

  ?>
<br>
<a href="index.php" class="btn btn--yellow btn--cubic">戻る</a>
</body>
</html>