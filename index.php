    <?php include ("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Rupaiya - Daily Expense Manager</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
      <link rel="icon" type="image/png" href="images/favicon.png" />
      <meta name=viewport content="width=device-width, initial-scale=1">
   </head>
   <body>
      <div style="padding:10px; margin:10px;">
         <div class="panel panel-primary">
            <div class="panel-heading" align="center"><img height="25px" width="25px" src="images/favicon.png" alt=""> Rupaiya</div>
            <div class="panel-body">
               <div class="col-lg-12">
                  <div class="row">
                     <div class="col-lg-3">
                        <!-- for login -->
                        <div class="panel panel-success">
                           <div class="panel-heading" align="center"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Signin</div>
                           <div class="panel-body">
                              <form class="form-horizontal" name="login" action="index.php" method="post">
                                 <div class="form-group">
                                    <label for="userName" class="col-sm-3 control-label">Username</label>
                                    <div class="col-sm-10">
                                       <input type="text" class="form-control" id="userName" placeholder="User Name" name="username" required>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="Password" class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-10">
                                       <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                    </div>
                                 </div>
                                 <?php /*echo $wrongpass;*/ ?>
                                 <div class="form-group">
                                    <div class="col-sm-10">
                                       <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                 </div>
                              </form>
<?php   
  $wrongpass = '';
  $wronginfo = '<div class="alert alert-danger" role="alert">  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Wrong login detail</div>';

  if(isloggedin()==FALSE)
  {
  }
  else
  {
  header("location:home.php");  
    
  }
    
    if(isset($_POST['username']) && ($_POST['password']))
  {

  $pass= mysqli_real_escape_string($conn, $_POST['password']);
  $username= mysqli_real_escape_string($conn, $_POST['username']);
  $query = sprintf("SELECT * FROM `user` where `UserName`='%s';",$username);
  $result = $conn->query($query);

  if ($result->num_rows < 1) 
    {
        $wrongpass = $wronginfo;
    }

   while($row = $result->fetch_assoc()) 
      {
    if(md5($pass)==$row['Password'])
    {
      $_SESSION['logged_in']=TRUE;
      $_SESSION['id']=$row['UserID'];
      $_SESSION['unaam']=$row['UserName'];
      session_start();
      header("location:home.php");
    }
    else
     {
      $wrongpass = $wronginfo;
     }
      }
    }


 ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-5">
                        <!-- For Slideshow -->
                     </div>
                     <div class="col-lg-4">
                        <!-- for signup -->
                        <div class="panel panel-primary">
                           <div class="panel-heading" align="center"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Create New User</div>
                           <div class="panel-body">
                              <form class="form-horizontal" action="index.php" method="post">
                                <div class="form-group">
                                    <label for="fullName" class="col-sm-3 control-label">FullName</label>
                                    <div class="col-sm-10">
                                       <input type="text" class="form-control" autocomplete="off" required id="fullNameSignup" placeholder="Full Name" name="fullnamesignup" required>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label for="userNameSignup" class="col-sm-3 control-label">Username</label>
                                    <div class="col-sm-10">
                                       <input type="text" class="form-control" autocomplete="off" required id="userNameSignup" placeholder="User Name" name="usernamesignup" required>
                                       <div id="displayMessage"></div>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-10">
                                       <input type="email" id="emailSignup" name="emailsignup" class="form-control"  autocomplete="off" required placeholder="Email">
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label for="passwordSignup" class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-10">
                                       <input type="password" name="passwordsignup" class="form-control" id="passwordSignup" required placeholder="Password">
                                    </div>
                                 </div>

                                 <div class="form-group">                                    
                                    <div class="col-sm-10">
                                      <label><input type="checkbox" required> Agree terms and conditions</label>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <div class="col-sm-10">
                                       <button type="submit" class="btn btn-success">Create</button>
                                    </div>
                                 </div>
                              </form>
<?php
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
        $query = sprintf("INSERT INTO `user` (`FullName`, `UserName`, `Email`, `Password`) VALUES ('%s', '%s', '%s','%s');", $fname, $uname, $uemail, $upass);
        if ($conn->query($query) === TRUE) {
            echo '<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Your account has been created successfully!
</div>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> You already have an account and can access from login form
</div>';
    }
}
?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript">   
        $(document).ready(function () {
          $("#userNameSignup").keyup(function () {
            var username = $('#userNameSignup').val();
            if (username == "") {
              $("#displayMessage").html("");
            } else {
              $.ajax({
                type: "POST",
                url: "check.php",
                data: "username=" + username,
                success: function (html) {
                  $("#displayMessage").html(html);
                }
              });
              return false;
            }
          });
        });
      </script>
   </body>
</html>


