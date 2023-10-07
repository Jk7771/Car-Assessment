<?php
session_start();
include("config.php");
include("User.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carName = $_POST['car_name'];
    $price = $_POST['price'];
    $topSpeed = $_POST['top_speed'];
    $carType = $_POST['car_type'];

    try {
        $query = "INSERT INTO cars (car_name, price, top_speed, car_type) VALUES (:carName, :price, :topSpeed, :carType)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':carName', $carName);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':topSpeed', $topSpeed);
        $stmt->bindParam(':carType', $carType);
        $stmt->execute();

        $carId = $db->lastInsertId();

        $totalImages = count($_FILES['car_images']['name']);

        for ($i = 0; $i < $totalImages; $i++) {
            $filename = $_FILES['car_images']['name'][$i];
            $tmpFilePath = $_FILES['car_images']['tmp_name'][$i];

            $uniqueFilename = uniqid() . '_' . $filename;
            $targetFilePath = 'uploads/' . $uniqueFilename;
            $uploadDirectory = 'uploads/';
            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }
            if (move_uploaded_file($tmpFilePath, $targetFilePath)) {
              $query = "UPDATE cars SET image_path = :imagePath WHERE car_name = :carName";
              $stmt = $db->prepare($query);
              $stmt->bindParam(':imagePath', $targetFilePath);
              $stmt->bindParam(':carName', $carName);
              $stmt->execute();
          
              header("location: index.php");
              exit;
          } else {
              echo "Failed to upload file: $filename";
          }
          
        }

        header("location: index.php");
        exit;
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <Style>
     @media (min-width: 768px) {
        .container {
            max-width: 550px;
        }
    }
    </style>
</head>
<body>
    <?php include("header.html"); ?>

    <div class="container mt-3">
        <div class="card">
            <div class="card-header text-center" style="background: #483d8b; color: white; padding: 15px;">
                <h4>Add Car</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="car_name" class="form-label">Car Name</label>
                        <input type="text" class="form-control" id="car_name" name="car_name" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="top_speed" class="form-label">Top Speed (km/h)</label>
                        <input type="number" class="form-control" id="top_speed" name="top_speed" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="car_type" class="form-label">Car Type</label>
                        <select class="form-select" id="car_type" name="car_type" required>
                            <option value=""></option>
                            <option value="Normal Car">Normal Car</option>
                            <option value="Luxury Car">Luxury Car</option>
                            <option value="Sports Car">Sports Car</option>
                        </select>
                    </div>
                    <div class="mb-3">
                       <label for="car_images" class="form-label">Car Images</label>
                      <input type="file" class="form-control " id="car_images" name="car_images[]" multiple required>
                   </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn " style="background: #483d8b; color: white; ">Add Car</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include("footer.html"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const topSpeedInput = document.getElementById("top_speed");
            const carTypeSelect = document.getElementById("car_type");

            topSpeedInput.addEventListener("input", function() {
                const topSpeed = parseFloat(topSpeedInput.value);
                if (topSpeed =="") {
                  carTypeSelect.value = "Normal Car";
                } else if (topSpeed <= 100) {
                    carTypeSelect.value = "Normal Car";
                } else if (topSpeed >= 101 && topSpeed <= 200) {
                    carTypeSelect.value = "Luxury Car";
                } else {
                    carTypeSelect.value = "Sports Car";
                }
            });
        });
    </script>
    
  </body>
</html>