<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {

    include("../admin/conn.php");
    $query = mysqli_query($conn,"SELECT * FROM parts");
    $id;
    $name;
    $part;
    $level;
    $term;
    $data = array();
    while ($row = mysqli_fetch_array($query)) {
        $id = $row[0];
        $name = $row[1];
        $part = $row[2];
        $level = $row[3];
        $term = $row[4];
        array_push($data,array('id'=>$id,'name'=>$name,'part'=>$part,'levels'=>$level,'term'=>$term));
    }
    echo json_encode($data);

}

?>