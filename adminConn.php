<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'election system';

    $conn = mysqli_connect("localhost", "root", "", "election system");

    $nyaxo = "SELECT *FROM admin WHERE email = $email;
?>