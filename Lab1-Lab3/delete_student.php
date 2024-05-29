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


$delete_ids = $_POST['delete_ids'];

foreach ($delete_ids as $id) {
    $sql = "DELETE FROM workplaces WHERE student_id = $id";
    $result = mysqli_query($conn, $sql);
}

if ($result) {
    echo "Записи місця роботи успішно видалені.<br>";
} else {
    echo "Немає запису для видалення";
}

foreach ($delete_ids as $id) {
    $sql = "DELETE FROM students WHERE id = $id";
    $result = mysqli_query($conn, $sql);
}

if ($result) {
    echo "Записи студента успішно видалені.<br>";
} else {
    echo "Помилка при видаленні запису: " . mysqli_error($conn);
}


$conn->close();
?>

<a href='show_tables.php'>Return to the main page</a>