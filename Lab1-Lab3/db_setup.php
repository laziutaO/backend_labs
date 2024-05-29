<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Students_Db1";

// Створення підключення
$conn = new mysqli($servername, $username, $password);

// Перевірка підключення
if ($conn->connect_error) {
    die("Підключення не встановлено: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "База даних успішно створена або вже існує<br>";
} else {
    echo "Помилка створення бази даних: " . $conn->error . "<br>";
}

$conn->close();
?>