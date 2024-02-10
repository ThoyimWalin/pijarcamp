<?php

// Variabel Koneksi Database
$server = "localhost";
$user = "root";
$password = "root";
$database = "pijarcamp";

// queri koneksi
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));
