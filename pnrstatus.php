<?php 
session_start();
$conn = mysqli_connect("localhost","root","","railway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$pnr=$_POST['pnr'];
$sql = "SELECT t_status FROM tickets WHERE PNR= '$pnr'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
	if($row==NULL)	echo "<script type='text/javascript'>alert('PNR not found');</script>";
	else echo "<script type='text/javascript'>alert('Your status is ' +'$row[t_status]');</script>";	
}
if (isset($_POST['cancel']))
{
    if (isset($_POST['pnr'])) {
        $pnr = mysqli_real_escape_string($conn, $_POST['pnr']); 
        $sql = "DELETE FROM tickets WHERE PNR='$pnr'";

        if(mysqli_query($conn, $sql))
            echo "<script type='text/javascript'>alert('Your ticket has been cancelled');</script>";
        else 
            echo "<script type='text/javascript'>alert('Cancellation failed');</script>";    
    } else {
        echo "<script type='text/javascript'>alert('PNR not provided');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PNR Status</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#pnr{
			margin:auto;
			margin-top: 50px;
			width: 30%;
			height: 10%;
			padding: auto;
			padding-top: 50px;
			padding-left: 50px;
			background-color: rgba(0,0,0,0.3);
			border-radius: 25px;
 
		}
		html { 
		  background: url('pic1.jpg') no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#pnrtext	{
			padding-top: 10px;
		}
	</style>
</head>
<body>
<?php
include("header.php"); ?>
<center>
	<div id="pnr"><font color="white"> Check your PNR status here:</font><br/>
	<form method="post" name="pnrstatus" action="pnrstatus.php">
	<div id="pnrtext"><input type="text" name="pnr" size="30" maxlength="10" placeholder="Enter PNR here"></div>
	<br/><br/>
	<input type="submit" name="submit" value="Check here!" class="button" id="submit"><br/><br/>
	<?php  
		if(isset($_SESSION['user_info'])){
			echo '<form action="pnrstatus.php" method="post"><input type="submit" class="button" value="Cancel your ticket!" name="cancel" id="cancel"/></form>';
        }
		else
			echo '<A HREF="register.php">Login/Register</A>';
		?>
	</form>
	</div>
</center>
</body>
</html>