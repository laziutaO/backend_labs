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

$student_id = $_GET['id'];

$sql = "SELECT id, workplace, city FROM workplaces WHERE student_id = $student_id";
$result = $conn->query($sql);
$row_id = null;

if ($result->num_rows > 0) {
    while($row = mysqli_fetch_array($result)) {
        echo "<h2>Місце роботи студента</h2>";
        echo "ID: " . $row['id'] . "<br>";
        echo "Місце роботи: " . $row['workplace'] . "<br>";
        echo "Місто: " . $row['city'] . "<br>";
        $row_id = $row['id'];
    }
    
} else {
    echo "Місце роботи відсутнє.<br>";
}
echo "<a href='edit_student.php?id=" . $student_id . "'>Змінити інформацію студента</a><br>";
echo "<a href='show_delete_students.php?id=" . $student_id . "'>Видалити студента</a><br>";

$conn->close();
?>