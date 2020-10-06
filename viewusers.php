<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Details</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    

    <style type="text/css">
        h2{
            margin-top:30px;
            color: #0A6F6B;
        }
        .tabletext{
            /*font-family: Georgia;*/
            border-spacing: 0;
            background-color: transparent;
        }
        table.roundedCorners { 
            border: 5px solid golden;
            border-spacing: 0;
            box-shadow: 10px 20px 36px #848484; 
            border-radius: 30px;
        }
        table.roundedCorners td{
            text-align: center;
        } 
        table.roundedCorners th { 
            padding: 10px;
            text-align: center;
        }
        .btn{
            background-color: #000000;
            color: white;
            box-shadow: 5px 10px 10px #848484;
        }
    </style>

    
</head>
<body>
<?php
    require 'config.php';
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn,$query);
?>

     <nav class="navbar navbar-expand-md bg-dark navbar-dark navStyle ">
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
    <div class="container divStyle">
        <h2>All Users</h2>
        <br>
       
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table roundedCorners tabletext table-hover table-sm table-striped table-condensed">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email Id</th>
                            <th scope="col">Credits</th>
                            <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_array($result)){
                ?>
                    <tr>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['name']?></td>
                        <td><?php echo $rows['email']?></td>
                        <td><?php echo $rows['credits']?></td> 
                        <td><a href="selectedUserdetail.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn">Transaction</button></a></td>
                    </tr>
                <?php
                    }
                ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
            </div> 
    
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>