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

$pattern = $_POST['pattern'] ?? '';
if (!empty($pattern)) {
    $sql = "SELECT * FROM students WHERE surname LIKE '%$pattern%'";
}

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
              </tr>";
    }
    echo "</table>";
} else {
    echo "No students found";
}

$conn->close();
?>
