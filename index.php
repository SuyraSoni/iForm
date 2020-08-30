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
                  #ques{
                        min-height:433px;
                  }
            </style>
      </head>
            <body>
                  <?php require '.\sub-dir\_dbconnect.php'?>
                  <?php require '.\sub-dir\_header.php'?>
                  

                  <!-- Slider Start -->
                  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                              <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                              <div class="carousel-item active">
                                    <img src=".\img\slider1.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                          <h5>First slide</h5>
                                    </div>
                              </div>
                              <div class="carousel-item">
                                    <img src=".\img\slider2.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                          <h5>Second slide</h5>
                                    </div>
                              </div>
                              <div class="carousel-item">
                                    <img src=".\img\slider3.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                          <h5>Third slide</h5>
                                    </div>
                              </div>
                              <div class="carousel-item">
                                    <img src=".\img\slider4.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                          <h5>Forth slide</h5>
                                    </div>
                              </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                        </a>
                  </div>
                  <!-- Slider End -->



                  <!-- Categories Container Start -->
                  <div class="container my-4" id="ques">
                        <h2 class="text-center my-4">iForm-Browse Categories</h2>
                        <div class="row my-4">
                              <?php
                                    #Fetch all the categories
                                    $sql = "SELECT * FROM tb_iform";
                                    $result = mysqli_query($con,$sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                          // echo $row['c_id'];
                                          $cat_id  = $row['c_id'];
                                          $cat_name  = $row['c_name'];
                                          $cat_desc  = $row['c_desc'];
                                          echo '
                                                <div class="col-md-4 my-2">
                                                      <div class="card" style="width: 18rem;">
                                                            <img src=".\img\card'.$cat_id.'.jpg" class="card-img-top" alt="'.$cat_name.'">
                                                            <div class="card-body ">
                                                                  <h5 class="card-title"><a href="./threadslist.php?catid=' . $cat_id . '">' . $cat_name . '</a></h5>
                                                                  <p class="card-text">' . substr($cat_desc,0,30) . '...</p>
                                                                  <a href="./threadslist.php?catid=' . $cat_id . '" class="btn btn-primary">View Threads</a>
                                                            </div>
                                                      </div>
                                                </div>';
                                    }
                              ?>
                        </div>
                  </div>
                  <!-- Categories Container End -->
                 
                  <?php require '.\sub-dir\_footer.php'?>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      </body>
</html>