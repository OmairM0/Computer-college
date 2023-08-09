<?php
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    include("../admin/conn.php");
    $id = $_POST['id'];
    $name = $_POST['name']; 
    $part = $_POST['part']; 
    $level = $_POST['level']; 
    $term = $_POST['term']; 
    $sql = mysqli_query($conn,"UPDATE subjects SET name='{$name}', `part-id`='{$part}' , level='{$level}', term='{$term}' WHERE id = {$id}");
    
}
