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

// Підключення до бази даних
$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS students (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    surname VARCHAR(50) NOT NULL,
    birth_year INT(4) NOT NULL,
    gender ENUM('M', 'F') NOT NULL,
    group_name VARCHAR(50) NOT NULL,
    faculty VARCHAR(50) NOT NULL,
    average_score FLOAT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Таблиця students успішно створена або вже існує<br>";
} else {
    echo "Помилка створення таблиці: " . $conn->error . "<br>";
}

$conn->close();
?>