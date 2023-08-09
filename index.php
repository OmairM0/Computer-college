<?php
include("admin/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>كُلية علوم وهندسة الحاسوب</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body>

    <!-- Start Header -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="imgs/logo.png" alt="">
            </div>
            <div class="menu-icon">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="menu">
                <div class="close">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <ul>
                    <li>
                        <a href="#about">عن الكُلية</a>
                    </li>
                    <li>
                        <a href="#">أقسام الكٌلية</a>
                        <ul class="dorp">
                        <li><a href='cs/index.php'>علوم حاسوب</a></li>
                        <li><a href='ce/index.php'>هندسة حاسوب</a></li>
                            <?php
                                // $query = mysqli_query($conn,"SELECT * FROM parts");
                                // while ($row = mysqli_fetch_array($query)) {
                                //     echo "<li><a href='#'>{$row[1]}</a></li>";
                                // }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- End Header -->

    <!-- Start Landing -->
    <div class="landing">
        <div class="overlay"></div>
        <div class="intro-text">
            <h1>كُلية علوم وهندسة الحاسوب</h1>
            <p>الحديدة</p>
        </div>
    </div>
    <!-- End Landing -->

    <!-- Start About College -->
    <div class="about">
        <div class="container">
            <h2 id="about">عن الكٌلية</h2>
            <p>
                كلية علوم وهندسة الحاسوب في جامعة الحديدة هي كلية حكومية تأسست في عام 1998. تقع الكلية في مدينة الحديدة،
                وهي
                واحدة من أكبر المدن في اليمن. تقدم الكلية برامج البكالوريوس في علوم الحاسوب وهندسة الحاسوب. كما تقدم
                الكلية
                برامج الماجستير في علوم الحاسوب وهندسة الحاسوب.
            </p>
        </div>
    </div>
    <!-- End About College -->

    <!-- Start Footer -->
    <footer>
        جميع الحقوق محفوظة &copy;
    </footer>
    <!-- End Footer -->

    <!-- JavaScript File -->
    <script src="js/main.js"></script>
</body>

</html>