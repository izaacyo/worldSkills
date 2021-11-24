<?php

session_start();

include 'db_conn.php';

    $eventsName = $conn->prepare("SELECT * FROM events WHERE name=?");
     $eventsName->execute([$name]);


     $result = mysqli_fetch_all($eventsName, MYSQLI_ASSOC);

     print_r($result);