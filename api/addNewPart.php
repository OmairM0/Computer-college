<?php
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    include("../admin/conn.php");
    $name = $_POST['name'];
    $CountOfLevels = $_POST['countOfLevels'];
    $sql = mysqli_query($conn,"INSERT INTO parts VALUES ('','{$name}','{$CountOfLevels}')");
}
