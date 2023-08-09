<?php
include("conn.php");
session_start();
include("../functions.php");
if(!loggedIn()){
    header("Location:login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <?php include 'cssFiles.php' ?>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    
    <!-- Start Sidebar -->
    <div class="menu-icon">
                <i class="fa-solid fa-bars"></i>
    </div>
    <div class="sidebar">
        <div class="header-sidebar">
            <div class="logo"></div>
            <div class="admin-info">
                <h2>
                <?php
                    echo ucfirst($_SESSION["username"]); // Make The First Letter Of Admin Capital
                ?>
                </h2>
            </div>
        </div>
        <div class="content-sidebar">
            <ul>
                <li class="active">الطلاب</li>
                <li>المواد</li>
                <li>الأقسام</li>
            </ul>
        </div>
    </div>
    <div class="overlay"></div>
    <!-- End Sidebar -->

    <!-- Start Content -->
    <div class="content">
        <div class="students">
            <div class="container">
                <h2><span>#</span>الطلاب</h2>
            </div>
        </div>
        <div class="subjects">
            <div class="container">
                <h2><span>#</span>المواد</h2>
                <button class="addBtn">إضافة مادة</button>
                <div>
                    <div class="add-subject">
                        <h4>إضافة مادة جديدة</h4>
                            <div>
                            <input class="name" type="text" placeholder="اسم المادة">
                            <!-- <input class="countOfLevels" type="number" placeholder="عدد المستويات"> -->
                            <label for="part">القسم</label>
                            <select id="part">
                                <?php
                                    
                                    $query = mysqli_query($conn,"SELECT id,name FROM parts");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo "<option value='{$row[0]}'>{$row[1]}</option>";
                                    }
                                ?>
                            </select>
                            <label for="level">المستوى</label>
                            <select id="level">
                                
                            </select>
                            <label for="term">الترم</label>
                            <select id="term">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                            <br>
                            <button class="saveBtn">حفظ</button>
                            <button class="backBtn">تراجع</button>
                            </div>
                    </div>
                    <div class="main-content">
                        <div class="title">
                            <h3>اسم المادة</h3>
                            <h3 class="h-name">القسم</h3>
                            <h3>المستوى</h3>
                            <h3>الترم</h3>
                            <h3>حذف/تعديل</h3>
                        </div>
                        <div>
                            <?php

                                $query = mysqli_query($conn,"SELECT * FROM subjects");
                                while ($row = mysqli_fetch_array($query)) {
                                    $p = mysqli_query($conn,"SELECT name FROM parts WHERE id={$row[2]}");
                                    $r = mysqli_fetch_array($p);
                                    echo "<div class='box'>
                                    <div class='box-subject'>
                                    <p class='name'>{$row[1]}</p>
                                    <p class='part'>{$r[0]}</p>
                                    <p class='level'>{$row[3]}</p>
                                    <p class='term'>{$row[4]}</p>
                                    <P class='edit-delete-icon'>
                                        <i onclick='editPart(0)' class='fa-solid fa-pen-to-square'></i>
                                        <i onclick='deleteSubject({$row[0]})' class='fa-solid fa-trash'></i>
                                    </p>
                                    
                                    </div>
                                    <div class='edit'>
                                        <input class='name' value='{$row[1]}' type='text' placeholder='اسم المادة'>
                                        <label for='part'>القسم</label>
                                        <select id='part'>"; ?>
                                    <?php
                                    
                                    $query2 = mysqli_query($conn,"SELECT id,name FROM parts");
                                    while ($row2 = mysqli_fetch_array($query2)) {
                                        echo "<option value='{$row2[0]}'>{$row2[1]}</option>";
                                    }
                                    ?>
                                    <?php
                                        
                                    echo "</select>
                                        <label for='level'>المستوى</label>
                                    <select id='level'>
                                        
                                    </select>
                                    <label for='term'>الترم</label>
                                    <select id='term'>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                    </select>
                                    <br>
                                        <button onclick='saveEditSubject({$row[0]})' class='editSaveBtn'>حفظ</button>
                                        <button onclick='editPart(1)' class='editCanceBtn'>تراجع</button>
                                    </div>
                                    </div>";
                                }

                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="parts">
            <div class="container">
                <h2><span>#</span>الأقسام</h2>
                <button class="addBtn">إضافة قسم</button>
                <div>
                    <div class="add-part">
                        <h4>إضافة قسم جديد</h4>
                            <div>
                            <input class="name" type="text" placeholder="اسم القسم">
                            <input class="countOfLevels" type="number" placeholder="عدد المستويات">
                            <button class="saveBtn">حفظ</button>
                            <button class="backBtn">تراجع</button>
                            </div>
                    </div>
                    <div class="main-content">
                        <div class="title">
                            <h3>رقم القسم</h3>
                            <h3 class="h-name">اسم القسم</h3>
                            <h3>عدد المستويات</h3>
                            <h3>عدد الطلاب</h3>
                            <h3>حذف/تعديل</h3>
                        </div>
                        <div>
                            <?php

                                $query = mysqli_query($conn,"SELECT * FROM parts");
                                while ($row = mysqli_fetch_array($query)) {
                                    echo "<div class='box'>
                                    <div class='box-part'>
                                    <p class='id'>{$row[0]}</p>
                                    <p class='name'>{$row[1]}</p>
                                    <p class='cout-of-levels'>{$row[2]}</p>
                                    <p class='count-of-students'>0</p>
                                    <P class='edit-delete-icon'>
                                        <i onclick='editPart(0)' class='fa-solid fa-pen-to-square'></i>
                                        <i onclick='deletePart({$row[0]})' class='fa-solid fa-trash'></i>
                                    </p>
                                    
                                    </div>
                                    <div class='edit'>
                                        <input class='name' value='{$row[1]}' type='text' placeholder='اسم القسم'>
                                        <input class='countOfLevels' value={$row[2]} type='number' placeholder='عدد المستويات'>
                                        <button onclick='saveEdit({$row[0]})' class='editSaveBtn'>حفظ</button>
                                        <button onclick='editPart(1)' class='editCanceBtn'>تراجع</button>
                                    </div>
                                    </div>";
                                }

                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Start Notification -->
    <div class="notification"></div>
    <!-- End Notification -->
    <script src="../js/admin.js"></script>
</body>
</html>