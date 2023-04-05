<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'tutorial');
    $sql1 = 
    "create table if not exists myTable(
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(45) NOT NULL,
        description text,
        created datetime NOT NULL,
        PRIMARY KEY(id)        
    )";

    $sql2 =
    "create table if not exists author(
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(30) NOT NULL,
        profile varchar(200) NULL,
        PRIMARY KEY(id)
    )";

    mysqli_query($conn, $sql1);
    mysqli_query($conn, $sql2);
    echo "created";
?>