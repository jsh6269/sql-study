<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'tutorial');
    $sql = "Select * from topic";
    $result = mysqli_query($conn, $sql);

    var_dump($result);
    echo "<br>행 개수: ", $result->num_rows;
    echo "<br>필드 개수: ", $result->field_count, "<br>";

    // 첫 번째 행을 가져옴
    $row = mysqli_fetch_array($result);

    print_r($row);
    echo "<br>{$row['id']} {$row['title']} {$row['description']} {$row['created']}<br>";
    echo "$row[0] $row[1] $row[2] $row[3]<br><br>";

    // 다음 행을 가져옴
    $row = mysqli_fetch_array($result);

    print_r($row);
    echo "<br>{$row['id']} {$row['title']} {$row['description']} {$row['created']}<br>";
    echo "$row[0] $row[1] $row[2] $row[3]<br><br>";

    // 다음 행을 가져옴, 더 이상 가져올 행이 없으면 NULL을 반환
    $row = mysqli_fetch_array($result);
    var_dump($row)

?>