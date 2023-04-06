
<?php
$_SESSION["email"]="email";

// Create a database connection
$db = mysqli_connect('localhost', 'root', '', 'test_db');
$error ="";
// Check if the connection was successful
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

    $id = $_GET['id'];

    // Fetch the profile data from the database
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($db, $sql);

    if (!$result) {
        die("Error fetching profile data: " . mysqli_error($db));
    }

    $profile = mysqli_fetch_assoc($result);


// Check if the form was submitted
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $email= $_POST['email'];
    $address = $_POST['address'];
    $landmark = $_POST['landmark'];
    $pincode = $_POST['pincode'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];

//     // Update the profile data in the database
//     $stmt= $db->prepare("UPDATE users SET username = ?, email = ?,landmark =?,pincode=?,address = ?,dob = ?,age = ?,contact = ? WHERE id = ?" );
//     $stmt->bind_param("ssssssssi", $username, $email,$landmark,$pincode,$address,$dob,$age,$contact,$id);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     if ($result === false) {
//     // Query failed, print the error message
//     echo "Error updating user: " . $error[2];
// } else {
//     // Query succeeded
//     echo "User updated successfully";
// }
     $sq = "UPDATE users SET username = '$username',  email= '$email', landmark ='$landmark',pincode='$pincode',address = '$address',dob = '$dob',contact = '$contact',age = '$age'
                   WHERE id = $id";
if (mysqli_query($db, $sq)) {
    // Query executed successfully
    echo "Record updated successfully";
    header("location: profile.php");
  //  header("location: profile.php?email=".urlencode($email));
} else {
    // Query failed
    echo "Error updating record: " . mysqli_error($db);
}


}

// Close the database connection
mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="style3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>My Profile</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body style="background-color: #CBD5F0;">
<body>
    <form action="" method="POST">
      <h1>Update your profile</h1>
      <label>Username: </label>
        <input type="text" name="name" value="<?php echo $profile['username']; ?>">
        <label>Email: </label>
        <input type="email" name="email" value="<?php echo $profile['email']; ?>">
        <label>Landmark: </label>
        <input type="text" name="landmark" value="<?php echo $profile['landmark']; ?>">
        <label>Pincode: </label>
        <input type="text" name="pincode" value="<?php echo $profile['pincode']; ?>">
        <label>Address: </label>
        <input type="text" name="address" value="<?php echo $profile['address']; ?>">
        <label>DOB: </label>
        <input type="text" name="dob" value="<?php echo $profile['dob']; ?>">
        <label>Age: </label>
        <input type="text" name="age" value="<?php echo $profile['age']; ?>">
        <label>Contact: </label>
        <input type="text" name="contact" value="<?php echo $profile['contact']; ?>">
        <button type="submit" name="submit" style="background-color: #EFB7BA;
        color: #fff;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.25rem;
        cursor: pointer;">Update Profile</button>
    </form>
</body>
</html>
