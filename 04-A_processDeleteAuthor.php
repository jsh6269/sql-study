<?php
    $conn = mysqli_connect("localhost", "root", "", "tutorial");

    $filtered = array(
        'id' => mysqli_real_escape_string($conn, $_POST['id'])
    );

    $sql = "delete from author where id = {$filtered['id']}";

    $res = mysqli_query($conn, $sql);
    if(!$res){
        echo 'Delete failed';
        error_log(mysqli_error($conn));
    } else{
        header('Location: /04-7_author.php');
    }

?>