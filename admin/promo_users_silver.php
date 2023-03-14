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

  <title>Silver Users</title>
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
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <b><i class="bi bi-person-heart"></i> Promo Users</b>
          </div>
          <div class="card-body">
            <div class="alert alert-secondary" role="alert">
              <b><i class="bi bi-wallet-fill"></i> Silver Category Users</b>
            </div>

            <br>

            <form method="POST" action="server/APIs/store_user_silver.php">
              <div class="row">
                <div class="col">
                  <label for="inputFName" class="form-label text-secondary">First Name</label>
                  <input type="text" class="form-control" aria-label="First name" id="txtFirstName" name="txtFirstName" required>
                </div>
                <div class="col">
                  <label for="inputLName" class="form-label text-secondary">Last Name</label>
                  <input type="text" class="form-control" aria-label="Last name" id="txtLastName" name="txtLastName" required>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col">
                  <label for="inputEmail" class="form-label text-secondary">Email</label>
                  <input type="email" class="form-control" aria-label="Email" id="txtEmail" name="txtEmail" required>
                </div>
                <div class="col">
                  <label for="inputMobile" class="form-label text-secondary">Mobile number</label>
                  <input type="text" class="form-control" aria-label="Mobile number" id="txtMobile" name="txtMobile" required>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col">
                  <label for="inputDate" class="form-label text-secondary">Promo Value</label>
                  <div class="col input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rs.</span>
                    <input type="text" class="form-control" aria-label="Username" id="txtPromoValue" name="txtPromoValue" aria-describedby="basic-addon1" value="0">
                  </div>
                </div>
                <div class="col">
                  <label for="inputDate" class="form-label text-secondary">Last purchase</label>
                  <div class="col input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rs.</span>
                    <input type="text" class="form-control" aria-label="Username" id="txtLastPurchase" name="txtLastPurchase" aria-describedby="basic-addon1" value="0">
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col">
                  <label for="inputDate" class="form-label text-secondary">Date</label>
                  <input type="date" class="form-control" aria-label="Date" id="txtDate" name="txtDate" required>
                </div>
                <div class="col">
                  <label for="inputEmployee" class="form-label text-secondary">Added by</label>
                  <select class="form-select" aria-label="Default select example" id="txtAddedBy" name="txtAddedBy" required>
                    <option selected>Select current employee</option>
                    <option value="Pathum">Pathum</option>
                    <option value="Assistant">Assistance</option>
                  </select>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-12 d-flex flex-row-reverse">
                  <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn btn-sm btn-outline-success"><a class="refreshButton" href="server/APIs/refresh_promo_users_silver.php"><i class="bi bi-x-lg"></i> Cancel</a></button>
                    <button type="submit" class="btn btn-sm btn-success"><i class="bi bi-plus-circle"></i> Add user</button>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <b><i class="bi bi-list-stars"></i> Promo Users List</b>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-sm shadow-sm p-3 mb-5 bg-white rounded">
                <thead class="table-success text-success rounded">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Value</th>
                    <th scope="col">Mobile</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="text-secondary">
                  <?php
                  // Establish the Connection
                  include 'server/config/database_config.php';

                  $sql = "SELECT * from promo_users WHERE category='Silver'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    if (!$conn) {
                      die('Technical Error...');
                    } else {
                      while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["first_name"] . "</td>";
                        echo "<td>" . $row["last_name"] . "</td>";
                        echo "<td>" . $row["category"] . "</td>";
                        echo "<td>" . $row["promo_value"] . "</td>";
                        echo "<td>" . $row["mobile"] . "</td>";
                        echo "<td>" . "<a target='_blank' href='promo_users_view.php?rn=$row[id]'><button type='button' class='btn btn-sm btn-outline-secondary'><i class='bi bi-info-circle'></i></button></a>" . " " . "<a target='_blank' href='promo_users_edit.php?rn=$row[id]'><button type='button' class='btn btn-sm btn-outline-success'><i class='bi bi-pencil-square'></i></button></a>" . " " . "<a href='server/APIs/delete_user_silver.php?rn=$row[id]'><button type='button' class='btn btn-sm btn-outline-danger'><i class='bi bi-trash3'></i></button></a>" . "</td>";
                        echo "<tr>";
                      }
                    }
                  } else {
                    echo "<tr>";
                    echo "<td colspan='3'>" . "<p>No silver users available<p>";
                    echo "</td>";
                    echo "</tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
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