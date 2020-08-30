<?php
       require '.\sub-dir\_dbconnect.php';
      session_start();
      
      echo '<nav class="navbar navbar-expand-lg navbar-primary bg-dark">
                  <a class="navbar-brand" href=".\index.php">iForm</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                    <a class="nav-link" href=".\index.php">Home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" href=".\about.php">About</a>
                              </li>
                              <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Categories
                                    </a>
                                    <div class="dropdown-menu my-2" aria-labelledby="navbarDropdown">';

                                          $sql = "SELECT c_name, c_id FROM tb_iform";
                                          $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                                          while($row = mysqli_fetch_assoc($result)){
                                          echo '<a class="dropdown-item" href="threadslist.php?catid='.$row['c_id'].'">'.$row['c_name'].'</a>';
                                          
                                          }
                              echo '</div>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" href=".\contacts.php">Contact</a>
                              </li>
                        </ul>
                        <div class=" row mx-2"> ';
                        if(isset($_SESSION['loggined']) && $_SESSION['loggined']=="true"){
                              echo '
                              <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
                              <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                              <p class="text-light my-0 mx-2">Welcome:'.$_SESSION['usermail'].'</p>
                              <a href="./sub-dir/_logout.php" class="btn btn-outline-warning  ml-2">Logout</a>
                        </form>';
                        }
                        else{
                              echo  '
                              <form class="form-inline my-2 my-lg-0">
                              <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                              </form>
                              <button class="btn btn-outline-warning  ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
                              <button class="btn btn-outline-primary  mx-2" data-toggle="modal" data-target="#signupModal">SignUp</button>';
                        }
                              echo '
                        </div>
                  </div>
            </nav>';           
            require '.\sub-dir\_loginModal.php';
            require '.\sub-dir\_signupModal.php';


            if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){

                  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                              <strong>Success!</strong> You can now login.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                              </button>
                        </div>';
            }

            // if($_GET['login_error']=="false"){

            //       echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
            //                   <strong>Alert!</strong> You can not login, please check the email or password.
            //                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //                         <span aria-hidden="true">&times;</span>
            //                   </button>
            //             </div>';
            // }
?>
