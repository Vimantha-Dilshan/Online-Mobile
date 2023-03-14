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

  <!-- jQuerry -->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

  <!-- Main CSS -->
  <link rel="stylesheet" href="assets/css/main.css">

  <!-- fevicon -->
  <link rel="icon" href="assets/image/nav-logo.png" type="image/gif" />

  <title>Stock Management</title>
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

      <div class="col-sm-5">
        <div class="card">
          <div class="card-header">
            <b><i class="bi bi-hdd-rack-fill"></i> Add to database</b>
          </div>
          <div class="card-body">

            <form class="row g-3 needs-validation" method="POST" action="server/APIs/store_item.php" novalidate>
              <div class="col-md-4">
                <label for="validationCustom01" class="form-label text-secondary"><i class="bi bi-sd-card-fill"></i> Product name</label>
                <input type="text" class="form-control" id="txtProductName" name="txtProductName" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="col-md-4">
                <label for="validationCustom02" class="form-label text-secondary"><i class="bi bi-building"></i> Brand</label>
                <input type="text" class="form-control" id="txtBrand" name="txtBrand" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="col-md-4">
                <label for="validationCustom04" class="form-label text-secondary"><i class="bi bi-tags"></i> Category</label>
                <select class="form-select" id="txtCategory" name="txtCategory" required>
                  <option selected disabled value="">Choose...</option>
                  <option>Computer parts</option>
                  <option>Headphones</option>
                  <option>Mobile phones</option>
                  <option>Laptops</option>
                  <option>Accessories</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid category.
                </div>
              </div>

              <div class="col-md-4">
                <label for="validationCustom04" class="form-label text-secondary"><i class="bi bi-people-fill"></i> Seller</label>
                <select class="form-select" id="txtSeller" name="txtSeller" required>

                  <?php
                  include 'server/config/database_config.php';

                  $adminID = $_SESSION['user'];

                  $sql = "SELECT * FROM `seller_details`";
                  $result = $conn->query($sql);


                  if (!empty($result) && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      //echo "<p>" . $row["name"] . "<br><small class='user-role'>" . $row["access_level"] . "</small></p><small>";
                      //echo "<option selected disabled value=''>Choose...</option>";
                      echo "<option>" . $row["company"] . "</option>";
                    }
                  }
                  $conn->close();
                  ?>

                  <!--
                  <option selected disabled value="">Choose...</option>
                  <option>TransAsia</option>
                  <option>GenXT</option>
                  <option>Deelz Woot</option>
                  <option>Doctor Mobile</option>
                  <option>Selfie Mobile</option>
                  <option>Greenware</option>
                  <option>E-Mobile</option>
                  <option>Other</option>
                  -->

                </select>
                <div class="invalid-feedback">
                  Please select a valid seller.
                </div>
              </div>

              <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label text-secondary"><i class="bi bi-coin"></i> Buying price</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend">Rs.</span>
                  <input type="text" class="form-control" id="txtBuyingPrice" name="txtBuyingPrice" aria-describedby="inputGroupPrepend" placeholder="/piece" required>
                  <div class="invalid-feedback">
                    Please choose a buying price.
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label text-secondary"><i class="bi bi-coin"></i> Selling price</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend">Rs.</span>
                  <input type="text" class="form-control" id="txtSellingPrice" name="txtSellingPrice" aria-describedby="inputGroupPrepend" placeholder="/piece" required>
                  <div class="invalid-feedback">
                    Please choose a selling price.
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <label for="validationCustom04" class="form-label text-secondary"><i class="bi bi-tag-fill"></i> Status</label>
                <select class="form-select" id="txtStatus" name="txtStatus" required>
                  <option selected disabled value="">Choose...</option>
                  <option>Original</option>
                  <option>Copy</option>
                  <option>Not specify</option>

                </select>
                <div class="invalid-feedback">
                  Please select a valid status.
                </div>
              </div>

              <div class="col-md-4">
                <label for="validationCustom02" class="form-label text-secondary"><i class="bi bi-calendar-event-fill"></i> Date</label>
                <input type="date" class="form-control" id="txtDate" name="txtDate" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="col-md-4">
                <label for="validationCustom02" class="form-label text-secondary"><i class="bi bi-cart-plus-fill"></i> Quantity</label>
                <input type="number" class="form-control" id="txtQty" name="txtQty" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="txtImportModel" name="txtImportModel">
                  <label class="form-check-label" for="validationFormCheck1">Import Model</label>
                </div>
              </div>

              <div class="col-md-6 d-flex flex-row-reverse">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                  <button type="button" class="btn btn-sm btn-outline-success"><a class="refreshButton" href="server/APIs/refresh_stock_management.php"><i class="bi bi-x-lg"></i> Cancel</a></button>
                  <button type="submit" class="btn btn-sm btn-success"><i class="bi bi-plus-circle"></i> Add item</button>
                </div>
              </div>

            </form>

            <hr>

            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success alert-sm" role="alert">
                  <b>Seller Management</b>
                </div>
              </div>

              <div class="col-sm-6">

                <form class="row g-3" method="POST" action="server/APIs/store_seller.php">
                  <div class="col-md-6">
                    <label for="inputCompany" class="form-label text-secondary"><i class="bi bi-building"></i> Company</label>
                    <input type="text" class="form-control" id="txtCompany" name="txtCompany" required>
                  </div>

                  <div class="col-md-6">
                    <label for="inputAddress" class="form-label text-secondary"> <i class="bi bi-geo-alt-fill"></i> Address</label>
                    <input type="text" class="form-control" id="txtAddress" name="txtAddress" required>
                  </div>

                  <div class="col-md-6">
                    <label for="inputTelephone1" class="form-label text-secondary"><i class="bi bi-telephone-fill"></i> Telephone 01</label>
                    <input type="text" class="form-control" id="txtTelephone01" name="txtTelephone01">
                  </div>

                  <div class="col-md-6">
                    <label for="inputTelephone2" class="form-label text-secondary"><i class="bi bi-telephone-fill"></i> Telephone 02</label>
                    <input type="text" class="form-control" iid="txtTelephone02" name="txtTelephone02">
                  </div>

                  <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label text-secondary"><i class="bi bi-coin"></i> To Pay</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">Rs.</span>
                      <input type="number" class="form-control" id="txtToPay" name="txtToPay" aria-describedby="inputGroupPrepend" placeholder="Total" value="0">
                      <div class="invalid-feedback">
                        Please enter a amount.
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label text-secondary"><i class="bi bi-coin"></i> Paid Amount</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">Rs.</span>
                      <input type="number" class="form-control" id="txtPaidAmount" name="txtPaidAmount" aria-describedby="inputGroupPrepend" placeholder="Total" value="0">
                      <div class="invalid-feedback">
                        Please enter a amount.
                      </div>
                    </div>
                  </div>



                  <div class="col-12 d-flex flex-row-reverse">
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                      <button type="button" class="btn btn-sm btn-outline-success"><a class="refreshButton" href="server/APIs/refresh_stock_management.php"><i class="bi bi-x-lg"></i> Cancel</a></button>
                      <button type="submit" class="btn btn-sm btn-success"><i class="bi bi-person-plus-fill"></i> Add Seller</button>
                    </div>
                  </div>
                </form>

              </div>

              <div class="col-sm-6">

                <div class="card">
                  <div class="card-header">
                    <b><i class="bi bi-people-fill"></i> Seller List</b>
                  </div>

                  <div class="card-body">

                    <form>
                      <div class="input-group input-group-sm flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="addon-wrapping" onkeyup="searchSellers()" id="sellerSearch">
                        <button class="btn btn-outline-success" type="button" id="button-addon2">Search</button>
                      </div>
                    </form>

                    <br>

                      <table class="table table-hover table-sm shadow-sm p-3 mb-5 bg-white rounded" id="sellerTable" >
                        <thead class="table-success text-success rounded">
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody class="text-secondary">
                          <?php
                          // Establish the Connection
                          include 'server/config/database_config.php';

                          $sql = "SELECT id, company, address from seller_details";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                            if (!$conn) {
                              die('Technical Error...');
                            } else {
                              while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='tableData'>" . $row["company"] . "</td>";
                                echo "<td class='tableData'>" . $row["address"] . "</td>";
                                echo "<td>" . "<a target='_blank' href='seller_view.php?rn=$row[id]'><button type='button' class='btn btn-sm btn-outline-secondary'><i class='bi bi-info-circle'></i></button></a>" . " " . "<a target='_blank' href='seller_edit.php?rn=$row[id]'><button type='button' class='btn btn-sm btn-outline-success'><i class='bi bi-pencil-square'></i></button></a>" . " " . "<a href='server/APIs/delete_seller.php?rn=$row[id]'><button type='button' class='btn btn-sm btn-outline-danger'><i class='bi bi-trash3'></i></button></a>" . "</td>";
                                echo "<tr>";
                              }
                            }
                          } else {
                            echo "<tr>";
                            echo "<td colspan='3'>" . "<p>No sellers available<p>";
                            echo "</td>";
                            echo "</tr>";
                          }
                          ?>

                          <!--
                        <tr>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>
                            <a href="#"><button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-info-circle"></i></button></a>
                            <a href="#"><button type="button" class="btn btn-sm btn-outline-success"><i class="bi bi-pencil-square"></i></button></a>
                            <a href="#"><button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash3"></i></button></a>
                          </td>
                        </tr>
                        -->

                        </tbody>
                      </table>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-sm-7">
        <div class="card">
          <div class="card-header">
            <b><i class="bi bi-basket3-fill"></i> Current stock </b>
            <a href="site_products.php"><button type="button" class="btn btn-sm btn-danger">Site Products</button></a>
            <a href="site_banners.php"><button type="button" class="btn btn-sm btn-dark">Site Banners</button></a>
          </div>
          <div class="card-body">

            <form>
              <div class="input-group input-group-sm flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" placeholder="Search..." aria-label="Products" aria-describedby="addon-wrapping" onkeyup="searchProducts()" id="productSearch">
                <button class="btn btn-outline-success" type="button" id="button-addon2">Search</button>
              </div>
            </form>

            <br>

            <div class="table-responsive">

              <table class="table table-hover table-sm shadow-sm p-3 mb-5 bg-white rounded h-50" id="productsTable">
                <thead class="table-success text-success rounded">
                  <tr>
                    <th scope="col">Product name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Category</th>
                    <th scope="col">Seller</th>
                    <th scope="col">Stock</th>
                    <th scope="col">BP</th>
                    <th scope="col">SP</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="text-secondary">

                  <?php
                  // Establish the Connection
                  include 'server/config/database_config.php';

                  $sql = "SELECT id, product_name, brand, category, seller, buying_price, selling_price, status, date, quantity, import_model from stock_items";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    if (!$conn) {
                      die('Technical Error...');
                    } else {
                      while ($row = $result->fetch_assoc()) {

                        // In & OUT status Calculation
                        $qty = $row["quantity"];
                        if ($qty > 0) {
                          $btnColor = "success";
                          $btnText = "IN";
                        } else {
                          $btnColor = "danger";
                          $btnText = "OUT";
                        }

                        echo "<tr>";
                        echo "<td>" . $row["product_name"] . "</td>";
                        echo "<td>" . $row["brand"] . "</td>";
                        echo "<td>" . $row["category"] . "</td>";
                        echo "<td>" . $row["seller"] . "</td>";
                        echo "<td>" . "<button type='button' class='btn btn-sm btn-$btnColor small-text'><small>$btnText</small></button>" . "</td>";
                        echo "<td>" . $row["buying_price"] . "</td>";
                        echo "<td>" . $row["selling_price"] . "</td>";
                        echo "<td>" . "<a target='_blank' href='product_view.php?rn=$row[id]'><button type='button' class='btn btn-sm btn-outline-secondary'><i class='bi bi-info-circle'></i></button></a>" . " " . "<a target='_blank' href='product_edit.php?rn=$row[id]'><button type='button' class='btn btn-sm btn-outline-success'><i class='bi bi-pencil-square'></i></button></a>" . " " . "<a href='server/APIs/delete_item.php?rn=$row[id]'><button type='button' class='btn btn-sm btn-outline-danger'><i class='bi bi-trash3'></i></button></a>" . "</td>";
                        echo "</td>";
                      }
                    }
                  } else {
                    echo "<tr>";
                    echo "<td colspan='8'>" . "<p>No products available<p>";
                    echo "</td>";
                    echo "</tr>";
                  }
                  ?>

                  <!--
                <tr>
                  <td>Xiaomi Mi 9T</td>
                  <td>Xiaomi</td>
                  <td>Mobile phones</td>
                  <td>Lucky Com</td>
                  <td><button type="button" class="btn btn-sm btn-success small-text"><small>IN</small></button></td>
                  <td>55000</td>
                  <td>59990</td>
                  <td>
                    <a href="#"><button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-info-circle"></i></button></a>
                    <a href="#"><button type="button" class="btn btn-sm btn-outline-success"><i class="bi bi-pencil-square"></i></button></a>
                    <a href="#"><button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash3"></i></button></a>
                  </td>
                </tr>
                -->

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
  <script>
    // Search Products
    function searchProducts() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("productSearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("productsTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }

    // Search Sellers
    function searchSellers() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("sellerSearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("sellerTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>