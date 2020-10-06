<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $toUser = $_POST['to'];
    $amnt = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the credits are to be transferred.

    $sql = "SELECT * from users where id=$toUser";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

  //if amount that we are gonna deduct from any user is
  // greater than the current credits available then print insufficient balance.
 if($amnt > $sql1['credits']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    
     else if($amnt == 0){
         echo "<script type='text/javascript'>alert('Enter Amount Greater than Zero');
    </script>";
     }
    else {
        
        //if not then deduct the credits from the user's account that we selected.
        $newCredit = $sql1['credits'] - $amnt;
        $sql = "UPDATE users set credits=$newCredit where id=$from";
        mysqli_query($conn,$sql);
     


        $newCredit = $sql2['credits'] + $amnt;
        $sql = "UPDATE users set credits=$newCredit where id=$toUser";
        mysqli_query($conn,$sql);
        
        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `credits`) VALUES ('$sender','$receiver','$amnt')";
        $tns=mysqli_query($conn,$sql);
        if($tns){
           echo "<script type='text/javascript'>
                    alert('Transaction Successfull!');
                    window.location='transactionDetails.php';
                </script>";
        }   
        $newCredit= 0;
        $amnt =0;
    }
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credits Transfer</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
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
            border-spacing: 0;
            box-shadow: 10px 20px 36px #848484; 
            border-radius: 30px;
        }
        table.roundedCorners td{
            text-align: center;
            padding: 10px;
        } 
        table.roundedCorners th { 
            padding: 10px;
            text-align: center;
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
    <div class="container divStyle">
        <h2>Credits Transfer Process</h2>
        <!-- <form method="post" name="tcredit" class="tabletext"><br/> -->
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $query=mysqli_query($conn,$sql);
                if(!$query)
                {
                    echo "Error ".$sql."<br/>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_array($query);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br/>
        <label> Credits Transfer From: </label><br/>
        <div>
            <table class="table roundedCorners  tabletext table-hover  table-striped table-condensed"  style="box-shadow: 10px 20px 36px #000000">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Credits</th>
                </tr>
                <tr>
                    <td><?php echo $rows['id'] ?></td>
                    <td><?php echo $rows['name'] ?></td>
                    <td><?php echo $rows['email'] ?></td>
                    <td><?php echo $rows['credits'] ?></td>
                </tr>
            </table>
        </div>
        <br/><br/><br/>
        <label>Credits Transfer To:</label>
        <select class=" form-control"  style="box-shadow: 10px 20px 36px #000000" name="to" style="margin-bottom:5%;" required>
            <option value="" disabled selected> To </option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $query=mysqli_query($conn,$sql);
                if(!$query)
                {
                    echo "Error ".$sql."<br/>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_array($query)) {
            ?>
                <option class="table text-center table-striped " value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Credits: 
                    <?php echo $rows['credits'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
        </select> <br/><br/><br/>
            <label>Enter Number of CREDITS to be Transferred:</label>
            <input type="number" id="amm" class="form-control" name="amount" min="0" required  style="box-shadow: 10px 20px 36px #000000"/>  <br/><br/>
                <div class="text-center btn3" >
            <button class="btn btnStyle1 mt-5" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>