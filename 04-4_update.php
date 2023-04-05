<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'tutorial');
    $sql = "select * from myTable";
    $res = mysqli_query($conn, $sql);

    $listData = "";
    while($row = mysqli_fetch_array($res)){
        $listData = $listData."<li><a href='04-1_index.php?id={$row['id']}'>{$row['title']}</a></li>";
    }

    $article = array('title'=>'Welcome', 'description'=>'Hello, World!');

    if(isset($_GET['id'])){
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "select * from myTable where id={$filtered_id}";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
        $article['title'] = htmlspecialchars($row['title']);
        $article['description'] = htmlspecialchars($row['description']);
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>WEB</title>
        <style>
        textarea {
            width: 600px;
            height: 200px;
        }
        </style>

    </head>
    <body>
        <h1><a href="04-1_index.php">WEB</a></h1>
        <ol> <?=$listData ?> </ol>
        <form action="04-5_processUpdate.php" method="POST">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <p><input type="text" name="title" placeholder="title" value="<?= $article['title'] ?>"></p>
            <p><textarea name="description" placeholder="description"><?= $article['description'] ?></textarea></p>
            <p><input type="submit"></p>
        </form>
    </body>
</html>
