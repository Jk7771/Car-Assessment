<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="style.css" />

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

    
    
    .brand-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .brand-box {
            width: calc(23.33% - 10px);
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .brand-logo {
            max-width: 100%;
            height: auto;
        }
  </style>
</head>

<body style="display: flex; flex-direction: column; min-height: 100vh;">

<?php
						include("header.html");
					?>

 <div class="body-text">
        <h1>Car Brands</h1>
    </div>

    <div class="brand-container">
        <div class="brand-box">
            <img class="brand-logo" src="https://imgd-ct.aeplcdn.com/272x153/n/cw/ec/16/brands/logos/tata.jpg?v=1629973276336&q=80" alt="Brand 1">
            <h3>TATA</h3>
        </div>
        <div class="brand-box">
            <img class="brand-logo" src="https://imgd-ct.aeplcdn.com/272x153/n/cw/ec/10/brands/logos/maruti-suzuki1647009823420.jpg?v=1647009823707&q=80" alt="Brand 2">
            <h3>Maruti Suzuki</h3>
        </div>
        <div class="brand-box">
            <img class="brand-logo" src="https://imgd-ct.aeplcdn.com/272x153/n/cw/ec/8/brands/logos/hyundai.jpg?v=1629973193722&q=80" alt="Brand 3">
            <h3>Hyundai</h3>
        </div>
        <div class="brand-box">
            <img class="brand-logo" src="https://imgd-ct.aeplcdn.com/272x153/n/cw/ec/9/brands/logos/mahindra.jpg?v=1629973668273&q=80" alt="Brand 3">
            <h3>Mahindra</h3>
        </div>
         <div class="brand-box">
            <img class="brand-logo" src="https://imgd-ct.aeplcdn.com/272x153/n/cw/ec/1/brands/logos/bmw.jpg?v=1629973130013&q=80" alt="Brand 3">
            <h3>BMW</h3>
        </div>
         <div class="brand-box">
            <img class="brand-logo" src="https://imgd-ct.aeplcdn.com/272x153/n/cw/ec/17/brands/logos/toyota.jpg?v=1630055705330&q=80" alt="Brand 3">
            <h3>Toyota</h3>
        </div>
         <div class="brand-box">
            <img class="brand-logo" src="https://imgd-ct.aeplcdn.com/272x153/n/cw/ec/11/brands/logos/mercedes-benz.jpg?v=1629973270530&q=80" alt="Brand 3">
            <h3>Mercedes-Benz</h3>
        </div>
         <div class="brand-box">
            <img class="brand-logo" src="https://imgd-ct.aeplcdn.com/272x153/n/cw/ec/23/brands/logos/land-rover1647236056893.jpg?v=1647236057234&q=80" alt="Brand 3">
            <h3>Land Rover</h3>
        </div>
         <div class="brand-box">
            <img class="brand-logo" src="https://imgd-ct.aeplcdn.com/272x153/n/cw/ec/70/brands/logos/kia.jpg?v=1630057189593&q=80" alt="Brand 3">
            <h3>Kia</h3>
        </div>
         <div class="brand-box">
            <img class="brand-logo" src="https://imgd-ct.aeplcdn.com/272x153/n/cw/ec/7/brands/logos/honda.jpg?v=1630056209549&q=80" alt="Brand 3">
            <h3>Honda</h3>
        </div>
         <div class="brand-box">
            <img class="brand-logo" src="https://imgd-ct.aeplcdn.com/272x153/n/cw/ec/18/brands/logos/audi.jpg?v=1630055874070&q=80" alt="Brand 3">
            <h3>Audi</h3>
        </div>
         <div class="brand-box">
            <img class="brand-logo" src="https://imgd-ct.aeplcdn.com/272x153/n/cw/ec/15/brands/logos/skoda1681982956420.jpg?v=1681982956529&q=80" alt="Brand 3">
            <h3>Skoda</h3>
        </div>
        
    </div>

  <?php
						include("footer.html");
					?>
</body>

</html>
