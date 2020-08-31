<?php
    $conn = new mysqli('localhost', 'root', '', 'rent-ad');

    if(!$conn) {
        echo "ERROR: Database Connection Error";
    } 
?>