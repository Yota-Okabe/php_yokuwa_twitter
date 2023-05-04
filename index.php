<?php

session_start();
require('./join/dbconnect.php');

if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
    $_SESSION['time'] = time();
    $members = $db->prepare('SELECT * FROM members WHERE id=?');
    $members->execute(array($_SESSION['id']));
    $member = $members->fetch();
} else {
    header('Location: login.php');
    exit();
}

if (!empty($_POST)) {
    if ($_POST['message'] != '') {
        $message = $db->prepare('INSERT INTO posts SET member_id=?, message=?, reply_post_id=?, created=NOW()');
        $message->execute(array(
            $member['id'],
            $_POST['message'],
            $_POST['reply_post_id']
        ));
        header('Location: index.php');
        exit();
    }
}

$posts = $db->query('SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id ORDER BY p.created DESC');

if (isset($_REQUEST['res'])) {
    $response = $db->prepare('SELECT m.name, p.* FROM members m, posts p WHERE m.id=p.member_id AND p.id=? ORDER BY p.created DESC');
    $response->execute(array($_REQUEST['res']));
    $table = $response->fetch();
    $message = '@' . $table['name'] . ' ' . $table['message'];
}

function h($value) {
    return htmlspecialchars($value, ENT_QUOTES);
}

function makeLink($value) {
<<<<<<< Updated upstream
    return mb_ereg_replace("(https?)(://[[:alnum:]\+\$\;\?\.%,!#~*/:@&=_-]+)",'<a href="\1\2">\1\2</a>', $value);
=======
    return mb_ereg_replace("(https?)(://[[:alnum:]\+\$\;\?\.%,!#~*/:@&=_-]+)", '<a href="\1\2">1\2\</a>', $value);
>>>>>>> Stashed changes
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>つぶやき掲示板</title>
</head>
<body>
<div id="wrap">
    <div id="head">
        <h1>つぶやき掲示板</h1>
    </div>
    <div id="content">
        <form action="" method="post">
            <dl>
                <dt>
<<<<<<< Updated upstream
                    <?php echo h($member['name']); ?>さん、つぶやきをどうぞ
=======
                    <?php echo h($member['name']) ?>さん、つぶやきをどうぞ
>>>>>>> Stashed changes
                </dt>
                <dd>
                    <textarea name="message" cols="50" rows="5">
                        <?php echo h($message); ?>
                    </textarea>
                    <input type="hidden" name="reply_post_id" value="<?php echo h($_REQUEST['res']); ?>">
                </dd>
            </dl>
            <div>
                <input type="submit" value="つぶやく">
            </div>
        </form>

<?php
foreach ($posts as $post):
?>
        <div class="msg">
            <img src="./join/member_picture/<?php echo h($post['picture']); ?>" alt="<?php echo h($post['name']); ?>" width="48" height="48">
<<<<<<< Updated upstream
            <p><?php echo makeLink(h($post['message'])); ?>
=======
            <p><?php echo h($post['message']); ?>
>>>>>>> Stashed changes
                <span class="name">（<?php echo h($post['name']); ?>）</span>
                [ <a href="index.php?res=<?php echo h($post['id']); ?>">Re</a> ]
            </p>
            <p class="day">
                <a href="view_post.php?id=<?php echo h($post['id']); ?>">
                    <?php echo h($post['created']); ?>
                </a>
                
                <?php
                if ($post['reply_post_id'] > 0):
                    ?>
                    <a href="view_post.php?id=<?php echo h($post['reply_post_id']); ?>"> | 返信元のメッセージ</a>
                    <?php
                endif;
                ?>
            </p>
        </div>
<?php
endforeach;
?>
    </div>
</div>
</body>
</html>