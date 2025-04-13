CREATE DATABASE diu_lab;
USE diu_lab;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    student_id VARCHAR(20),
    department VARCHAR(50),
    major VARCHAR(50),
    dob DATE,
    address TEXT
);

CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20) NOT NULL,
    course_code VARCHAR(20) NOT NULL,
    course_title VARCHAR(100),
    semester VARCHAR(20),
    grade VARCHAR(5)
);
