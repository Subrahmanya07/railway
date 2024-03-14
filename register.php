<?php
session_start();
$conn = mysqli_connect("localhost","root","","railway");
if(!$conn){  
    echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $age=$_POST['age'];
    $mob=$_POST['mob'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $pw=$_POST['pw'];
    $cpw=$_POST['cpw'];
    $sql = "INSERT INTO passengers (p_fname, p_lname, p_age, p_contact, p_gender, email, password) VALUES ('$fname', '$lname', '$age', '$mob', '$gender', '$email', '$pw')";
    if(mysqli_query($conn, $sql))
    {  
        $message = "You have been successfully registered";
    }
    else
    {  
        $message = "Could not insert record"; 
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<HTML>
<HEAD>
    <TITLE>Register on Indian Railways</TITLE>
    <LINK REL="STYLESHEET" HREF="STYLE.CSS">
    <style type="text/css">
        body {
            background: url('slide2.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        #register_form {
            background-color: rgba(50, 50, 50, 0.8);
            width: 40%;
            margin: 50px auto 20px auto;
            border-radius: 15px;
            border: 2px white;
            padding: 5px; /* Adjusted padding */
            box-sizing: border-box;
        }

        #register_form table {
            width: 100%;
        }

        #register_form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 1px; /* Adjusted margin-bottom */
            border: 1px solid lavender;
            border-radius: 5px;
            box-sizing: border-box;
        }
        #register_form input[type="radio"] {
            margin: 5px;
        }

        #submit, #reset, #update, #delete {
            background-color: lavender;
            color: #222;
            padding: 5px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #submit:hover, #reset:hover, #update:hover, #delete:hover {
            background-color: #a6a6f7;
        }

        hr {
            border-color: blue;
            display: block;
            margin-top: 5px; /* Adjusted margin-top */
            margin-bottom: 5px; /* Adjusted margin-bottom */
        }

        #logintext {
            margin-top: 10px;
            font-size: 18px;
        }

        #login {
            margin-top: 10px;
            margin-bottom: 10px; /* Adjusted margin-bottom */
            background-color: lavender;
            color: #222;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #login:hover {
            background-color: #a6a6f7;
        }
    </style>
    <SCRIPT src="validation.js"></SCRIPT>
</HEAD>
<BODY  background="img/wallpaper1.jpg" link="white" alink="white" vlink="white" width="1024" height="768">
<?php include("header.php") ?>
<div id="register_form" align="center" height="200" width="200">
    <FORM name="register" method="post" action="register.php" onsubmit="return validate()">
        <TABLE border="0">
            <CAPTION><FONT size="6" color="WHITE"><br/>Enter your details:</FONT></CAPTION>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <TR class="left">
                <TD><FONT size="5" color="WHITE">First name:</FONT></TD>
                <TD><INPUT name="fname" type="TEXT" placeholder="Enter your first name" size="30" maxlength="30" align="center" id="fname"></TD>
            </TR><tr></tr><tr></tr>
            <TR class="left">
                <TD><FONT size="5" color="WHITE">Last name:</FONT></TD>
                <TD><INPUT type="TEXT" name="lname" align="center" size="30" maxlength="30" placeholder="Enter your last name" id="lname"></TD>
            </TR><tr></tr><tr></tr>
            <TR class="left">
                <TD><FONT size="5" color="WHITE">Age:</FONT></TD>
                <TD><INPUT type="TEXT" name="age" align="center" size="30" maxlength="3" placeholder="Enter age" id="age"></TD>
            </TR><tr></tr><tr></tr>
            <TR class="left">
                <TD><FONT size="5" color="WHITE">Mobile Number:</FONT></TD>
                <TD><INPUT type="TEXT" name="mob" size="30" maxlength="10" placeholder="Enter your mobile number" id="mob"></TD>
            </TR><tr></tr><tr></tr>
            <TR class="left">
                <TR class="left">
                    <TD><FONT size="5" color="WHITE">Gender:</FONT></TD>
                    <TD>&nbsp;&nbsp;<font color="white" size="4">
                            <INPUT type="radio" name="gender" value="Male" align="center" id="gender">Male<font color="white">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="Female" align="center" id="gender">Female
                </TD>
            </TR><tr></tr><tr></tr>
            <TR class="left">
                <TD><FONT size="5" color="WHITE">E-Mail ID:</FONT></TD>
                <TD><INPUT name="email" type="TEXT" id="email" placeholder="Enter your E-Mail ID" size="30" maxlength="30"></TD>
            </TR><tr></tr><tr></tr>
            <TR class="left">
                <TD><FONT size="5" color="WHITE">Password:</FONT></TD>
                <TD><INPUT type="PASSWORD" name="pw" size="30"  id="pw"></TD>
            </TR><tr></tr><tr></tr>
            <TR class="left">
                <TD><FONT size="5" color="WHITE">Confirm Password:</FONT></TD>
                <TD><INPUT type="PASSWORD" name="cpw" size="30" id="cpw"></TD>
            </TR><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr></tr><tr></tr><tr></tr>
        </TABLE>
        <P>
            <INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button" onclick="if(!this.form.tc.checked){alert('You must agree to the terms first.');return false}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <INPUT TYPE="Reset" value="Reset" id="reset" class="button">
            <INPUT TYPE="button" value="Update" id="update" class="button">
            <INPUT TYPE="button" value="Delete" id="delete" class="button">
        </P>
    </FORM><br/>
    <HR width="450" style="border-color: blue;display: block;" noshade>
    <FORM action="login.php">
        <P align="CENTER" id="logintext"><FONT size="6" color="white" face="Arial">
                Already have an account with us?<BR/></FONT></FONT>
            <INPUT TYPE="submit" value="Login" id="login" class="button">
        </P>
    </FORM></div>
</BODY>
</HTML>
