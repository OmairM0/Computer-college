<?php
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    include("../admin/conn.php");
    $name = $_POST['name'];
    $part = $_POST['part'];
    $level = $_POST['level'];
    $term = $_POST['term'];
    $CountOfLevels = $_POST['countOfLevels'];
    $sql = mysqli_query($conn,"INSERT INTO subjects VALUES ('','{$name}','{$part}','{$level}','{$term}')");
}
