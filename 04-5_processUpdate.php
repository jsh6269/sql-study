<?php
    $conn = mysqli_connect("localhost", "root", "", "tutorial");

    $filtered = array(
        'title' => mysqli_real_escape_string($conn, $_POST['title']),
        'description' => mysqli_real_escape_string($conn, $_POST['description']),
        'id' => mysqli_real_escape_string($conn, $_POST['id'])
    );

    $sql = "
    update myTable
    SET
        title = '{$filtered['title']}',
        description = '{$filtered['description']}'
    WHERE
        id = '{$filtered['id']}'
    ";

    $res = mysqli_query($conn, $sql);
    if(!$res){
        echo 'Update failed';
        error_log(mysqli_error($conn));
    } else{
        header('Location: /04-1_index.php?id='.$filtered['id']);
        // echo "Data Updated.<br><br><a href='04-1_index.php'>Home</a>";
    }

?>