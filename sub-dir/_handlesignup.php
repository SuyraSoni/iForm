<?php
      $showAlert = false;
      $showError = false;
      if($_SERVER['REQUEST_METHOD']=='POST'){
            require '_dbconnect.php';
            $mail = $_POST['signupemail'];
            $pass = $_POST['signuppassword'];
            $cpass = $_POST['signupcpassword'];

            #Exist User
            $exist_sql = "SELECT * FROM tb_user WHERE user_email = '$mail'";
            $result = mysqli_query($con,$exist_sql) or die(mysqli_error($con));
            $numrows = mysqli_num_rows($result);
            if($numrows>0){

                  $showError = "Email already used";
                  // $showError = '
                  //             <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                  //                   <strong>Warning!</strong> Mail ID already used.
                  //                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  //                         <span aria-hidden="true">&times;</span>
                  //                   </button>
                  //             </div>';
            }
            else{
                  if($pass == $cpass){
                       $hash = password_hash($pass, PASSWORD_DEFAULT);
                       $sql = "INSERT INTO tb_user(user_email,user_pass,timestamp) VALUES('$mail','$hash',current_timestamp())";
                       $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                       if($result){
                             $showAlert = true; 
                             header("location:../index.php?signupsuccess=true");
                             exit();
                       }
                  }
                  else{
                        $showError = "Passwords does not match.";
                        //  $showError=  '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                        //       <strong>Warning!</strong> Passwords does not match.
                        //       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        //             <span aria-hidden="true">&times;</span>
                        //       </button>
                        // </div>';
                       
                  }
            }
            header("location:..\index.php?signupsuccess=false&error=$showError");
      }
?>