<?php
    $conn = mysqli_connect("localhost", "root", "", "tutorial");

    $filtered = array(
        'title' => mysqli_real_escape_string($conn, $_POST['title']),
        'description' => mysqli_real_escape_string($conn, $_POST['description']),
        'authorID' => mysqli_real_escape_string($conn, $_POST['authorID'])
    );

    $sql = "
    insert into myTable(title, description, created, authorID)
     values(
        '{$filtered['title']}',
        '{$filtered['description']}',
        NOW(),
        '{$filtered['authorID']}'
    )
    ";
    $res = mysqli_query($conn, $sql);
    if(!$res){
        echo 'insertion failed';
        error_log(mysqli_error($conn));
    } else{
        $insertID = mysqli_insert_id($conn);
        header('Location: /04-1_index.php?id='.$insertID);
        // echo "Data Inserted.<br><br><a href='04-1_index.php'>Home</a>";
    }

?>