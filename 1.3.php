<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php 

// Database


try {
    // Making the connection to the database and connecting to it
    // mysqli_connect($hostname, $username, $password, $database_name)
    $conn = mysqli_connect("localhost", "root","","ip_assignment");    
} catch (\Throwable $th) {
    die("<h1>Error: Could not connect to the Database</h1>");
}


// ----------------------------------------------------------

function setted($item){
    if(isset($item)){
        return $item;
    }else{
        return NULL;
    }
}

// if the form was submitted.
if(isset($_POST['submit'])){
    // we get user information from they post name
    
    $enrollment = $_POST['enrollment'];
    $name = $_POST['name'];
    $DOB = $_POST['DOB'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $error_count = 0;

// Check for empty form input
    if(empty($enrollment) || empty($name) || empty($DOB) || empty($phone) || empty($email) ){
        $mainHelp = "<br><span class='alert alert-danger'>All fields are required</span>";
        $error_count += 1;
    }

    // Enrollement Validation
    $enrollment_query = "SELECT * FROM `student_form` WHERE `enrollement`='".$enrollment."'";
    $enrollment_query_result = mysqli_query($conn, $enrollment_query);
    if(mysqli_num_rows($enrollment_query_result) != 0){
        $enrollmentHelp = "This student enrollement number already exists";
        $error_count += 1;
    }

    // Name Validation
    // Im using Regex here look for only alphabets and white space.
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameHelp = "Only letters and white space allowed";
        $error_count += 1;
    }


    // Phone number validation
    
    $filterednumber =  filter_var($phone, FILTER_SANITIZE_NUMBER_INT);

    if($filterednumber != $phone){
        $phoneHelp = "Invalid phone number format";
        $error_count += 1;
    }

    // Email Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailHelp = "Invalid email format";
        $error_count += 1;
    }

// if there is'nt any errors then submit
    if($error_count == 0){

        $query = "INSERT INTO `student_form`(`enrollement`, `name`, `dob`, `phone`, `email`) VALUES ('".$enrollment."','".$name."','".$DOB."','".$phone."','".$email."')";
        $query_run = mysqli_query($conn, $query);

        $mainHelp = "<br><span class='alert alert-success'>Submitted Successful</span>";
    }

}

if(isset($_POST['editSubmit'])){
    // we get user information from they post name
    unset($_POST[$_POST['enrollment']]);
    $enrollment = $_POST['enrollment'];
    $name = $_POST['name'];
    $DOB = $_POST['DOB'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $error_count = 0;

// Check for empty form input
    if(empty($enrollment) || empty($name) || empty($DOB) || empty($phone) || empty($email) ){
        $mainHelp = "<br><span class='alert alert-danger'>All fields are required</span>";
        $error_count += 1;
    }

    // Enrollement Validation
    $enrollment_query = "SELECT * FROM `student_form` WHERE `enrollement`='".$enrollment."'";
    $enrollment_query_result = mysqli_query($conn, $enrollment_query);
    if(mysqli_num_rows($enrollment_query_result) == 0){
        $enrollmentHelp = "This student enrollement number does not exist";
        $error_count += 1;
    }

    // Name Validation
    // Im using Regex here look for only alphabets and white space.
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameHelp = "Only letters and white space allowed";
        $error_count += 1;
    }


    // Phone number validation
    
    $filterednumber =  filter_var($phone, FILTER_SANITIZE_NUMBER_INT);

    if($filterednumber != $phone){
        $phoneHelp = "Invalid phone number format";
        $error_count += 1;
    }

    // Email Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailHelp = "Invalid email format";
        $error_count += 1;
    }

// if there is'nt any errors then EditSubmit
    if($error_count == 0){

        $query = "UPDATE `student_form` SET `name`='".$name."',`dob`='".$DOB."',`phone`='".$phone."',`email`='".$email."' WHERE `enrollement`='".$enrollment."'";
        $query_run = mysqli_query($conn, $query);

        $mainHelp = "<br><span class='alert alert-success'>Edit Successful</span>";
    }

}

if(isset($_POST['deleteSubmit'])){
    // we get user information from they post name
    unset($_POST[$_POST['enrollment']]);
    $enrollment = $_POST['enrollment'];
    $name = $_POST['name'];
    $DOB = $_POST['DOB'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $error_count = 0;

    // Enrollement Validation
    $enrollment_query = "SELECT * FROM `student_form` WHERE `enrollement`='".$enrollment."'";
    $enrollment_query_result = mysqli_query($conn, $enrollment_query);
    if(mysqli_num_rows($enrollment_query_result) == 0){
        $enrollmentHelp = "This student enrollement number does not exist: can't perform delete.";
        $error_count += 1;
    }else{
        $query = "DELETE FROM `student_form` WHERE `enrollement`='".$enrollment."'";
        $query_run = mysqli_query($conn, $query);

        $mainHelp = "<br><span class='alert alert-success'>Edit Successful</span>";
    }

}

?>

<form action="<?php echo $_SERVER['SCRIPT_NAME']?>" method="post">
  <center><h1>Student Form</h1></center>
  <div class="mb-3">
    <label for="enrollment" class="form-label">Enter Your Enrollment</label>
    <input type="number" name="enrollment" value="<?php echo setted($enrollment) ?>" class="form-control" id="enrollment" aria-describedby="enrollmentHelp">
    <div id="enrollmentHelp" class="form-text text-danger"><?php echo setted($enrollmentHelp) ?></div>
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Enter Your Name</label>
    <input type="text" name="name" value="<?php echo setted($name) ?>" class="form-control" id="name" aria-describedby="nameHelp">
    <div id="nameHelp" class="form-text text-danger"><?php echo setted($nameHelp) ?></div>
  </div>
  <div class="mb-3">
    <label for="DOB" class="form-label">Date of Birth</label>
    <input type="date" name="DOB" value="<?php echo setted($DOB) ?>" class="form-control" id="DOB" aria-describedby="DOBHelp">
    <div id="DOBHelp" class="form-text text-danger"><?php echo setted($DOBHelp) ?></div>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Enter Phone Number</label>
    <input type="phone" name="phone" value="<?php echo setted($phone) ?>" class="form-control" id="phone" aria-describedby="phoneHelp">
    <div id="phoneHelp" class="form-text text-danger"><?php echo setted($phoneHelp) ?></div>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="text" name="email" value="<?php echo setted($email) ?>" class="form-control" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text text-danger"><?php echo setted($emailHelp) ?></div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <button type="submit" name="editSubmit" class="btn btn-warning">Edit</button>
  <button type="submit" name="deleteSubmit" class="btn btn-danger">Delete</button>
  <div><?php echo setted($mainHelp) ?></div>
</form>


<style>
    form{
        width: 40%;
        margin:20px auto;
    }
</style>

</body>
</html>