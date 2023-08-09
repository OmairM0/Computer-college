<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "computer-college";

    $conn = mysqli_connect($servername,$username,$password,$dbname);
    // if(!$conn){
    //     echo "Connection is Failed";
    // } else {
    //     echo "Connection Successfully";
    // }
    // mysqli_query($conn,"INSERT INTO admins VALUES ('','omair','123')");
    // try {
    // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // // set the PDO error mode to exception
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // // echo "Connected successfully";
    // } catch(PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    // }
?>