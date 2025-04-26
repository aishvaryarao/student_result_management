<?php
include 'db_connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];

    // First, check if student exists
    $studentQuery = "SELECT * FROM students WHERE student_id = '$student_id'";
    $studentResult = $conn->query($studentQuery);

    if ($studentResult->num_rows > 0) {
        $student = $studentResult->fetch_assoc();
        echo "<h2>Results for: " . htmlspecialchars($student['name']) . " (" . htmlspecialchars($student['student_id']) . ")</h2>";
        echo "<h3>Department: " . htmlspecialchars($student['department']) . "</h3>";

        // Fetch marks
        $marksQuery = "SELECT marks.subject_code, subjects.subject_name, marks.marks_obtained 
                       FROM marks 
                       JOIN subjects ON marks.subject_code = subjects.subject_code 
                       WHERE marks.student_id = '$student_id'";

        $marksResult = $conn->query($marksQuery);

        if ($marksResult->num_rows > 0) {
            echo "<table border='1' cellpadding='10'>";
            echo "<tr><th>Subject Code</th><th>Subject Name</th><th>Marks Obtained</th></tr>";

            while ($row = $marksResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['subject_code']) . "</td>";
                echo "<td>" . htmlspecialchars($row['subject_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['marks_obtained']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No marks found for this student.</p>";
        }

    } else {
        echo "<p>Student not found. Please check the Student_id and try again.</p>";
    }
}

$conn->close();
?>
