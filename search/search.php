<?php
    session_start();
   $db = mysqli_connect('localhost', 'root', '', 'citsa');
    if(mysqli_connect_error()){
        echo 'Database connection failed with the following errors: '. mysqli_connect_error();
        die();
    }

    $keyword=$_GET['musicsearch'];
    $array = array();
    $query=mysqli_query($db, "SELECT * FROM library WHERE keyword LIKE '%{$keyword}%'");
    while($row=mysqli_fetch_assoc($query)){
      $array[] = $row["keyword"];
    }
    echo json_encode($array);
    mysqli_close($db);
    die();
?>