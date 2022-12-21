<?php session_start(); ?> 
<div class="flex flex-col h-screen">
<div><?php include "header.php"; ?></div>
<div class="flex flex-grow justify-center">
    <?php
    include_once 'database.php';

    $courses = mysqli_query($conn, "SELECT * FROM courses"); 
    // -- INNER JOIN exams ON courses.exam = exams.ID
    // -- INNER JOIN lecturers ON courses.Lecturer = lecturers.ID");

    $examDates = mysqli_query($conn, "SELECT * FROM exams");
    while($row = mysqli_fetch_array($examDates))
        {
        $exam_array[] = $row;
        }
    if (mysqli_num_rows($courses)>0 ) {
    ?>
    <table class="w-[100%] max-w-7xl mb-10 m-12 border-b-2 border-stone-800 text-stone-800 rounded-xl">
    
    <tr class="text-xl bg-sky-900 text-sky-100 p-12">
        <th class="mb-5 w-36">Course code</th>
        <th class="mb-5">Course Name</th>
        <th class="mb-5">Course description</th>
        <!-- <th class="mb-5">Lecturer name</th>
        <th class="mb-5">Assignment name</th>
        <th class="mb-5">Assignment date</th> -->
    </tr>
    <?php


    $i=0;
    while($row = mysqli_fetch_array($courses)) {
    ?>    
    <tr class="text-lg">
        <td class="pl-4 py-5 border-b-2 w-36"><?php echo $row["courseCode"]; ?></td>
        <td class="pl-4 py-5 border-b-2 w-80"><?php echo $row["courseName"]; ?></td>
        <td class="pl-4 py-5 border-b-2 leading-8"><?php echo $row["courseDesc"]; ?></td>
        <!-- <td class="pl-4"><?php echo $row["first_name"] ." ".$row["last_name"];  ?></td>
        <td class="pl-4"><?php echo $row["exam_name"]; ?></td>
        <td class="pl-4"><?php echo $row["exam_date"]; ?></td> -->
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
</div>
<div><?php @ require_once ("footer.php"); ?></div>
</div>