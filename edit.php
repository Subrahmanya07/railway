<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "railway");
if (!$conn) {
    echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: ' . mysqli_connect_error());
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $mob = $_POST['mob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

    $sql = "UPDATE passengers SET p_fname='$fname', p_lname='$lname', p_age='$age', p_contact='$mob', p_gender='$gender', email='$email' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $message = "Record updated successfully";
    } else {
        $message = "Error updating record: " . mysqli_error($conn);
    }

    echo "<script type='text/javascript'>alert('$message');</script>";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM passengers WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<HTML>
<HEAD>
    <TITLE>Edit Passenger</TITLE>
    <LINK REL="STYLESHEET" HREF="STYLE.CSS">
    <style type="text/css">
        /* Add your CSS styles here */
    </style>
</HEAD>
<BODY>
    <?php include("header.php"); ?>
    <div align="center">
        <h2>Edit Passenger Information</h2>
        <form method="post" action="edit.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            First Name: <input type="text" name="fname" value="<?php echo $row['p_fname']; ?>"><br><br>
            Last Name: <input type="text" name="lname" value="<?php echo $row['p_lname']; ?>"><br><br>
            Age: <input type="text" name="age" value="<?php echo $row['p_age']; ?>"><br><br>
            Mobile Number: <input type="text" name="mob" value="<?php echo $row['p_contact']; ?>"><br><br>
            Gender:
            <input type="radio" name="gender" value="Male" <?php if ($row['p_gender'] == 'Male') echo 'checked'; ?>> Male
            <input type="radio" name="gender" value="Female" <?php if ($row['p_gender'] == 'Female') echo 'checked'; ?>> Female
            <br><br>
            Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br><br>
            <input type="submit" name="update" value="Update">
        </form>
    </div>
</BODY>
</HTML>
