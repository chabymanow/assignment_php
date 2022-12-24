<?php

function generateView($value){
    include 'database.php';

    mysqli_query($conn, 
        "CREATE OR REPLACE VIEW studentData AS 
        SELECT * FROM students
        INNER JOIN courses USING (courseID)
        WHERE studentID='$value'");
    $student = mysqli_query($conn, "SELECT * FROM studentData");

    return $student;
}

function generatePhoto(){
    $api_url = 'https://randomuser.me/api/';
    $json_data = file_get_contents($api_url);
    $response_data = json_decode($json_data);
    $user_data = $response_data->results;
    $user_data = array_slice($user_data, 0, 1);
    
    return $user_data[0] -> picture -> large;
}

function generateTimetable($value){
    include 'database.php';

    $timeTable = mysqli_query($conn,
    "SELECT * FROM timetable_handler
    INNER JOIN timetable on timetable_handler.timetableID = timetable.timetableID
    WHERE timetable_handler.studentID = '$value'");

    return $timeTable;
}

function generateStaffmembers(){
    include 'database.php';

    $staffMembers = mysqli_query($conn,
    "SELECT * FROM staff INNER JOIN staff_phone on staff.staffID = staff_phone.staffID");

    return $staffMembers;
}
?>