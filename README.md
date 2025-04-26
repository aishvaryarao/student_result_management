🎓 Student Result Management System
This is a simple web application to manage student results using PHP, MySQL, HTML, CSS, and JavaScript.
It supports adding students, adding subjects, and entering/updating marks.

🛠️ Features
Add new students with ID, name, and department
Add subjects with code and name
Enter or update marks for students
Auto-updates database with cascading changes
Simple and responsive admin dashboard

📂 Project Structure
bash
Copy
Edit
student_result_system/
│
├── css/                # CSS styling files
├── .vscode/            # VS Code config (optional)
├── admin.php           # Handles admin actions
├── admin-dashboard.html # Admin dashboard frontend
├── db_connect.php      # Database connection
├── home.html           # Home page
├── student.php         # Student page backend
├── student.html        # Student page frontend
├── style.css           # Main CSS file
└── README.md           # Project Documentation

🧩 Database Setup
1. Create the Database
sql
Copy
Edit
CREATE DATABASE student_result_db;

2. Create the Tables
students
sql
Copy
Edit
CREATE TABLE students (
    student_id VARCHAR(20) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    department VARCHAR(50) NOT NULL
);
subjects
sql
Copy
Edit
CREATE TABLE subjects (
    subject_code VARCHAR(20) PRIMARY KEY,
    subject_name VARCHAR(100) NOT NULL
);
marks
sql
Copy
Edit
CREATE TABLE marks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20),
    subject_code VARCHAR(20),
    marks_obtained INT,
    FOREIGN KEY (student_id) REFERENCES students(student_id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (subject_code) REFERENCES subjects(subject_code)
        ON DELETE CASCADE ON UPDATE CASCADE

);

🖥️ How to Run the Project
Install XAMPP and start Apache and MySQL.
Copy the project folder (student_result_system) into C:\xampp\htdocs\.
Open phpMyAdmin and import/create the database and tables as shown above.
Visit http://localhost/student_result_system/home.html in your browser.

📌 Important Notes
Ensure your database credentials match in db_connect.php.
Foreign keys are set to cascade on delete/update.
Keep student_id and subject_code unique.

🚀 Future Improvements
Student login panel
Admin authentication
Generate mark sheets
View results department-wise

🧑‍💻 Author
Aishvarya V
Feel free to contribute or suggest improvements!
