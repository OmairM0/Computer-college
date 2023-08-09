<?php
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    include("../admin/conn.php");
    $id = $_POST['id'];
    $name = $_POST['name'];
    $CountOfLevels = $_POST['countOfLevels'];
    $sql = mysqli_query($conn,"UPDATE parts SET name='{$name}', levels='{$CountOfLevels}' WHERE id = {$id}");
    
}
