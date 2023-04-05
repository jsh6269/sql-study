<?php
    $conn = mysqli_connect("localhost", "root", "", "tutorial");

    $sql = "
    insert into topic(
        title,
        description,
        created
    ) values(
        '{$_POST['title']}',
        '{$_POST['description']}',
        NOW()
    )
    ";
    $res = mysqli_query($conn, $sql);
    if(!$res){
        echo 'insertion failed';
        error_log(mysqli_error($conn));
    } else{
        echo 'Data Inserted.<br><br><a href="02-1_index.php">Home</a>';
    }

?>