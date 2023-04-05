<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'tutorial');
    $sql = "select * from myTable";
    $res = mysqli_query($conn, $sql);

    $listData = "";
    while($row = mysqli_fetch_array($res)){
        $listData = $listData."<li><a href='04-1_index.php?id={$row['id']}'>{$row['title']}</a></li>";
    }

    $sql = "select * from author";
    $result = mysqli_query($conn, $sql);
    $selectForm = "<select name='authorID'>";
    while($row = mysqli_fetch_array($result)){
        $selectForm .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
    $selectForm .= '</select>';
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
        <form action="04-3_processCreate.php" method="POST">
            <p><input type="text" name="title" placeholder="title"></p>
            <p><textarea name="description" placeholder="description"></textarea></p>
            <?= $selectForm ?>
            <p><input type="submit"></p>
        </form>
    </body>
</html>
