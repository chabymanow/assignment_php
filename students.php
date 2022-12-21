<?php session_start(); ?>
<div class="flex flex-col h-screen">
<div><?php include "header.php"; ?></div>
<div class="flex flex-col flex-grow">
<?php

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
include_once 'database.php';

// $student = mysqli_query($conn, "SELECT * FROM students");
$student = mysqli_query($conn,
"SELECT *
  FROM students
  INNER JOIN courses ON students.courseID = courses.courseID

  GROUP BY students.studentID");

$rowcount = mysqli_num_rows($student);
?>
<div class="w-[100%] text-center text-xl bg-sky-800 py-4 text-stone-100"><?php echo "Number of students: " . $rowcount; ?></div>
<div class="flex justify-center">
<table class="m-5 text-stone-800 text-lg">
  
  <tr class="text-xl bg-sky-900 text-sky-100 p-12">
    <th>Code</th>
    <th>First name</th>
    <th>Last name</th>
    <th>Personal email</th>
    <th>Student phone</th>
    <th>Address</th>
    <th>Date Of Birth</th>
    <th>Start date</th>
    <th></th>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($student)) {
?>
<tr>
  <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-28"><?php echo $row["studentCode"]; ?></td>
    <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-28"><?php echo $row["studentFirstName"]; ?></td>
    <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-28"><?php echo $row["studentLastName"]; ?></td>
    <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-32"><?php echo $row["studentEmail"]?></td>
    <!-- <td><?php echo $row["student_email"]; ?></td> -->
    <td class="px-2 py-2 mr-2 border-b-2 border-sky-200"><?php echo $row["studentPhoneNumber"]; ?></td>
    <td class="px-2 py-2 mr-2 border-b-2 border-sky-200"><?php echo $row["studentAddress"]; ?></td>
    <td class="px-2 py-2 mr-2 border-b-2 border-sky-200"><?php echo $row["studentDOB"] ?></td>
    <!-- <td class="px-2 mr-2 border-b-2 border-stone-400">
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
    </td> -->
    <td class="px-2 mr-2 border-b-2 border-sky-200"><?php echo $row["studentStartDate"]; ?></td>
    <td><a class="py-2 px-4 ml-5 rounded-lg bg-gradient-to-tr from-green-400 to-green-700" href="student.php?varname=<?php echo $row["studentID"]; ?>">Edit</a></td>
</tr>
<?php
$i++;
}?>

</table>
</div>
</div>
<?php }else{ ?>
  <div>You are not logged in. You do not have right to see this page</div>
<?php } ?>
<div><?php @ require_once ("footer.php"); ?></div>
</div>
