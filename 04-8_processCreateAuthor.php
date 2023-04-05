<?php
    $conn = mysqli_connect("localhost", "root", "", "tutorial");

    $filtered = array(
        'name' => mysqli_real_escape_string($conn, $_POST['name']),
        'profile' => mysqli_real_escape_string($conn, $_POST['profile'])
    );

    $sql = "
    insert into author(name, profile)
     values(
        '{$filtered['name']}',
        '{$filtered['profile']}'
    )
    ";
    $res = mysqli_query($conn, $sql);
    if(!$res){
        echo 'insertion failed';
        error_log(mysqli_error($conn));
    } else{
        $insertID = mysqli_insert_id($conn);
        header('Location: /04-7_author.php');
    }

?>