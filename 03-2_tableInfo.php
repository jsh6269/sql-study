<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'tutorial');
    $sql = "Select * from topic";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){
        echo "<h2>".$row['title']."</h2>";
        echo $row['description'];
    }

?>