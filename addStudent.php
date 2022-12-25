<?php session_start(); ?> 
<div class="flex flex-col h-screen">
    <div><?php include "header.php"; ?></div>
    <div class="flex flex-col flex-grow">
        <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            include_once 'database.php';
            include "generator.php";
            $studentIdErr = $firstNameErr = $lastNameErr = $personalEmailErr = $studentEmailErr = $phoneNumberErr = $addressErr = $courseIdErr = $dobErr = "";
            $student_code = $first_name = $last_name = $personal_email = $student_email = $phone_number = $address = $course_id = $dob = "";
            $photo = "None";
            $writeData = FALSE;

            // $student_ids = array();

            // $stuID = mysqli_query($conn, "SELECT student_id FROM students");
            // while($row = mysqli_fetch_array($stuID)){
            //     $student_ids[] = $row;
            // }

            // foreach($student_ids as $ids){
            //     echo $ids["student_id"] . " | ";
            // }
            function isDigits(string $s, int $minDigits = 9, int $maxDigits = 14): bool {
                return preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $s);
            }

            function isValidTelephoneNumber(string $telephone, int $minDigits = 9, int $maxDigits = 14): bool {
                if (preg_match('/^[+][0-9]/', $telephone)) { //is the first character + followed by a digit
                    $count = 1;
                    $telephone = str_replace(['+'], '', $telephone, $count); //remove +
                }
                
                //remove white space, dots, hyphens and brackets
                $telephone = str_replace([' ', '.', '-', '(', ')'], '', $telephone); 

                //are we left with digits only?
                return isDigits($telephone, $minDigits, $maxDigits); 
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST["submit"])){
                
                    if(empty($_POST["student_code"])){
                        $studentIdErr = "Student code is required!";
                    }else{
                        $ids = $_POST["student_code"];
                        echo "--" . $ids . "--";
                        $sql = "SELECT * FROM students WHERE studentCode = '$ids'";
                        if($result = mysqli_query($conn, $sql)){
                            $rowcount = mysqli_fetch_array($result, MYSQLI_NUM);
                            if ($rowcount == 0){
                                $student_code = $_POST["student_code"];
                            }else{
                                $studentIdErr = "This student Code is exist already!";
                            }
                        }else{
                            echo "Problem";
                        }
                        
                    }

                    if(empty($_POST["first_name"])){
                        $firstNameErr = "First name is required!";
                    }else{
                        $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
                    }

                    if(empty($_POST["last_name"])){
                        $lastNameErr = "Last name is required!";
                    }else{
                        $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
                    }

                    if(empty($_POST["dob"])){
                        $dobErr = "Date of birth is required!";
                    }else{
                        $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
                    }

                    if(empty($_POST["personal_email"])){
                        $personalEmailErr = "Personal email is required!";
                    }else{
                        $email = $_POST["personal_email"];
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $personalEmailErr = "Invalid email format";
                        }else{
                            $personal_email = mysqli_real_escape_string($conn, $_POST["personal_email"]);
                        }
                    }

                    if(empty($_POST["phone_number"])){
                        $phoneNumberErr = "Phone number is required!";
                    }else{
                        if (isValidTelephoneNumber($_POST["phone_number"])){
                        $phone_number = $_POST["phone_number"];
                        }else{
                            $phoneNumberErr = "Phone number is not in the correct format!";
                        }
                    }

                    if(empty($_POST["address"])){
                        $addressErr = "Address is required!";
                    }else{
                        $address = $_POST["address"];
                    }

                    if(empty($_POST["course_id"])){
                        $courseIdErr = "Course ID is required!";
                    }else{
                        $course_id = $_POST["course_id"];
                    }
                    if(!$student_code == "" and !$first_name == "" and !$last_name == "" and !$personal_email == "" and !$student_email == "" and !$phone_number == "" and !$address == "" and !$course_id == ""){
                        echo $student_code, $first_name, $last_name, $personal_email, $student_email, $phone_number, $address, $course_id;
                        $sendData = mysqli_query($conn,"INSERT INTO students (studentFirstName, studentLastName, studentCode, studentPhoto, studentEmail, studentPhoneNumber, studentAddress, courseID, studentDOB, studentStartDate)
                        VALUES ('$first_name', '$last_name', '$student_code', '$photo', '$personal_email', '$student_email', '$phone_number', '$address', '$course_id', '$dob', now())");
                        if ($sendData){
                            echo "<script> location.href='index.php'; </script>";
                            exit;
                        }else{
                            echo "Something wrong: \n" . mysqli_error($conn);
                        }
                    }
                }
            }
         } ?>

<?php
    

    $courses = mysqli_query($conn, "SELECT * FROM courses");

    $courseData = array();

    while($row = mysqli_fetch_array($courses)){
            $courseData[] = $row;
        }
    ?>
    
    <div class="w-[100%] flex justify-center items-center mb-6">
    <div class="w-[30%] h-fit items-center bg-sky-500 rounded-2xl py-10 px-5 border-1 sql-shadow">

    <form class="flex flex-col gap-0.5" action="addStudent.php" method="POST">
        <h1 class="text-center text-4xl font-bold">Add new student</h1>
        <label for="student_code">Student Code</label>
        <span class="text-red-600 text-sm font-bold"> <?php echo $studentIdErr;?></span><br>
        <input class="h-10 rounded-lg text-lg px-2" type="text" name="student_code" id="student_code" value=<?php echo $student_code ?>></br>

        <label for="first_name">First name</label>
        <span class="text-red-600 text-sm font-bold"> <?php echo $firstNameErr;?></span><br>
        <input class="h-10 rounded-lg text-lg px-2" type="text" name="first_name" id="first_name" value=<?php echo $first_name ?>></br>

        <label for="last_name">Last name</label>
        <span class="text-red-600 text-sm font-bold"> <?php echo $lastNameErr;?></span><br>
        <input class="h-10 rounded-lg text-lg px-2" type="text" name="last_name" id="last_name" value=<?php echo $last_name ?>></br>

        <label for="dob">Date of birth</label>
        <span class="text-red-600 text-sm font-bold"> <?php echo $dobErr;?></span><br>
        <input class="h-10 rounded-lg text-lg px-2" type="date" name="dob" id="dob" value=<?php echo $dob ?>></br>

        <label for="personal_email">Personal email</label>
        <span class="text-red-600 text-sm font-bold"> <?php echo $personalEmailErr;?></span><br>
        <input class="h-10 rounded-lg text-lg px-2" type="text" name="personal_email" id="personal_email" value=<?php echo $personal_email ?>></br>

        <label for="phone_number">Phone number</label>
        <span class="text-red-600 text-sm font-bold"> <?php echo $phoneNumberErr;?></span><br>
        <input class="h-10 rounded-lg text-lg px-2" type="text" name="phone_number" id="phone_number" value=<?php echo $phone_number ?>></br>

        <label for="address">Address</label>
        <span class="text-red-600 text-sm font-bold"> <?php echo $addressErr;?></span><br>
        <input class="h-10 rounded-lg text-lg px-2" type="text" name="address" id="address" value=<?php echo $address ?>></br>

        <label for="course_id">Course ID</label>
        <select class="h-10 rounded-lg text-lg px-2" name="course_id" id="course_id"> 
        <?php
        foreach($courseData as $row){
        ?>
            <option value=<?php echo $row["courseCode"]; ?>>
              <?php echo $row["courseCode"] . " | " . $row["courseName"]; ?>
            </option>
          <?php
          }
        ?>
      </select>

        <input class="submit px-4 py-2 text-stone-100 text-lg bg-gradient-to-br from-sky-600 to-sky-800 rounded-xl mt-3 cursor-pointer shadow-gray-900 shadow-md hover:text-stone-200 hover:font-semibold hover:shadow-sm hover:shadow-gray-700" type="submit" name="submit" value="Add student" />
    </form>
    </div>
</div>
<div><?php @ require_once ("footer.php"); ?></div>