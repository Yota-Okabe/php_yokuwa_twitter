<?php

try {
    $db = new PDO('mysql:dbname=yokuwaka-twitter;host=localhost;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo 'DB接続エラー：' . $e->getMessage();
}

?>