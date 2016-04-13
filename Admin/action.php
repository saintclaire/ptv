<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");
if(isset($_POST['Submit'])) {
    $loginId = $_SESSION['id']; 
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $date_of_birth = $_POST['date_of_birth'];
    $sex = $_POST['sex'];
    $occupation = $_POST['occupation'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $tithe = $_POST['tithe'];
    $arrival_date = $_POST['arrival_date'];
    $classification = $_POST['classification'];
    $department = $_POST['department'];
    $cell_name = $_POST['cell_name'];
    $cell_classification = $_POST['cell_classification'];


    // checking empty fields
    if(empty($firstname)) {
     
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result = mysql_query("INSERT INTO members (login_id, firstname, lastname, date_of_birth, sex, occupation, country, address, phone, email, tithe, arrival_date, classification, department, cell_name, cell_classification ) VALUES('$loginId','$firstname','$lastname','$date_of_birth','$sex','$occupation','$country','$address','$phone','$email','$tithe','$arrival_date','$classification','$department','$cell_name','$cell_classification')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='view.php'>View Result</a>";
    }
}

?>

