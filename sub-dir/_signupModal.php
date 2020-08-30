
<!doctype html>
<html lang="en">
      <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

            <title>Hello, world!</title>
      </head>
      <body>
            <!-- Modal -->
            <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                        <div class="modal-content">
                              <div class="modal-header">
                                    <h5 class="modal-title" id="signupModalLabel">Signup to iForm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                    </button>
                              </div>
                              <form action="./sub-dir/_handlesignup.php" method="post">
                                    <div class="modal-body">
                                          <div class="form-group">
                                                <label for="signupemail">User Name</label>
                                                <!-- <input type="email" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp"> -->
                                                <input type="text" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp">
                                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                          </div>
                                          <div class="form-group">
                                                <label for="signuppassword">Password</label>
                                                <input type="password" class="form-control" id="signuppassword" name="signuppassword">
                                          </div>
                                          <div class="form-group">
                                                <label for="signupcpassword">Confirm Password</label>
                                                <input type="password" class="form-control" id="signupcpassword" name="signupcpassword">
                                          </div>
                                          <button type="submit" name="submit" class="btn btn-primary">SignUp</button>    
                                    </div>
                                    <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                              </form>
                        </div>
                  </div>
            </div>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      </body>
</html>





