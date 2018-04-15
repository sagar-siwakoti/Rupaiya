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
                              <form class="form-horizontal" name="login" action="login.php" method="post">
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
                              <form class="form-horizontal" action="signup.php" method="post">
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