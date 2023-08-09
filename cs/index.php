<?php
include("../admin/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>علوم الحاسوب</title>
    <?php include '../admin/cssFiles.php' ?>
    <link rel="stylesheet" href="../css/cs.css">
</head>

<body>

    <!-- Start Header -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="../imgs/logo.png" alt="">
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
                            <li><a href='#'>علوم حاسوب</a></li>
                            <li><a href='#'>هندسة حاسوب</a></li>
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
    <!-- <div class="landing">
        <div class="overlay"></div>
        <div class="intro-text">
            <h1>كُلية علوم وهندسة الحاسوب</h1>
            <p>الحديدة</p>
        </div>
    </div> -->
    <!-- End Landing -->

    <!-- Start About College -->
    <div class="about">
        <div class="container">
            <h2 id="about">علوم حاسوب</h2>
            <p>
            تقدم الكلية برنامجًا للبكالوريوس في علوم الحاسوب وبرنامجًا للبكالوريوس في هندسة الحاسوب. يهدف برنامج علوم الحاسوب إلى إعداد الطلاب للعمل في مجال تكنولوجيا المعلومات، بينما يهدف برنامج هندسة الحاسوب إلى إعداد الطلاب للعمل في مجال الهندسة.
تضم الكلية هيئة تدريس من ذوي الخبرة والكفاءة العالية، كما تضم العديد من المختبرات الحديثة، بما في ذلك مختبر الحوسبة وشبكة الحاسوب وهندسة البرمجيات.
تتمتع الكلية بعلاقات تعاون مع العديد من الجامعات والشركات المحلية والدولية، مما يوفر للطلاب الفرصة للتدريب العملي واكتساب الخبرة في مجال تكنولوجيا المعلومات.
تسعى الكلية إلى أن تكون واحدة من أفضل كليات علوم وهندسة الحاسوب في اليمن، وأن تخرج خريجين مؤهلين للعمل في مجال تكنولوجيا المعلومات وهندسة الحاسوب.
<br>
فيما يلي بعض من المزايا التي يتمتع بها برنامج علوم الحاسوب في جامعة الحديدة:

هيئة تدريس من ذوي الخبرة والكفاءة العالية.
العديد من المختبرات الحديثة.
علاقات تعاون مع العديد من الجامعات والشركات المحلية والدولية.
بيئة تعليمية حديثة وتفاعلية.
فرص تدريبية متنوعة.
رسوم دراسية معقولة.
إذا كنت تبحث عن برنامج متميز في علوم الحاسوب، فإن برنامج علوم الحاسوب في جامعة الحديدة هو خيار رائع لك.            
</p>
            <h3>المواد</h3>
            <?php
                $query = mysqli_query($conn,"SELECT * FROM subjects WHERE `part-id`=1");
                echo "<ul>";
                while ($row = mysqli_fetch_array($query)) {
                    echo "<li>-{$row[1]}</li>";
                }
                echo "</ul>";
            ?>
        </div>
    </div>
    <!-- End About College -->

    <!-- Start Footer -->
    <footer>
        جميع الحقوق محفوظة &copy;
    </footer>
    <!-- End Footer -->

    <!-- JavaScript File -->
    <script src="../js/main.js"></script>
</body>

</html>