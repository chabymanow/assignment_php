<?php

include_once 'database.php';

$courses = mysqli_query($conn,
"SELECT courses.course_name, courses.course_ID, exams.exam_name, exams.exam_date, lecturers.first_name, lecturers.last_name 
  FROM courses 
  INNER JOIN exams ON courses.exam = exams.ID
  INNER JOIN lecturers ON courses.Lecturer = lecturers.ID");


// $student = mysqli_query($conn, "SELECT * FROM students");
$student = mysqli_query($conn,
"SELECT students.*, courses.course_name, courses.course_ID, exams.exam_name, exams.exam_date
  FROM students
  INNER JOIN courses ON students.course_ID = courses.course_ID
  INNER JOIN exams ON students.course_ID = exams.course_ID
  GROUP BY students.ID");

$rowcount = mysqli_num_rows($student);
$examDates = mysqli_query($conn, "SELECT * FROM exams");

while($row = mysqli_fetch_array($examDates))
    {
    $exam_array[] = $row;
    }
?>
<!DOCTYPE html>
<html>
 <head>
 <title>My college student system :||:</title>
 <!-- <link rel="stylesheet" href="style.css" /> -->
  <script src="https://cdn.tailwindcss.com"></script>
 </head>
<body class="bg-sky-300 text-stone-800 font-bolder">

<?php
include "nav.php";

if (mysqli_num_rows($courses)>0 ) {
?>
  <table>
  
  <tr className="text-3xl">
    <th>Course ID</th>
    <th>Course Name</th>
    <th>Lecturer name</th>
    <th>Assignment name</th>
    <th>Assignment date</th>
  </tr>
<?php


$i=0;
while($row = mysqli_fetch_array($courses)) {
?>    
<tr>
    <td><?php echo $row["course_ID"]; ?></td>
    <td><?php echo $row["course_name"]; ?></td>
    <td><?php echo $row["first_name"] ." ".$row["last_name"];  ?></td>
    <td><?php echo $row["exam_name"]; ?></td>
    <td><?php echo $row["exam_date"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>

<table>
  
  <tr>
    <th>First name</th>
    <th>Last name</th>
    <th>Student ID</th>
    <th>Personal email</th>
    <th>Student email</th>
    <th>Phone number</th>
    <th>Address</th>
    <th>Course</th>
    <th>Assignment name</th>
    <th>Start date</th>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($student)) {
?>
<tr>
    <td><?php echo $row["first_name"]; ?></td>
    <td><?php echo $row["last_name"]; ?></td>
    <td><?php echo $row["student_ID"]; ?></td>
    <td><?php echo $row["personal_email"]; ?></td>
    <td><?php echo $row["student_email"]; ?></td>
    <td><?php echo $row["phone_number"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["course_ID"] ." ". $row["course_name"]; ?></td>
    <td>
      <select name="exam" id="exam"> 
        <?php
        foreach($exam_array as $exam_data){
          if ($row["course_ID"] == $exam_data["course_ID"]){
        ?>
            <option value=$exam_data["exam_name"]>
              <?php echo $exam_data["exam_name"] . " | " . $exam_data["exam_date"]; ?>
            </option>
          <?php
          }
        }
        ?>
      </select>
    </td>
    <td><?php echo $row["start_date"]; ?></td>
</tr>
<?php
$i++;
}
echo "Database row count: " . $rowcount;
echo "Number of rows: " . $i;
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
 </body>
</html>