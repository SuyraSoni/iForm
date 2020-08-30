<!doctype html>
<html lang="en">
      <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
                  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            <link rel="icon" href=".\img\form.png" type="image/x-icon">

            <title>iForm</title>
            <style>
                  #ques{
                        min-height:433px;
                  }
            </style>
      </head>

      <body>
            <?php require '.\sub-dir\_dbconnect.php'?>
            <?php require '.\sub-dir\_header.php'?>
            
            <?php 
                        
                        $id = $_GET['catid'];
                        $sql = "SELECT * FROM tb_iform WHERE c_id=$id";
                        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                        while($row = mysqli_fetch_assoc($result)){
                              $catname  = $row['c_name'];
                              $catdesc  = $row['c_desc'];
                        }
                  
            ?>

            

            <?php
                  $showAlert = false;
                  $method = $_SERVER['REQUEST_METHOD'];
                  if($method=='POST'){
                        #Insert thread into DB.
                        $th_title = $_POST['title'];
                        $th_desc = $_POST['desc'];

                        $th_title = str_replace("<","&lt;",$th_title);
                        $th_title = str_replace(">","&gt;",$th_title);

                        $th_desc = str_replace("<","&lt;",$th_desc);
                        $th_desc = str_replace(">","&gt;",$th_desc);

                        
                        $sno = $_POST['sno'];


                        #Not use single quotation in query when insert data in db after table name
                        // $insert_sql = "INSERT INTO tb_threads('t_title','t_desc','t_cat_id','t_user_id','timestamp') VALUES('$th_title','$th_desc','$id','0',current_timestamp())";

                        $insert ="INSERT INTO tb_threads (t_title, t_desc, t_cat_id, t_user_id, timestamp) VALUES ('$th_title', '$th_desc', ' $id', '$sno', current_timestamp())";
                        $result = mysqli_query($con,$insert) or die(mysqli_error($con));
                        $showAlert = true;
                        if($showAlert){
                              echo '
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>iNSERT Successful:-</strong> Your Concern has been inserted successfully. Please wait for community respond.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>';
                        }
                  }
            ?>


            <!-- This is first container -->
            <div class="container my-4">
                  <div class="jumbotron">
                        <h1 class="display-4">Welcome to <?php echo $catname;?> forms.</h1>
                        <p class="lead"><?php echo $catdesc;?></p>
                        <hr class="my-4">
                        <p>No Spam / Advertising / Self-promote in the forums is not allow.
                        Do not post copyright-infringing material.
                        Do not post “offensive” posts, links or images.
                        Do not cross post questions.
                        Remain respectful of other members at all times.</p>
                        <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
                  </div>
            </div>


            <?php
                  if(isset($_SESSION['loggined']) && $_SESSION['loggined']=="true"){
                  echo '
                        <div class="container">
                              <h1 class="py-2 text-center">Start a Discussion</h1>
                              <form action="'.  $_SERVER["REQUEST_URI"].'" method="post">
                                    <div class="form-group">
                                          <label for="title">Problem Title</label>
                                          <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                                          <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as possible.</small>
                                    </div>

                                    <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">

                                    <div class="form-group">
                                          <label for="desc">Elaborate Your Problem</label>
                                          <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                                    </div>
                                    <button type="submit" name="submit " class="btn btn-success">Submit</button>
                              </form>
                        </div>';
                  }
                  else{
                        echo '<div class="container">
                                    <h1 class="py-2">Start a Discussion</h1>
                                    <p class="lead">You are not logged in. Please login to be able to start a Discussion.</p>
                              </div>';
                  }
            ?>


            


            <!-- This is second container -->
            <div class="container mb-5" id="ques">
                  <h1 class="py-2 text-center">Browse Questions</h1>
                  <?php 
                        
                        $id = $_GET['catid'];
                        $sql = "SELECT * FROM tb_threads WHERE t_cat_id=$id";
                        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                        $noresult = true;
                        while($row = mysqli_fetch_assoc($result)){
                              $noresult = false;
                              $id = $row['t_id'];
                              $title  = $row['t_title'];
                              $desc  = $row['t_desc'];
                              $t_time  = $row['timestamp']; 
                              $t_user_id  = $row['t_user_id'];
                              $sql2 = "SELECT user_email from tb_user WHERE sno='$t_user_id'";
                              $result2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
                              $row2 = mysqli_fetch_assoc($result2);

                              echo '
                                    <div class="media my-3">
                                          <img src=".\img\userdemo.png" width="50px" height="50px" class="mr-3" alt="...">
                                          <div class="media-body">'.
                                                '<h5 class="mt-0"><a class="text-dark" href=".\thread.php?threadid='.$id.'">'.$title.'</a></h5>
                                                '.$desc.'</div>'.'<div class="font-weight-bold my-0">Asked By:'.$row2['user_email'].' at:'.$t_time.'</div>'.
                                    '</div>';
                        }

                        // echo var_dump($noresult);
                        if($noresult){
                              echo '
                                    <div class="jumbotron jumbotron-fluid">
                                          <div class="container">
                                                <p class="display-4">No Threads Found</p>
                                                <p class="lead">Be the first persion to ask the questions.</p>
                                          </div>
                                    </div>';
                        }
                        
                  ?>
            </div>

            <?php require '.\sub-dir\_footer.php'?>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                  integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
            </script>
      </body>
</html>