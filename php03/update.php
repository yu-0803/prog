<?php
//POSTデータ取得
$name    = $_POST['name'];
$address = $_POST['address'];
$mail    = $_POST['mail'];
$tel     = $_POST['tel'];
$sel     = $_POST['sel'];
$naiyou  = $_POST['naiyou'];
$id      = $_POST['id'];



//2. DB接続します
include("funcs.php");
$pdo = dbcon();



//３．データ登録SQL作成
$sql  = "UPDATE f_db_con SET name=:name,address=:address,mail=:mail,tel=:tel,sel=:sel,naiyou=:naiyou WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name,        PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':address', $address,  PDO::PARAM_STR);  
$stmt->bindValue(':mail', $mail,        PDO::PARAM_STR);  
$stmt->bindValue(':tel', $tel,          PDO::PARAM_STR);
$stmt->bindValue(':sel', $sel,          PDO::PARAM_STR);   
$stmt->bindValue(':naiyou', $naiyou,    PDO::PARAM_STR);
$stmt->bindValue(':id', $id,            PDO::PARAM_INT);  
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  
  sql_error($stmt);
}else{
  redirect("select.php");
}





?>
