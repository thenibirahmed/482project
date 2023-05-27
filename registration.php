<?php 
    session_start();
    if( isset($_SESSION['user']) ){
        header('Location: /admin');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Traveling Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<section style="background: linear-gradient(#A578EE, #00ACED);">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5">

                        <h3 class="mb-5">Sign Up</h3>

                        <form action="functions/register.php" method="POST">
                            <div class="form-floating mb-3">
                                <input name="fname" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">First Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="lname" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Last Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="phone" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Mobile number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="confirm_password" type="password" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Confirm Password</label>
                            </div>

                            <div class="mb-3">
                                <label class="me-3">Gender</label> 
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                            </div>
                        

                            <button name="register" class="btn btn-primary btn-lg btn-block" type="submit">Register</button>

                        </form>
                        
                        <!-- <hr class="my-4"> -->

                        <!-- <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #dd4b39;" type="submit">
                            <i class="fab fa-google me-2"></i> Sign Up with google
                        </button>
                        <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;" type="submit">
                            <i class="fab fa-facebook-f me-2"></i>Sign Up with facebook
                        </button> -->

                    </div>
                </div>
                <div class="text-center">
                    <a href="index.php" class="d-block text-sm text-light mt-3">Back to page</a>
                    <a href="login.php" class="d-block text-sm text-light mt-3">Login</a>
                </div>
            </div>
        </div>
    </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>