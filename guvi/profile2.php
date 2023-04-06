<?php

require_once("db_conn.php");
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
  </head>

  <h1>User Profile</h1>
<div class="profile-input-field">
        <h3>Please Fill-out All Fields</h3>
        <form method="post" action="#" >
          <div class="form-group">
            <label>Fullname</label>
            <input type="text" class="form-control" name="username" style="width:20em;" placeholder="Username" value="<?php echo $row['username']; ?>" required />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" style="width:20em;" placeholder="Email" required value="<?php echo $row['email']; ?>" />
          </div>
          <div class="form-group">
            <label>Landmark</label>
            <input type="text" class="form-control" name="landmark" style="width:20em;" placeholder="Landmark" value="<?php echo $row['landmark']; ?>">
          </div>
          <div class="form-group">
            <label>Pincode</label>
            <input type="text" class="form-control" name="pincode" style="width:20em;" placeholder="Pincode" value="<?php echo $row['pincode']; ?>">
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" style="width:20em;" placeholder="Address" value="<?php echo $row['address']; ?>">
          </div>
          <div class="form-group">
            <label>Dob</label>
            <input type="date" class="form-control" name="dob" style="width:20em;" placeholder="Dob" value="<?php echo $row['dob']; ?>">
          </div>
          <div class="form-group">
            <label>Age</label>
            <input type="number" class="form-control" name="age" style="width:20em;" placeholder="Age" value="<?php echo $row['age']; ?>">
          </div>
          <div class="form-group">
            <label>Contact</label>
            <input type="number" class="form-control" name="contact" style="width:20em;" required placeholder="Contact" value="<?php echo $row['contact']; ?>"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
            <center>
             <a href="logout.php">Log out</a>
           </center>
          </div>
        </form>
      </div>
      </html>
