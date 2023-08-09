<?php
include('conn.php');
session_start();
include("../functions.php");
if(loggedIn()){
    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <?php include 'cssFiles.php' ?>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="login">
        <div class="container">
            <h2>تسجيل الدخول</h2>
            
                <?php
                    
                    if ($_SERVER["REQUEST_METHOD"]==="GET" && count($_GET)>0){
                        echo "<div class='err'>";
                        echo $_GET["error"];
                        echo "</div>";
                    }
                ?>
            
            <form action="" method="post">
                <input type="text" name="username" placeholder="اسم المستخدم" autocomplete="none">
                <input type="password" name="password" placeholder="كلمة المرور">
                <input type="submit" value="تسجيل الدخول">
            </form>
        </div>
    </div>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $query = mysqli_query($conn,"SELECT * FROM admins");
    while ($row = mysqli_fetch_array($query)) {
        if ($_POST["username"]==$row[1] && $_POST["password"]==$row[2]) {
            session_start();
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];
            header("Location:index.php");
            break;
            
        } else {
            header("Location:login.php?error=اسم المستخدم أو كلمة المرور غير صحيحة");
        }
    }
} else {
    // echo "Error";
}

?>