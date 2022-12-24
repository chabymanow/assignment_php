<?php session_start(); ?> 
<div class="flex flex-col h-screen">
<div><?php include "header.php"; ?></div>
<div class="flex flex-grow justify-center">
<?php
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        include_once 'database.php';
        include "generator.php";

        // echo generateView($_GET['varname']);
        $var_value = $_GET['varname'];
        $student = generateView($_GET['varname']);
?>
<div class="w-[80%] flex flex-row gap-5 self-center">
    <?php
        $i=0;
        while($row = mysqli_fetch_array($student)) { 
            $course = $row["courseID"];
            $exams = mysqli_query($conn, "SELECT * FROM exams WHERE courseID = '$course'");
            $timeTable = generateTimetable($_GET['varname']);
            $examRes = mysqli_query($conn, "SELECT * FROM exam_results WHERE studentID = '$var_value'");
            $examResLong = mysqli_num_rows($examRes);
            
    ?>
    <div class="flex flex-col w-[50%] gap-5">  
        <div class="flex flex-row gap-5 items-center">
            <span class="w-32">Photo: </span>
            <!-- <img src=<?php echo $row["studentPhoto"]?> /> -->
            <img class="rounded-xl" src=<?php echo generatePhoto()?> />
            
        </div>
        <div class="flex flex-row gap-5 items-center">
            <span class="w-32">Student ID: </span>
            <div class="text-lg py-2 px-5 w-80 rounded-md bg-sky-200"><?php echo $row["studentCode"]; ?></div>
        </div>
        <div class="flex flex-row gap-5 items-center">
            <span class="w-32">First name: </span>
            <div class="text-lg py-2 px-5 w-80 rounded-md bg-sky-200"><?php echo $row["studentFirstName"]; ?></div>
        </div>
        <div class="flex flex-row gap-5 items-center">
            <span class="w-32">Last name: </span>
            <div class="text-lg py-2 px-5 w-80 rounded-md bg-sky-200"><?php echo $row["studentLastName"]; ?></div>
        </div>
        <div class="flex flex-row gap-5 items-center">
            <span class="w-32">Email: </span>
            <div class="text-lg py-2 px-5 w-80 rounded-md bg-sky-200"><?php echo $row["studentEmail"]; ?></div>
        </div>
        <div class="flex flex-row gap-5 items-center">
            <span class="w-32">Phone number: </span>
            <div class="text-lg py-2 px-5 w-80 rounded-md bg-sky-200"><?php echo $row["studentPhoneNumber"]; ?></div>
        </div>
        <div class="flex flex-row gap-5 items-center">
            <span class="w-32">Course ID: </span>
            <div class="text-lg py-2 px-5 w-80 rounded-md bg-sky-200"><?php echo $row["courseCode"]; ?></div>
        </div>
        <div class="flex flex-row gap-5 items-center">
            <span class="w-32">Course name: </span>
            <div class="text-lg py-2 px-5 w-80 rounded-md bg-sky-200"><?php echo $row["courseName"]; ?></div>
        </div>       
    
    <?php } ?>
    <span class="text-xl">Timetable</span>
    <?php while($row = mysqli_fetch_array($timeTable)) {?>       
                    <div class="flex flex-col">                 
                        <div class="text-lg py-2 px-5 w-80 rounded-md bg-sky-200">
                            <?php echo $row["timetable_day"]; ?>:
                            <?php echo $row["timetable_begin_time"]; ?> -
                            <?php echo $row["timetable_end_time"]; ?>
                        </div>
                    </div>

            <?php } ?>
            </div>
    <div class="flex flex-col w-[50%] gap-5">
        <?php while($row = mysqli_fetch_array($exams)) {?>
        <div class="flex flex-col gap-5">  
            <div class="flex flex-row gap-5 items-center">
                <span class="w-32">Exam name: </span>
                <div class="text-lg py-2 px-5 w-80 rounded-md bg-sky-200"><?php echo $row["exam_name"]; ?></div>
            </div>
            <div class="flex flex-row gap-5 items-center">
                <span class="w-32">Exam date: </span>
                <div class="text-lg py-2 px-5 w-80 rounded-md bg-sky-200"><?php echo $row["exam_date"]; ?></div>
            </div>
            <!-- <div class="flex flex-row gap-5 items-center">
                <span class="w-32">Exam details: </span>
                <div class="text-lg py-2 px-5 w-80 rounded-md bg-sky-200"><?php echo $row["exam_description"]; ?></div>
            </div> -->
            <?php } ?>
            <span class="text-xl">Exam results</span>
            <?php
                if($examResLong > 0){
                    while($row = mysqli_fetch_array($exam)){ ?>
                        <div class="text-lg py-2 px-5 w-80 rounded-md bg-sky-200"><?php echo $row["exam_result"]; ?></div>
                    <?php }
                }else{ ?>
                    <div class="text-lg py-2 px-5 w-80 rounded-md bg-sky-200"><?php echo "No result yet"; ?></div>
               <?php }
            ?>
                
                
               
        </div>
    </div>
</div>
</div>
<?php }else{ ?>
  <div>You are not logged in. You do not have right to see this page</div>
<?php } ?>

<div><?php @ require_once ("footer.php"); ?></div>
</div>
