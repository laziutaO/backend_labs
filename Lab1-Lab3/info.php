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

$sql = "SELECT COUNT(*) AS total_students FROM students";
$result = mysqli_query($conn, $sql);
$total_students = mysqli_fetch_assoc($result)['total_students'];

$sql = "SELECT COUNT(*) AS total_workplaces FROM workplaces";
$result = mysqli_query($conn, $sql);
$total_workplaces = mysqli_fetch_assoc($result)['total_workplaces'];

$sql = "SELECT COUNT(*) AS last_students FROM students WHERE DATE_SUB(CURDATE(), INTERVAL 1 MONTH) <= created_at";
$result = mysqli_query($conn, $sql);
$last_students = mysqli_fetch_assoc($result)['last_students'];

$sql = "SELECT COUNT(*) AS last_workplaces FROM workplaces WHERE DATE_SUB(CURDATE(), INTERVAL 1 MONTH) <= created_at";
$result = mysqli_query($conn, $sql);
$last_workplaces = mysqli_fetch_assoc($result)['last_workplaces'];

$sql = "SELECT * FROM students ORDER BY created_at DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$last_student = mysqli_fetch_assoc($result);

$sql = "SELECT students.id, students.surname, COUNT(workplaces.id) AS workplace_count 
        FROM students 
        LEFT JOIN workplaces ON students.id = workplaces.student_id 
        GROUP BY students.id 
        ORDER BY workplace_count DESC 
        LIMIT 1";
$result = mysqli_query($conn, $sql);
$most_related_student = mysqli_fetch_assoc($result);
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Статистика веб-сайту</title>
</head>
<body>
    <h2>Статистика веб-сайту</h2>
    <p>Всього записів у першій таблиці: <?php echo $total_students; ?></p>
    <p>Всього записів у другій таблиці: <?php echo $total_workplaces; ?></p>
    <p>Записів у першій таблиці за останній місяць: <?php echo $last_students; ?></p>
    <p>Записів у другій таблиці за останній місяць: <?php echo $last_workplaces; ?></p>
    <h3>Останній запис у першій таблиці:</h3>
    <p>ID: <?php echo $last_student['id']; ?></p>
    <p>Прізвище: <?php echo $last_student['surname']; ?></p>
    <p>Дата створення: <?php echo $last_student['created_at']; ?></p>
    <h3>Запис у першій таблиці з найбільшою кількістю пов’язаних записів у другій таблиці:</h3>
    <p>ID: <?php echo $most_related_student['id']; ?></p>
    <p>Прізвище: <?php echo $most_related_student['surname']; ?></p>
    <p>Кількість пов’язаних записів: <?php echo $most_related_student['workplace_count']; ?></p>
    <a href='show_tables.php'>Return to the main page</a>
</body>
</html>
