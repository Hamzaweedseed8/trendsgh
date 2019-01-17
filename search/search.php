<?php
    session_start();
   $db = mysqli_connect('localhost', 'root', '', 'citsa');
    if(mysqli_connect_error()){
        echo 'Database connection failed with the following errors: '. mysqli_connect_error();
        die();
    }

    $keyword=$_GET['musicsearch'];
    $array = array();
    $query= $db->query("SELECT * FROM music_library WHERE name LIKE '%{$keyword}%'");
    while($row=mysqli_fetch_assoc($query)){
      $array[] = $row["name"];
    }
    echo json_encode($array);
    mysqli_close($db);
    die();
?>