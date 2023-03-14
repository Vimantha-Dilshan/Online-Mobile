<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: sign_in.php");
}
?>

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

    <title>Employee Edit</title>
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
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="stock_management.php"><button type="button" class="btn btn-sm btn-success"><i class="bi bi-house-fill"></i> Home</button></a>
          </li>

          <li class="nav-item">
            <!--<a class="nav-link" href="#"><button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-currency-exchange"></i> Cash Register</button></a>-->
          </li>

          <li class="nav-item">
            <a class="nav-link" href="stock_management.php"><button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-hdd-fill"></i> Stock Management</button></a>
          </li>


        </ul>

        <div class="dropdown px-2">
          <a class="btn btn-sm btn-warning dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Promo users
          </a>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="promo_users_platinum.php"><small><i class="bi bi-card-heading"></i> Platinum</small></a></li>
            <li><a class="dropdown-item" href="promo_users_gold.php"><small><i class="bi bi-card-heading"></i> Gold</small></a></li>
            <li><a class="dropdown-item" href="promo_users_silver.php"><small><i class="bi bi-card-heading"></i> Silver</small></a></li>
          </ul>
        </div>


        <div class="btn-group px-2" role="group" aria-label="Basic outlined example">
          <a href="stock_management.php"><button type="button" class="btn btn-sm btn-outline-secondary">Sellers</button></a>
          <a href="employee.php"><button type="button" class="btn btn-sm btn-outline-secondary">Employees</button></a>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            <i class="bi bi-person-circle"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-lg-end">
            <li><a class="dropdown-item" href="#">
                <small>
                  <?php
                  include 'server/config/database_config.php';

                  $adminID = $_SESSION['user'];

                  $sql = "SELECT * FROM `admin_authentication` WHERE `email` LIKE '$adminID' ";
                  $result = $conn->query($sql);


                  if (!empty($result) && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<p>" . $row["name"] . "<br><small class='user-role'>" . $row["access_level"] . "</small></p><small>";
                    }
                  }
                  $conn->close();
                  ?>

                  <!--<p>Vimantha Dilshan<br><small class="user-role">Admin</small></p><small>-->
              </a></li>

            <li>
              <small>
                <div class="row">
                  <div class="col-sm-3">
                    <a class="dropdown-item"><button type="button" class="btn btn-sm btn-outline-success"><i class="bi bi-person-fill"></i></button></a>
                  </div>
                  <div class="col-sm-9">
                    <a class="dropdown-item" href="server/APIs/authentication/sign_out.php"><button type="button" class="btn btn-sm btn-success"><small>Sign out</small></button></a>
                  </div>
                </div>
              </small>
            </li>

            <li><a class="dropdown-item">
                <hr>
              </a></li>
          </ul>
        </div>

      </div>
    </div>
  </nav>
  <!-- NAV BAR END -->

    <br>

    <!-- CONTENT START -->
    <div class="card">
        <h5 class="card-header">View Employee</h5>
        <div class="card-body">
            <form method="POST" action="server/APIs/edit_employee.php">

                <?php
                // Establish the Connection
                include 'server/config/database_config.php';

                $pid = $_GET['rn'];

                $sql = "SELECT * FROM employee_details WHERE id='$pid'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    if (!$conn) {
                        die('Technical Error...');
                    } else {
                        while ($row = $result->fetch_assoc()) {

                            echo "
                                <div class='row'>
                                    <label for='inputAddress'>ID</label>
                                    <input type='text' class='form-control' name='txtID' id='txtID' value='" . $row["id"] . "' disabled>
                                </div>

                            <br>

                                <div class='row'>
                                <div class='col-sm-6'>
                                <label for='inputAddress'>Name</label>
                                <input type='text' class='form-control' name='txtName' id='txtName' value='" . $row["name"] . "' disabled>
                                </div>
                                <div class='col-sm-6'>
                                <label for='inputAddress'>Address</label>
                                <input type='text' class='form-control' name='txtAddress' id='txtAddress' value='" . $row["address"] . "' disabled>
                                </div>
                            </div>

                            <br>

                            <div class='row'>
                                <div class='col-sm-6'>
                                <label for='inputAddress'>Position</label>
                                <input type='text' class='form-control' name='txtPosition' id='txtPosition' value='" . $row["position"] . "' disabled>
                                </div>
                                <div class='col-sm-6'>
                                <label for='inputAddress'>Email</label>
                                <input type='text' class='form-control' name='txtEmail' id='txtEmail' value='" . $row["email"] . "' disabled>
                                </div>
                            </div>

                            <br>

                            <div class='row'>
                                <div class='col-sm-6'>
                                <label for='inputAddress'>NIC</label>
                                <input type='text' class='form-control' name='txtNic' id='txtNic' value='" . $row["nic"] . "' disabled>
                                </div>
                                <div class='col-sm-6'>
                                <label for='inputAddress'>Mobile 01</label>
                                <input type='text' class='form-control' name='ttxtMobile01' id='txtMobile01' value='" . $row["mobile_01"] . "' disabled>
                                </div>
                            </div>

                            <br>

                            <div class='row'>
                                <div class='col-sm-6'>
                                <label for='inputAddress'>Mobile 02</label>
                                <input type='text' class='form-control' name='txtMobile02' id='txtMobile02' value='" . $row["mobile_02"] . "' disabled>
                                </div>
                                <div class='col-sm-6'>
                                <label for='inputAddress'>Birthday</label>
                                <input type='date' class='form-control' name='txtBirthday' id='txtBirthday' value='" . $row["birthday"] . "' disabled>
                                </div>
                            </div>

                            <br>

                            <div class='row'>
                                <div class='col-sm-6'>
                                <label for='inputAddress'>Status</label>
                                <input type='text' class='form-control' name='txtStatus' id='txtStatus' value='" . $row["status"] . "' disabled>
                                </div>
                                <div class='col-sm-6'>
                                <label for='inputAddress'>Gender</label>
                                <select class='form-select' id='txtGender' name='txtGender' disabled>
                                    <option selected value='" . $row["gender"] . "'>" . $row["gender"] . "</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Prefer not to say</option>
                                </select>
                                <div class='invalid-feedback'>
                                    Please select.
                                </div>
                                </div>
                            </div>

                                
                                ";
                        }
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='8'>" . "<p>No product available in this ID<p>";
                    echo "</td>";
                    echo "</tr>";
                }


                ?>

        </div>
        <div class="modal-footer">
            <a href="employee.php"><button type="button" class="btn btn-outline-success" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Close</button></a>
        </div>
    </div>
    </div>
    </div>

    </form>
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