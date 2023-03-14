<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- fevicon -->
    <link rel="icon" href="assets/image/nav-logo.png" type="image/gif" />

    <title>Sign In</title>
</head>

<body>
    <div class="progress rounded-0">
        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><small>Looks so Good on the Outside, It'll Make You Feel Good Inside </small></div>
    </div>


    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand text-secondary" href="../index.php"><img src="assets/image/nav-logo.png" height="28px" width="45px"> Online Mobile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- NAV BAR END -->

    <br>

    <!-- CONTENT START -->
    <div class="container-fluid">
        <div class="card text-center">
            <div class="card-header">
                <b class="text-danger"><i class="bi bi-patch-check-fill"></i> Sign in</b>
            </div>
            <div class="card-body">


                <!-- Jumbotron -->
                <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 98%)">
                    <div class="container">
                        <div class="row gx-lg-5 align-items-center">
                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <h1 class="my-5 display-3 fw-bold ls-tight text-success">
                                    The best offer <br />
                                    <span class="text-primary">for your business</span>
                                </h1>
                                <p class="text-justify" style="color: hsl(217, 10%, 50.8%); text-align:justify;">
                                    We visualise, design, and develop digital-first solutions that connect the dots between brands and people.
                                    Through smart data and human brilliance, we deliver digital growth experiences across the board. Also we 
                                    guide industry-leading companies to what’s next in their digital landscape.
                                </p>
                            </div>

                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <div class="card-body py-5 px-md-5">
                                        <h5 class="text-success"><b><i class="bi bi-patch-check-fill"></i> Sign in to Proceed Inventory</b></h5>
                                        <hr>
                                        <br>

                                        <form method="POST" action="server/APIs/authentication/sign_in.php">
                                            <!-- Email input -->
                                            <div class="form-outline mb-4">
                                                <input type="email" id="txtEmail" name="txtEmail" class="form-control" />
                                                <label class="form-label text-secondary" for="form3Example3"><i class="bi bi-envelope-check-fill"></i> Email address</label>
                                            </div>

                                            <!-- Password input -->
                                            <div class="form-outline mb-4">
                                                <input type="password" id="txtPassword" name="txtPassword" class="form-control" />
                                                <label class="form-label text-secondary" for="form3Example4"><i class="bi bi-shield-lock-fill"></i> Password</label>
                                            </div>

                                            <!-- Checkbox -->
                                            <div class="form-check d-flex justify-content-center mb-4">
                                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                                                <label class="form-check-label" for="form2Example33">
                                                    Stay sign in
                                                </label>
                                            </div>

                                            <!-- Submit button -->
                                            <button type="submit" name="submit" id="submit" class="btn btn-success col-md-12 text-center">
                                                <b><i class="bi bi-award-fill"></i> Sign in</b>
                                            </button>
                                            <br>

                                            <!-- Register buttons -->
                                            <div class="text-center">
                                                <br>
                                                <div class="or-container">
                                                    <div class="line-separator"></div>
                                                    <div class="or-label">or</div>
                                                    <div class="line-separator"></div>
                                                </div>
                                                <button class="btn btn-sm">
                                                    <div class="col-md-12">
                                                        <a class="btn btn-sm btn-google btn-outline" href="#"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> <small>Signup Using Google</small></a>
                                                    </div>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Jumbotron -->

            </div>
        </div>
    </div>
    <!-- CONTENT END -->


    <!-- FOOTRER START -->
    <div class="container-fluid">
        <nav class="navbar fixed-bottom navbar-light bg-light py-0">
            <div class="container-fluid">
            <p class="text-success"><small class="text-center"><i class="bi bi-robot"></i> Designed and developed by <a href="http://www.vimantha.com">Vimantha Dilshan</a></small></p>
            </div>
        </nav>
    </div>
    <!-- FOOTER END -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>