<?php

 session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name  =  $_POST['name'];
$student_registration  =  $_POST['student_registration']; 
$class = $_POST['class']; 
$maths_marks  =  $_POST['maths_marks'];
$hindi_marks  =  $_POST['hindi_marks'];
$english_marks  =  $_POST['english_marks'];
$history_marks  =  $_POST['history_marks'];
$geography_marks  =  $_POST['geography_marks'];

$total_marks = $maths_marks + $hindi_marks + $english_marks + $history_marks + $geography_marks;

$percent = $total_marks*100;

$percentage1 = $percent/5;

$percentage = $percentage1/100;

if($percentage > 33){

$result = 'pass';

}

else{


$result = 'fail';


}

$sql = "INSERT INTO Student (name, student_registration, class, maths_marks, hindi_marks, english_marks, history_marks, geography_marks, total_marks, percentage, result, create_date ) VALUES ('$name', '$student_registration', '$class', '$maths_marks', '$hindi_marks', '$english_marks', '$history_marks', '$geography_marks', '$total_marks', '$percentage', '$result',  now() )";

var_dump($sql);

if (mysqli_query($conn, $sql)) {

$_SESSION["Success"] = "Added Successfully";
    
echo '<script>window.location.href = "index.php";</script>';


}

else{ 
    
    echo "Database error occured";
}


mysqli_close($conn);

?>



 