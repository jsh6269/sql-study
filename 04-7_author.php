<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'tutorial');

    // author list를 표시하기 위해 author정보를 전부 가져옴
    $sql = "select * from author";
    $res = mysqli_query($conn, $sql);
    
    $buttonVal = "Create author";
    $urlVal = "04-8_processCreateAuthor.php";
    $filteredID = "";

    // author update할 때 선택된 author 정보를 가져옴
    $escaped = array('name'=>'', 'profile'=>'');
    if(isset($_GET['id'])){
        $buttonVal = "Update author";
        $urlVal = "04-9_processUpdateAuthor.php";

        $filteredID = mysqli_real_escape_string($conn, $_GET['id']);
        settype($filteredID, 'integer');
        $sql2 = "select * from author where id={$filteredID}";
        $res2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_array($res2);
        $escaped['name'] = htmlspecialchars($row['name']);
        $escaped['profile'] = htmlspecialchars($row['profile']);
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>WEB</title>
        <link rel="stylesheet" href="04-7_author.css" type="text/css">
    </head>
    <body>
        <h1><a href="04-1_index.php">WEB</a></h1>
        <a href="04-7_author.php">author</a><br><br>
        <table>
            <thead><tr><td>id</td><td>name</td><td>profile</td></tr></thead>
            <tbody>
                <?php 
                    while($row = mysqli_fetch_array($res)){
                        $filtered = array(
                            'id' => htmlspecialchars($row['id']),
                            'name' => htmlspecialchars($row['name']),
                            'profile' => htmlspecialchars($row['profile'])
                        )
                        ?>
                        <tr>
                            <td><?= $filtered['id'] ?></td>
                            <td><?= $filtered['name'] ?></td>
                            <td><?= $filtered['profile'] ?></td>
                            <td><a href=<?= "04-7_author.php?id={$filtered['id']}" ?>>update</a></td>
                            <td>
                                <form action="04-A_processDeleteAuthor.php" method="post" onsubmit="if(!confirm('Are you sure to delete the record?')){return false;}">
                                    <input type="hidden" name="id" value="<?= $filtered['id'] ?>">
                                    <input type="submit" value="delete">
                                </form>
                            </td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>

        <form action="<?= $urlVal ?>" method="post">
            <input type="hidden" name="id" value=<?= $filteredID ?>>
            <p><input type="text" name="name" placeholder="name" value=<?= $escaped['name'] ?>></p>
            <p><textarea name="profile" placeholder="profile"><?= $escaped['profile'] ?></textarea></p>
            <p><input type="submit" value='<?= $buttonVal ?>'></p>
        </form>
    </body>
</html>
