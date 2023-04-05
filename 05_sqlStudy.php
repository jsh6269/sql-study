<link rel="stylesheet" href="05_sqlStudy.css" type="text/css">

<?php 
    $conn = mysqli_connect("localhost", "root", "", "tutorial");
    mysqli_query($conn, "drop table if exists sqlEx");

    $sql1 = 
    "create table sqlEx(
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(20) NOT NULL,
        job varchar(20),
        profile text,
        PRIMARY KEY(id)        
    )";

    mysqli_query($conn, $sql1);

    // insert, update, delete문
    $sqls = array(
        "insert into sqlEx(name, job, profile) values('Jang', 'student', 'I want to learn more!')",
        "insert into sqlEx(name, job, profile) values('Suhan', 'student', 'I do not want to learn more!')",
        "insert into sqlEx(name, job, profile) values('James', 'professor', 'I am teaching students.')",
        "insert into sqlEx(name, job, profile) values('Park', 'soldier', 'Roger that!!')",
        "update sqlEx set job='prof', profile='Hello, Students!' where name='James'",
        "delete from sqlEx where id=2",
        "insert into sqlEx(name, job, profile) values('Shin', 'student', 'Cat is cute')",
        "insert into sqlEx(name, job, profile) values('Shin2', 'student', 'Cat is cute')"
    );

    foreach($sqls as $cmd){
        mysqli_query($conn, $cmd);
    }

    // select문
    $temp = mysqli_query($conn, "select name from sqlEx where job='student'");
    echo "student: ";
    while($row = mysqli_fetch_array($temp)){
        echo $row['name'], ' ';
    }
    echo "<br>";

    $temp = mysqli_query($conn, "select name from sqlEx where id<4 and job not in ('prof', 'soldier')");
    while($row = mysqli_fetch_array($temp)){
        echo $row['name'], ' ';
    }
    echo "<br>";

    // student인 사람 수 구하기
    $temp = mysqli_query($conn, "select count(*) from sqlEx where job='student'");
    print_r(mysqli_fetch_array($temp));
    echo "<br>";

    // DB 상태를 table로 출력
    echo "<br>";
    $result = mysqli_query($conn, "select * from sqlEx");
?> 
    <table>
        <tr id="head">
            <td>ID</td>
            <td>Name</td>
            <td>Job</td>
            <td>Profile</td>
        </tr>
    
    <?php
    while($row = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><?= $row['id']?></td>
            <td><?= $row['name']?></td>
            <td><?= $row['job']?></td>
            <td><?= $row['profile']?></td>
        </tr>
    <?php } ?>
</table>
