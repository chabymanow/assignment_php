<?php include "header.php"; ?>
<?php
include_once 'database.php';

$courses = mysqli_query($conn,
"SELECT courses.course_name, courses.course_ID, exams.exam_name, exams.exam_date, lecturers.first_name, lecturers.last_name 
  FROM courses 
  INNER JOIN exams ON courses.exam = exams.ID
  INNER JOIN lecturers ON courses.Lecturer = lecturers.ID");

$examDates = mysqli_query($conn, "SELECT * FROM exams");
while($row = mysqli_fetch_array($examDates))
    {
    $exam_array[] = $row;
    }




if (mysqli_num_rows($courses)>0 ) {
?>
  <table class="w-=[100%] mb-10 m-12 border-b-2 border-stone-800 text-stone-800 rounded-xl">
  
  <tr class="text-xl bg-sky-900 text-sky-100 p-12">
    <th class="mb-5">Course ID</th>
    <th class="mb-5">Course Name</th>
    <th class="mb-5">Lecturer name</th>
    <th class="mb-5">Assignment name</th>
    <th class="mb-5">Assignment date</th>
  </tr>
<?php


$i=0;
while($row = mysqli_fetch_array($courses)) {
?>    
<tr class="text-xl">
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


 <?php
}
else{
    echo "No result found";
}
?>
<?php @ require_once ("footer.php"); ?>