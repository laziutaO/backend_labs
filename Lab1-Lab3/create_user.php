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

$sql = "GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost'
IDENTIFIED BY 'admin' WITH GRANT OPTION";

if ($conn->query($sql) === TRUE) {
    echo "Успішно створено нового користувача <br>";
} else {
    echo "Помилка створення користувача: " . $conn->error . "<br>";
}

$conn->close();
?>