<!doctype html>
<html lang="en">
      <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            <link rel="icon" href=".\img\form.png" type="image/x-icon">

            <title>iForm</title>
            <style>
                  #maincontainer{
                        min-height:100vh;
                  }
            </style>
      </head>
            <body>
                  <?php require '.\sub-dir\_dbconnect.php'?>
                  <?php require '.\sub-dir\_header.php'?>
                 
                  


                  <!-- Search Results -->
                  <div class="container my-3" id="maincontainer">
                        <h1 class="text-center py-2">Search Result For:<em>"<?php echo $_GET['search']?>"</em></h1>
                        <?php
                              $noresult = true; 
                              $query = $_GET['search'];
                              $sql = "SELECT * FROM tb_threads WHERE match(t_title,t_desc) against(' $query')";
                              $result = mysqli_query($con,$sql);
                              while($row = mysqli_fetch_assoc($result)){
                                    $title  = $row['t_title'];
                                    $desc  = $row['t_desc'];
                                    $thread_id  = $row['t_id'];
                                    $noresult = false;
                                    $url = "/php-iForm/thread.php?threadid=".$thread_id;

                                    // $t_user_id  = $row['t_user_id'];
                                    // $sql2 = "SELECT user_email from tb_user WHERE sno='$t_user_id'";
                                    // $result2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
                                    // $row2 = mysqli_fetch_assoc($result2);
                                    // $posted_by = $row2['user_email'];

                                    echo '<div class="result">
                                                <h3> <a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
                                                <p>'.$desc.'</p>
                                          </div>';
                                    
                              }
                              if($noresult){
                                    echo '<div class="jumbotron jumbotron-fluid">
                                          <div class="container">
                                                <p class="display-4">No Result Found</p>
                                                <p class="lead">Suggestions:<ul>
                                                      <li>Make sure that all words are spelled correctly.</li>
                                                      <li>Try different keywords.</li>
                                                      <li>Try more general keywords.</li>
                                                      </ul>
                                                </p>
                                          </div>
                                    </div>';
                              }
                        ?>
                        
                  </div>

                  <?php require '.\sub-dir\_footer.php'?>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      </body>
</html>