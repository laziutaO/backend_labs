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

$student_id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id = $student_id";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_array($result);
} else {
    echo "Студента не знайдено.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update student</title>
</head>
<body>
    <h2>Update student</h2>
    <form id="student_upd" action="update_student.php" method="post">
        <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
        
        <label for="surname">Surname:</label><br>
        <input type="text" id="surname" name="surname" value="<?php echo $row['surname']; ?>" required><br>
        
        <label for="birth_year">Birth year:</label><br>
        <input type="number" id="birth_year" name="birth_year" value="<?php echo $row['birth_year']; ?>" required><br>
        
        <label for="gender">Gender:</label><br>
        <input type="radio" id="male" name="gender" value="M" <?php if ($row['gender'] == 'M') echo 'checked'; ?> required> Male
        <input type="radio" id="female" name="gender" value="F" <?php if ($row['gender'] == 'F') echo 'checked'; ?> required> Female<br>
        
        <label for="group_name">Group name:</label><br>
        <input type="text" id="group_name" name="group_name" value="<?php echo $row['group_name']; ?>" required><br>
        
        <label for="faculty">Faculty:</label><br>
        <input type="text" id="faculty" name="faculty" value="<?php echo $row['faculty']; ?>" required><br>
        
        <label for="average_score">Average score:</label><br>
        <input type="number" step="0.01" id="average_score" name="average_score" value="<?php echo $row['average_score']; ?>" required><br><br>
        
        <input type="submit" value="Update student">
    </form>
    <a href="show_tables.php">Return to the main page</a>
</body>
</html>