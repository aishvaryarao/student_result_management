<?php
include 'db_connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST['action'] ?? '';

    if ($action === "add_student") {
        $student_id = $_POST['student_id'];
        $name = $_POST['name'];
        $department = $_POST['department'];

        $sql = "INSERT INTO students (student_id, name, department) VALUES ('$student_id', '$name', '$department')";
        if ($conn->query($sql) === TRUE) {
            echo "Student added successfully!";
        } else {
            echo "Error: " . $conn->error;
        }

    } elseif ($action === "add_subject") {
        $subject_code = $_POST['subject_code'];
        $subject_name = $_POST['subject_name'];

        $sql = "INSERT INTO subjects (subject_code, subject_name) VALUES ('$subject_code', '$subject_name')";
        if ($conn->query($sql) === TRUE) {
            echo "Subject added successfully!";
        } else {
            echo "Error: " . $conn->error;
        }

    } elseif ($action === "enter_marks") {
        $student_id = $_POST['student_id'];
        $subject_code = $_POST['subject_code'];
        $marks = $_POST['marks'];

        $sql = "INSERT INTO marks (student_id, subject_code, marks_obtained) VALUES ('$student_id', '$subject_code', '$marks')";
        if ($conn->query($sql) === TRUE) {
            echo "Marks entered successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Invalid action specified.";
    }
} else {
    echo "Invalid request method. Only POST is allowed.";
}

$conn->close();
?>
