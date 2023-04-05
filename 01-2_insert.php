<?php
    error_reporting(0);

    try{
        $conn = mysqli_connect("localhost", "root", "", "tutorial");
    } catch(Exception $e){
        echo "Connection error: code(", mysqli_connect_errno(), ")";
        exit();
    }

    if(mysqli_connect_errno()){
        // special case when there is no error but still has a problem with connection
        echo "Connection failed: code(", mysqli_connect_errno(), ")";
        // echo "Connection failed: <br>", mysqli_connect_error()0;
        exit();
    }

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

    try{
        $res = mysqli_query($conn, $sql);
    } catch(Exception $e){
        echo "Query error: <br>", mysqli_error($conn), "<br>";
        echo "return value: ", var_dump($res);
        exit();
    }

    if(!$res){
        echo "Query failed: <br>", mysqli_error($conn);
        exit();
    }

    echo "insert completed<br>";
    echo "return value: ", var_dump($res);

?>