<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Home</title>

  <style>
    * {
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;
    }

    .body-text {
      display: flex;
      font-family: "Montserrat", sans-serif;
      align-items: center;
      justify-content: center;
      margin-top: 25px;
    }

  </style>
</head>

<body style="display: flex; flex-direction: column; min-height: 100vh;">
<?php
						include("header.html");
					?>

<div class="container mt-5">
<h2 class="mb-4 text-center" style="font-size: 24px; color: #333; font-weight: bold;">
    <span style="background: #483d8b; text-transform: uppercase; padding: 5px 10px; font-size: 28px; color: white;">Cars for Sale</span>
</h2>
    <div class="row">
      <?php
    
      $dbHost = 'localhost';
      $dbUser = 'root';
      $dbName = 'car';

      $conn = new mysqli($dbHost, $dbUser, "", $dbName);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM cars";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $carName = $row['car_name'];
          $price = $row['price'];
          $topSpeed = $row['top_speed'];
          $carType = $row['car_type'];
          $carImage = $row['image_path']; 
    
          echo '<div class="col-md-4 mb-4">
                  <div class="card">
                    <img src="' . $carImage . '" class="card-img-top" alt="' . $carName . '">
                    <div class="card-body">
                      <h5 class="card-title">' . $carName . '</h5>
                      <p class="card-text"><strong>Type:</strong> ' . $carType . '</p>
                      <p class="card-text"><strong>Price:</strong> $' . $price . '</p>
                      <p class="card-text"><strong>Top Speed:</strong> ' . $topSpeed . ' km/h</p>
                    </div>
                  </div>
                </div>';
        }
      } else {
        echo "No cars available.";
      }

      $conn->close();
      ?>
    </div>

    <?php
						include("footer.html");
					?>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
