<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$landmark="";
$address="";
$errors = "";
$count = 0;
$dob=

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test_db');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $landmark = mysqli_real_escape_string($db, $_POST['landmark']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $address = mysqli_real_escape_string($db, $_POST['address']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
    $errors= "The two passwords do not match";
    $count++;
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
  // Username already exists
  echo "Username/email already exists.<br>";
  $errors++;
}
else{
  // Finally, register user if there are no errors in the form


  	//$password = md5($password_1);//encrypt the password before saving in the database
    $stmt = $db->prepare("INSERT INTO users (username, email, password,landmark,pincode,address) VALUES (?, ?, ?,?,?,?)");

  	// $query = "INSERT INTO users (username, email, password,landmark,pincode,address)
  	// 		  VALUES('$username', '$email', '$password','$landmark','$pincode','$address')";
  	// mysqli_query($db, $query);
  	// $_SESSION['username'] = $username;
  	// $_SESSION['success'] = "You are now logged in";

    $stmt->bind_param("ssssss", $username, $email, $password_1,$landmark,$pincode,$address);

// Execute the prepared statement
if ($stmt->execute()) {
  header("location: login1.php");

    // Data inserted successfully
    echo "Data inserted successfully";
} else {
    // Error inserting data
    echo "Error inserting data";
}

}
}
if (isset($error)) {
echo $error;
}

?>
