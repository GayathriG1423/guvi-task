<?php
// Start a session

session_start();
   // if(!isset($_SESSION["email"]))
   // {
   //  header("location: login1.php");
   // }
$email=  $_SESSION["email"];
//$email = $_GET['email'];
$id="";


// Check if the user is logged in
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     // Redirect to the login page
//     header('Location: login1.php');
//     //header("Location: update.php?id=$id");
//     exit;
// }

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test_db');
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}


// Prepare the statement
$stmt = mysqli_prepare($db, "SELECT id, username, email,landmark,pincode,address,dob,age,contact FROM users where email=?");

mysqli_stmt_bind_param($stmt, "s", $email);
// Execute the statement
mysqli_stmt_execute($stmt);

// Bind the result variables
mysqli_stmt_bind_result($stmt, $id, $name, $email,$landmark,$pincode,$address,$dob,$age,$contact);
// Start the HTML table
 // echo "<table>";
 // echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

// Display the data
$rows = array();
while ($row=mysqli_stmt_fetch($stmt)) {

    //echo "<tr><td>" . $id . "</td><td>" . $name . "</td><td>" . $email . "</td></tr>";



     $rows[] = $row;

}
//$_SESSION['id'] = $id;


// End the HTML table

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($db);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="profile.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>My Profile</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body style="background-color: #CBD5F0;">
  <form action="login1.php" method="post" enctype="multipart/form-data" style="padding-left: 150px;
      padding-top: 250px;
      padding-right: 100px;">
  <h2>My Profile</h2>
  <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Landmark</th>
      <th>Pincode</th>
      <th>Address</th>
      <th>DOB</th>
      <th>Age</th>
      <th>Contact</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rows as $row):  ?>
    <tr>
      <td><?php echo $id; ?> </td>
      <td><?php echo $name; ?></td>
      <td><?php echo $email; ?></td>
      <td><?php echo $landmark; ?></td>
      <td><?php echo $pincode; ?></td>
      <td><?php echo $address; ?></td>
      <td><?php echo $dob; ?></td>
      <td><?php echo $age; ?></td>
      <td><?php echo $contact; ?></td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br>
<br >
        <div class="text-center">To edit profile <a href="update2.php?id=<?php echo urlencode($id); ?>">Update</a></div>
        <div class="text-center"><a href="logout.php">Logout</a></div>

</body>
</html>
