<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'tutorial');
    $sql = "select * from myTable";
    $res = mysqli_query($conn, $sql);

    $listData = "";
    while($row = mysqli_fetch_array($res)){
        $escapedTitle = htmlspecialchars($row['title']);
        $listData = $listData."<li><a href='04-1_index.php?id={$row['id']}'>{$escapedTitle}</a></li>";
    }

    $article = array('title'=>'Welcome', 'description'=>'Hello, World!');
    $updateLink = "";
    $deleteLink = "";
    $authorInfo = "";

    if(isset($_GET['id'])){
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "select * from myTable left join author on myTable.authorID=author.id where myTable.id={$filtered_id}";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
        $article['title'] = htmlspecialchars($row['title']);
        $article['description'] = htmlspecialchars($row['description']);
        $article['name'] = htmlspecialchars($row['name']);
        $authorInfo = "by {$article['name']}";

        $updateLink = "<a href='04-4_update.php?id=".$_GET['id']."'>update</a>";
        $deleteLink = "
        <form action='04-6_processDelete.php' method='post'>
            <input type='hidden' name='id' value='".$_GET['id']."'>
            <input type='submit' value='delete'>
        </form>
        ";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>WEB</title>
    </head>
    <body>
        <h1><a href="04-1_index.php">WEB</a></h1>
        <a href="04-7_author.php">author</a>
        <ol> <?= $listData ?> </ol>
        <a href="04-2_create.php">create</a>
        <?= $updateLink ?><br><br>
        <?= $deleteLink ?>
        <h2><?= $article['title'] ?></h2>
        <?= $article['description'] ?><br><br>
        <?= $authorInfo ?>
    </body>
</html>
