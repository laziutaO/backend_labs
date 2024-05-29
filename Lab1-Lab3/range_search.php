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

$min_date = $_POST['min_date'] ?? '';
$max_date = $_POST['max_date'] ?? '';
if (!empty($min_date) && !empty($max_date)) {
    $sql = "SELECT * FROM students WHERE created_at BETWEEN '$min_date' AND '$max_date'";

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Прізвище</th>
                    <th>Рік народження</th>
                    <th>Стать</th>
                    <th>Група</th>
                    <th>Факультет</th>
                    <th>Середній бал</th>
                    <th>Дата створення</th>
                </tr>";
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['surname'] . "</td>
                    <td>" . $row['birth_year'] . "</td>
                    <td>" . $row['gender'] . "</td>
                    <td>" . $row['group_name'] . "</td>
                    <td>" . $row['faculty'] . "</td>
                    <td>" . $row['average_score'] . "</td>
                    <td>" . $row['created_at'] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No students found";
    }
} else {
    echo "Please provide both a start date and an end date.";
}

$conn->close();
?>