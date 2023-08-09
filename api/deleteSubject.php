<?php
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    include("../admin/conn.php");
    $id = $_POST['id'];
    $sql = mysqli_query($conn,"DELETE FROM subjects WHERE id = {$id}");
    
}
