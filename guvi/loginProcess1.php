<?php

// Initialize the session
session_start();

// Include database connection file
// initializing variables

$email    = "";
$username="";
$errors = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test_db');

// Define variables and initialize with empty values
$ok = true;
$email = $password = "";
$username_err = $password_err = $err="";

// Processing form data when form is submitted
if(isset($_POST['save'])){
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  // $email = isset($_POST['username']) ? $_POST['email'] : '';
  //   $password = isset($_POST['password']) ? $_POST['password_1'] : '';


    // Check if username is empty
    if(empty(trim($_POST["email"]))){
      $ok = false;
        $email_err = "Please enter the eamil.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password_1"]))){
      $ok = false;
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password_1"]);
    }

    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT  * FROM users WHERE email = ? AND password=?";

        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_email ,$param_pass);

            // Set parameters
            $param_email = $email;
            $param_pass= $password;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $email, $password);
                    if(mysqli_stmt_fetch($stmt)){{
                            // Password is correct, so start a new session


                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["email"] = $email;
                            $_SESSION["password_1"] = $password;
                            // Redirect user to welcome page
                            header("location: profile.php");
                        } }
                    }else{
                      $ok = false;
                        // Display an error message if username doesn't exist
                         $errors = "Invalid password/username";
                    }
                }
            } else{
              $ok = false;
                 $errors = "Invalid";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
        if (isset($errors)) {
    echo $errors;
}
    }
     // json_encode(
     //        array(
     //            'ok' => $ok,
     //            'messages' => $errors
     //        )
     //    )
    // Close connection

?>


//loginprocess page

<?php

// Initialize the session
session_start();

// Include database connection file
// initializing variables

$email    = "";
$username="";
$errors = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test_db');

// Define variables and initialize with empty values
$ok = true;
$email = $password = "";
$username_err = $password_err = $err="";

// Processing form data when form is submitted
// if(isset($_POST['save'])){
  // $email = mysqli_real_escape_string($db, $_POST['email']);
  // $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $email = isset($_POST['username']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password_1'] : '';

  echo json_encode("{'un': $email}");

    // Check if username is empty
//     if(empty(trim($_POST["email"]))){
//       $ok = false;
//         $email_err = "Please enter the eamil.";
//     } else{
//         $email = trim($_POST["email"]);
//     }
//
//     // Check if password is empty
//     if(empty(trim($_POST["password_1"]))){
//       $ok = false;
//         $password_err = "Please enter your password.";
//     } else{
//         $password = trim($_POST["password_1"]);
//     }
//
//     // Validate credentials
//     if(empty($email_err) && empty($password_err)){
//         // Prepare a select statement
//         $sql = "SELECT  * FROM users WHERE email = ? AND password=?";
//
//         if($stmt = mysqli_prepare($db, $sql)){
//             // Bind variables to the prepared statement as parameters
//             mysqli_stmt_bind_param($stmt, "ss", $param_email ,$param_pass);
//
//             // Set parameters
//             $param_email = $email;
//             $param_pass= $password;
//
//             // Attempt to execute the prepared statement
//             if(mysqli_stmt_execute($stmt)){
//
//                 // Store result
//                 mysqli_stmt_store_result($stmt);
//
//                 // Check if username exists, if yes then verify password
//                 if(mysqli_stmt_num_rows($stmt) == 1){
//                     // Bind result variables
//                     mysqli_stmt_bind_result($stmt, $email, $password);
//                     if(mysqli_stmt_fetch($stmt)){{
//                             // Password is correct, so start a new session
//
//
//                             // Store data in session variables
//                             $_SESSION["loggedin"] = true;
//                             $_SESSION["email"] = $email;
//                             $_SESSION["password_1"] = $password;
//                             // Redirect user to welcome page
//                             header("location: profile.php");
//                         } }
//                     }else{
//                       $ok = false;
//                         // Display an error message if username doesn't exist
//                          $errors = "Invalid password/username";
//                     }
//                 }
//             } else{
//               $ok = false;
//                  $errors = "Invalid";
//             }
//
//             // Close statement
//             mysqli_stmt_close($stmt);
//         }
//         if (isset($errors)) {
//     echo $errors;
// }
    // }
     // json_encode(
     //        array(
     //            'ok' => $ok,
     //            'messages' => $errors
     //        )
     //    )
    // Close connection

?>
