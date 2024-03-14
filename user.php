<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Railway Reservation System</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background: url('slide3.jpg')
    }

    .container {
        background-color: rgba(50, 50, 50, 0.8);
            width: 40%;
            margin: 50px auto 20px auto;
            border-radius: 15px;
            border: 2px white;
            padding: 5px; /* Adjusted padding */
            box-sizing: border-box;
    }

    #user_form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 1px; 
            border: 1px solid lavender;
            border-radius: 5px;
            box-sizing: border-box;
            border: 2px white;
        }
    label {
      margin-bottom: 8px;
    }

    input, select {
      margin-bottom: 16px;
      padding: 8px;
      border: 1px solid white;
      border-radius: 4px;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "your_server_name";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database_name";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve form data
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        $city = $_POST['city'];
        $pincode = $_POST['pincode'];

        // SQL query to insert data into the database
        $sql = "INSERT INTO users (first_name, last_name, gender, phone, age, city, pincode)
                VALUES ('$fname', '$lname', '$gender', '$phone', '$age', '$city', '$pincode')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
      }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <label for="fname">First Name:</label>
      <input type="text" id="fname" name="fname" required>

      <label for="lname">Last Name:</label>
      <input type="text" id="lname" name="lname" required>

      <label for="gender">Gender:</label>
      <select id="gender" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>

      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" required>

      <label for="age">Age:</label>
      <input type="number" id="age" name="age" required>

      <label for="city">City:</label>
      <input type="text" id="city" name="city" required>

      <label for="pincode">Pincode:</label>
      <input type="text" id="pincode" name="pincode" required>

      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>
