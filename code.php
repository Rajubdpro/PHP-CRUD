<?php
session_start();
include "dbcon.php";
if(isset($_POST['delete_student'])){
  $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);
  $query = "DELETE FROM students WHERE id='$student_id' ";
  $query_ran = mysqli_query($conn, $query);

  if($query_ran){
    $_SESSION['message'] = "Student Deleted succeesfully";
    header("location: index.php");
  }
  else{
    $_SESSION['message'] = "Student Not Deleted";
    header("location: index.php");
  }
}
if(isset($_POST['update_student'])){
  $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
  $name = $_POST['name'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $course = $_POST['course'];

  $query = "UPDATE students SET name='$name', email='$email', phone='$number', course='$course'
   WHERE id='$student_id'";

  $query_run = mysqli_query($conn, $query);
  if($query_ran){
    $_SESSION['message'] = "Student Update succeesfully";
    header("location: index.php");
  }
  else{
    $_SESSION['message'] = "Student not updated";
    header("location: index.php");
  }
}


if(isset($_POST['save_student'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $course = $_POST['course'];

  $sql = "INSERT INTO students (name, email, phone, course)
VALUES ('$course', '$email', '$number', '$course')";

if ($conn->query($sql) === TRUE) {
  $_SESSION['message'] = "Student create succeesfully";
  header("location: student-create.php");
  exit(0);
} else {
  $_SESSION['message'] = "Student create not created";
  header("location: student-create.php");
  exit(0);
}
}
?>