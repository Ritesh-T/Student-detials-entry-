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

  
$sql = "DELETE FROM student WHERE id='" . $_GET["id"] . "'";

if (mysqli_query($conn, $sql)) {

$_SESSION["error"] = "Deleted Successfully";
    
echo '<script>window.location.href = "index.php";</script>';

}

else{  
    
     echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);

?>



 