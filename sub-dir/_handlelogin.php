<?php
      session_start();
      $showAlert = false;
      $showError = false;
      if($_SERVER['REQUEST_METHOD']=='POST'){
            require '_dbconnect.php';
            $loginmail = $_POST['loginEmail'];
            $loginpass = $_POST['loginPass'];
            
            $log_sql = "SELECT * FROM tb_user WHERE user_email = '$loginmail'";
            $result = mysqli_query($con,$log_sql) or die(mysqli_error($con));
            $numrows = mysqli_num_rows($result);
            if($numrows==1){
                  $row = mysqli_fetch_assoc($result);
                  if(password_verify($loginpass,$row['user_pass'])){
                        $_SESSION['loggined'] = true;
                        $_SESSION['sno'] = $row['sno'];
                        $_SESSION['usermail'] = $loginmail;
                        header('location:../index.php');
                  }
                  else{
                  //       $showError = '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
                  //       <strong>Alert!</strong> You can not login, please check the email or password.
                  //       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  //             <span aria-hidden="true">&times;</span>
                  //       </button>
                  // </div>';
                        header('location:../index.php?login_error=false');
                  }
                  
            }
            header('location:../index.php');
      }