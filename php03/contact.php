
<head>
  
  <link rel="stylesheet" href="css/contact.css" />
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
<form method="POST" action="insert.php"  enctype="multipart/form-data" >
  <div class = "cp_iptxt">
  <fieldset>
  <div class="Form">
  <div class="Form-Item">
    <p class="Form-Item-Label">
      <span class="Form-Item-Label-Required2">必須</span>お名前
    </p>
    <label><input type="text" name="name"  class="Form-Item-Input" placeholder="名前" required ></label><br>
    </div>
    <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">任意</span>住所</p>
    <label><input type="text" name="address" class="Form-Item-Input" placeholder="札幌市〇〇区"></label><br>
    </div>
    <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required2">必須</span>メールアドレス</p>
    <label><input type="email" name="mail" class="Form-Item-Input" placeholder="〇〇＠〇〇" required></label><br>
    </div>
    <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">任意</span>電話番号</p>
    <label><input type="tel" name="tel" class="Form-Item-Input" placeholder="000-0000-0000"></label><br>
    </div>
    <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">任意</span>概要</p>
    <div class="cp_ipradio">
    <label><input type="radio" name="sel" class="option-input radio" value="ご相談"  required>ご相談<input type="radio" name="sel" class="option-input radio"  value="見積もり">見積もり<input type="radio" name="sel" class="option-input radio" value="その他">その他</label><br>
</div>
    </div>
    <div class="Form-Item">
    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">任意</span>お問い合わせ</p>
    <label><textArea name="naiyou"  class="Form-Item-Textarea" placeholder="例  壁紙の貼り替えを検討しています。１７時以降の方が連絡つきます。"></textArea></label><br>
    </div>
    
    <input type="submit" name="send" class="Form-Btn" value="送信する">
    </fieldset>
  </div>
</form>

  </div>
</body>
</html>