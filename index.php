<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    

    <style type="text/css">
      .bgimagehome{
        align-items: center;
        border-radius: 30px;
        box-shadow: 10px 20px 36px #000000;
        text-align: center;
        width: 50%;
      }
      .btn{
        border-radius: 10px;
        box-shadow: 10px 10px 36px #000000;
        background-color: black;
        color: white;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark  ">
      <a class="navbar-brand nava" href="#">Credit Management System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link nava" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nava" href="./viewusers.php">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nava" href="./transactionDetails.php">History</a>
          </li>    
        </ul>
      </div>  
    </nav>

    <center><br>
      <div class="bgimagehome" style="border-radius: 30px;">
        <img src="./images/home_bg_1.jpg" width="100%" height="300px" class="img-circle">
      </div>
    </center>

    <br><br><br>
    
    <center>
      <div class="main" style="width: 50%;">
        <a href="./viewusers.php" class="btn btn-lg" role="button">View Users & Make Transaction</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="./transactionDetails.php" class="btn btn-lg" role="button">Transaction History</a>
      </div>
    </center>

      
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>