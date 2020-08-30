<?php
       $showAlert=false;
      if(isset($_REQUEST["submit"])){
            require '.\sub-dir\_dbconnect.php';
            $mail = $_REQUEST['mail'];
            $select = $_REQUEST['selector'];
            $card = implode($select);
            $query = $_REQUEST['query'];

            $sql = "INSERT INTO tb_contact(contact_mail,contact_card,contact_query) VALUES('$mail','$card','$query')";

            $result = mysqli_query($con,$sql) or die(mysqli_error($con));
            if($result){
                  $showAlert=true;
            //       echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            //       <strong>Success!</strong> Your query has been submitted to Admin.
            //       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //         <span aria-hidden="true">&times;</span>
            //       </button>
            //     </div>';
            }
            else{
                  echo "Error found!..".mysqli_errno($result);
            }
      }
                  
?>

<!doctype html>
<html lang="en">

<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <link rel="icon" href=".\form.png" type="image/x-icon">

      <title>iForm</title>
      <style>
      .container {
            min-height: 84vh;
      }
      </style>
</head>

<body>
      <?php require '.\sub-dir\_header.php'?>
      <?php
            if($showAlert){
                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> Your query has been submitted to Admin.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
            }
            ?>
      <div class="container my-3">
            <h1 class="text-center ">Contact Us</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                  <div class="form-group">
                        <label for="mail">Your Email address</label>
                        <input type="email" class="form-control" id="mail" name="mail" placeholder="name@example.com">
                  </div>

                  <div class="form-group">
                        <label for="selector">Example select</label>
                        <select multiple="multiple"  size = 5 class="form-control" id="selector" name="selector[]">
                              <option value="php">PHP</option>
                              <option value="Python">Python</option>
                              <option value="C++">C++</option>
                              <option value="Java Script">Java Script</option>
                              <option value="Go">Go</option>
                        </select>
                  </div>

                  <div class="form-group">
                        <label for="query">Query</label>
                        <textarea class="form-control" id="query" name="query" rows="3"
                              placeholder="Write query here..."></textarea>
                  </div>
                  <button class="btn btn-primary" name="submit">Submit</button>
            </form>
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