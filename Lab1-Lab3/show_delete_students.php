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

$sql = "SELECT * FROM students ORDER BY surname ASC";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    echo "<form action='delete_student.php' method='post'>";
    echo "<table border='1'>
            <tr>
                <th>Delete</th>
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
                <td><input type='checkbox' name='delete_ids[]' value='" . $row['id'] . "'></td>
                <td>" . $row['id'] . "</td>
                <td><a href='workplace.php?id=" . $row['id'] . "'>" . $row['surname'] . "</a></td>
                <td>" . $row['birth_year'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td>" . $row['group_name'] . "</td>
                <td>" . $row['faculty'] . "</td>
                <td>" . $row['average_score'] . "</td>
              </tr>";
    }
    echo "</table>";
    echo "<input type='submit' value='Delete'>";
    echo "</form>";
} else {
    echo "0 results";
}

$conn->close();
?>

