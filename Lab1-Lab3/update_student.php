<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Students_Db1";

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Підключення не встановлено: " . $conn->connect_error);
}

$id = $_POST['id'];
$surname = $_POST['surname'];
$birth_year = $_POST['birth_year'];
$gender = $_POST['gender'];
$group_name = $_POST['group_name'];
$faculty = $_POST['faculty'];
$average_score = $_POST['average_score'];

$sql = "UPDATE students SET 
    surname='$surname', 
    birth_year=$birth_year, 
    gender='$gender', 
    group_name='$group_name', 
    faculty='$faculty', 
    average_score=$average_score 
    WHERE id=$id";

if (mysqli_query($conn, $sql) === TRUE) {
    echo "Інформація про студента успішно оновлена.";
} else {
    echo "Помилка оновлення інформації: " . $conn->error;
}

$conn->close();
?>
