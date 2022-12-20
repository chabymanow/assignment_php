<div class="flex flex-col h-screen">
<div><?php include "header.php"; ?></div>
<div class="flex-grow">
<?php
include_once 'database.php';

// $student = mysqli_query($conn, "SELECT * FROM students");
$student = mysqli_query($conn,
"SELECT students.*, courses.course_name, courses.course_ID, exams.exam_name, exams.exam_date
  FROM students
  INNER JOIN courses ON students.course_ID = courses.course_ID
  INNER JOIN exams ON students.course_ID = exams.course_ID
  GROUP BY students.ID");

$rowcount = mysqli_num_rows($student);
?>
<table class="m-5 text-stone-800">
  
  <tr>
    <th>First name</th>
    <th>Last name</th>
    <th>Student ID</th>
    <th>Personal email</th>
    <th>Student 
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
    <td class="px-2 mr-2 border-b-2 border-stone-400 w-28"><?php echo $row["first_name"]; ?></td>
    <td class="px-2 mr-2 border-b-2 border-stone-400 w-28"><?php echo $row["last_name"]; ?></td>
    <td class="px-2 mr-2 border-b-2 border-stone-400"><?php echo $row["student_ID"]; ?></td>
    <td class="px-2 mr-2 border-b-2 border-stone-400 w-32"><?php echo $row["personal_email"] ."\n". $row["student_email"]; ?></td>
    <!-- <td><?php echo $row["student_email"]; ?></td> -->
    <td class="px-2 mr-2 border-b-2 border-stone-400"><?php echo $row["phone_number"]; ?></td>
    <td class="px-2 mr-2 border-b-2 border-stone-400"><?php echo $row["address"]; ?></td>
    <td class="px-2 mr-2 border-b-2 border-stone-400"><?php echo $row["course_ID"] ." ". $row["course_name"]; ?></td>
    <td class="px-2 mr-2 border-b-2 border-stone-400">
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
    <td class="px-2 mr-2 border-b-2 border-stone-400"><?php echo $row["start_date"]; ?></td>
</tr>
<?php
$i++;
}?>
<div class="w-[100%] text-center text-xl bg-sky-800 py-4 text-stone-100"><?php echo "Number of students: " . $rowcount; ?></div>
</table>
</div>
<div><?php @ require_once ("footer.php"); ?></div>
</div>