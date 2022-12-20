<?php
include_once 'database.php';

$studentIdErr = $firstNameErr = $lastNameErr = $personalEmailErr = $studentEmailErr = $phoneNumberErr = $addressErr = $courseIdErr = "";
$student_id = $first_name = $last_name = $personal_email = $student_email = $phone_number = $address = $course_id = "";
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
       
        if(empty($_POST["student_id"])){
            $studentIdErr = "Student ID is required!";
        }else{
            $ids = $_POST["student_id"];
            echo "--" . $ids . "--";
            $sql = "SELECT * FROM students WHERE student_ID = '$ids'";
            if($result = mysqli_query($conn, $sql)){
                $rowcount = mysqli_fetch_array($result, MYSQLI_NUM);
                if ($rowcount == 0){
                    $student_id = $_POST["student_id"];
                }else{
                    $studentIdErr = "This student ID is exist already!";
                }
            }else{
                echo "PRoblem";
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

        if(empty($_POST["student_email"])){
            $studentEmailErr = "Student email is required!";
        }else{
            $email = $_POST["student_email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $studentEmailErr = "Invalid email format";
            }else{
                $student_email = mysqli_real_escape_string($conn, $_POST["student_email"]);
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
        if(!$student_id == "" and !$first_name == "" and !$last_name == "" and !$personal_email == "" and !$student_email == "" and !$phone_number == "" and !$address == "" and !$course_id == ""){
            echo $student_id, $first_name, $last_name, $personal_email, $student_email, $phone_number, $address, $course_id;
            $sendData = mysqli_query($conn,"INSERT INTO students (first_name, last_name, student_ID, photo, personal_email, student_email, phone_number, address, course_ID, start_date)
            VALUES ('$first_name', '$last_name', '$student_id', '$photo', '$personal_email', '$student_email', '$phone_number', '$address', '$course_id', now())");
            if ($sendData){
                echo "<script> location.href='index.php'; </script>";
                exit;
            }else{
                echo "Something wrong: \n" . mysqli_error($conn);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<?php
    

    $courses = mysqli_query($conn, "SELECT * FROM courses");

    $courseData = array();

    while($row = mysqli_fetch_array($courses)){
            $courseData[] = $row;
        }
    ?>
    <form action="addStudent.php" method="POST">
        <h1>Add new student</h1>
        <label for="student_id">Student ID</label>
        <span class="error"> <?php echo $studentIdErr;?></span><br>
        <input type="text" name="student_id" id="student_id" value=<?php echo $student_id ?>></br>

        <label for="first_name">First name</label>
        <span class="error"> <?php echo $firstNameErr;?></span><br>
        <input type="text" name="first_name" id="first_name" value=<?php echo $first_name ?>></br>

        <label for="last_name">Last name</label>
        <span class="error"> <?php echo $lastNameErr;?></span><br>
        <input type="text" name="last_name" id="last_name" value=<?php echo $last_name ?>></br>

        <label for="personal_email">Personal email</label>
        <span class="error"> <?php echo $personalEmailErr;?></span><br>
        <input type="text" name="personal_email" id="personal_email" value=<?php echo $personal_email ?>></br>

        <label for="student_email">Student email</label>
        <span class="error"> <?php echo $studentEmailErr;?></span><br>
        <input type="text" name="student_email" id="student_email" value=<?php echo $student_email ?>></br>

        <label for="phone_number">Phone number</label>
        <span class="error"> <?php echo $phoneNumberErr;?></span><br>
        <input type="text" name="phone_number" id="phone_number" value=<?php echo $phone_number ?>></br>

        <label for="address">Address</label>
        <span class="error"> <?php echo $addressErr;?></span><br>
        <input type="text" name="address" id="address" value=<?php echo $address ?>></br>

        <label for="course_id">Course ID</label>
        <select name="course_id" id="course_id"> 
        <?php
        foreach($courseData as $row){
        ?>
            <option value=<?php echo $row["course_ID"]; ?>>
              <?php echo $row["course_ID"] . " | " . $row["course_name"]; ?>
            </option>
          <?php
          }
        ?>
      </select>

        <input class="submit" type="submit" name="submit" value="Add student" />
    </form>
</body>
</html>