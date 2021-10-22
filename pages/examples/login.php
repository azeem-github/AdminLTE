<?php
session_start();
?>
<?php include('includes/header.php'); ?> 

<?php

$erroremail = '';
$errorpassword='';                                                                                                                                                                         
if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];


    
    if(empty($email)){
        $erroremail .= "Email Is Required";
    }

    if(empty($password)){
        $errorpassword .= "Password Is Required";
    }


    $conn = mysqli_connect('localhost', 'root', '', 'admins');
    //echo "SELECT * FROM user WHERE email = '$email' and password = '$password'";
    //exit();
    $query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' and password = '$password'");

    if(mysqli_num_rows ($query) > 0){
        $_SESSION['email'] = $email ;
        header("Location: ./index.php");
        echo "log in Successfull";
    } else{
        echo "Couldn't login";
    }
}

?>

<body class="hold-transition login-page">
   <div class="login-box">
     <div class="login-logo">
       <b>LOGIN</b> LTE
     </div>
     <!-- /.login-logo -->
     <div class="card">
       <div class="card-body login-card-body">
         <p class="login-box-msg">Sign in to start your session</p>
   
         <form action = "" method="POST">
           <div class="input-group mb-3">
             <input type="email" name="email" class="form-control" placeholder="Email">
             <div class="input-group-append">
               <div class="input-group-text">
                 <span class="fas fa-envelope"></span>
               </div>
             </div>
           </div>
           <span style="color:black"></span><span style="color:red";><?php echo $erroremail;?></span>

           <div class="input-group mb-3">
             <input type="password" name="password" class="form-control" placeholder="Password">
             <div class="input-group-append">
               <div class="input-group-text">
                 <span class="fas fa-lock"></span>
               </div>
             </div>
           </div>
          <span style="color:red";><?php echo $errorpassword;?></span>
           <div class="row">
             <div class="col-8">
               <div class="icheck-primary">
                 <input type="checkbox" id="remember">
                 <label for="remember">
                   Remember Me
                 </label>
               </div>
             </div>
             <!-- /.col -->
             <div class="col-4">
               <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
             </div>
             <!-- /.col -->
           </div>
         </form>
   
         <div class="social-auth-links text-center mb-3">
           <!-- <p>- OR -</p>
           <a href="#" class="btn btn-block btn-primary">
             <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
           </a> -->
           <!-- <a href="#" class="btn btn-block btn-danger">
             <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
           </a> -->
         </div>
         <!-- /.social-auth-links -->
   
         <!-- <p class="mb-1">
           <a href="forgot-password.html">I forgot my password</a>
         </p> -->
         <!-- <p class="mb-0">
           <a href="register.html" class="text-center">Register a new membership</a>
         </p> -->
       </div>
       <!-- /.login-card-body -->
     </div>
   </div>
   <!-- /.login-box -->
   
   <!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
   