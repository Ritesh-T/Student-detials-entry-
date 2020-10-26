<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#!">

    <title>Add Student Details</title>

    <link rel="canonical" href="#!">
	<link href="./assets/bootstrap.min.css" rel="stylesheet">
	<link href="./assets/header.css" rel="stylesheet">
    <link href="./assets/floating-labels.css" rel="stylesheet">
  </head>

  <body>
  <header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">
  <a class="navbar-brand mr-0 mr-md-2" href="index.php" aria-label="Bootstrap"><svg class="d-block" width="36" height="36" viewBox="0 0 612 612" xmlns="http://www.w3.org/2000/svg" focusable="false"><title>Student</title><path fill="currentColor" d="M510 8a94.3 94.3 0 0 1 94 94v408a94.3 94.3 0 0 1-94 94H102a94.3 94.3 0 0 1-94-94V102a94.3 94.3 0 0 1 94-94h408m0-8H102C45.9 0 0 45.9 0 102v408c0 56.1 45.9 102 102 102h408c56.1 0 102-45.9 102-102V102C612 45.9 566.1 0 510 0z"></path><path fill="currentColor" d="M196.77 471.5V154.43h124.15c54.27 0 91 31.64 91 79.1 0 33-24.17 63.72-54.71 69.21v1.76c43.07 5.49 70.75 35.82 70.75 78 0 55.81-40 89-107.45 89zm39.55-180.4h63.28c46.8 0 72.29-18.68 72.29-53 0-31.42-21.53-48.78-60-48.78h-75.57zm78.22 145.46c47.68 0 72.73-19.34 72.73-56s-25.93-55.37-76.46-55.37h-74.49v111.4z"></path></svg>
</a>


  <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
   
   
  </ul>
  <a class="btn btn-bd-download d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="add-details.html">Add New Student Details</a>
</header>
    <br/><br/>
	<div class="container-fluid">
	<div class="row">
	<div class="col-lg-12">

     <?php if(isset($_SESSION["error"])){ ?> 


    <div class="alert alert-success">
  <strong>Success!</strong> <?php echo $_SESSION['error']; ?>
                                           
</div>

<?php }

 unset($_SESSION['error']);


 ?>


    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">SNo</th>
      <th scope="col">Student Name</th>
      <th scope="col">Student Registration</th>
      <th scope="col">Class</th>
	  <th scope="col">Maths marks</th>
	  <th scope="col">Hindi marks</th>
	  <th scope="col">English marks</th>
	  <th scope="col">History marks</th>
	  <th scope="col">Geography marks</th>
	  <th scope="col">Total Marks</th>
	  <th scope="col">Percentage</th>
	  <th scope="col">Pass/Fail</th>
	   <th scope="col">Action</th> 
    </tr>
  </thead>
  <tbody>

    <?php 

    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM student";

$res = $conn->query($sql);

$conn->close();
                if ($res->num_rows > 0) {
                while($rows = $res->fetch_assoc()) { 
                ?>   

                <tr>
                 <td><?php echo $rows["id"] ;?></td>
                <td><?php echo $rows["name"] ;?></td>
                <td><?php echo $rows["class"] ;?></td>
                <td><?php echo $rows["student_registration"] ;?></td>
                <td><?php echo $rows["maths_marks"] ;?></td>
                <td><?php echo $rows["hindi_marks"] ;?></td>
                <td><?php echo $rows["english_marks"] ;?></td>
                <td><?php echo $rows["history_marks"] ;?></td>
                <td><?php echo $rows["geography_marks"] ;?></td>
                <td><?php echo $rows["total_marks"] ;?></td>
                <td><?php echo $rows["percentage"] ;?>%</td>
                <td><?php echo $rows["result"] ;?></td>
                 <td> <a onclick="return confirm('Are you sure want to delete ?');" href="delete_data.php?id=<?php echo $rows["id"] ;?>" class="btn btn-danger waves-effect waves-danger">Delete</a></td>


    
     
    </tr>
    <?php }} ?>              

	
  </tbody>
</table>
</div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body></html>