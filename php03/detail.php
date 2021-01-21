<?php
//1.  DB接続します
include("funcs.php");
$pdo = dbcon();

//データ取得
$id =$_GET["id"];

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM f_db_con WHERE id=:id");
$stmt->bindValue(':id', $id,   PDO::PARAM_INT);
$status = $stmt->execute();

$view="";
if($status==false) {
sql_error();
}else{
    $r = $stmt->fetch();//1レコードわかっている場合の取得
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/contact.css" />
  <title>Document</title>
  <style type="text/css">
input:focus{background: #E0FFFF;}
input:required{background: #FF4F50;}
input:valid{background: transparent;} /* 入力内容が正しかった場合の指定 */
h1{text-align: center;
  margin-top: 18px;
}
  </style>
  <link rel="stylesheet"  href="con.css" />
</head>
<body>
<h1 id="contact"> CONTACT</h1>
<form method="POST" action="update.php"  enctype="multipart/form-data" >
  <div class = "cp_iptxt">
  <fieldset>
  <div class="Form">
  <div class="Form-Item">
    <p class="Form-Item-Label">
      <span class="Form-Item-Label-Required2">必須</span>お名前
    </p>
    <label><input type="text" name="name"  class="Form-Item-Input" placeholder="名前" value="<?=$r["name"]?>" ></label><br>
    </div>
    <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">任意</span>住所</p>
    <label><input type="text" name="address" class="Form-Item-Input" placeholder="札幌市〇〇区" value="<?=$r["address"]?>"></label><br>
    </div>
    <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required2">必須</span>メールアドレス</p>
    <label><input type="email" name="mail" class="Form-Item-Input" value="<?=$r["mail"]?>"></label><br>
    </div>
    <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">任意</span>電話番号</p>
    <label><input type="tel" name="tel" class="Form-Item-Input" value="<?=$r["tel"]?>"></label><br>
    </div>
    <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">任意</span>概要</p>
    <div class="cp_ipradio">
    <label><input type="radio" name="sel" class="option-input radio" value="ご相談"  required>ご相談<input type="radio" name="sel" class="option-input radio"  value="見積もり">見積もり<input type="radio" name="sel" class="option-input radio" value="その他">その他</label><br>
</div>
    </div>
    <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">任意</span>お問い合わせ</p>
    <label><textArea name="naiyou"  class="Form-Item-Textarea" ><?=$r["naiyou"]?></textArea></label><br>
    </div>
    <input type="hidden" name="id" value="<?=$r["id"]?>">
    <input type="submit" name="send" class="Form-Btn" value="更新する">
    </fieldset>
  </div>
</form>

  </div>
</body>
</html>

