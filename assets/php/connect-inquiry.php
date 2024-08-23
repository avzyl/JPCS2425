<?php
    $db_name = 'mysql:host=localhost;dbname=jpcs2425';
    $db_user_name = 'root';
    $db_user_pass = 'Minga3winy_3';

    $conn = new PDO($db_name, $db_user_name, $db_user_pass);
    $sql = "SELECT * FROM `inquiries`";
    $data = $conn->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
?>