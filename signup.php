<?php
include("functions.php");
if (isset($_POST['usernamesignup']) && trim($_POST['passwordsignup']) != "") {
    $name = mysqli_real_escape_string($conn, $_POST['usernamesignup']);
    $query = "SELECT * from user where UserName='$name'";
    $result = $conn->query($query);
    if ($result->num_rows < 1) {
        $fname = mysqli_real_escape_string($conn, $_POST['fullnamesignup']);
        $fname = strip_tags($fname);

        $uname = mysqli_real_escape_string($conn, $_POST['usernamesignup']);
        $uname = strip_tags($uname);

        $uemail = mysqli_real_escape_string($conn, $_POST['emailsignup']);
        $uemail = strip_tags($uemail);

        $upass = mysqli_real_escape_string($conn, $_POST['passwordsignup']);
        $upass = md5($upass);

$query = sprintf("INSERT INTO `user` (`FullName`, `UserName`, `Email`, `Password`) VALUES ('%s', '%s', '%s','%s');",$fname, $uname, $uemail, $upass);

        if ($conn->query($query) === TRUE) {
        	header("location:index.php");
			echo '<div class="alert alert-success" role="alert">
						<span class="glyphicon glyphicon-ok" aria-hidden="true">
						</span> 
						Your account has been created successfully!
					</div>';

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
			echo '<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-remove" aria-hidden="true">
					</span> 
					You already have an account and can access from login form.
				</div>';
    }
}
?>