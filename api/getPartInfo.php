<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {

    include("../admin/conn.php");
    $query = mysqli_query($conn,"SELECT * FROM parts");
    $id;
    $name;
    $levels;
    $data = array();
    while ($row = mysqli_fetch_array($query)) {
        $id = $row[0];
        $name = $row[1];
        $levels = $row[2];
        array_push($data,array('id'=>$id,'name'=>$name,'levels'=>$levels));
    }
    echo json_encode($data);

}

?>