<?php
    $conn = mysqli_connect("localhost", "root", "", "tutorial");

    $filtered = array(
        'name' => mysqli_real_escape_string($conn, $_POST['name']),
        'profile' => mysqli_real_escape_string($conn, $_POST['profile']),
        'id' => mysqli_real_escape_string($conn, $_POST['id'])
    );

    $sql = "
    update author set
        name = '{$filtered['name']}',
        profile = '{$filtered['profile']}'
    where id = '{$filtered['id']}'
    ";
    $res = mysqli_query($conn, $sql);
    if(!$res){
        echo 'update failed';
        error_log(mysqli_error($conn));
    } else{
        $insertID = mysqli_insert_id($conn);
        header('Location: /04-7_author.php');
    }

?>