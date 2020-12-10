<?php
    require "libs/rb.php";
    R::setup('mysql:host=localhost;dbname=future', 'root', 'root');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connection = mysqli_connect('localhost', 'root', 'root', 'future');
?>