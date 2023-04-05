<?php
    $conn = mysqli_connect("localhost", "root", "", "tutorial");

    $sql = "
    insert into topic(
        title,
        description,
        created
    ) values(
        'MySQL',
        'Hello, World!',
        NOW()
    )
    ";

    $res = mysqli_query($conn, $sql);
    
    if($res)
        echo "insert completed!";

?>