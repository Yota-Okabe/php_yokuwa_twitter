<?php
require('../dbconnect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>つぶやき掲示板</title>
</head>
<body>
<div id="wrap">
    <div id="head">
        <h1>会員登録</h1>
    </div>
    <div id="content">
		<p>ユーザー登録が完了しました</p>
		<p><a href="../login.php">ログインする</a></p>
    </div>

</div>
</body>
</html>