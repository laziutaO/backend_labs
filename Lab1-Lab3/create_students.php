<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Students_Db1";

// Створення підключення
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Підключення не встановлено: " . $conn->connect_error);
}

$surname = $_POST['surname'];
$birth_year = $_POST['birth_year'];
$gender = $_POST['gender'];
$group_name = $_POST['group_name'];
$faculty = $_POST['faculty'];
$average_score = $_POST['average_score'];

if (empty($surname) || empty($birth_year) || empty($gender) || empty($group_name) || empty($faculty) || empty($average_score)) {
    die("Усі поля є обов'язковими для заповнення");
}

$sql = "INSERT INTO students (surname, birth_year, gender, group_name, faculty, average_score)
VALUES ('$surname', $birth_year, '$gender', '$group_name', '$faculty', $average_score)";


if (mysqli_query($conn, $sql) === TRUE) {
    echo "Новий студент успішно доданий";
} else {
    echo "Помилка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
