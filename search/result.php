<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'citsa');
if(mysqli_connect_error()){
    echo 'Database connection failed with the following errors: '. mysqli_connect_error();
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>


    <?php
    if(isset($_GET['musicsearch'])){    
        $query = $_GET['musicsearch']; 
        $query = htmlspecialchars($query);
        $query = mysqli_real_escape_string($db,$query);
        $sql =$db->query(" SELECT * FROM library WHERE (`keyword` LIKE '%".$query."%') ");
        if(mysqli_num_rows($sql) > 0){
            $no = 1;
            ?>
            <ul>
                <?php
                while($results = mysqli_fetch_array($sql)){
                    $name   = $results['code'];
                    ?>
                    <li><span style='margin-right:20px;'><?=$no;?>.</span> <span class='filename'><?=$name;?> </li>
                        <?php
                        $no = $no + 1;
                    }
                }else{ 
                    echo "No results";
                }
        }
        ?>
    </ul>
</body>
</html>