<?php
include("../admin/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>هندسة الحاسوب</title>
    <?php include '../admin/cssFiles.php' ?>
    <link rel="stylesheet" href="../css/ce.css">
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
                            <li><a href='../cs/index.php'>علوم حاسوب</a></li>
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
            <h2 id="about">هندسة حاسوب</h2>
            <p>
            هندسة الحاسوب في جامعة الحديدة هي برنامج أكاديمي يهدف إلى إعداد الطلاب ليصبحوا مهندسين في مجال هندسة الحاسوب. يتضمن البرنامج مجموعة متنوعة من المقررات الدراسية التي تغطي أساسيات الهندسة، مثل الرياضيات والفيزياء والكيمياء، بالإضافة إلى المقررات الدراسية المتخصصة في مجال هندسة الحاسوب، مثل بنية الحاسبات وأنظمة التشغيل وقواعد البيانات وهندسة البرمجيات.
يتمتع برنامج هندسة الحاسوب في جامعة الحديدة بالعديد من المزايا التي تجعله خيارًا ممتازًا للطلاب الذين يرغبون في دراسة هذا المجال، بما في ذلك:
<br>
هيئة تدريس من ذوي الخبرة والكفاءة العالية.
العديد من المختبرات الحديثة.
علاقات تعاون مع العديد من الجامعات والشركات المحلية والدولية.
بيئة تعليمية حديثة وتفاعلية.
فرص تدريبية متنوعة.
رسوم دراسية معقولة.
إذا كنت تبحث عن برنامج متميز في هندسة الحاسوب، فإن برنامج هندسة الحاسوب في جامعة الحديدة هو خيار رائع لك.
<br>
فيما يلي بعض من المجالات التي يمكن للخريجين من برنامج هندسة الحاسوب في جامعة الحديدة العمل فيها:

شركات البرمجيات.
شركات الأجهزة الإلكترونية.
شركات الاتصالات.
شركات التعليم العالي.
شركات البحث والتطوير.
الحكومة.
يتمتع خريجي برنامج هندسة الحاسوب في جامعة الحديدة بفرص عمل جيدة في العديد من المجالات، وذلك بسبب الطلب الكبير على المهندسين في هذا المجال.          
</p>
            <h3>المواد</h3>
            <?php
                $query = mysqli_query($conn,"SELECT * FROM subjects WHERE `part-id`=2");
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