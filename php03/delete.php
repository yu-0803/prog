<?php
//1. POSTデータ取得
$id  = $_GET["id"];//GETのidを取得


//2. DB接続します
//*** function化する！  *****************
include("funcs.php");
$pdo = dbcon();

//３．データ登録SQL作成
$sql = "DELETE FROM f_db_con WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
    sql_error($stmt);
}else{
    //*** function化する！*****************
    redirect("select.php");
}


?>
