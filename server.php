<?php
session_start();

// initializing variables
$studentID = "";
$Uname = "";
$Uemail    = "";
$errors = array();


// connect to the database
require_once 'dbconfig.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {
  
  // receive all input values from the form
  $studentID = mysqli_real_escape_string($db, $_POST['studentID']);
  $Uname = mysqli_real_escape_string($db, $_POST['Uname']);
  $Uemail = mysqli_real_escape_string($db, $_POST['Uemail']);
  $userPass1 = mysqli_real_escape_string($db, $_POST['userPass1']);
  $userPass2 = mysqli_real_escape_string($db, $_POST['userPass2']);

   // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE studentID='$studentID' OR Uemail='$Uemail' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if ($userPass1 != $userPass2) {

    array_push($errors, "The two passwords do not match");
    echo "<script>alert('Password do not match');
    window.location.href='page-register.php';
    </script>";
  }

   // if user exists
    else if ($user['studentID'] === $studentID) {
      
      array_push($errors, "Student ID already exist");
      echo "<script>alert('Student ID already exist');
    window.location.href='page-register.php';
    </script>";
    } 
  

  // Finally, register user if there are no errors in the form
  else {
      	//$password = md5($password;//encrypt the password before saving in the database

  	$query = "INSERT INTO user (studentID, userPass, Uname, Uemail) 
  			  VALUES('$studentID','$userPass1','$Uname','$Uemail')";
  	mysqli_query($db, $query);
  	echo "<script>alert('Profile Created Successfully');
		window.location.href='page-login.php';
		</script>";
  }
}



// LOGIN USER
if (isset($_POST['login_user'])) {
    $studentID = mysqli_real_escape_string($db, $_POST['studentID']);
    $userPass = mysqli_real_escape_string($db, $_POST['userPass']);
  
    if (count($errors) == 0) {
        //$password = md5($password);
        $query = "SELECT * FROM user WHERE studentID='$studentID' AND userPass='$userPass'";        
        $results = mysqli_query($db, $query);
        $row = mysqli_fetch_array($results);
        if (mysqli_num_rows($results) == 1) {

          $_SESSION['userID'] = $row['userID'];
          $_SESSION['Uemail'] = $row['Uemail'];
          $_SESSION['success'] = "You are now logged in";
          echo "<script>
          alert('You are now logged in');
          window.location.href='app-profile.php';
          </script>";
        }else {
          echo "<script>alert('Wrong Student ID or Password');
          window.location.href='page-login.php';
          </script>";
        }
    }
  }
  
// login admin

if (isset($_POST['login_admin'])) {
  $adminEmail = mysqli_real_escape_string($db, $_POST['adminEmail']);
  $adminPass = mysqli_real_escape_string($db, $_POST['adminPass']);

  if (count($errors) == 0) {

      $query = "SELECT * FROM admin WHERE adminEmail='$adminEmail' AND adminPass='$adminPass'";        
      $results = mysqli_query($db, $query);
      $row = mysqli_fetch_array($results);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['adminEmail'] = $row['adminEmail'];
        $_SESSION['adminID'] = $row['adminID'];
        $_SESSION['success'] = "You are now logged in";
        echo "<script>
        alert('You are now logged in as admin');
        window.location.href='dashboard.php';
        </script>";
      }else {
        echo "<script>alert('Wrong Email or Password');
        window.location.href='page-login-admin.php';
        </script>";
      }
  }
}


  ?>