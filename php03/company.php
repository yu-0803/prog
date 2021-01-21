<?php
include('header.php');
?>
<style>
.kaisha {
width: 100%;
}

.kaisha th,
.kaisha td {
border: 1px solid #ccc;
padding: 20px;
}

.kaisha th {
font-weight: bold;
background-color: #dedede; 
}

@media screen and (max-width: 767px) {
.kaisha,
.kaisha tr,
.kaisha td,
.kaisha th {display:block;}
.kaisha th {width:auto;}
}

</style>
<main>
<body>

<div id="container">
<table class="kaisha">
<tr>
<th>会社名</th>
<td>レスポンシブテーブル株式会社</td>
</tr>
<tr>
<th>所在地</th>
<td>愛知県名古屋市中区栄0-0-0</td>
</tr>
<tr>
<th>電話</th>
<td>052-0000-0000</td>
</tr>
<tr>
<th>内容</th>
<td>会社概要などでよく使う、レスポンシブデザインに対応したテーブルの作成</td>
</tr>
</table>
</div>
</body>
</main>

<?php include('footer.php');